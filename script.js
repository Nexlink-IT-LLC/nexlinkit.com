/**
 * Copyright (c) Nexlink IT LLC 2025
 * Homepage client-side JavaScript components
 * Revised 8 September 2025
 */

/* ========================================
   Theme Management
   ======================================== */
const themeToggle = document.getElementById('themeToggle');
const themeToggleMobile = document.getElementById('themeToggleMobile');

function getThemeIconMarkup(theme) {
  const iconSrc = theme === 'dark' ? '/assets/icons/moon.png' : '/assets/icons/sunny.png';
  return `<img src="${iconSrc}" alt="" aria-hidden="true" class="theme-icon" loading="lazy">`;
}

function updateThemeToggleLabel(theme) {
  const iconMarkup = getThemeIconMarkup(theme);
  if (themeToggle) themeToggle.innerHTML = iconMarkup;
  if (themeToggleMobile) themeToggleMobile.innerHTML = iconMarkup;
}

function setTheme(theme) {
  const root = document.documentElement;
  if (theme === 'dark') {
    root.classList.add('dark');
  } else {
    root.classList.remove('dark');
  }
  updateThemeToggleLabel(theme);
  
  try {
    localStorage.setItem('theme', theme);
  } catch (error) {
    console.warn('Could not save theme preference:', error);
  }
}

function toggleTheme() {
  const isDark = document.documentElement.classList.contains('dark');
  setTheme(isDark ? 'light' : 'dark');
}

// Initialize theme from localStorage or system preference
function initializeTheme() {
  try {
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
      setTheme(savedTheme);
    } else if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
      setTheme('dark');
    }
  } catch (error) {
    console.warn('Could not initialize theme:', error);
  }
}

// Event listeners
updateThemeToggleLabel(document.documentElement.classList.contains('dark') ? 'dark' : 'light');
themeToggle?.addEventListener('click', toggleTheme);
themeToggleMobile?.addEventListener('click', toggleTheme);

/* ========================================
   Mobile Menu Management
   ======================================== */
const mobileMenuToggle = document.getElementById('mobileMenuToggle');
const mobileMenuBtn = document.getElementById('mobileMenuBtn');
const mobileMenu = document.getElementById('mobileMenu');

function toggleMobileMenu() {
  if (!mobileMenu) return;
  
  const isOpen = mobileMenu.hasAttribute('data-open') || !mobileMenu.classList.contains('hidden');
  
  if (isOpen) {
    // Close menu
    mobileMenu.removeAttribute('data-open');
    mobileMenu.classList.add('hidden');
    mobileMenu.hidden = true;
    mobileMenuToggle?.setAttribute('aria-expanded', 'false');
    mobileMenuBtn?.setAttribute('aria-expanded', 'false');
    document.body.style.overflow = '';
  } else {
    // Open menu
    mobileMenu.setAttribute('data-open', '');
    mobileMenu.classList.remove('hidden');
    mobileMenu.hidden = false;
    mobileMenuToggle?.setAttribute('aria-expanded', 'true');
    mobileMenuBtn?.setAttribute('aria-expanded', 'true');
    document.body.style.overflow = 'hidden';
  }
}

mobileMenuToggle?.addEventListener('click', toggleMobileMenu);
mobileMenuBtn?.addEventListener('click', toggleMobileMenu);

// Close mobile menu when clicking links
mobileMenu?.addEventListener('click', (e) => {
  if (e.target.tagName === 'A') {
    toggleMobileMenu();
  }
});

/* ========================================
   Intersection Observer Animations
   ======================================== */
const observerOptions = {
  threshold: 0.1,
  rootMargin: '0px 0px -50px 0px'
};

const intersectionObserver = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.classList.add('in-view');
    }
  });
}, observerOptions);

// Observe all elements with data-animate attribute
document.querySelectorAll('[data-animate]').forEach((element) => {
  intersectionObserver.observe(element);
});

/* ========================================
   Reviews Carousel
   ======================================== */
