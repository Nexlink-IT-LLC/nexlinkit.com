# Nexlink IT LLC - Official Website

![Nexlink IT](https://nexlinkit.com/favicon.ico)

**Professional IT services delivered with expertise and care.**

**Live Site:** [nexlinkit.com](https://nexlinkit.com)

---

## About

This repository contains the source code for the official Nexlink IT LLC website. We provide professional IT services including Linux administration, server management, hosting solutions, Nextcloud deployments, and comprehensive technical support — at affordable prices with fast response times.

**Key Highlights:**
- Average response time: 1 hour
- Europe-based, serving clients worldwide
- Secure, reliable infrastructure management
- Over a year of operation with dozens of satisfied clients

---

## Tech Stack

- **Frontend:** Pure HTML5, CSS3, JavaScript (ES6+)
- **Styling:** TailwindCSS (via CDN)
- **Deployment:** Nginx + PHP on Docker
- **Version Control:** Git / GitHub

---

## Project Structure

### Root Files
- `index.html` - Homepage
- `about.html` - About page
- `contact.html` - Contact form and information
- `pricing.html` - Service pricing
- `credits.html` - Credits and acknowledgments
- `maintenance.html` - Maintenance mode page
- `styles.css` - Custom CSS styles
- `script.js` - Interactive functionality and client-side logic
- `robots.txt` - Search engine crawling directives
- `favicon.ico` - Site favicon

### Directories

| Directory | Description |
|-----------|-------------|
| `assets/` | Images, icons, logos, and other media files |
| `backend/` | Server-side scripts and API endpoints |
| `campaigns/` | Marketing campaign landing pages (Nextcloud assessments, consultations, etc.) |
| `case-studies/` | Client success stories and project showcases |
| `legal/` | Legal documents (terms of service, privacy policy, remote access agreements) |
| `archives/` | Archived versions of pages for historical reference |
| `partials/` | Reusable HTML components and fragments |
| `samples/` | Sample files and examples |
| `old/` | Deprecated or legacy files kept for reference |

---

## Development

### Prerequisites
- A web server (Nginx, Apache, or local dev server)
- Modern browser for testing

### Local Setup
```bash
# Clone the repository
git clone https://github.com/Nexlink-IT-LLC/nexlinkit.com.git
cd nexlinkit.com

# Serve locally (example with Python)
python3 -m http.server 8000

# Or with Node.js
npx serve .
```

Visit `http://localhost:8000` in your browser.

---

## Deployment

The site is deployed on our production infrastructure:
- **Server:** Nginx + PHP Docker container
- **Domain:** nexlinkit.com
- **SSL:** Managed via Nginx Proxy Manager

Changes pushed to `main` are reflected on the live site.

---

## Contributing

This repository is managed by Nexlink IT LLC. For internal contributions:

1. Create a feature branch: `git checkout -b feature/your-feature`
2. Make your changes and test locally
3. Commit with clear messages: `git commit -m "Add: new feature description"`
4. Push and create a pull request

**Code Quality Standards:**
- Semantic HTML5
- Responsive design (mobile-first)
- Accessible markup (ARIA, alt text, proper heading hierarchy)
- Clean, commented code

---

## Contact

**Nexlink IT LLC**

Email: [contact@nexlinkit.com](mailto:contact@nexlinkit.com)  
Website: [nexlinkit.com](https://nexlinkit.com)  
GitHub: [@Nexlink-IT-LLC](https://github.com/Nexlink-IT-LLC)

---

## License

© 2025 Nexlink IT LLC. All rights reserved.

This repository contains proprietary code. Unauthorized copying, modification, or distribution is prohibited.

---

**Built with care by the Nexlink IT team.**
