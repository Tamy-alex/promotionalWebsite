<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alex | Backend Developer</title>
    <meta name="description" content="Aleksandra Zecevic — Backend Developer specialising in PHP 8, Laravel, MySQL, MongoDB and Cybersecurity.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/alex.css') }}">
</head>
<body>

<header class="alex-header">
    <div class="alex-container alex-header-flex">

        <a href="{{ route('alex') }}" class="alex-brand">
            <div class="alex-logo-circle-sm">AC</div>
            <div class="alex-brand-text">
                <span class="alex-brand-title">Aleksandra Čvetić</span>
                <span class="alex-brand-subtitle">Backend Developer</span>
            </div>
        </a>

        <nav class="alex-nav">
            <a href="{{ route('alex') }}#alex-hero">Home</a>
            <a href="{{ route('alex') }}#about">About</a>
            <a href="{{ route('alex') }}#skills">Skills</a>
            <a href="{{ route('alex') }}#projects">Projects</a>
            <a href="{{ route('alex') }}#contact">Contact</a>
            <a href="{{ route('home') }}" class="alex-nav-collab">
                <i class="fa-solid fa-arrow-left"></i> Tamy's Page
            </a>
        </nav>

    </div>
</header>

@yield('content')

<footer class="alex-footer">
    <div class="alex-container alex-footer-flex">
        <div>
            <p class="alex-footer-brand">Aleksandra (Alex) Čvetić</p>
            <p class="alex-footer-text">Backend Developer · PHP & Laravel · Cybersecurity</p>
        </div>
        <div class="alex-footer-links">
            <a href="https://github.com/anxietyPotato" target="_blank">
                <i class="fa-brands fa-github"></i> GitHub
            </a>
            <a href="{{ route('alex') }}#contact">Contact</a>
            <a href="{{ route('home') }}">
                <i class="fa-solid fa-arrow-left"></i> Back to Tamy
            </a>
        </div>
    </div>
    <div class="alex-container alex-footer-bottom">
        <p>© 2026 Aleksandra Cvetić. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
