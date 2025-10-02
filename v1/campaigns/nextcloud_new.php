<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Nextcloud Support | Daniel Hammer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <meta name="description" content="Expert Nextcloud installation, migration, troubleshooting, and support by Daniel Hammer, freelance system administrator in Norway.">
    <style>
        :root {
            --primary: #0078d4;
            --primary-dark: #0056a3;
            --accent: #e5f1fb;
            --bg: #f7fafd;
            --card-bg: #fff;
            --radius: 18px;
            --shadow: 0 4px 24px rgba(0,0,0,0.08);
        }
        html, body { height: 100%; }
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif;
            margin: 0;
            padding: 0;
            background: var(--bg);
            color: #222;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background: url('assets/clouds.jpg') center center / cover no-repeat fixed;
            position: relative;
        }
        body::before {
            content: "";
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(247,250,253,0.82); /* Soft overlay for readability */
            z-index: 0;
            pointer-events: none;
        }
        main, header, .container, .hero, .widgets, .review-section, .footer-centered {
            position: relative;
            z-index: 1;
        }
        header {
            background: transparent;
            color: #fff;
            box-shadow: none;
            position: static;
            z-index: 10;
        }
        .header-content {
            max-width: 980px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 32px;
            height: 68px;
        }
        .logo h1 {
            font-size: 2rem;
            font-weight: 700;
            margin: 0;
            letter-spacing: 1px;
        }
        .header-nav {
            display: flex;
            align-items: center;
            gap: 24px;
        }
        .header-nav .description {
            font-size: 1.1rem;
            font-weight: 500;
            opacity: 0.92;
            margin-right: 12px;
            color: #e5f1fb;
        }
        .header-nav a {
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            color: #fff;
            font-weight: 600;
            font-size: 1.07rem;
            background: var(--primary);
            padding: 8px 18px;
            border-radius: 8px;
            transition: background 0.2s, color 0.2s, box-shadow 0.2s;
            box-shadow: 0 2px 8px rgba(0,120,212,0.10);
        }
        .header-nav a:hover {
            background: var(--primary-dark);
            color: #fff;
            box-shadow: 0 4px 16px rgba(0,120,212,0.13);
        }
        @media (max-width: 700px) {
            .header-content {
                flex-direction: column;
                align-items: flex-start;
                height: auto;
                padding: 12px 4vw;
                gap: 10px;
            }
            .header-nav {
                gap: 12px;
                flex-wrap: wrap;
            }
            .logo h1 {
                font-size: 1.4rem;
            }
        }
        .hero {
            max-width: 700px;
            margin: 48px auto 0 auto;
            padding: 40px 32px 32px 32px;
            background: var(--card-bg);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            text-align: center;
        }
        .hero-title {
            font-size: 2.3rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 12px;
        }
        .hero-desc {
            font-size: 1.18rem;
            color: #333;
            margin-bottom: 28px;
        }
        .cta-btn {
            background: var(--primary);
            color: #fff;
            font-weight: 600;
            font-size: 1.15rem;
            padding: 14px 36px;
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,120,212,0.10);
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
        }
        .cta-btn:hover {
            background: var(--primary-dark);
        }
        .widgets {
            display: flex;
            flex-wrap: wrap;
            gap: 28px;
            justify-content: center;
            margin: 48px auto 0 auto;
            max-width: 900px;
        }
        .widget {
            background: var(--card-bg);
            border-radius: 14px;
            box-shadow: var(--shadow);
            padding: 32px 28px 24px 28px;
            flex: 1 1 260px;
            min-width: 240px;
            max-width: 320px;
            text-align: center;
            transition: box-shadow 0.2s, transform 0.2s;
        }
        .widget:hover {
            box-shadow: 0 8px 32px rgba(0,120,212,0.13);
            transform: translateY(-4px) scale(1.03);
        }
        .widget i {
            font-size: 2.2rem;
            color: var(--primary);
            margin-bottom: 12px;
        }
        .widget-title {
            font-size: 1.18rem;
            font-weight: 600;
            margin-bottom: 10px;
        }
        .widget-desc {
            font-size: 1.01rem;
            color: #444;
        }
        .review-section {
            max-width: 540px;
            margin: 56px auto 0 auto;
            padding: 32px 28px 24px 28px;
            background: var(--card-bg);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            position: relative;
            z-index: 2;
        }
        .review-section h2 {
            text-align: center;
            color: var(--primary-dark);
            margin-bottom: 18px;
        }
        .review-carousel {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0;
            margin-top: 12px;
            position: relative;
        }
        .carousel-btn {
            background: var(--card-bg);
            border: none;
            color: var(--primary-dark);
            font-size: 1.5rem;
            padding: 10px 14px;
            border-radius: 50%;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
            margin: 0 8px;
            z-index: 2;
        }
        .carousel-btn:hover {
            background: var(--primary);
            color: #fff;
        }
        .review-card {
            background: #f8fafc;
            border-left: 5px solid var(--primary);
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            padding: 22px 22px 18px 22px;
            margin: 0;
            font-size: 1.05rem;
            color: #222;
            position: relative;
            min-width: 0;
            width: 100%;
            max-width: 420px;
            transition: box-shadow 0.2s, border-color 0.2s, opacity 0.3s;
            opacity: 1;
        }
        .review-card.fade-out { opacity: 0; }
        .review-card.fade-in { opacity: 1; }
        .review-card .stars {
            color: #ffc107;
            font-size: 1.2rem;
            margin-bottom: 4px;
            display: block;
        }
        .review-card .reviewer {
            font-weight: 600;
            margin-top: 10px;
            color: var(--primary-dark);
        }
        .review-card .fiverr-link {
            font-weight: 600;
            margin-top: 10px;
            color: var(--primary-dark);
        }
        .review-card .fiverr-link:hover {
            color: var(--primary-dark);
            opacity: 1;
            text-decoration: underline;
        }
        @media (max-width: 900px) {
            .widgets { flex-direction: column; align-items: center; }
        }
        @media (max-width: 600px) {
            .hero { padding: 18px 6vw 18px 6vw; margin: 24px 4vw 0 4vw; }
            .widgets { gap: 16px; }
            .widget { padding: 18px 6vw 18px 6vw; }
            .review-section { padding: 18px 6vw 18px 6vw; margin: 24px 4vw 0 4vw; }
        }
        .footer-centered {
            text-align: center;
            color: #888;
            font-weight: 400;
        }
        .footer-centered p {
            color: #888;
            font-weight: 400;
            letter-spacing: 0.01em;
        }
        .footer-centered strong {
            color: #666;
            font-weight: 500;
        }
        .hero-review-link {
            position: relative;
            display: inline-block;
        }
        .hero-review-link::after {
            content: "";
            display: block;
            position: absolute;
            left: 0;
            right: 0;
            bottom: -2px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary) 60%, var(--primary-dark) 100%);
            border-radius: 2px;
            opacity: 0.85;
            transition: height 0.2s, opacity 0.2s;
        }
        .hero-review-link:hover::after {
            height: 5px;
            opacity: 1;
        }
        .support-modal-overlay {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0,0,0,0.28);
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.2s;
        }
        .support-modal {
            background: var(--card-bg);
            border-radius: 18px;
            box-shadow: 0 8px 40px rgba(0,120,212,0.13), 0 2px 8px rgba(0,0,0,0.08);
            padding: 36px 32px 28px 32px;
            max-width: 350px;
            width: 92vw;
            text-align: center;
            position: relative;
            animation: modalIn 0.22s cubic-bezier(.4,1.6,.6,1) 1;
        }
        @keyframes modalIn {
            from { transform: translateY(40px) scale(0.97); opacity: 0; }
            to { transform: none; opacity: 1; }
        }
        .modal-close {
            position: absolute;
            top: 14px; right: 18px;
            background: none;
            border: none;
            font-size: 2rem;
            color: #aaa;
            cursor: pointer;
            transition: color 0.2s;
        }
        .modal-close:hover { color: var(--primary-dark); }
        .support-options {
            display: flex;
            flex-direction: column;
            gap: 16px;
            margin-top: 10px;
        }
        .support-option {
            display: flex;
            align-items: center;
            gap: 10px;
            justify-content: center;
            background: var(--primary);
            color: #fff;
            font-weight: 600;
            font-size: 1.08rem;
            border: none;
            border-radius: 8px;
            padding: 12px 0;
            text-decoration: none;
            box-shadow: 0 2px 8px rgba(0,120,212,0.10);
            cursor: pointer;
            transition: background 0.18s, color 0.18s, box-shadow 0.18s;
        }
        .support-option:hover {
            background: var(--primary-dark);
            color: #fff;
            box-shadow: 0 4px 16px rgba(0,120,212,0.13);
        }
        @media (max-width: 600px) {
            .support-modal { padding: 18px 4vw 18px 4vw; }
        }
    </style>
    <!-- Favicon: cloud icon -->
    <link rel="icon" type="image/svg+xml" href="assets/cloud-blue.svg">
