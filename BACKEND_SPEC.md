# Campaign Lead Management Backend System - Technical Specification

## Overview

This document outlines the technical requirements for a comprehensive backend system to capture, process, and manage leads from marketing campaigns for Nexlink IT LLC. The system should handle lead ingestion from multiple campaign sources, provide lead scoring, routing, and integration capabilities.

## System Architecture

### Core Components

1. **Lead Ingestion API** - REST endpoints for receiving campaign leads
2. **Lead Processing Engine** - Data validation, enrichment, and scoring
3. **Lead Management System** - Storage, routing, and workflow management
4. **Analytics & Reporting** - Campaign performance tracking
5. **Integration Layer** - CRM, email marketing, and notification systems

## Database Schema

### Leads Table
```sql
CREATE TABLE leads (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    uuid VARCHAR(36) UNIQUE NOT NULL,
    
    -- Contact Information
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(50),
    company VARCHAR(255),
    
    -- Campaign Attribution
    campaign_id VARCHAR(100) NOT NULL,
    campaign_name VARCHAR(255) NOT NULL,
    source VARCHAR(100) NOT NULL, -- 'landing-page', 'modal', 'contact-form'
    medium VARCHAR(100), -- 'paid', 'organic', 'email', 'social'
    utm_source VARCHAR(255),
    utm_medium VARCHAR(255),
    utm_campaign VARCHAR(255),
    utm_term VARCHAR(255),
    utm_content VARCHAR(255),
    
    -- Lead Details
    service_interest VARCHAR(100),
    urgency VARCHAR(50),
    message TEXT,
    budget_range VARCHAR(50),
    timeline VARCHAR(50),
    
    -- Technical Tracking
    visitor_id VARCHAR(255),
    session_id VARCHAR(255),
    ip_address INET,
    user_agent TEXT,
    referrer_url TEXT,
    landing_page_url TEXT,
    
    -- Lead Scoring
    lead_score INT DEFAULT 0,
    lead_grade ENUM('A', 'B', 'C', 'D') DEFAULT 'C',
    qualification_status ENUM('unqualified', 'marketing_qualified', 'sales_qualified', 'customer', 'lost') DEFAULT 'unqualified',
    
    -- Processing Status
    status ENUM('new', 'contacted', 'qualified', 'proposal', 'closed_won', 'closed_lost') DEFAULT 'new',
    assigned_to VARCHAR(100),
    follow_up_date DATETIME,
    
    -- Timestamps
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    contacted_at TIMESTAMP NULL,
    
    -- Indexes
    INDEX idx_campaign (campaign_id, created_at),
    INDEX idx_email (email),
    INDEX idx_status (status, created_at),
    INDEX idx_lead_score (lead_score DESC),
    INDEX idx_created (created_at)
);
```

