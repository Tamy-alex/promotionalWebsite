@extends('layouts.app')

@section('content')

    <section id="hero" class="hero">
        <div class="container hero-grid">
            <div class="hero-content">
                <span class="hero-badge">Laravel Developer • Business Websites</span>
                <h1>Professional websites that make your business look serious online.</h1>
                <p>
                    I build modern, clean and responsive websites using Laravel, PHP and MySQL
                    for businesses, services and personal brands that want a strong online presence.
                </p>

                <div class="hero-buttons">
                    <a href="#contact" class="btn btn-primary">Request a Quote</a>
                    <a href="/cv/tamara-cv.pdf" class="btn btn-secondary" download>Download CV</a>
                </div>

                <div class="hero-stats">
                    <div class="stat-box">
                        <strong>Laravel</strong>
                        <span>Backend Solutions</span>
                    </div>
                    <div class="stat-box">
                        <strong>Responsive</strong>
                        <span>Mobile Friendly</span>
                    </div>
                    <div class="stat-box">
                        <strong>Clean Design</strong>
                        <span>Professional Look</span>
                    </div>
                </div>
            </div>

            <div class="hero-card">
                <div class="hero-logo-box">
                    <div class="hero-logo-circle">TD</div>
                    <h3>Tamy Dev</h3>
                    <p>Laravel Developer • Web Solutions</p>
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="section">
        <div class="container">
            <div class="section-heading">
                <span class="section-label">Services</span>
                <h2>What I can build for your business</h2>
                <p>Professional solutions for companies that want a stronger digital presence.</p>
            </div>

            <div class="cards">
                <div class="card">
                    <i class="fa-solid fa-globe service-icon"></i>
                    <h3>Business Websites</h3>
                    <p>Modern websites for companies, services, freelancers and personal brands.</p>
                </div>

                <div class="card">
                    <i class="fa-solid fa-code service-icon"></i>
                    <h3>Laravel Development</h3>
                    <p>Custom Laravel pages, backend logic, forms, dashboards and dynamic features.</p>
                </div>

                <div class="card">
                    <i class="fa-solid fa-paintbrush service-icon"></i>
                    <h3>Website Redesign</h3>
                    <p>Transforming old websites into cleaner, modern and more professional versions.</p>
                </div>

                <div class="card">
                    <i class="fa-solid fa-screwdriver-wrench service-icon"></i>
                    <h3>Maintenance & Updates</h3>
                    <p>Fixing bugs, updating content and improving the look and performance of websites.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="tech" class="section gray-section">
        <div class="container">
            <div class="section-heading">
                <span class="section-label">Tech Stack</span>
                <h2>Technologies I work with</h2>
                <p>Tools I use to build clean, functional and scalable web projects.</p>
            </div>

            <div class="cards">
                <div class="card">
                    <i class="fa-brands fa-laravel tech-icon"></i>
                    <h3>Laravel</h3>
                    <p>Modern PHP framework for clean, structured and scalable applications.</p>
                </div>

                <div class="card">
                    <i class="fa-brands fa-php tech-icon"></i>
                    <h3>PHP</h3>
                    <p>Reliable backend programming for dynamic websites and business logic.</p>
                </div>

                <div class="card">
                    <i class="fa-solid fa-database tech-icon"></i>
                    <h3>MySQL</h3>
                    <p>Database structure for storing products, users, contact forms and project data.</p>
                </div>

                <div class="card">
                    <i class="fa-brands fa-github tech-icon"></i>
                    <h3>GitHub</h3>
                    <p>Version control, repositories and public project presentation for employers.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="projects" class="section projects">
        <div class="container">
            <div class="section-heading">
                <span class="section-label">Portfolio</span>
                <h2>Selected GitHub projects</h2>
                <p>Examples of Laravel work and practice projects from my development journey.</p>
            </div>

            <div class="cards">
                <div class="card project-card">
                    <i class="fa-solid fa-cloud project-icon"></i>
                    <span class="project-tag">Laravel + API</span>
                    <h3>Weather Laravel App</h3>
                    <p>Weather application built with Laravel and external API integration.</p>
                    <a href="https://github.com/Tamycvetanka/domaci_19_api" class="project-link" target="_blank">View Code</a>
                </div>

                <div class="card project-card">
                    <i class="fa-solid fa-cart-shopping project-icon"></i>
                    <span class="project-tag">CRUD Project</span>
                    <h3>Products CRUD</h3>
                    <p>Laravel CRUD application with products, routes, forms and database logic.</p>
                    <a href="https://github.com/Tamycvetanka/domaci_21" class="project-link" target="_blank">View Code</a>
                </div>

                <div class="card project-card">
                    <i class="fa-solid fa-laptop-code project-icon"></i>
                    <span class="project-tag">Practice Work</span>
                    <h3>Laravel Practice</h3>
                    <p>Collection of exercises and learning projects showing growth in Laravel.</p>
                    <a href="https://github.com/Tamycvetanka" class="project-link" target="_blank">View Code</a>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="section dark-section">
        <div class="container">
            <div class="section-heading light">
                <span class="section-label">Contact</span>
                <h2>Let’s work together</h2>
                <p>If your company needs a clean and professional website, I am ready to help.</p>
            </div>

            <div class="contact-box">
                <p><i class="fa-solid fa-envelope"></i> Email: tamara.dev.contact@gmail.com</p>
                <p><i class="fa-solid fa-phone"></i> Phone: +389 7X XXX XXX</p>
                <p><i class="fa-brands fa-github"></i> GitHub:
                    <a href="https://github.com/Tamycvetanka" target="_blank">github.com/Tamycvetanka</a>
                </p>
                <p><i class="fa-brands fa-facebook"></i> Facebook:
                    <a href="https://facebook.com" target="_blank">Your public business page</a>
                </p>
                <p><i class="fa-brands fa-instagram"></i> Instagram:
                    <a href="https://instagram.com" target="_blank">Your brand profile</a>
                </p>
            </div>
        </div>
    </section>

@endsection