</head>
<body>
    <header>
        <div class="header-content">
            <div class="logo">
                <h2 style="color:var(--primary);">Daniel Hammer</h2>
            </div>
            <nav class="header-nav">
                <a href="#reviews"><i class="fas fa-star"></i> <span data-i18n="reviews">Reviews</span></a>
                <a id="headerContactBtn" href="#">
                    <i class="fas fa-envelope"></i> <span data-i18n="contact">Contact</span>
                </a>
                <div style="margin-left:18px;">
                    <select id="langSwitcher" style="padding:5px 10px;border-radius:6px;border:1px solid #ccc;font-size:1em;">
                        <option value="en">English</option>
                        <option value="no">Norsk</option>
                    </select>
                </div>
            </nav>
        </div>
    </header>
    <section class="hero">
        <div class="hero-title">Professional Nextcloud Support</div>
        <!-- <div style="display:flex;align-items:center;justify-content:center;gap:10px;margin-top:10px;margin-bottom:2px;">
            <span style="display:inline-flex;align-items:center;height:1.25em;width:1.9em;">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 40" width="32" height="22" style="display:block;border-radius:5px;"><rect width="60" height="40" fill="#003399"/><g fill="#ffcc00">  <g id="star" transform="translate(30,8)"><polygon points="0,-2 0.588,0.809 -1.902,-0.618 1.902,-0.618 -0.588,0.809"/></g>  <use href="#star" transform="rotate(30 30 20)"/>  <use href="#star" transform="rotate(60 30 20)"/>  <use href="#star" transform="rotate(90 30 20)"/>  <use href="#star" transform="rotate(120 30 20)"/>  <use href="#star" transform="rotate(150 30 20)"/>  <use href="#star" transform="rotate(180 30 20)"/>  <use href="#star" transform="rotate(210 30 20)"/>  <use href="#star" transform="rotate(240 30 20)"/>  <use href="#star" transform="rotate(270 30 20)"/>  <use href="#star" transform="rotate(300 30 20)"/>  <use href="#star" transform="rotate(330 30 20)"/> </g></svg>
            </span>
            <span style="color:var(--primary-dark);font-weight:600;font-size:1.08rem;">Based in Europe</span>
        </div> -->
        <div style="display:flex;align-items:center;justify-content:center;gap:10px;margin-top:8px;margin-bottom:4px;">
            <span style="color:#ffc107;font-size:1.35rem;">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </span>
            <a href="#reviews" class="hero-review-link" style="color:var(--primary-dark);font-weight:600;font-size:1.08rem;text-decoration:none;transition:color 0.2s;">
                5.0 stars (7 reviews)
            </a>
        </div>
        <br>
        <div class="hero-desc">
            Get expert help with Nextcloud installation, migration, troubleshooting, and ongoing maintenance.<br>
            Fast, reliable, and secure support for your private cloud.<br>
            <br>
            <span style="color:var(--primary-dark);font-weight:600;">For home, business, or enterprise.</span>
        </div>
        <button class="cta-btn" id="supportCtaBtn"><i class="fas fa-envelope"></i> Request Support</button>
    </section>
    <section class="widgets">
        <div class="widget">
            <i class="fas fa-cloud-upload-alt"></i>
            <div class="widget-title">Installation & Setup</div>
            <div class="widget-desc">Clean, secure Nextcloud installs on any platform: Linux, Unraid, TrueNAS, Docker, VPS, and more.</div>
        </div>
        <div class="widget">
            <i class="fas fa-tools"></i>
            <div class="widget-title">Troubleshooting</div>
            <div class="widget-desc">Fix errors, performance issues, upgrade failures, SSL, backups, and more. Fast diagnosis and resolution.</div>
        </div>
        <div class="widget">
            <i class="fas fa-network-wired"></i>
            <div class="widget-title">Reverse Proxy Setup</div>
            <div class="widget-desc">Expert configuration of Nginx Proxy Manager, Cloudflare tunnel and more for secure HTTPS access to your Nextcloud.</div>
        </div>
        <div class="widget">
            <i class="fas fa-shield-alt"></i>
            <div class="widget-title">Maintenance & Security</div>
            <div class="widget-desc">Ongoing updates, hardening, monitoring, and best practices to keep your Nextcloud safe and efficient.</div>
        </div>
        <div class="widget">
            <i class="fas fa-bolt"></i>
            <div class="widget-title">Quick response</div>
            <div class="widget-desc">Average response time: <b>1 hour</b>.</div>
        </div>
        <div class="widget">
            <i class="fas fa-globe-europe"></i>
            <div class="widget-title">Europe-based</div>
            <div class="widget-desc">Located in Akershus, Norway, serving clients across Europe, the US, and beyond.</div>
        </div>
    </section>
    <section class="review-section" id="reviews">
        <h2 style="display:flex;flex-direction:column;align-items:center;gap:6px;margin-top:0;padding-top:0;">
            <span style="margin-top:0;padding-top:0;"><i class="fas fa-comments" style="color:var(--primary-dark);font-size:2rem;"></i></span>
            <span>What clients say</span>
        </h2>
        <div class="review-carousel">
            <button class="carousel-btn left" onclick="prevReview()" aria-label="Previous review">
                <i class="fas fa-chevron-left"></i>
            </button>
            <div class="review-card" id="reviewCard">
                <!-- Review content will be injected here -->
            </div>
            <button class="carousel-btn right" onclick="nextReview()" aria-label="Next review">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </section>
    <footer class="footer-centered" style="margin-top:48px;">
        <p><strong>Daniel Hammer &mdash; Professional IT & Nextcloud Services</strong></p>
        <p>Based in Akershus, Norway</p>
        <p style="margin-top:18px;font-size:0.93em;">&copy; 2025 Daniel Hammer. All rights reserved.</p>
    </footer>
    <!-- Support Modal -->
    <div id="supportModal" class="support-modal-overlay" style="display:none;">
        <div class="support-modal">
            <button class="modal-close" id="closeSupportModal" aria-label="Close">&times;</button>
            <h2>Contact & Support</h2>
            <p style="margin-bottom:18px;color:#444;">Choose your preferred platform to get in touch:</p>
            <div class="support-options">
                <button class="support-option" id="supportEmail">
                    <i class="fas fa-envelope"></i> Email
                </button>
                <a class="support-option" href="https://m.me/61578140773449" target="_blank" rel="noopener">
                    <i class="fab fa-facebook-messenger" style="color:#fff;"></i> Messenger
                </a>
                <a class="support-option" href="https://wa.me/yourwhatsappnumber" target="_blank" rel="noopener">
                    <i class="fab fa-whatsapp" style="color:#fff;"></i> WhatsApp
                </a>
                <!-- Add more options as needed -->
            </div>
            <div id="supportEmailStatus" style="margin-top:10px;font-size:0.98em;color:var(--primary-dark);"></div>
        </div>
    </div>
    <script>
        const reviews = [
            {
                stars: 5,
                text: `I hired this seller to help with a fresh Nextcloud install on TrueNAS SCALE, and the experience was excellent. I was running into some setup issues, and he quickly identified and resolved them. His knowledge of both Nextcloud and TrueNAS was solid, and communication was clear and professional. Everything is now working smoothly thanks to his help. Highly recommended for anyone needing reliable support with similar setups.`,
                reviewer: "Fiverr: Von Panciu",
                country: "Romania"
            },
            {
                stars: 5,
                text: `Outstanding job! I wasnt sure if we were able to get my project going. Daniel took on the challenge and delivered in <24hours. Amazing work!`,
                reviewer: "Dane Coulter",
                country: "Australia"
            },
            {
                stars: 5,
                text: `Daniel did an excellent job troubleshooting and getting my Nextcloud setup working perfectly. He responded quickly, communicated clearly, and provided top-notch service. I’m very happy with the entire experience and highly recommend!`,
                reviewer: "Fiverr: Jordan Perez",
                country: "New Jersey, USA"
            },
            {
                stars: 5,
                text: "My second time working with him and I'm going to be using him again! Love his attitude and dedication!",
                reviewer: "Fiverr: Chadd F.",
                country: "Indiana, USA"
            },
            {
                stars: 5,
                text: "All I could say is wow he was great. He did everything in timely fashion. He went above and beyond. I can’t say enough good things. I will definitely be using him again.",
                reviewer: "Fiverr: Chadd F.",
                country: "Indiana, USA"
            },
            {
                stars: 5,
                text: "Due to my own oversight during testing, I initially accepted the job as complete before realizing there was an issue. Daniel kindly offered to fix the problem free of charge, and he resolved it immediately. I insisted on paying a small amount to properly acknowledge his excellent work. Although Daniel appears to be new on Fiverr, don’t underestimate his skills and professionalism—he delivers quality results promptly and reliably.",
                reviewer: "Fiverr: Dane Coulter",
                country: "Australia"
            },
            {
                stars: 5,
                text: "[Translated] I am very satisfied, everything is running smoothly without any errors.",
                reviewer: "Fiverr: Manfred Sedlmeier",
                country: "Germany"
            }
        ];
        let currentReview = 0;
        function renderReview(idx, animate = false) {
            const reviewCard = document.getElementById('reviewCard');
            const review = reviews[idx];
            const stars = '<span class="stars">' +
                Array(review.stars).fill('<i class="fas fa-star"></i>').join('') +
                '</span>';
            const content = `
                ${stars}
                "${review.text}"
                <div class="reviewer">— ${review.reviewer}<br><br>📍 ${review.country}<br><br></div>
                <div style="margin-top:10px;">
                    <a href="https://www.fiverr.com/nexlink_norway" target="_blank" rel="noopener"
                        class="fiverr-link">
                        View this review and more on Fiverr
                    </a>
                </div>
            `;
            if (animate) {
                reviewCard.classList.add('fade-out');
                setTimeout(() => {
                    reviewCard.innerHTML = content;
                    reviewCard.classList.remove('fade-out');
                    reviewCard.classList.add('fade-in');
                    setTimeout(() => {
                        reviewCard.classList.remove('fade-in');
                    }, 300);
                }, 300);
            } else {
                reviewCard.innerHTML = content;
            }
        }
        function prevReview() {
            currentReview = (currentReview - 1 + reviews.length) % reviews.length;
            renderReview(currentReview, true);
        }
        function nextReview() {
            currentReview = (currentReview + 1) % reviews.length;
            renderReview(currentReview, true);
        }
        // Shuffle reviews array (Fisher-Yates shuffle) but keep Von Panciu's review first
        function shuffle(array) {
            // Find Von Panciu's review
            const vonPanciuIndex = array.findIndex(r => r.reviewer === 'Fiverr: Von Panciu');
            if (vonPanciuIndex > 0) {
                // Move Von Panciu's review to the front
                const [vonPanciuReview] = array.splice(vonPanciuIndex, 1);
                array.unshift(vonPanciuReview);
            }
            // Shuffle the rest (excluding the first)
            for (let i = array.length - 1; i > 1; i--) {
                const j = Math.floor(Math.random() * (i - 1)) + 1;
                [array[i], array[j]] = [array[j], array[i]];
            }
        }
        shuffle(reviews);
        // Initial render
        document.addEventListener('DOMContentLoaded', () => {
            renderReview(currentReview);
        });
        // Email copy logic (same as main page)
        const emailCopy = async (e) => {
            e.preventDefault();
            const emailCopyLink = document.getElementById("emailCopyLink");
            if (!emailCopyLink) return;
            const originalHTML = emailCopyLink.innerHTML;
            const originalStyle = emailCopyLink.style.cssText;
            emailCopyLink.innerHTML = '<span style="color:#0078d4;font-weight:600;">Please wait...</span>';
            emailCopyLink.style.pointerEvents = 'none';
            emailCopyLink.style.opacity = '0.7';
            try {
                const response = await fetch("/api/email.php");
                const encoded = await response.text();
                const email = atob(encoded);
                navigator.clipboard.writeText(email);
                emailCopyLink.innerHTML = '<i class="fas fa-check"></i> Email copied!';
            } catch (err) {
                emailCopyLink.innerHTML = '<span style="color:#d32f2f;font-weight:600;">Error copying email</span>';
            }
            setTimeout(() => {
                emailCopyLink.innerHTML = originalHTML;
                emailCopyLink.style.cssText = originalStyle;
            }, 1200);
        }
    </script>
    <script>
        // Custom smooth scroll with offset and duration
        function smoothScrollTo(y, duration = 600) {
            const startY = window.pageYOffset;
            const diff = y - startY;
            let start;

            function step(timestamp) {
                if (!start) start = timestamp;
                const time = timestamp - start;
                const percent = Math.min(time / duration, 1);
                window.scrollTo(0, startY + diff * percent);
                if (time < duration) {
                    requestAnimationFrame(step);
                }
            }
            requestAnimationFrame(step);
        }

        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    const targetId = this.getAttribute('href').slice(1);
                    const target = document.getElementById(targetId);
                    if (target) {
                        e.preventDefault();
                        const yOffset = -80;
                        const y = target.getBoundingClientRect().top + window.pageYOffset + yOffset;
                        smoothScrollTo(y, 300); // 600ms duration
                    }
                });
            });
        });
    </script>
    <script>
        // Modal logic
        const supportCtaBtn = document.getElementById('supportCtaBtn');
        const supportModal = document.getElementById('supportModal');
        const closeSupportModal = document.getElementById('closeSupportModal');
        const supportEmailBtn = document.getElementById('supportEmail');
        const supportEmailStatus = document.getElementById('supportEmailStatus');
        const headerContactBtn = document.getElementById('headerContactBtn');
        // Open modal
        supportCtaBtn.addEventListener('click', function(e) {
            e.preventDefault();
            supportModal.style.display = 'flex';
            supportEmailStatus.textContent = '';
        });
        headerContactBtn.addEventListener('click', function(e) {
            e.preventDefault();
            supportModal.style.display = 'flex';
            supportEmailStatus.textContent = '';
        });
        // Close modal
        closeSupportModal.addEventListener('click', function() {
            supportModal.style.display = 'none';
        });
        supportModal.addEventListener('click', function(e) {
            if (e.target === supportModal) supportModal.style.display = 'none';
        });
        // Email copy logic (reuse existing fetch logic)
        supportEmailBtn.addEventListener('click', async function(e) {
            e.preventDefault();
            supportEmailBtn.innerHTML = '<span style="color:#0078d4;font-weight:600;">Please wait...</span>';
            supportEmailBtn.style.pointerEvents = 'none';
            supportEmailBtn.style.opacity = '0.7';
            try {
                const response = await fetch("/api/email.php");
                const encoded = await response.text();
                const email = atob(encoded);
                await navigator.clipboard.writeText(email);
                supportEmailBtn.innerHTML = '<i class="fas fa-check"></i> Email copied!';
                supportEmailStatus.textContent = 'Email address copied to clipboard.';
            } catch (err) {
                supportEmailBtn.innerHTML = '<span style="color:#d32f2f;font-weight:600;">Error copying email</span>';
                supportEmailStatus.textContent = 'Could not copy email.';
            }
            setTimeout(() => {
                supportEmailBtn.innerHTML = '<i class="fas fa-envelope"></i> Email';
                supportEmailBtn.style.pointerEvents = '';
                supportEmailBtn.style.opacity = '';
            }, 1200);
        });
    </script>
    <script>
        const translations = {
            en: {
                reviews: 'Reviews',
                contact: 'Contact',
                heroTitle: 'Professional Nextcloud Support',
                heroDesc: 'Get expert help with Nextcloud installation, migration, troubleshooting, and ongoing maintenance.<br>Fast, reliable, and secure support for your private cloud.<br><br><span style="color:var(--primary-dark);font-weight:600;">For home, business, or enterprise.</span>',
                cta: 'Request Support',
                widgets: [
                    ['Installation & Setup', 'Clean, secure Nextcloud installs on any platform: Linux, Unraid, TrueNAS, Docker, VPS, and more.'],
                    ['Troubleshooting', 'Fix errors, performance issues, upgrade failures, SSL, backups, and more. Fast diagnosis and resolution.'],
                    ['Reverse Proxy Setup', 'Expert configuration of Nginx Proxy Manager, Cloudflare tunnel and more for secure HTTPS access to your Nextcloud.'],
                    ['Maintenance & Security', 'Ongoing updates, hardening, monitoring, and best practices to keep your Nextcloud safe and efficient.'],
                    ['Quick response', 'Average response time: <b>1 hour</b>.'],
                    ['Europe-based', 'Located in Akershus, Norway, serving clients across Europe, the US, and beyond.']
                ],
                whatClientsSay: 'What clients say',
                contactSupport: 'Contact & Support',
                choosePlatform: 'Choose your preferred platform to get in touch:',
                email: 'Email',
                messenger: 'Messenger',
                whatsapp: 'WhatsApp',
                emailCopied: 'Email address copied to clipboard.',
                errorCopy: 'Could not copy email.',
                viewOnFiverr: 'View this review and more on Fiverr',
                certified: 'Certified Fiverr review',
                footer1: 'Daniel Hammer — Professional IT & Nextcloud Services',
                footer2: 'Based in Akershus, Norway',
                footer3: '© 2025 Daniel Hammer. All rights reserved.'
            },
            no: {
                reviews: 'Anmeldelser',
                contact: 'Kontakt',
                heroTitle: 'Profesjonell Nextcloud-støtte',
                heroDesc: 'Få eksperthjelp med installasjon, migrering, feilsøking og vedlikehold av Nextcloud.<br>Rask, pålitelig og sikker støtte for din private sky.<br><br><span style="color:var(--primary-dark);font-weight:600;">For hjem, bedrift eller virksomhet.</span>',
                cta: 'Be om støtte',
                widgets: [
                    ['Installasjon & Oppsett', 'Rene, sikre Nextcloud-installasjoner på alle plattformer: Linux, Unraid, TrueNAS, Docker, VPS og mer.'],
                    ['Feilsøking', 'Fiks feil, ytelsesproblemer, oppgraderingsfeil, SSL, sikkerhetskopier og mer. Rask diagnose og løsning.'],
                    ['Reverse Proxy-oppsett', 'Ekspertkonfigurasjon av Nginx Proxy Manager, Cloudflare tunnel og mer for sikker HTTPS-tilgang til din Nextcloud.'],
                    ['Vedlikehold & Sikkerhet', 'Løpende oppdateringer, herding, overvåking og beste praksis for å holde Nextcloud sikker og effektiv.'],
                    ['Rask respons', 'Gjennomsnittlig svartid: <b>1 time</b>.'],
                    ['Basert i Europa', 'Holder til i Akershus, Norge, og betjener kunder over hele Europa, USA og mer.']
                ],
                whatClientsSay: 'Hva kundene sier',
                contactSupport: 'Kontakt & Støtte',
                choosePlatform: 'Velg ønsket plattform for å ta kontakt:',
                email: 'E-post',
                messenger: 'Messenger',
                whatsapp: 'WhatsApp',
                emailCopied: 'E-postadresse kopiert til utklippstavlen.',
                errorCopy: 'Kunne ikke kopiere e-post.',
                viewOnFiverr: 'Se denne og flere anmeldelser på Fiverr',
                certified: 'Sertifisert Fiverr-anmeldelse',
                footer1: 'Daniel Hammer — Profesjonelle IT- og Nextcloud-tjenester',
                footer2: 'Basert i Akershus, Norge',
                footer3: '© 2025 Daniel Hammer. Alle rettigheter reservert.'
            }
        };

        function setLanguage(lang) {
            localStorage.setItem('lang', lang);
            const t = translations[lang] || translations.en;
            // Header
            document.querySelectorAll('[data-i18n="reviews"]').forEach(e => e.textContent = t.reviews);
            document.querySelectorAll('[data-i18n="contact"]').forEach(e => e.textContent = t.contact);
            // Hero
            document.querySelector('.hero-title').textContent = t.heroTitle;
            document.querySelector('.hero-desc').innerHTML = t.heroDesc;
            document.getElementById('supportCtaBtn').innerHTML = `<i class="fas fa-envelope"></i> ${t.cta}`;
            // Widgets
            document.querySelectorAll('.widget').forEach((el, i) => {
                el.querySelector('.widget-title').textContent = t.widgets[i][0];
                el.querySelector('.widget-desc').innerHTML = t.widgets[i][1];
            });
            // Review section
            document.querySelector('.review-section h2 span:last-child').textContent = t.whatClientsSay;
            // Modal
            document.querySelector('.support-modal h2').textContent = t.contactSupport;
            document.querySelector('.support-modal p').textContent = t.choosePlatform;
            document.getElementById('supportEmail').innerHTML = `<i class="fas fa-envelope"></i> ${t.email}`;
            document.querySelectorAll('.support-option').forEach(opt => {
                if(opt.textContent.includes('Messenger')) opt.innerHTML = `<i class='fab fa-facebook-messenger' style='color:#fff;'></i> ${t.messenger}`;
                if(opt.textContent.includes('WhatsApp')) opt.innerHTML = `<i class='fab fa-whatsapp' style='color:#fff;'></i> ${t.whatsapp}`;
            });
            // Footer
            document.querySelector('.footer-centered p strong').textContent = t.footer1;
            document.querySelectorAll('.footer-centered p')[1].textContent = t.footer2;
            document.querySelectorAll('.footer-centered p')[2].textContent = t.footer3;
        }

        document.addEventListener('DOMContentLoaded', function() {
            const lang = localStorage.getItem('lang') || 'en';
            document.getElementById('langSwitcher').value = lang;
            setLanguage(lang);
            document.getElementById('langSwitcher').addEventListener('change', function() {
                setLanguage(this.value);
            });
        });
    </script>
</body>
</html>
