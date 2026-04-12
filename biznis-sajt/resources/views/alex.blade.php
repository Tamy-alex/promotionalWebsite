@extends('layouts.alex')
@include('partials.consultation-modal')
@section('content')

    {{-- ===================== HERO ===================== --}}
    <section id="alex-hero" class="hero">
        <div class="container hero-grid">
            <div class="hero-content">
                <span class="hero-badge">Backend Developer • PHP & Laravel • Cybersecurity</span>
                <h1>Secure, scalable web applications — built with precision.</h1>
                <p>
                    I'm Aleksandra (Alex) — a Backend Developer specialising in PHP 8, Laravel 12,
                    MySQL and MongoDB. With a strong background in cybersecurity, I build not just fast
                    and clean applications, but secure ones too.
                </p>

                <div class="hero-buttons">
                    <a href="https://github.com/anxietyPotato" class="btn btn-primary" target="_blank">
                        <i class="fa-brands fa-github"></i> View My GitHub
                    </a>
                    <a href="#" onclick="openCModal(); return false;" class="btn btn-secondary">Get in Touch</a>
                </div>

                <div class="hero-stats">
                    <div class="stat-box">
                        <strong>Laravel 12</strong>
                        <span>Backend Expert</span>
                    </div>
                    <div class="stat-box">
                        <strong>AWS</strong>
                        <span>Cloud Deployment</span>
                    </div>
                    <div class="stat-box">
                        <strong>Security</strong>
                        <span>Certified</span>
                    </div>
                </div>
            </div>

            <div class="hero-card">
                <div class="hero-logo-box">
                    <div class="hero-logo-circle">AC</div>
                    <h3>Phoenix Web Crafts</h3>
                    <p>Backend Developer • Web & Security</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== ABOUT ===================== --}}
    <section id="about" class="section gray-section">
        <div class="container">
            <div class="section-heading">
                <h2>Backend developer with a security mindset</h2>
                <p>Currently working as a Backend Developer at <strong>Nikolic Technology</strong> (March 2025 – Ongoing), building an educational platform with PHP 8+, Laravel 12, MySQL, MongoDB and AWS.</p>
            </div>

            <div class="cards">
                <div class="card">
                    <i class="fa-solid fa-shield-halved service-icon"></i>
                    <h3>Cybersecurity</h3>
                    <p>EC-Council certified in Ethical Hacking Essentials and Network Defence Essentials. I write code that's safe by design.</p>
                </div>
                <div class="card">
                    <i class="fa-brands fa-laravel service-icon"></i>
                    <h3>Laravel & PHP</h3>
                    <p>Building scalable backend systems, REST APIs, resource controllers, Redis caching and complex database logic.</p>
                </div>
                <div class="card">
                    <i class="fa-solid fa-cloud service-icon"></i>
                    <h3>Cloud & DevOps</h3>
                    <p>Deploying and managing applications on AWS and Google Cloud. Comfortable with Linux administration and Git workflows.</p>
                </div>
                <div class="card">
                    <i class="fa-solid fa-database service-icon"></i>
                    <h3>Databases</h3>
                    <p>Experienced with both relational (MySQL) and document-based (MongoDB) databases — choosing the right tool for the job.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== SKILLS ===================== --}}
    <section id="skills" class="section">
        <div class="container">
            <div class="section-heading">
                <h2>Technologies I work with</h2>
                <p>A broad skillset covering backend, cloud, security and infrastructure.</p>
            </div>

            <div class="cards">
                <div class="card">
                    <i class="fa-brands fa-php tech-icon"></i>
                    <h3>PHP 8 & Laravel 12</h3>
                    <p>My primary stack — building clean, structured, scalable backend applications.</p>
                </div>
                <div class="card">
                    <i class="fa-solid fa-database tech-icon"></i>
                    <h3>MySQL & MongoDB</h3>
                    <p>Relational and NoSQL databases for flexible, performance-optimised data storage.</p>
                </div>
                <div class="card">
                    <i class="fa-brands fa-aws tech-icon"></i>
                    <h3>AWS & Google Cloud</h3>
                    <p>Cloud deployment, hosting and infrastructure management for production applications.</p>
                </div>
                <div class="card">
                    <i class="fa-solid fa-terminal tech-icon"></i>
                    <h3>Python & Linux</h3>
                    <p>Scripting, automation and Linux system administration for server-side tasks.</p>
                </div>
                <div class="card">
                    <i class="fa-solid fa-lock tech-icon"></i>
                    <h3>Cybersecurity</h3>
                    <p>Vulnerability assessment, ethical hacking, network defence and secure coding practices.</p>
                </div>
                <div class="card">
                    <i class="fa-brands fa-bootstrap tech-icon"></i>
                    <h3>HTML, CSS & Bootstrap 5</h3>
                    <p>Clean frontend markup to pair with solid backend logic.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== EXPERIENCE PROJECT ===================== --}}
    <section id="experience" class="section gray-section">
        <div class="container">
            <div class="section-heading">
                <span class="section-label">Experience</span>
                <h2>Projects I've worked on professionally</h2>
                <p>Real-world work from my current role at Nikolic Technology.</p>
            </div>

            <div class="card project-card" style="max-width:800px; margin: 0 auto;">
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px;">
                    <i class="fa-solid fa-building-columns project-icon" style="font-size:2rem;"></i>
                    <div>
                        <span class="project-tag">PHP 8 • Laravel 12 • MySQL • MongoDB • AWS</span>
                        <h3 style="margin:4px 0 0;">Educational Platform — Nikolic Technology</h3>
                        <small style="color:#888;">March 2025 – Ongoing</small>
                    </div>
                </div>
                <p>
                    Backend development of a full-scale educational platform. Responsible for implementing
                    new features, optimising performance and deploying services on AWS using Git for
                    version control. The system uses both MySQL and MongoDB for flexible data management.
                </p>


            </div>
        </div>
    </section>

    {{-- ===================== PUBLIC REPOS ===================== --}}
    <section id="projects" class="section projects">
        <div class="container">
            <div class="section-heading">
                <span class="section-label">Portfolio</span>
                <h2>Public GitHub Repositories</h2>
                <p>All of my public work.</p>
            </div>

            <div class="cards">
                @foreach($repos as $repo)
                    <div class="card project-card">
                        <i class="{{ $repo['icon'] }} project-icon"></i>
                        <span class="project-tag">{{ $repo['tag'] }}</span>
                        <h3>{{ $repo['name'] }}</h3>
                        <p>{{ $repo['description'] }}</p>

                        {{-- Screenshot --}}
                        @if(!empty($repo['image']))
                            <div class="repo-image-wrapper">
                                <img src="{{ asset($repo['image']) }}" alt="{{ $repo['name'] }} screenshot">
                            </div>
                        @else

                            <div style="border: 2px dashed #ddd; border-radius: 8px; padding: 24px 12px; text-align:center; margin: 14px 0 10px; background:#fafafa;">
                                <i class="fa-solid fa-image" style="font-size:1.6rem; color:#ccc;"></i>
                                <p style="color:#bbb; font-size:0.8rem; margin: 6px 0 0;">Screenshot placeholder<br><small>Replace with <code>&lt;img src="..."&gt;</code></small></p>
                            </div>
                        @endif

                        <a href="{{ $repo['url'] }}" class="btn btn-primary" target="_blank" style="display:inline-flex; align-items:center; gap:8px; margin-top:6px;">
                            <i class="fa-brands fa-github"></i> View Repository
                        </a>
                    </div>
                @endforeach
            </div>

            <div style="text-align:center; margin-top:40px;">
                <a href="https://github.com/anxietyPotato" class="btn btn-secondary" target="_blank">
                    <i class="fa-brands fa-github"></i> See All Repositories on GitHub
                </a>
            </div>
        </div>
    </section>

    {{-- ===================== CONTACT ===================== --}}
    <section id="contact" class="section dark-section">
        <div class="container">
            <div class="section-heading light">
                <span class="section-label">Contact</span>
                <h2>Let's build something great</h2>
                <p>Open to collaboration, freelance work and new opportunities.</p>
            </div>

            <div class="contact-box">
                <p><i class="fa-solid fa-envelope"></i> Email:
                    <a href="mailto:cvetica8@gmail.com">cvetica8@gmail.com</a>
                </p>
                <p><i class="fa-solid fa-phone"></i> Phone: +39 393 066 3796</p>
                <p><i class="fa-brands fa-github"></i> GitHub:
                    <a href="https://github.com/anxietyPotato" target="_blank">github.com/anxietyPotato</a>
                </p>
                <p><i class="fa-brands fa-linkedin"></i> LinkedIn:
                    <a href="https://www.linkedin.com/in/aleksandra-zecevic" target="_blank">Aleksandra Zecevic</a>
                </p>
            </div>
        </div>
    </section>


    <div id="imageOverlay" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.8); z-index:9999; justify-content:center; align-items:center;">
        <img id="overlayImg" src="" style="max-width:60vw; max-height:60vh; border-radius:12px;">
    </div>

    <script>
        const overlay = document.getElementById('imageOverlay');
        const overlayImg = document.getElementById('overlayImg');

        document.querySelectorAll('.repo-image-wrapper img').forEach(img => {
            img.addEventListener('mouseenter', function () {
                overlayImg.src = this.src;
                overlay.style.display = 'flex';
            });
        });

        overlay.addEventListener('mouseleave', function () {
            overlay.style.display = 'none';
            overlayImg.src = '';
        });
    </script>

@endsection