const reviews = [
  {
    stars: 5,
    text: "I hired this seller to help with a fresh Nextcloud install on TrueNAS SCALE, and the experience was excellent. I was running into some setup issues, and he quickly identified and resolved them. His knowledge of both Nextcloud and TrueNAS was solid, and communication was clear and professional. Everything is now working smoothly thanks to his help. Highly recommended for anyone needing reliable support with similar setups.",
    reviewer: "Von Panciu",
    title: "Business Owner",
    country: "Romania",
    platform: "Fiverr"
  },
  {
    stars: 5,
    text: "Outstanding job! I wasn't sure if we were able to get my project going. Daniel took on the challenge and delivered in <24hours. Amazing work!",
    reviewer: "Dane Coulter",
    title: "Small Business Owner",
    country: "Australia",
    platform: "Fiverr"
  },
  {
    stars: 5,
    text: "Daniel did an excellent job troubleshooting and getting my Nextcloud setup working perfectly. He responded quickly, communicated clearly, and provided top-notch service. I'm very happy with the entire experience and highly recommend!",
    reviewer: "Jordan Perez",
    title: "Systems Administrator",
    country: "New Jersey, USA",
    platform: "Fiverr"
  },
  {
    stars: 5,
    text: "My second time working with him and I'm going to be using him again! Love his attitude and dedication!",
    reviewer: "Chadd F.",
    title: "Small Business Owner",
    country: "Indiana, USA",
    platform: "Fiverr"
  },
  {
    stars: 5,
    text: "All I could say is wow he was great. He did everything in timely fashion. He went above and beyond. I can't say enough good things. I will definitely be using him again.",
    reviewer: "Chadd F.",
    title: "Small Business Owner",
    country: "Indiana, USA",
    platform: "Fiverr"
  },
  {
    stars: 5,
    text: "Due to my own oversight during testing, I initially accepted the job as complete before realizing there was an issue. Daniel kindly offered to fix the problem free of charge, and he resolved it immediately. I insisted on paying a small amount to properly acknowledge his excellent work. Although Daniel appears to be new on Fiverr, don't underestimate his skills and professionalism. He delivers quality results promptly and reliably.",
    reviewer: "Dane Coulter",
    title: "Small Business Owner",
    country: "Australia",
    platform: "Fiverr"
  },
  {
    stars: 5,
    text: "I am very satisfied, everything is running smoothly without any errors.",
    reviewer: "Manfred Sedlmeier",
    title: "Real Estate Agent",
    country: "Germany",
    platform: "Fiverr"
  },
  {
    stars: 5,
    text: "Knowledgeable in the platform in use, worked quickly and effectively was flexible with meeting times to work on the project. Delivered ahead of time. Looking forward to future work together",
    reviewer: "Bear T.",
    title: "Home User",
    country: "South Africa",
    platform: "Freelance"
  },
  {
    stars: 5,
    text: "This is your guy!!! He always does an amazing job for me and is very helpful!! We work together well and he's my go-to guy from now on.",
    reviewer: "Chadd F.",
    title: "Small Business Owner",
    country: "Indiana, USA",
    platform: "Fiverr"
  },
  {
    stars: 5,
    text: "I highly recommend Daniel! An exceptional IT subcontractor, he took charge of our stack with impressive efficiency and resolved all our bugs from the most visible to the trickiest edge cases with rigor, clarity, and outstanding responsiveness. Clear communication, precise diagnostics, durable fixes, all delivered on time. Thanks to him, our applications are stable, high-performing, and ready to scale. A trusted partner we'll gladly work with again. Kudos and thank you!",
    reviewer: "rustorm",
    title: "IT director",
    country: "Bulgaria",
    platform: "Fiverr"
  },
  {
    stars: 5,
    text: "I am very happy with Daniel's work, he is supper professional. He immediately understood my needs with installing Nextcloud & Peertube in my hardware and suggested and installed Unraid server and the and software diligently. He responds super fast to my messages. I will definitely use his services in the future.",
    reviewer: "Renato (reneleda)",
    title: "Small Business Owner",
    country: "California, USA",
    platform: "Fiverr"
  },
  // {
  //   stars: 5,
  //   text: "[Translated from Swedish] Finding the right person on Fiverr can sometimes feel like a lottery, but with Daniel I really hit the jackpot. I hired him for help with Nextcloud, Proxy Manager, and TrueNAS, and it's one of the best investments I've ever made. Daniel isn't just knowledgeable, he's a master of detail who never leaves anything half done; he digs deep, analyzes problems, and provides long-term, stable solutions instead of quick fixes, which gives me great confidence that his work will stand the test of time. What truly sets him apart is not only his expertise but also his way of communicating--he is attentive, clear, and pedagogical, always explaining each step, why it's done, and how it fits into the bigger picture. From the start, it's obvious that he's passionate about his work and genuinely wants his clients to get the best possible result. I've worked with many different people over the years, but Daniel really stands out because he combines technical mastery with professionalism and a rare work ethic, showing just as much commitment to the client's needs as to the technology itself. In short, if you need help with Nextcloud, Proxy Manager, TrueNAS, or related systems, hire Daniel immediately; he's one of the most reliable and competent people I've met on Fiverr, and I wholeheartedly recommend him as someone who makes a real difference and whom you'll want to return to again and again. *****",
  //   reviewer: "Tomas (tomasochcarina)",
  //   title: "Private User",
  //   country: "Sweden",
  //   platform: "Fiverr"
  // },
  {
    stars: 5,
    text: "[Translated from Swedish] Finding the right person on Fiverr can feel like a lottery, but with Daniel I truly hit the jackpot. [...] It's rare to find someone who combines technical mastery with professionalism and genuine care for the client's needs. If you need help with these systems, hire Daniel immediately--he's reliable, highly skilled, and one of the best I've worked with on Fiverr. *****",
    reviewer: "Tomas (tomasochcarina)",
    title: "Private User",
    country: "Sweden",
    platform: "Fiverr"
  },
];

