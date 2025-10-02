# Customer Portal - Nexlink IT LLC

A modern, responsive customer portal built to complement the main Nexlink IT website design. This portal provides customers with a centralized dashboard to manage their account, billing, and support needs.

## 🎨 Design Philosophy

The customer portal is designed to maintain visual consistency with the main Nexlink IT website while providing a focused, dashboard-style experience for logged-in users. It follows the same design principles:

- **Brand Consistency**: Uses the same color scheme, typography, and design tokens
- **Dark/Light Mode**: Automatic theme detection with manual toggle
- **Responsive Design**: Mobile-first approach with Tailwind CSS
- **Accessibility**: Proper semantic HTML and keyboard navigation
- **Performance**: Optimized animations and efficient CSS

## 📁 File Structure

```
customer-portal/
├── index.html          # Main dashboard page
├── login.html          # Authentication/login page
├── account.html        # Account settings and security
├── billing.html        # Billing history and payment methods
├── support.html        # Support tickets and help center
├── portal-styles.css   # Portal-specific styles
├── portal-script.js    # Interactive functionality
├── login-script.js     # Login page functionality
└── assets/            # Images and other assets
```

## 🚀 Features

### Login Page (login.html)
- **Secure Authentication**: Email/password login with form validation
- **SSO Integration**: Google and Microsoft sign-in options (UI ready)
- **Remember Me**: Persistent login preference
- **Password Visibility**: Toggle password visibility with eye icon
- **Demo Credentials**: Built-in demo account for testing
- **Responsive Design**: Mobile-optimized login experience
- **Real-time Validation**: Immediate feedback on form errors
- **Session Management**: Automatic redirect if already logged in

### Dashboard (index.html)
- **Overview Cards**: Account status, balance, tickets, next billing
- **Recent Activity**: Real-time updates on account activity
- **Quick Actions**: One-click access to common tasks
- **System Status**: Live status indicators for services
- **Account Summary**: Plan details and service information

### Account Management (account.html)
- **Personal Information**: Name, email, phone, company details
- **Security Settings**: Password change, 2FA management
- **API Keys**: Generate and manage API access
- **Notification Preferences**: Email and alert settings
- **Account Actions**: Data export and account closure

### Billing (billing.html)
- **Billing Overview**: Current balance, next payment, spending summary
- **Invoice History**: Downloadable invoices with payment status
- **Plan Management**: Current plan details and upgrade options
- **Payment Methods**: Manage credit cards and billing addresses
- **Billing Contacts**: Manage who receives billing notifications

### Support (support.html)
- **Ticket Management**: View and track support requests
- **Priority Indicators**: Visual priority and status badges
- **Progress Tracking**: Visual progress bars for ongoing work
- **Support Team**: Assigned technicians and availability
- **Contact Information**: Multiple ways to reach support

## 💻 Technical Implementation

### CSS Architecture
- **Utility-First**: Built with Tailwind CSS for rapid development
- **Custom Components**: Portal-specific components extend the base design system
- **CSS Variables**: Consistent theming with CSS custom properties
- **Responsive Grid**: CSS Grid and Flexbox for adaptive layouts

### JavaScript Features
- **Theme Management**: Persistent dark/light mode preferences
- **Animation System**: Intersection Observer for smooth reveal animations
- **Interactive Elements**: Hover effects, click feedback, notifications
- **Data Simulation**: Mock real-time updates for demonstration
- **Keyboard Shortcuts**: Quick navigation and accessibility
- **Form Validation**: Real-time and submit-time validation
- **Session Handling**: Login state management and redirects
- **Password Security**: Visibility toggle and strength indicators

### Design Tokens
```css
:root {
  --duration: 500ms;
  --easing: cubic-bezier(0.22, 1, 0.36, 1);
  --brand: #0ea5e9;
  --brand-strong: #0284c7;
  --brand-weak: #38bdf8;
}
```

## 🎯 Key Components

### Dashboard Cards
```css
.dashboard-card {
  background: white;
  border: 1px solid rgb(228 228 231);
  border-radius: 1rem;
  padding: 1.5rem;
  transition: all var(--duration) var(--easing);
}
```

