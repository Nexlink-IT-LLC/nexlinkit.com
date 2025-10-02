/**
 * Customer Portal JavaScript
 * Based on Nexlink IT main website functionality
 * Handles theme management, animations, and portal-specific interactions
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
   Animation System (inherited from main site)
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

  // Observe all elements with data-animate attribute
  document.querySelectorAll('[data-animate]').forEach((el) => {
    observer.observe(el);
  });
}

/* ========================================
   Portal-specific functionality
   ======================================== */

// Dashboard data simulation
const dashboardData = {
  user: {
    name: 'John Doe',
    initials: 'JD',
    plan: 'Business Pro',
    status: 'Active',
    balance: '$0.00',
    openTickets: 2,
    nextBilling: 'Oct 21, 2025'
  },
  
  recentActivity: [
    {
      icon: '🎫',
      title: 'Support ticket #1234 updated',
      subtitle: 'Your Nextcloud migration is 90% complete',
      time: '2 hours ago'
    },
    {
      icon: '💳',
      title: 'Payment processed',
      subtitle: 'Monthly service fee - $75.00',
      time: '1 day ago'
    },
    {
      icon: '🔧',
      title: 'Server maintenance completed',
      subtitle: 'All services restored to normal operation',
      time: '3 days ago'
    },
    {
      icon: '📧',
      title: 'New support ticket created',
      subtitle: 'SSL certificate renewal request',
      time: '5 days ago'
    }
  ],
  
  systemStatus: [
    { name: 'Web Server', status: 'Online', color: 'green' },
    { name: 'Database', status: 'Online', color: 'green' },
    { name: 'Nextcloud', status: 'Maintenance', color: 'yellow' },
    { name: 'Email Service', status: 'Online', color: 'green' }
  ]
};

// Quick action handlers
function initializeQuickActions() {
  const quickActions = document.querySelectorAll('.quick-action-btn');
  
  quickActions.forEach(button => {
    button.addEventListener('click', function() {
      const actionText = this.querySelector('span:last-child').textContent;
      
      // Add visual feedback
      this.style.transform = 'scale(0.95)';
      setTimeout(() => {
        this.style.transform = '';
      }, 150);
      
      // Handle different actions
      switch(actionText) {
        case 'Create Support Ticket':
          showNotification('Redirecting to support ticket creation...', 'info');
          setTimeout(() => window.location.href = 'support.html', 1000);
          break;
        case 'View Billing History':
          showNotification('Loading billing history...', 'info');
          setTimeout(() => window.location.href = 'billing.html', 1000);
          break;
        case 'Update Account Info':
          showNotification('Opening account settings...', 'info');
          setTimeout(() => window.location.href = 'account.html', 1000);
          break;
        case 'Schedule Consultation':
          showNotification('Opening consultation scheduler...', 'info');
          setTimeout(() => window.open('https://calendly.com/nexlink-it', '_blank'), 1000);
          break;
      }
    });
  });
}

// Notification system
function showNotification(message, type = 'info') {
  // Remove existing notifications
  const existingNotification = document.querySelector('.notification');
  if (existingNotification) {
    existingNotification.remove();
  }
  
  // Create notification element
  const notification = document.createElement('div');
  notification.className = `notification fixed top-4 right-4 z-50 px-4 py-3 rounded-lg shadow-lg transition-all duration-300 transform translate-x-full`;
  
  // Set styling based on type
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
    notification.classList.remove('translate-x-full');
  }, 100);
  
  // Auto remove after 5 seconds
  setTimeout(() => {
    notification.classList.add('translate-x-full');
    setTimeout(() => notification.remove(), 300);
  }, 5000);
}

// Activity item interactions
function initializeActivityItems() {
  const activityItems = document.querySelectorAll('.activity-item');
  
  activityItems.forEach(item => {
    item.addEventListener('click', function() {
      const title = this.querySelector('.activity-title').textContent;
      
      // Add visual feedback
      this.style.transform = 'scale(0.98)';
      setTimeout(() => {
        this.style.transform = '';
      }, 150);
      
      // Handle different activity types
      if (title.includes('Support ticket')) {
        showNotification('Opening support ticket details...', 'info');
        setTimeout(() => window.location.href = 'support.html', 1000);
      } else if (title.includes('Payment')) {
        showNotification('Opening billing details...', 'info');
        setTimeout(() => window.location.href = 'billing.html', 1000);
      } else {
        showNotification('Loading activity details...', 'info');
      }
    });
    
    // Add hover cursor
    item.style.cursor = 'pointer';
  });
}

