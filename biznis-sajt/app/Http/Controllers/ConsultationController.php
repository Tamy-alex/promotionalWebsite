<?php

namespace App\Http\Controllers;

use App\Models\ConsultationBooking;
use App\Mail\ConsultationConfirmation;
use App\Mail\ConsultationOwnerNotification;
use App\Enums\ConsultantEnum;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ConsultationController extends Controller
{
    /**
     * Available time slots per consultant.
     * "both" merges alex + tamy free slots at query time.
     */
    private const SLOTS = [
        'alex' => ['09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30'],
        'tamy' => ['14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00'],
    ];

    /**
     * Contact info — server-side only, never returned to the frontend.
     * Fill in real Zoom links and WhatsApp numbers before going live.
     */
    private const CONTACTS = [
        'alex' => [
            'name' => 'Aleksandra (Alex)',
            'zoom' => 'https://us05web.zoom.us/j/*******243?pwd=si4V7ylGZckHa4DjfiS1Z45ZyTyxiY.1',
            'whatsapp' => 'https://wa.me/+393930663796',
            'email' => 'cvetica8@gmail.com',
        ],
        'tamy' => [
            'name' => 'Tamara',
            'zoom' => 'https://zoom.us/j/REPLACE_TAMY',
            'whatsapp' => 'https://wa.me/+38975857435',
            'email' => 'cvetkovskatamara2@gmail.com',
        ],
    ];


    /**
     * Owner email — receives a notification for every new booking.
     * Set OWNER_EMAIL in your .env file.
     */
    private const OWNER_EMAIL = 'cvetica8@gmail.com';

    // ── GET /consultation/slots ────────────────────────────────────────

    public function slots(Request $request): JsonResponse
    {
        $date = $request->query('date');

        try {
            $consultant = ConsultantEnum::from($request->query('consultant'));
        } catch (\ValueError $e) {
            return response()->json(['error' => 'Invalid consultant.'], 422);
        }

        if (!$date) {
            return response()->json(['error' => 'Missing date.'], 422);
        }

        // Block weekends
        if (in_array(date('N', strtotime($date)), [6, 7])) {
            return response()->json([
                'slots' => [],
                'note' => 'We are not available on weekends. Please pick a weekday.',
            ]);
        }

        if ($consultant === ConsultantEnum::BOTH) {
            $alexFree = array_diff(self::SLOTS['alex'], ConsultationBooking::bookedSlotsFor(ConsultantEnum::ALEX, $date));
            $tamyFree = array_diff(self::SLOTS['tamy'], ConsultationBooking::bookedSlotsFor(ConsultantEnum::TAMY, $date));
            $available = array_values(array_unique(array_merge($alexFree, $tamyFree)));
            sort($available);

            return response()->json([
                'slots' => $available,
                'note' => 'Showing combined availability — Alex (09:00–12:30) and Tamara (14:00–17:00).',
            ]);
        }

        $booked = ConsultationBooking::bookedSlotsFor($consultant, $date);
        $available = array_values(array_diff(self::SLOTS[$consultant->value], $booked));

        return response()->json(['slots' => $available]);
    }

    // ── POST /consultation/book ────────────────────────────────────────

    public function book(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'client_name' => 'required|string|max:100',
            'client_email' => 'required|email|max:150',
            'service' => 'required|string|max:100',
            'message' => 'nullable|string|max:1000',
            'consultant' => 'required|in:alex,tamy,both',
            'preferred_date' => 'required|date|after:today',
            'preferred_time' => 'required|string',
            'platform' => 'required|in:zoom,whatsapp',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 422);
        }

        $data = $validator->validated();

        // Race-condition guard — double-check slot is still free
        $consultantsToCheck = $data['consultant'] === 'both'
            ? [ConsultantEnum::ALEX, ConsultantEnum::TAMY]
            : [ConsultantEnum::from($data['consultant'])];

        foreach ($consultantsToCheck as $enum) {
            if (ConsultationBooking::isSlotTaken($enum, $data['preferred_date'], $data['preferred_time'])) {
                return response()->json([
                    'success' => false,
                    'message' => 'That time slot was just taken. Please go back and choose another.',
                ], 409);
            }
        }

        $booking = ConsultationBooking::create($data);

        // Resolve which consultant's contact info to use.
        $whoKey = $data['consultant'] === 'both'
            ? (in_array($data['preferred_time'], self::SLOTS['alex']) ? 'alex' : 'tamy')
            : $data['consultant'];

        $contactInfo = [
            'name' => $data['consultant'] === 'both' ? 'both of us' : self::CONTACTS[$whoKey]['name'],
            'zoom' => self::CONTACTS[$whoKey]['zoom'],
            'whatsapp' => self::CONTACTS[$whoKey]['whatsapp'],
        ];

        // 1. Send confirmation email to the CLIENT
        Mail::to($data['client_email'])
            ->send(new ConsultationConfirmation($data, $contactInfo));

        // 2. Send notification email to the OWNER
        $consultant = $data['consultant']; // alex, tamy, both

        if ($consultant === 'alex') {
            $ownerEmail = self::CONTACTS['alex']['email'];
        } elseif ($consultant === 'tamy') {
            $ownerEmail = self::CONTACTS['tamy']['email'];
        } else {
            // both → send only to Alex
            $ownerEmail = self::CONTACTS['alex']['email'];
        }

        Mail::to($ownerEmail)
            ->send(new ConsultationOwnerNotification($data, $contactInfo));

        return response()->json([
            'success' => true,
            'message' => 'Your consultation has been booked successfully.',
        ]);
    }
}
