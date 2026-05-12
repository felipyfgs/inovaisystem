## ADDED Requirements

### Requirement: Optional module boundaries
Advanced modules SHALL be modeled as optional domain areas that depend on core platform, tenancy, users, contacts, catalog, and transactions where applicable.

#### Scenario: Module is not enabled
- **WHEN** an advanced module is disabled for a business
- **THEN** module-specific navigation and actions SHALL not be available for that business

### Requirement: CRM module scope
The system SHALL model CRM concepts including leads, campaigns, follow-ups, schedules, proposals, call logs, and contact portal workflows.

#### Scenario: CRM follow-up is created
- **WHEN** a user creates a follow-up for a contact or lead
- **THEN** the system SHALL associate it with the business, responsible user, schedule data, and related contact context

### Requirement: Essentials and HR scope
The system SHALL model Essentials/RH concepts including documents, todos, messages, reminders, attendance, leave, shifts, payroll, holidays, and knowledge base.

#### Scenario: Leave request submitted
- **WHEN** an employee submits a leave request
- **THEN** the system SHALL persist it for approval workflow within the business

### Requirement: Specialized modules scope
The system SHALL model Manufacturing, Repair, Restaurant, Product Catalogue, Superadmin, and WooCommerce synchronization as distinct module areas.

#### Scenario: WooCommerce sync log is recorded
- **WHEN** a WooCommerce sync operation runs
- **THEN** the system SHALL record sync status, payload context, and errors for audit and retry analysis
