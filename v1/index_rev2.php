<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="https://www.nexlink.website">
    <title>Daniel Hammer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <meta name="description" content="Freelance Linux & Unraid system administrator based in Norway">

    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MDQXTVPF');</script>
    <!-- End Google Tag Manager -->

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-B38C9QERF9"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-B38C9QERF9');
</script>

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

        html, body {
            height: 100%;
        }

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
            padding: 0;
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
        .header-nav a img {
            filter: brightness(0) saturate(100%) invert(100%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);
        }
        .header-nav a:hover {
            background: #fff;
            color: var(--primary);
            box-shadow: 0 2px 8px rgba(0,120,212,0.10);
        }
        .header-nav a:hover img {
            filter: brightness(0) saturate(100%) invert(26%) sepia(94%) saturate(749%) hue-rotate(176deg) brightness(97%) contrast(101%);
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

        .container {
            max-width: 540px;
            /* margin: -40px auto 0 auto; */
            margin: 40px auto 0 auto; /* Move box further down */
            padding: 32px 28px 24px 28px;
            background: var(--card-bg);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            position: relative;
            z-index: 2;
        }

        .about {
            font-size: 1.1rem;
            margin-bottom: 28px;
            color: #333;
            text-align: center;
        }

        .js-warning {
            color: #d32f2f;
            text-align: center;
            font-weight: 600;
            margin-bottom: 18px;
        }

        .review-card {
            background: #f8fafc;
            border-left: 5px solid var(--primary);
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            padding: 22px 22px 18px 22px;
            margin: 32px 0 0 0;
            font-size: 1.05rem;
            color: #222;
            position: relative;
            min-width: 0;
            width: 100%;
            max-width: 420px;
            transition: box-shadow 0.2s, border-color 0.2s, opacity 0.3s;
            opacity: 1;
        }
        .review-card:hover {
            box-shadow: 0 6px 24px rgba(0,120,212,0.10);
        }
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
            /* color: var(--primary-dark);
            font-weight: 600;
            text-decoration: none;
            font-size: 0.99em;
            opacity: 0.78; */
            /* transition: color 0.2s, opacity 0.2s; */
        }
        .review-card .fiverr-link:hover {
            color: var(--primary-dark);
            opacity: 1;
            text-decoration: underline;
        }

        .review-carousel {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0;
            margin-top: 32px;
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
            min-width: 0;
            width: 100%;
            max-width: 420px;
            transition: box-shadow 0.2s, border-color 0.2s, opacity 0.3s;
            opacity: 1;
        }
        .review-card.fade-out {
            opacity: 0;
        }
        .review-card.fade-in {
            opacity: 1;
        }

        footer {
            text-align: center;
            margin-top: auto;
            padding: 32px 0 18px 0;
            font-size: 0.98rem;
            color: #666;
            background: none;
        }

        .five-star-summary {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 18px;
            margin-top: 18px;
        }
        .big-stars {
            color: #ffc107;
            font-size: 1.5rem;
            letter-spacing: 6px;
            margin-bottom: 8px;
        }
        .five-star-count {
            font-size: 1.15rem;
            color: #444;
            font-weight: 600;
            opacity: 0.92;
        }

        @media (max-width: 600px) {
            .container {
                padding: 18px 6vw 18px 6vw;
                margin: 24px 4vw 0 4vw; /* Also move down on mobile */
            }
            header {
                padding: 32px 0 18px 0;
            }
            h1 {
                font-size: 2rem;
            }
            .review-carousel {
                flex-direction: column;
                gap: 12px;
            }
            .carousel-btn {
                margin: 0;
            }
        }
    </style>
</head>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/687634c6169bb91912b96edd/1j06rs9te';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MDQXTVPF"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <header>
        <div class="header-content">
            <div class="logo">
                <h1>Daniel Hammer</h1>
            </div>
            <nav class="header-nav">
                <span class="description">IT Services</span>
                <a href="https://www.fiverr.com/nexlink_norway" target="_blank" rel="noopener">
                    <img src="/public/fiverr.png" alt="Fiverr" style="width:1.3em;height:1.3em;" /> Fiverr
                </a>
                <a id="emailCopyLink" href="#" onclick="emailCopy(event)">
                    <i class="fas fa-envelope"></i> Contact
                </a>
            </nav>
        </div>
    </header>

    <div class="container">
        <noscript>
            <h4 class="js-warning"><b>JavaScript is not enabled!</b></h4>
        </noscript>

        <div class="about">
            Thanks for visiting my website! I'm Daniel, a freelance system administrator based in Norway.<br><br>
            I can help you with anything IT, Linux, unRAID, or Nextcloud related for your home or business projects!
        </div>

        <br>

        <!-- 5 big stars and review count -->
        <div class="five-star-summary">
            <div class="big-stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <div class="five-star-count" id="fiveStarCount">What customers say</div>
        </div>

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
    </div>

    <footer>
        <p>Copyright &copy; Daniel Hammer</p>
        <p>Providing IT services from Akershus, Norway since 2024</p>
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
                text: `Outstanding job! I wasnt sure if we were able to get my project going. Daniel took on the challenge and delivered in &lt;24hours. Amazing work!`,
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

        const emailCopy = async (e) => {
            e.preventDefault();

            const emailCopyLink = document.getElementById("emailCopyLink");
            if (!emailCopyLink) return;

            // Save original content
            const originalHTML = emailCopyLink.innerHTML;
            const originalStyle = emailCopyLink.style.cssText;

            emailCopyLink.innerHTML = '<span style="color:#0078d4;font-weight:600;">Please wait...</span>';
            emailCopyLink.style.pointerEvents = 'none';
            emailCopyLink.style.opacity = '0.7';

            try {
                const response = await fetch("/api/email.php");
                const encoded = await response.text();
                // Decode from base64
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