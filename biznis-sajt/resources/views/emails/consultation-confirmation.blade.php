{{-- Save as: resources/views/emails/consultation-confirmation.blade.php --}}
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        body        { font-family:Arial,sans-serif; background:#f5f5f5; margin:0; padding:32px 16px; }
        .wrap       { max-width:560px; margin:0 auto; background:#fff; border-radius:12px; overflow:hidden; box-shadow:0 4px 24px rgba(0,0,0,.08); }
        .header     { background:#e44d26; padding:32px 36px; color:#fff; }
        .header h1  { margin:0; font-size:1.4rem; }
        .header p   { margin:6px 0 0; opacity:.85; font-size:.9rem; }
        .body       { padding:32px 36px; }
        .row        { margin-bottom:16px; }
        .row label  { display:block; font-size:.78rem; font-weight:700; color:#999; text-transform:uppercase; letter-spacing:.05em; margin-bottom:3px; }
        .row span   { font-size:.97rem; color:#222; }
        hr          { border:none; border-top:1px solid #eee; margin:24px 0; }
        .cta        { display:inline-block; padding:13px 28px; border-radius:8px; color:#fff; font-weight:700; font-size:.95rem; text-decoration:none; }
        .cta-zoom   { background:#2D8CFF; }
        .cta-wa     { background:#25D366; }
        .link-copy  { font-size:.82rem; color:#888; margin:8px 0 0; }
        .link-copy a { color:inherit; }
        .note       { font-size:.82rem; color:#888; margin-top:24px; line-height:1.6; }
        .footer     { background:#f9f9f9; padding:20px 36px; font-size:.78rem; color:#aaa; border-top:1px solid #eee; }
    </style>
</head>
<body>
<div class="wrap">

    <div class="header">
        <h1>You're booked! 🎉</h1>
        <p>Here are your consultation details, {{ $booking['client_name'] }}.</p>
    </div>

    <div class="body">

        <div class="row">
            <label>Consultant</label>
            <span>{{ $contactInfo['name'] }}</span>
        </div>
        <div class="row">
            <label>Date</label>
            <span>{{ \Carbon\Carbon::parse($booking['preferred_date'])->format('l, d F Y') }}</span>
        </div>
        <div class="row">
            <label>Time</label>
            <span>{{ $booking['preferred_time'] }}</span>
        </div>
        <div class="row">
            <label>Service</label>
            <span>{{ $booking['service'] }}</span>
        </div>
        @if(!empty($booking['message']))
            <div class="row">
                <label>Your message</label>
                <span>{{ $booking['message'] }}</span>
            </div>
        @endif
        <div class="row">
            <label>Platform</label>
            <span>{{ $booking['platform'] === 'zoom' ? 'Zoom' : 'WhatsApp' }}</span>
        </div>

        <hr>

        <p style="font-size:.95rem;color:#333;margin:0 0 16px"><strong>How to join:</strong></p>

        @if($booking['platform'] === 'zoom')
            <a href="{{ $contactInfo['zoom'] }}" class="cta cta-zoom">Join Zoom Meeting →</a>
            <p class="link-copy">Or copy: <a href="{{ $contactInfo['zoom'] }}">{{ $contactInfo['zoom'] }}</a></p>
        @else
            <a href="{{ $contactInfo['whatsapp'] }}" class="cta cta-wa">Open WhatsApp →</a>
            <p class="link-copy">Or copy: <a href="{{ $contactInfo['whatsapp'] }}">{{ $contactInfo['whatsapp'] }}</a></p>
        @endif

        <p class="note">
            We'll send a reminder closer to the time. Need to reschedule? Just reply to this email.
        </p>

    </div>

    <div class="footer">
        You're receiving this because you booked a consultation on our website. &copy; {{ date('Y') }}
    </div>

</div>
</body>
</html>