### Campaigns Table
```sql
CREATE TABLE campaigns (
    id VARCHAR(100) PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    campaign_type ENUM('service', 'product', 'consultation', 'assessment') NOT NULL,
    status ENUM('draft', 'active', 'paused', 'completed') DEFAULT 'active',
    start_date DATE,
    end_date DATE,
    budget DECIMAL(10,2),
    target_leads INT,
    landing_page_url TEXT,
    
    -- Lead routing configuration
    auto_assign BOOLEAN DEFAULT TRUE,
    assigned_to VARCHAR(100),
    notification_emails TEXT, -- JSON array
    
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

### Lead Activities Table
```sql
CREATE TABLE lead_activities (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    lead_id BIGINT NOT NULL,
    activity_type ENUM('email_sent', 'call_made', 'meeting_scheduled', 'proposal_sent', 'status_changed', 'note_added') NOT NULL,
    description TEXT,
    performed_by VARCHAR(100),
    metadata JSON,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (lead_id) REFERENCES leads(id) ON DELETE CASCADE,
    INDEX idx_lead_activities (lead_id, created_at)
);
```

## API Endpoints

### 1. Lead Capture API

**POST /v1/api/leads**

Primary endpoint for capturing leads from campaigns.

#### Request Headers
```
Content-Type: application/json
X-Campaign-Token: {campaign_token} (optional for authenticated campaigns)
Origin: {allowed_origin}
```

#### Request Body
```json
{
  "campaign_id": "nextcloud-installation-2025",
  "source": "landing-page",
  "contact": {
    "firstName": "John",
    "lastName": "Doe",
    "email": "john.doe@company.com",
    "phone": "+1-555-123-4567",
    "company": "Acme Corp"
  },
  "lead_details": {
    "service_interest": "Nextcloud Installation",
    "urgency": "High (Same day)",
    "message": "Need Nextcloud setup for 50 users ASAP",
    "budget_range": "$5000-$10000",
    "timeline": "Within 2 weeks"
  },
  "tracking": {
    "visitor_id": "vis_123456789",
    "session_id": "sess_987654321",
    "utm_source": "google",
    "utm_medium": "cpc",
    "utm_campaign": "nextcloud-q4-2025",
    "utm_term": "nextcloud installation",
    "utm_content": "ad-variant-a",
    "referrer_url": "https://google.com/search?q=nextcloud+installation",
    "landing_page_url": "https://nexlink.website/campaigns/nextcloud-installation.html",
    "user_agent": "Mozilla/5.0...",
    "ip_address": "192.168.1.1"
  },
  "form_metadata": {
    "form_type": "campaign_landing",
    "form_version": "v2.1",
    "consent_given": true,
    "timestamp": "2025-10-03T10:30:00Z"
  }
}
```

#### Response
```json
{
  "success": true,
  "lead_id": "lead_abc123def456",
  "message": "Lead captured successfully",
  "next_steps": {
    "expected_response_time": "2 hours",
    "contact_method": "email",
    "tracking_enabled": true
  }
}
```

#### Error Response
```json
{
  "success": false,
  "error": "VALIDATION_ERROR",
  "message": "Invalid email format",
  "field": "contact.email",
  "code": 400
}
```

### 2. Lead Status API

**GET /v1/api/leads/{lead_id}/status**

Allows tracking lead status for follow-up communication.

#### Response
```json
{
  "lead_id": "lead_abc123def456",
  "status": "contacted",
  "last_updated": "2025-10-03T14:30:00Z",
  "assigned_to": "sales@nexlink.website",
  "next_action": "Follow-up call scheduled for Oct 5",
  "estimated_response_time": "24 hours"
}
```

### 3. Campaign Analytics API

**GET /v1/api/campaigns/{campaign_id}/analytics**

Provides campaign performance metrics.

#### Response
```json
{
  "campaign_id": "nextcloud-installation-2025",
  "period": {
    "start": "2025-10-01",
    "end": "2025-10-03"
  },
  "metrics": {
    "total_leads": 45,
    "qualified_leads": 18,
    "conversion_rate": 0.40,
    "average_lead_score": 72,
    "cost_per_lead": 25.50,
    "revenue_generated": 15000
  },
  "lead_sources": {
    "landing-page": 38,
    "modal": 7
  },
  "top_performing_content": [
    {
      "utm_content": "ad-variant-a",
      "leads": 25,
      "conversion_rate": 0.45
    }
  ]
}
```

## Lead Scoring Algorithm

### Scoring Criteria (Total: 100 points)

#### Contact Information Quality (25 points)
- Business email domain: +15 points
- Phone number provided: +5 points
- Company name provided: +5 points

#### Intent Signals (35 points)
- Service interest specificity:
  - Specific service mentioned: +15 points
  - General inquiry: +5 points
- Urgency level:
  - High/Emergency: +15 points
  - Medium: +10 points
  - Low: +5 points
- Budget indication: +5 points

#### Behavioral Signals (25 points)
- Time on landing page:
  - >3 minutes: +10 points
  - 1-3 minutes: +5 points
- Form completion rate:
  - All fields: +10 points
  - Required only: +5 points
- Return visitor: +5 points

#### Campaign Source Quality (15 points)
- Paid search: +15 points
- Organic search: +10 points
- Direct traffic: +8 points
- Social media: +5 points
- Email: +3 points

### Lead Grading
- **A Grade**: 80-100 points (Hot lead)
- **B Grade**: 60-79 points (Warm lead)
- **C Grade**: 40-59 points (Cold lead)
- **D Grade**: <40 points (Nurture lead)

## Lead Processing Workflow

### 1. Immediate Processing (< 1 second)
- Validate required fields
- Sanitize and normalize data
- Assign UUID and generate lead ID
- Calculate initial lead score
- Determine lead grade
- Check for duplicate leads (email + campaign)

### 2. Enrichment Processing (< 5 seconds)
- IP geolocation lookup
- Company data enrichment (if business email)
- Social media profile matching
- Domain validation and reputation check

### 3. Routing & Notifications (< 10 seconds)
- Determine assignment based on:
  - Campaign configuration
  - Service type
  - Lead score
  - Geographic location
  - Team availability
- Send notifications:
  - Instant Slack/Teams message for A-grade leads
  - Email notification to assigned team member
  - SMS for high-urgency leads
- Trigger automated email sequence

### 4. Integration Processing (< 30 seconds)
- Sync to CRM system
- Add to email marketing lists
- Update campaign analytics
- Log all activities

## Error Handling

### Validation Errors
- Required field missing
- Invalid email format
- Invalid phone format
- Duplicate submission (within 24 hours)

### Rate Limiting
- 100 requests per minute per IP
- 1000 requests per hour per campaign
- Exponential backoff for repeated failures

### Fallback Mechanisms
- Queue failed requests for retry
- Email backup for critical failures
- Manual lead entry interface for emergencies

## Security Requirements

### Data Protection
- All PII encrypted at rest (AES-256)
- TLS 1.3 for data in transit
- GDPR compliance for EU leads
- CCPA compliance for CA leads

### Access Control
- API authentication via tokens
- Role-based permissions
- Audit logging for all access

### Privacy Features
- Lead anonymization option
- Data retention policies (7 years max)
- Right to deletion support
- Cookie consent integration

## Integration Specifications

### CRM Integration
- **Primary**: HubSpot API v3
- **Secondary**: Salesforce REST API
- **Fallback**: CSV export/import

### Email Marketing
- **Primary**: Mailchimp API v3
- **Secondary**: SendGrid API v3
- **Features**: List segmentation, automation triggers

### Notification Systems
- **Instant**: Slack Webhooks, Microsoft Teams
- **Email**: SMTP with template engine
- **SMS**: Twilio API for high-priority leads

### Analytics
- **Primary**: Google Analytics 4 Measurement Protocol
- **Secondary**: Custom dashboard API
- **Reporting**: Daily/weekly automated reports

## Performance Requirements

### Response Time Targets
- Lead capture API: < 500ms (95th percentile)
- Status lookup: < 200ms (95th percentile)
- Analytics API: < 2 seconds (95th percentile)

### Availability
- 99.9% uptime SLA
- < 30 seconds recovery time
- Automatic failover capabilities

### Scalability
- Handle 1000 concurrent requests
- Process 10,000 leads per day
- Auto-scale based on traffic

## Monitoring & Alerting

### Key Metrics
- API response times
- Lead processing success rate
- Integration sync status
- Campaign conversion rates

### Alert Conditions
- API response time > 1 second
- Lead processing failure rate > 1%
- Integration sync failures
- Unusual traffic patterns

### Logging Requirements
- Structured logging (JSON format)
- Request/response logging
- Performance metrics
- Error tracking with stack traces

## Implementation Phases

### Phase 1: Core Lead Capture (2 weeks)
- Basic API endpoints
- Database schema
- Lead scoring algorithm
- Email notifications

### Phase 2: Processing & Routing (1 week)
- Automated lead assignment
- Basic integrations (email)
- Admin dashboard

### Phase 3: Advanced Features (2 weeks)
- CRM integrations
- Advanced analytics
- Automated workflows
- Mobile optimization

### Phase 4: Optimization (1 week)
- Performance tuning
- Advanced monitoring
- A/B testing framework
- Documentation

## Testing Strategy

### Unit Tests
- API endpoint validation
- Lead scoring algorithm
- Data sanitization functions
- Integration modules

### Integration Tests
- End-to-end lead flow
- CRM sync verification
- Email delivery testing
- Analytics accuracy

### Load Testing
- Peak traffic simulation
- Stress testing with 5x normal load
- Database performance under load
- Failover scenario testing

## Deployment Requirements

### Environment Setup
- **Production**: AWS/Azure with load balancer
- **Staging**: Identical to production
- **Development**: Docker containers

### CI/CD Pipeline
- Automated testing on commit
- Staging deployment on merge
- Production deployment with approval
- Rollback capabilities

### Environment Variables
```
DATABASE_URL=mysql://user:pass@host:port/db
REDIS_URL=redis://host:port
SMTP_HOST=smtp.example.com
SMTP_USER=noreply@nexlink.website
HUBSPOT_API_KEY=secret
SLACK_WEBHOOK_URL=https://hooks.slack.com/...
ENCRYPTION_KEY=32-byte-secret-key
```

## Success Criteria

### Functional Requirements
- ✅ All campaign forms submit successfully
- ✅ Lead scoring matches manual evaluation
- ✅ CRM sync completes within SLA
- ✅ Notifications delivered reliably

### Performance Requirements
- ✅ 99.9% uptime achieved
- ✅ Sub-500ms API response times
- ✅ Zero data loss during processing
- ✅ Accurate analytics reporting

### Business Requirements
- ✅ 50% improvement in lead response time
- ✅ 25% increase in lead conversion rate
- ✅ 90% reduction in manual data entry
- ✅ Real-time campaign performance visibility

---

**Document Version**: 1.0  
**Last Updated**: October 3, 2025  
**Author**: Technical Specification  
**Review**: Implementation Team