// Status indicator animations
function initializeStatusIndicators() {
  const indicators = document.querySelectorAll('.status-indicator');
  
  indicators.forEach(indicator => {
    // Add subtle pulse animation for online services
    if (indicator.classList.contains('bg-green-500')) {
      indicator.style.animation = 'pulse 2s infinite';
    }
    
    // Add different animation for maintenance
    if (indicator.classList.contains('bg-yellow-500')) {
      indicator.style.animation = 'pulse 1s infinite';
    }
  });
}

// Dashboard cards hover effects
function initializeDashboardCards() {
  const cards = document.querySelectorAll('.dashboard-card');
  
  cards.forEach(card => {
    card.addEventListener('mouseenter', function() {
      // Add subtle glow effect
      this.style.boxShadow = '0 12px 40px -15px rgba(14,165,233,.35)';
    });
    
    card.addEventListener('mouseleave', function() {
      // Reset to default shadow
      this.style.boxShadow = '';
    });
  });
}

// Navigation active state management
function initializeNavigation() {
  const navLinks = document.querySelectorAll('.portal-nav-link, .portal-nav-link-mobile');
  const currentPage = window.location.pathname.split('/').pop() || 'index.html';
  
  navLinks.forEach(link => {
    const href = link.getAttribute('href');
    
    // Set active state based on current page
    if (href === currentPage || 
        (currentPage === 'index.html' && href === '#dashboard') ||
        (currentPage === '' && href === '#dashboard')) {
      link.classList.add('active');
    }
    
    // Handle navigation clicks
    link.addEventListener('click', function(e) {
      if (this.getAttribute('href').startsWith('#')) {
        e.preventDefault();
        // Handle dashboard navigation
        if (this.getAttribute('href') === '#dashboard') {
          window.location.href = 'index.html';
        }
      }
    });
  });
}

// Auto-refresh data simulation
function startDataRefresh() {
  setInterval(() => {
    // Simulate real-time updates
    const openTicketsElement = document.querySelector('.dashboard-card-value');
    if (openTicketsElement && openTicketsElement.textContent === '2') {
      // Randomly update ticket count (simulation)
      if (Math.random() > 0.95) {
        const newCount = Math.floor(Math.random() * 5);
        if (openTicketsElement.parentElement.previousElementSibling.textContent === 'Open Tickets') {
          openTicketsElement.textContent = newCount.toString();
          showNotification(`Ticket count updated: ${newCount} open tickets`, 'info');
        }
      }
    }
  }, 30000); // Check every 30 seconds
}

/* ========================================
   Utility Functions
   ======================================== */

// Format date/time
function formatDateTime(date) {
  return new Intl.DateTimeFormat('en-US', {
    year: 'numeric',
    month: 'short',
    day: 'numeric',
    hour: '2-digit',
    minute: '2-digit'
  }).format(date);
}

// Format currency
function formatCurrency(amount) {
  return new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'USD'
  }).format(amount);
}

// Loading state management
function showLoading(element) {
  const spinner = document.createElement('div');
  spinner.className = 'loading-spinner inline-block w-4 h-4 border-2 border-brand-200 border-t-brand-600 rounded-full animate-spin';
  element.appendChild(spinner);
}

function hideLoading(element) {
  const spinner = element.querySelector('.loading-spinner');
  if (spinner) {
    spinner.remove();
  }
}

/* ========================================
   Keyboard Shortcuts
   ======================================== */
document.addEventListener('keydown', function(e) {
  // Ctrl/Cmd + K for quick search (future feature)
  if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
    e.preventDefault();
    showNotification('Quick search coming soon!', 'info');
  }
  
  // Esc to close any modals or notifications
  if (e.key === 'Escape') {
    const notification = document.querySelector('.notification');
    if (notification) {
      notification.remove();
    }
  }
});

/* ========================================
   Initialization
   ======================================== */
document.addEventListener('DOMContentLoaded', function() {
  // Initialize all components
  initializeAnimations();
  initializeQuickActions();
  initializeActivityItems();
  initializeStatusIndicators();
  initializeDashboardCards();
  initializeNavigation();
  
  // Start background processes
  startDataRefresh();
  
  // Show welcome notification
  setTimeout(() => {
    showNotification('Welcome to your customer portal!', 'success');
  }, 1000);
  
  console.log('Customer Portal initialized successfully');
});

// Handle page visibility changes
document.addEventListener('visibilitychange', function() {
  if (!document.hidden) {
    // Page became visible, refresh data
    console.log('Page became visible, refreshing data...');
  }
});

// Export functions for potential use in other files
window.portalUtils = {
  showNotification,
  formatDateTime,
  formatCurrency,
  showLoading,
  hideLoading
};