### Navigation
- **Desktop**: Horizontal navigation with active states
- **Mobile**: Horizontal scroll navigation below header
- **Responsive**: Adaptive based on screen size

### Activity Feed
- **Real-time Updates**: Simulated live activity stream
- **Interactive Items**: Clickable entries with hover effects
- **Categorized Icons**: Visual indicators for different activity types

## 🔧 Customization

### Login Page Authentication
The login page includes multiple authentication options:

#### Demo Credentials (for testing)
- **Email**: `demo@example.com`
- **Password**: `demo123`
- **Quick Fill**: Click demo notice or use Ctrl/Cmd + D

#### Additional Test Accounts
- `john.doe@example.com` / `password123`
- `admin@nexlink.website` / `admin123`
- `test@test.com` / `test123`

#### Features
- **Form Validation**: Real-time email and password validation
- **Session Management**: Automatic redirect for logged-in users
- **Remember Me**: Persistent email storage
- **SSO Ready**: UI prepared for Google/Microsoft integration
- **Responsive**: Mobile-optimized with touch-friendly controls
- **Accessibility**: Keyboard navigation and screen reader support

### Brand Colors
The portal uses the same brand colors as the main site:
- Primary: `#0ea5e9` (Sky Blue)
- Strong: `#0284c7` (Sky Blue 600)
- Weak: `#38bdf8` (Sky Blue 400)

### Theme Variants
- Light mode: Clean whites and subtle grays
- Dark mode: Deep backgrounds with blue accents
- System preference detection with manual override

### Animation System
All animations use consistent timing and easing:
- Duration: 500ms
- Easing: `cubic-bezier(0.22, 1, 0.36, 1)`
- Intersection Observer for reveal animations

## 📱 Responsive Behavior

### Breakpoints
- **Mobile**: < 768px - Stacked layout, mobile navigation
- **Tablet**: 768px - 1024px - Adaptive grid, condensed content
- **Desktop**: > 1024px - Full layout, sidebar content

### Mobile Optimizations
- Touch-friendly button sizes (minimum 44px)
- Horizontal scroll navigation
- Condensed card layouts
- Hidden non-essential information

## 🔐 Security Considerations

### Authentication
- Session management (simulated)
- Secure logout functionality
- Protected routes (would require server-side implementation)

### Data Protection
- No sensitive data in localStorage
- Simulated API keys with masked display
- Secure form handling patterns

## 🚀 Future Enhancements

### Planned Features
- **Real-time Updates**: WebSocket connection for live data
- **Advanced Filtering**: Search and filter across all sections
- **File Upload**: Attachment support for support tickets
- **Mobile App**: Progressive Web App capabilities
- **Integration**: API integration with actual backend services

### Technical Improvements
- **Performance**: Code splitting and lazy loading
- **Testing**: Unit and integration test coverage
- **Documentation**: Comprehensive API documentation
- **Monitoring**: Error tracking and performance monitoring

## 🎨 Design System

The portal extends the main website's design system with portal-specific components:

- **Cards**: Dashboard-style information cards
- **Panels**: Content containers with headers and actions
- **Tables**: Responsive data tables with sorting
- **Status Indicators**: Visual status badges and progress bars
- **Quick Actions**: Button-style action items

## 📋 Browser Support

- **Modern Browsers**: Chrome 90+, Firefox 88+, Safari 14+, Edge 90+
- **CSS Features**: CSS Grid, Flexbox, Custom Properties, backdrop-filter
- **JavaScript**: ES6+ features, Intersection Observer API
- **Progressive Enhancement**: Graceful degradation for older browsers

## 🔧 Development Setup

1. **Local Development**: Serve files via HTTP (not file://)
2. **Live Reload**: Use live-server or similar for development
3. **Production**: Minify CSS/JS and optimize images
4. **CDN**: Consider moving Tailwind to local build for production

## 📄 License

Built for Nexlink IT LLC - All rights reserved.