function createReviewCard(review) {
  const card = document.createElement('article');
  card.className = 'review-card snap-center min-w-[320px] md:min-w-[420px] lg:min-w-[33%]';

  const stars = '\u2605'.repeat(review.stars); // ★

  /*

          <div class="grid h-10 w-10 place-items-center rounded-full bg-brand-50 text-sm font-semibold text-brand-700 dark:bg-brand-900/40 dark:text-brand-200">
          ${review.stars}.0
        </div>

  */
  card.innerHTML = `
    <div class="flex items-center justify-between gap-3 mb-3">
      <div class="flex items-center gap-3">

        <div>
          <div class="font-semibold text-gray-900 dark:text-white">${review.reviewer}</div>
          <div class="text-sm text-gray-600 dark:text-gray-400">${review.title} · ${review.country}</div>
        </div>
      </div>
      <span class="rounded-full bg-neutral-100 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-neutral-600 dark:bg-neutral-800 dark:text-neutral-300">${review.platform}</span>
    </div>
    <blockquote class="relative rounded-2xl border border-neutral-200 bg-white p-5 shadow-sm dark:border-neutral-800 dark:bg-neutral-900">
      <div class="mb-2 text-sm font-semibold text-brand-600 dark:text-brand-300">${stars}</div>
      <p class="text-neutral-700 dark:text-neutral-300 leading-relaxed">“${review.text}”</p>
    </blockquote>
  `;

  return card;
}

// Initialize reviews carousel
const reviewsTrack = document.getElementById('reviewsTrack');
const reviewsPrevBtn = document.getElementById('reviewsPrev');
const reviewsNextBtn = document.getElementById('reviewsNext');

if (reviewsTrack) {
  // Populate reviews
  reviews.forEach((review) => {
    reviewsTrack.appendChild(createReviewCard(review));
  });

  // Carousel navigation
  function scrollToCard(direction) {
    const { scrollLeft, clientWidth } = reviewsTrack;
    const scrollDistance = clientWidth * 0.8;
    const newPosition = scrollLeft + (direction > 0 ? scrollDistance : -scrollDistance);
    reviewsTrack.scrollTo({ 
      left: newPosition, 
      behavior: 'smooth' 
    });
  }

  reviewsPrevBtn?.addEventListener('click', () => scrollToCard(-1));
  reviewsNextBtn?.addEventListener('click', () => scrollToCard(1));
}

/* ========================================
   Modal Management
   ======================================== */
const supportModal = document.getElementById('supportModal');
const successModal = document.getElementById('successModal');

// Modal trigger buttons
const modalTriggers = [
  'requestSupportBtn',
  'requestSupportBtnHero',
  'requestSupportBtnContact',
  'requestSupportBtnCta',
  'requestSupportBtnMobile',
  'requestSupportBtnFooter',
  'ctaSupport'
].map(id => document.getElementById(id)).filter(Boolean);

const modalCloseBtn = document.getElementById('supportModalClose');
const successOkBtn = document.getElementById('successOk');

function openSupportModal() {
  if (!supportModal) return;
  
  supportModal.classList.remove('hidden', 'invisible');
  supportModal.setAttribute('aria-hidden', 'false');
  document.body.style.overflow = 'hidden';
  
  // Focus first input for accessibility
  const firstInput = supportModal.querySelector('input, textarea, select');
  if (firstInput) {
    setTimeout(() => firstInput.focus(), 100);
  }
}

function closeSupportModal() {
  if (!supportModal) return;
  
  supportModal.classList.add('hidden');
  supportModal.setAttribute('aria-hidden', 'true');
  document.body.style.overflow = '';
}

function openSuccessModal() {
  if (!successModal) return;
  
  successModal.classList.remove('hidden', 'invisible');
  successModal.setAttribute('aria-hidden', 'false');
  document.body.style.overflow = 'hidden';
}

function closeSuccessModal() {
  if (!successModal) return;
  
  successModal.classList.add('hidden', 'invisible');
  successModal.setAttribute('aria-hidden', 'true');
  document.body.style.overflow = '';
}

// Event listeners for modal triggers
modalTriggers.forEach(button => {
  if (button) {
    button.addEventListener('click', openSupportModal);
  }
});

modalCloseBtn?.addEventListener('click', closeSupportModal);
successOkBtn?.addEventListener('click', closeSuccessModal);

