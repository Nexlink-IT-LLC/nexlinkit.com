/**
 * Login Page JavaScript
 * Handles authentication, form validation, and UI interactions for the login page
 */

/* ========================================
   Theme Management (inherited from main site)
   ======================================== */
const themeToggle = document.getElementById('themeToggle');

function setTheme(theme) {
  const root = document.documentElement;
  if (theme === 'dark') {
    root.classList.add('dark');
    themeToggle.textContent = '☀️';
  } else {
    root.classList.remove('dark');
    themeToggle.textContent = '🌙';
  }
  
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

function initializeTheme() {
  try {
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
      setTheme(savedTheme);
    } else if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
      setTheme('dark');
    } else {
      setTheme('light');
    }
  } catch (error) {
    console.warn('Could not initialize theme:', error);
  }
}

// Initialize theme on page load
initializeTheme();

// Event listeners
themeToggle?.addEventListener('click', toggleTheme);

/* ========================================
   Animation System
   ======================================== */
function initializeAnimations() {
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('in-view');
        }
      });
    },
    {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px',
    }
  );

  document.querySelectorAll('[data-animate]').forEach((el) => {
    observer.observe(el);
  });
}

/* ========================================
   Login Form Functionality
   ======================================== */

// Form elements
const loginForm = document.getElementById('loginForm');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const rememberCheckbox = document.getElementById('remember');
const loginButton = document.getElementById('loginButton');
const loginButtonText = document.getElementById('loginButtonText');
const loginSpinner = document.getElementById('loginSpinner');

// Password visibility toggle
const togglePasswordButton = document.getElementById('togglePassword');
const passwordIcon = document.getElementById('passwordIcon');

// Demo credentials
const DEMO_CREDENTIALS = {
  email: 'demo@example.com',
  password: 'demo123'
};

// Additional valid credentials for testing
const VALID_CREDENTIALS = [
  { email: 'demo@example.com', password: 'demo123' },
  { email: 'john.doe@example.com', password: 'password123' },
  { email: 'admin@nexlink.website', password: 'admin123' },
  { email: 'test@test.com', password: 'test123' }
];

// Password visibility toggle
function initializePasswordToggle() {
  togglePasswordButton?.addEventListener('click', function() {
    const isPassword = passwordInput.type === 'password';
    
    passwordInput.type = isPassword ? 'text' : 'password';
    passwordIcon.textContent = isPassword ? '🙈' : '👁️';
    
    // Add visual feedback
    this.style.transform = 'scale(0.95)';
    setTimeout(() => {
      this.style.transform = '';
    }, 100);
  });
}

// Form validation
function validateForm() {
  const email = emailInput.value.trim();
  const password = passwordInput.value;
  
  // Reset previous validation states
  clearErrors();
  
  let isValid = true;
  
  // Email validation
  if (!email) {
    showFieldError(emailInput, 'Email is required');
    isValid = false;
  } else if (!isValidEmail(email)) {
    showFieldError(emailInput, 'Please enter a valid email address');
    isValid = false;
  }
  
  // Password validation
  if (!password) {
    showFieldError(passwordInput, 'Password is required');
    isValid = false;
  } else if (password.length < 6) {
    showFieldError(passwordInput, 'Password must be at least 6 characters');
    isValid = false;
  }
  
  return isValid;
}

