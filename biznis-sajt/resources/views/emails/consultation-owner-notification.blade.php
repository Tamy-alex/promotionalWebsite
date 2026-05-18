{{-- Save as: resources/views/emails/consultation-owner-notification.blade.php --}}
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        body        { font-family:Arial,sans-serif; background:#f5f5f5; margin:0; padding:32px 16px; }
        .wrap       { max-width:560px; margin:0 auto; background:#fff; border-radius:12px; overflow:hidden; box-shadow:0 4px 24px rgba(0,0,0,.08); }
        .header     { background:#1a1a2e; padding:28px 36px; color:#fff; }
        .header h1  { margin:0; font-size:1.3rem; }
        .header p   { margin:6px 0 0; opacity:.7; font-size:.88rem; }
        .body       { padding:32px 36px; }
        .badge      { display:inline-block; padding:4px 12px; border-radius:20px; font-size:.78rem; font-weight:700; text-transform:uppercase; letter-spacing:.05em; margin-bottom:20px; }
        .badge-zoom { background:#e8f0fe; color:#2D8CFF; }
        .badge-whatsapp { background:#e8fdf0; color:#25D366; }
        .row        { display:flex; margin-bottom:12px; border-bottom:1px solid #f0f0f0; padding-bottom:12px; }
        .row:last-child { border-bottom:none; }
        .row label  { min-width:140px; font-size:.82rem; font-weight:700; color:#999; text-transform:uppercase; letter-spacing:.05em; padding-top:2px; }
        .row span   { font-size:.95rem; color:#222; flex:1; }
        .msg-box    { background:#f9f9f9; border-left:3px solid #e44d26; border-radius:0 8px 8px 0; padding:14px 16px; margin:20px 0; font-size:.9rem; color:#444; line-height:1.6; }
        .cta        { display:inline-block; padding:11px 24px; border-radius:8px; color:#fff; font-weight:700; font-size:.9rem; text-decoration:none; margin-top:20px; }
        .cta-zoom   { background:#2D8CFF; }
        .cta-wa     { background:#25D366; }
        .footer     { background:#f9f9f9; padding:16px 36px; font-size:.76rem; color:#aaa; border-top:1px solid #eee; }
    </style>
</head>
<body>
<div class="wrap">

    <div class="header">
        <h1>📅 New Consultation Booked</h1>
        <p>Someone just scheduled a call through your website.</p>
    </div>

    <div class="body">

        <span class="badge {{ $booking['platform'] === 'zoom' ? 'badge-zoom' : 'badge-whatsapp' }}">
            {{ $booking['platform'] === 'zoom' ? '🎥 Zoom' : '💬 WhatsApp' }}
        </span>

        <div class="row">
            <label>Client</label>
            <span>{{ $booking['client_name'] }}</span>
        </div>
        <div class="row">
            <label>Email</label>
            <span><a href="mailto:{{ $booking['client_email'] }}" style="color:#e44d26">{{ $booking['client_email'] }}</a></span>
        </div>
        <div class="row">
            <label>Service</label>
            <span>{{ $booking['service'] }}</span>
        </div>
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
            <label>Platform</label>
            <span>{{ $booking['platform'] === 'zoom' ? 'Zoom' : 'WhatsApp' }}</span>
        </div>

        @if(!empty($booking['message']))
            <p style="font-size:.85rem;font-weight:700;color:#999;text-transform:uppercase;letter-spacing:.05em;margin:20px 0 6px">Client's message</p>
            <div class="msg-box">{{ $booking['message'] }}</div>
        @endif

        <p style="font-size:.9rem;color:#555;margin-top:20px">
            <strong>Your {{ $booking['platform'] === 'zoom' ? 'Zoom link' : 'WhatsApp number' }} for this meeting:</strong>
        </p>

        @if($booking['platform'] === 'zoom')
            <a href="{{ $contactInfo['zoom'] }}" class="cta cta-zoom">Open Zoom Meeting →</a>
            <p style="font-size:.82rem;color:#888;margin-top:8px">{{ $contactInfo['zoom'] }}</p>
        @else
            <a href="{{ $contactInfo['whatsapp'] }}" class="cta cta-wa">Open WhatsApp →</a>
            <p style="font-size:.82rem;color:#888;margin-top:8px">{{ $contactInfo['whatsapp'] }}</p>
        @endif

    </div>

    <div class="footer">
        This notification was sent automatically when a client completed the booking form on your website. &copy; {{ date('Y') }}
    </div>

</div>
</body>
</html>
