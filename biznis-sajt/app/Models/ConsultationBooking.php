<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\ConsultantEnum;
use App\Enums\PlatformEnum;
use App\Enums\BookingStatusEnum;

class ConsultationBooking extends Model
{
    protected $fillable = [
        'client_name',
        'client_email',
        'service',
        'message',
        'consultant',
        'preferred_date',
        'preferred_time',
        'platform',
        'status',
    ];

    protected $casts = [
        'preferred_date' => 'date',
        'platform'       => PlatformEnum::class,
        'status'         => BookingStatusEnum::class,
        // consultant stays STRING in DB, but we convert to enum in controller
    ];

    public function scopeForConsultant($query, ConsultantEnum $consultant)
    {
        return $query->where('consultant', $consultant->value)
            ->orWhere('consultant', ConsultantEnum::BOTH->value);
    }

    public static function isSlotTaken(ConsultantEnum $consultant, string $date, string $time): bool
    {
        return self::where('preferred_date', $date)
            ->where('preferred_time', $time)
            ->where('status', '!=', BookingStatusEnum::CANCELLED->value)
            ->where(function ($q) use ($consultant) {
                $q->where('consultant', $consultant->value)
                    ->orWhere('consultant', ConsultantEnum::BOTH->value);
            })
            ->exists();
    }

    public static function bookedSlotsFor(ConsultantEnum $consultant, string $date): array
    {
        return self::where('preferred_date', $date)
            ->where('status', '!=', BookingStatusEnum::CANCELLED->value)
            ->where(function ($q) use ($consultant) {
                $q->where('consultant', $consultant->value)
                    ->orWhere('consultant', ConsultantEnum::BOTH->value);
            })
            ->pluck('preferred_time')
            ->toArray();
    }
}