function isValidEmail(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

function showFieldError(field, message) {
  // Add error styling to field
  field.classList.add('border-red-500', 'focus:border-red-500', 'focus:ring-red-500');
  field.classList.remove('border-neutral-300', 'focus:border-brand-500', 'focus:ring-brand-500');
  
  // Create or update error message
  let errorElement = field.parentNode.querySelector('.field-error');
  if (!errorElement) {
    errorElement = document.createElement('div');
    errorElement.className = 'field-error text-sm text-red-600 dark:text-red-400 mt-1';
    field.parentNode.appendChild(errorElement);
  }
  errorElement.textContent = message;
}

function clearErrors() {
  // Remove error styling from all fields
  [emailInput, passwordInput].forEach(field => {
    field.classList.remove('border-red-500', 'focus:border-red-500', 'focus:ring-red-500');
    field.classList.add('border-neutral-300', 'focus:border-brand-500', 'focus:ring-brand-500');
    
    // Remove error messages
    const errorElement = field.parentNode.querySelector('.field-error');
    if (errorElement) {
      errorElement.remove();
    }
  });
}

// Authentication simulation
function authenticateUser(email, password) {
  return VALID_CREDENTIALS.some(cred => 
    cred.email === email && cred.password === password
  );
}

function setLoadingState(isLoading) {
  if (isLoading) {
    loginButton.disabled = true;
    loginButtonText.classList.add('opacity-0');
    loginSpinner.classList.remove('hidden');
    loginButton.classList.add('cursor-not-allowed');
  } else {
    loginButton.disabled = false;
    loginButtonText.classList.remove('opacity-0');
    loginSpinner.classList.add('hidden');
    loginButton.classList.remove('cursor-not-allowed');
  }
}

// Handle form submission
function initializeLoginForm() {
  loginForm?.addEventListener('submit', async function(e) {
    e.preventDefault();
    
    // Validate form
    if (!validateForm()) {
      shakeForm();
      return;
    }
    
    const email = emailInput.value.trim();
    const password = passwordInput.value;
    const remember = rememberCheckbox.checked;
    
    // Set loading state
    setLoadingState(true);
    
    try {
      // Simulate API call delay
      await new Promise(resolve => setTimeout(resolve, 1500));
      
      // Check credentials
      if (authenticateUser(email, password)) {
        // Success
        showNotification('Login successful! Redirecting...', 'success');
        
        // Store session info (in a real app, this would be handled by the server)
        if (remember) {
          localStorage.setItem('rememberedEmail', email);
        }
        
        // Store auth token (simulation)
        sessionStorage.setItem('authToken', 'demo-token-' + Date.now());
        sessionStorage.setItem('userEmail', email);
        
        // Redirect to dashboard after short delay
        setTimeout(() => {
          window.location.href = 'index.html';
        }, 1000);
        
      } else {
        // Failed authentication
        showNotification('Invalid email or password. Please try again.', 'error');
        shakeForm();
        passwordInput.focus();
        passwordInput.select();
      }
      
    } catch (error) {
      console.error('Login error:', error);
      showNotification('Login failed. Please try again later.', 'error');
      shakeForm();
    } finally {
      setLoadingState(false);
    }
  });
}

// Visual feedback for form errors
function shakeForm() {
  const loginCard = loginForm.closest('.bg-white, .dark\\:bg-neutral-900');
  if (loginCard) {
    loginCard.style.animation = 'shake 0.5s ease-in-out';
    setTimeout(() => {
      loginCard.style.animation = '';
    }, 500);
  }
}

// Auto-fill remembered email
function initializeRememberedEmail() {
  try {
    const rememberedEmail = localStorage.getItem('rememberedEmail');
    if (rememberedEmail) {
      emailInput.value = rememberedEmail;
      rememberCheckbox.checked = true;
      passwordInput.focus();
    }
  } catch (error) {
    console.warn('Could not load remembered email:', error);
  }
}

// Demo credentials auto-fill
function initializeDemoCredentials() {
  const demoNotice = document.querySelector('.fixed.bottom-4.right-4');
  const closeDemoNotice = document.getElementById('closeDemoNotice');
  
  // Auto-fill demo credentials when clicking the demo notice
  demoNotice?.addEventListener('click', function(e) {
    if (e.target !== closeDemoNotice) {
      emailInput.value = DEMO_CREDENTIALS.email;
      passwordInput.value = DEMO_CREDENTIALS.password;
      showNotification('Demo credentials filled in!', 'info');
    }
  });
  
  // Close demo notice
  closeDemoNotice?.addEventListener('click', function(e) {
    e.stopPropagation();
    demoNotice.remove();
  });
  
  // Auto-hide demo notice after 10 seconds
  setTimeout(() => {
    if (demoNotice) {
      demoNotice.style.opacity = '0';
      demoNotice.style.transform = 'translateY(100%)';
      setTimeout(() => demoNotice.remove(), 300);
    }
  }, 10000);
}

// Notification system
function showNotification(message, type = 'info') {
  const existingNotification = document.querySelector('.notification');
  if (existingNotification) {
    existingNotification.remove();
  }
  
  const notification = document.createElement('div');
  notification.className = `notification fixed top-4 right-4 z-50 px-4 py-3 rounded-lg shadow-lg transition-all duration-300 transform -translate-y-full opacity-0`;
  
  switch(type) {
    case 'success':
      notification.classList.add('bg-green-100', 'text-green-800', 'border', 'border-green-200', 'dark:bg-green-900', 'dark:text-green-200', 'dark:border-green-800');
      break;
    case 'error':
      notification.classList.add('bg-red-100', 'text-red-800', 'border', 'border-red-200', 'dark:bg-red-900', 'dark:text-red-200', 'dark:border-red-800');
      break;
    case 'warning':
      notification.classList.add('bg-yellow-100', 'text-yellow-800', 'border', 'border-yellow-200', 'dark:bg-yellow-900', 'dark:text-yellow-200', 'dark:border-yellow-800');
      break;
    default:
      notification.classList.add('bg-blue-100', 'text-blue-800', 'border', 'border-blue-200', 'dark:bg-blue-900', 'dark:text-blue-200', 'dark:border-blue-800');
  }
  
  notification.innerHTML = `
    <div class="flex items-center gap-2">
      <span>${message}</span>
      <button onclick="this.parentElement.parentElement.remove()" class="ml-2 opacity-60 hover:opacity-100 transition-opacity">
        ×
      </button>
    </div>
  `;
  
  document.body.appendChild(notification);
  
  // Animate in
  setTimeout(() => {
    notification.classList.remove('-translate-y-full', 'opacity-0');
  }, 100);
  
  // Auto remove after 5 seconds
  setTimeout(() => {
    notification.classList.add('-translate-y-full', 'opacity-0');
    setTimeout(() => notification.remove(), 300);
  }, 5000);
}

// Keyboard shortcuts
function initializeKeyboardShortcuts() {
  document.addEventListener('keydown', function(e) {
    // Enter key submits form when focused on any form element
    if (e.key === 'Enter' && (e.target === emailInput || e.target === passwordInput)) {
      e.preventDefault();
      loginForm.dispatchEvent(new Event('submit'));
    }
    
    // Escape key clears form
    if (e.key === 'Escape') {
      clearErrors();
      emailInput.value = '';
      passwordInput.value = '';
      emailInput.focus();
    }
    
    // Ctrl/Cmd + D for demo credentials
    if ((e.ctrlKey || e.metaKey) && e.key === 'd') {
      e.preventDefault();
      emailInput.value = DEMO_CREDENTIALS.email;
      passwordInput.value = DEMO_CREDENTIALS.password;
      showNotification('Demo credentials loaded!', 'info');
    }
  });
}

// Real-time validation
function initializeRealTimeValidation() {
  emailInput?.addEventListener('blur', function() {
    const email = this.value.trim();
    if (email && !isValidEmail(email)) {
      showFieldError(this, 'Please enter a valid email address');
    } else {
      clearErrors();
    }
  });
  
  passwordInput?.addEventListener('input', function() {
    if (this.value.length > 0 && this.value.length < 6) {
      showFieldError(this, 'Password must be at least 6 characters');
    } else {
      const errorElement = this.parentNode.querySelector('.field-error');
      if (errorElement) {
        errorElement.remove();
      }
    }
  });
}

// Check if user is already logged in
function checkExistingSession() {
  const authToken = sessionStorage.getItem('authToken');
  if (authToken) {
    showNotification('You are already logged in. Redirecting...', 'info');
    setTimeout(() => {
      window.location.href = 'index.html';
    }, 1500);
  }
}

/* ========================================
   CSS Animations
   ======================================== */
function addCustomStyles() {
  const style = document.createElement('style');
  style.textContent = `
    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      10%, 30%, 50%, 70%, 90% { transform: translateX(-4px); }
      20%, 40%, 60%, 80% { transform: translateX(4px); }
    }
    
    .notification {
      min-width: 300px;
      max-width: 400px;
    }
    
    /* Ensure form animations are smooth */
    .input:focus {
      transition: all 0.2s ease-in-out;
    }
    
    /* Loading button styles */
    .btn-primary:disabled {
      opacity: 0.7;
      transform: none !important;
    }
  `;
  document.head.appendChild(style);
}

/* ========================================
   Initialization
   ======================================== */
document.addEventListener('DOMContentLoaded', function() {
  // Check if user is already logged in
  checkExistingSession();
  
  // Initialize all components
  addCustomStyles();
  initializeAnimations();
  initializePasswordToggle();
  initializeLoginForm();
  initializeRememberedEmail();
  initializeDemoCredentials();
  initializeKeyboardShortcuts();
  initializeRealTimeValidation();
  
  // Focus email input
  emailInput?.focus();
  
  console.log('Login page initialized successfully');
});

// Handle page visibility changes
document.addEventListener('visibilitychange', function() {
  if (!document.hidden) {
    // Clear any existing errors when page becomes visible
    clearErrors();
  }
});

// Export functions for potential testing
window.loginUtils = {
  authenticateUser,
  validateForm,
  showNotification,
  DEMO_CREDENTIALS,
  VALID_CREDENTIALS
};