// Close modal when clicking backdrop
supportModal?.addEventListener('click', (e) => {
  if (e.target === supportModal || e.target.hasAttribute('data-close')) {
    closeSupportModal();
  }
});

successModal?.addEventListener('click', (e) => {
  if (e.target === successModal) {
    closeSuccessModal();
  }
});

// Close modals with Escape key
document.addEventListener('keydown', (e) => {
  if (e.key === 'Escape') {
    if (!supportModal?.classList.contains('hidden')) {
      closeSupportModal();
    }
    if (!successModal?.classList.contains('hidden')) {
      closeSuccessModal();
    }
  }
});

/* ========================================
   Form Submission Handler
   ======================================== */

// Form submission handlers
async function submitForm(formData) {
  // Submit to our backend endpoint
  const response = await fetch('https://nexlinkit.com/backend/contact.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: new URLSearchParams({
      ...formData,
      timestamp: new Date().toISOString()
    }).toString()
  });
  
  if (!response.ok) {
    const result = await response.json();
    throw new Error(result.error || `HTTP ${response.status}: ${response.statusText}`);
  }
  
  const result = await response.json();
  
  if (!result.success) {
    throw new Error(result.error || 'Form submission failed');
  }
  
  return result;
}

// Support form handler
const supportForm = document.getElementById('supportForm');
if (supportForm) {
  supportForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const submitButton = supportForm.querySelector('button[type="submit"]');
    const originalButtonText = submitButton?.textContent;
    
    try {
      // Update button state
      if (submitButton) {
        submitButton.disabled = true;
        submitButton.textContent = 'Sending...';
      }
      
      // Collect form data
      const formData = {
        ...Object.fromEntries(new FormData(supportForm).entries()),
        formType: 'support'
      };
      
      // Submit to API
      await submitForm(formData);
      
      // Success handling
      supportForm.reset();
      closeSupportModal();
      setTimeout(() => openSuccessModal(), 300);
      
    } catch (error) {
      console.error('Support form submission error:', error);
      
      // Show user-friendly error message
      const errorMessage = error.message.includes('HTTP') 
        ? 'There was a network error. Please check your connection and try again.'
        : 'There was an error sending your request. Please try again or email contact@nexlink.website directly.';
      
      alert(errorMessage);
      
    } finally {
      // Reset button state
      if (submitButton) {
        submitButton.disabled = false;
        submitButton.textContent = originalButtonText;
      }
    }
  });
}

// Contact form handler (if exists on contact page)
const contactForm = document.getElementById('contactForm');
if (contactForm) {
  contactForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const submitButton = contactForm.querySelector('button[type="submit"]');
    const originalButtonText = submitButton?.textContent;
    
    try {
      // Update button state
      if (submitButton) {
        submitButton.disabled = true;
        submitButton.textContent = 'Sending...';
      }
      
      // Collect form data
      const formData = {
        ...Object.fromEntries(new FormData(contactForm).entries()),
        formType: 'contact'
      };
      
      // Submit to API
      await submitForm(formData);
      
      // Success handling
      contactForm.reset();
      alert('Thank you for your message! We\'ll get back to you soon.');
      
    } catch (error) {
      console.error('Contact form submission error:', error);
      
      const errorMessage = error.message.includes('HTTP') 
        ? 'There was a network error. Please check your connection and try again.'
        : 'There was an error sending your message. Please try again or email contact@nexlink.website directly.';
      
      alert(errorMessage);
      
    } finally {
      // Reset button state
      if (submitButton) {
        submitButton.disabled = false;
        submitButton.textContent = originalButtonText;
      }
    }
  });
}

/* ========================================
   Smooth Scrolling for Anchor Links
   ======================================== */
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function(e) {
    e.preventDefault();
    
    const targetId = this.getAttribute('href');
    const targetElement = document.querySelector(targetId);
    
    if (targetElement) {
      targetElement.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      });
      
      // Close mobile menu if open
      if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
        toggleMobileMenu();
      }
    }
  });
});

/* ========================================
   Additional Features
   ======================================== */

// CTA Phone call handler
const ctaCallBtn = document.getElementById('ctaCall');
ctaCallBtn?.addEventListener('click', () => {
  window.location.href = 'tel:+13072895340';
});

// CTA Theme toggle handler
const ctaThemeBtn = document.getElementById('ctaTheme');
ctaThemeBtn?.addEventListener('click', toggleTheme);

/* ========================================
   Initialization
   ======================================== */
document.addEventListener('DOMContentLoaded', () => {
  // Initialize theme
  initializeTheme();
  
  // Add loaded class for CSS animations
  document.body.classList.add('loaded');  
});

// Handle page visibility changes (for analytics if needed)
document.addEventListener('visibilitychange', () => {
  if (document.hidden) {
    console.log('Page hidden');
  } else {
    console.log('Page visible');
  }
});






