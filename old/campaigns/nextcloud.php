<!-- Old website project - keep for reference, not in use anymore. -->

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
        .archived-banner {
            background: linear-gradient(135deg, #ff6b35 0%, #f9ca24 100%);
            color: white;
            text-align: center;
            padding: 12px 20px;
            font-weight: 600;
            font-size: 14px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            position: relative;
            z-index: 1000;
        }
        .archived-banner i {
            margin-right: 8px;
            font-size: 16px;
        }
        .archived-banner a {
            color: white;
            text-decoration: underline;
            font-weight: 700;
        }
        .archived-banner a:hover {
            text-decoration: none;
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
        }
        header {
            background: var(--primary);
            color: #fff;
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
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
            background: rgba(255,255,255,0.08);
            padding: 8px 18px;
            border-radius: 8px;
            transition: background 0.2s, color 0.2s, box-shadow 0.2s;
        }
        .header-nav a:hover {
            background: #fff;
            color: var(--primary);
            box-shadow: 0 2px 8px rgba(0,120,212,0.10);
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
    </style>
</head>
<body>
    <!-- Archived Website Banner -->
    <div class="archived-banner">
        <i class="fas fa-archive"></i>
        This is an archived version of our website. Visit our <a href="../../index.html">current website</a> for up-to-date information and services.
    </div>
    
    <header>
        <div class="header-content">
            <div class="logo">
                <h2>Daniel Hammer</h2>
            </div>
            <nav class="header-nav">
                <!-- <span class="description">IT Services</span> -->
                <a href="/index.html"><i class="fas fa-home"></i> Home</a>
                <!-- <a href="https://www.fiverr.com/nexlink_norway" target="_blank" rel="noopener">
                    <img src="/public/fiverr.png" alt="Fiverr" style="width:1.3em;height:1.3em;filter:brightness(0) invert(1);" /> Fiverr
                </a> -->
                <a href="#reviews"><i class="fas fa-star"></i> Reviews</a>
                <a id="emailCopyLink" href="#" onclick="emailCopy(event)">
                    <i class="fas fa-envelope"></i> Contact
                </a>
            </nav>
        </div>
    </header>
    <section class="hero">
        <div class="hero-title">Professional Nextcloud Support</div>
        <br>
        <div class="hero-desc">
            Get expert help with Nextcloud installation, migration, troubleshooting, and ongoing maintenance.<br>
            Fast, reliable, and secure support for your private cloud.<br>
            <br>
            <span style="color:var(--primary-dark);font-weight:600;">For home, business, or enterprise.</span>
        </div>
        <button class="cta-btn" onclick="emailCopy(event)"><i class="fas fa-envelope"></i> Request Support</button>
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
        // Shuffle reviews array (Fisher-Yates shuffle)
        function shuffle(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
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
</body>
</html>
