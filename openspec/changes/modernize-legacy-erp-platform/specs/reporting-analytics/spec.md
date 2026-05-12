## ADDED Requirements

### Requirement: Dashboard metrics
The system SHALL provide dashboard metrics for the active business using authorized, tenant-scoped data.

#### Scenario: User opens dashboard
- **WHEN** an authenticated user opens the ERP dashboard
- **THEN** the frontend SHALL display metrics the user is authorized to view for the active business

### Requirement: Operational reports
The system SHALL support reports for sales, purchases, stock, taxes, contacts, expenses, cash registers, commissions, products, and financial accounts.

#### Scenario: User requests sales report
- **WHEN** a user filters sales by date range and location
- **THEN** the API SHALL return matching sales report data scoped to the active business and permitted locations

### Requirement: Fiscal and integration reports
The system SHALL support reporting for fiscal documents, payment gateways, e-commerce, WooCommerce synchronization, and module-specific operations.

#### Scenario: User reviews fiscal document status
- **WHEN** a user opens a fiscal status report
- **THEN** the system SHALL list fiscal documents and statuses available to that user and business

### Requirement: Exportable report results
Reports SHALL be exportable where appropriate, with authorization and filters preserved.

#### Scenario: User exports filtered report
- **WHEN** a user exports a report after applying filters
- **THEN** the exported data SHALL match the authorized filtered report result
