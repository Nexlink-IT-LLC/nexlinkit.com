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
            /* background: linear-gradient(90deg, var(--primary) 60%, var(--primary-dark) 100%); */
			background: #0078d4;
			color: #fff;
            /* padding: 36px 0; */
            padding: 0 0 36px 0; /* Remove top padding, keep bottom */
            text-align: center;
            box-shadow: var(--shadow);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        h1 {
            font-size: 2.7rem;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        .description {
            font-size: 1.3rem;
            font-weight: 400;
            opacity: 0.92;
            margin-bottom: 0;
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

        #linkStrip {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 24px;
            margin: 24px 0 0 0;
        }

        #linkStrip a {
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            color: var(--primary);
            font-weight: 600;
            font-size: 1.07rem;
            background: var(--accent);
            padding: 10px 22px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.03);
            transition: background 0.2s, color 0.2s, box-shadow 0.2s;
        }

        #linkStrip a img {
            /* Fiverr icon blue by default */
            filter: brightness(0) saturate(100%) invert(26%) sepia(94%) saturate(749%) hue-rotate(176deg) brightness(97%) contrast(101%);
        }
        #linkStrip a:hover {
            background: var(--primary);
            color: #fff;
            box-shadow: 0 4px 16px rgba(0,120,212,0.10);
        }
        #linkStrip a:hover img {
            /* Fiverr icon white on hover */
            filter: brightness(0) invert(1);
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

<body>
    <header>
        <h1>Daniel Hammer</h1>
        <h2 class="description">IT Services</h2>
    </header>

    <div class="container">
        <noscript>
            <h4 class="js-warning"><b>JavaScript is not enabled!</b></h4>
        </noscript>

        <div class="about">
            Thanks for visiting my website! I'm Daniel, a freelance system administrator based in Norway.<br><br>
            I can help you with anything IT, Linux, unRAID, or Nextcloud related for your home or business projects!
        </div>

        <div id="linkStrip">
            <a href="https://www.fiverr.com/nexlink_norway" target="_blank" rel="noopener">
                <img src="/public/fiverr.png" alt="Fiverr" style="width:1.3em;height:1.3em;" />
                Fiverr
            </a>
            <a id="emailCopyLink" href="#" onclick="emailCopy(event)">
                <i class="fas fa-envelope"></i> Contact
            </a>

            <!-- <a id="emailCopyLink" href="https://blog.nexlink.website">
                <i class="fas fa-laptop"></i> Blog
            </a> -->
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
            const p = document.createElement("span");

            p.innerHTML = "Please wait...";
            p.style.color = "#0078d4";
            p.style.fontWeight = "600";
            emailCopyLink.replaceWith(p);

            
            const response = await fetch("/api/email.php");
            const encoded = await response.text();

            console.log(`Received encoded email from server: ${encoded}`);

            // Decode from base64
            const email = atob(encoded);

            navigator.clipboard.writeText(email);

            if (emailCopyLink) {
                p.innerHTML = '<i class="fas fa-check"></i> Email copied!';
                emailCopyLink.replaceWith(p);

                setTimeout(() => {
                    p.replaceWith(emailCopyLink);
                }, 1200);
            }
        }
    </script>
</body>
</html>