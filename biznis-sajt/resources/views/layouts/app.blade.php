<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tamy Dev | Laravel Developer</title>
    <meta name="description" content="Professional Laravel developer portfolio and business website for modern companies and personal brands.">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<header class="header">
    <div class="container header-flex">

        <a href="#hero" class="brand">
            <img src="{{ asset('images/logo.png') }}" alt="Tamy Dev Logo" class="logo-img">

            <div class="brand-text">
                <span class="brand-title">Tamy Dev</span>
                <span class="brand-subtitle">Laravel Developer</span>
            </div>
        </a>

        <nav class="nav">
            <a href="#hero">Home</a>
            <a href="#services">Services</a>
            <a href="#tech">Tech Stack</a>
            <a href="#projects">Projects</a>
            <a href="#contact">Contact</a>
        </nav>

    </div>
</header>

@yield('content')

<footer class="footer">
    <div class="container footer-flex">
        <div>
            <p class="footer-brand">Tamy Dev</p>
            <p class="footer-text">Modern Laravel websites for businesses and personal brands.</p>
        </div>

        <div class="footer-links">
            <a href="https://github.com/Tamycvetanka" target="_blank">GitHub</a>
            <a href="#contact">Contact</a>
        </div>
    </div>

    <div class="container footer-bottom">
        <p>© 2026 Tamy Dev. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
