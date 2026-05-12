## ADDED Requirements

### Requirement: Seed data for development
The system SHALL provide seeders for minimal demo data needed to validate foundational ERP workflows without importing the legacy database.

#### Scenario: Seeders are run locally
- **WHEN** development seeders execute successfully
- **THEN** the database SHALL contain an admin user, business, location, permissions, contacts, products, and sample transactions sufficient for manual validation

### Requirement: Import and export workflows
The system SHALL support import/export workflows for products, sales, opening stock, XML, purchase XML, and price groups with validation and error reporting.

#### Scenario: Import file contains invalid rows
- **WHEN** a user imports a file with invalid rows
- **THEN** the system SHALL reject or skip invalid rows according to the import mode and return row-level error details

### Requirement: Documents and media
The system SHALL store uploads, product images, notes, documents, generated files, and media with tenant-aware access controls.

#### Scenario: User accesses uploaded document
- **WHEN** a user requests a stored document
- **THEN** the system SHALL verify business access before allowing download or preview

### Requirement: Audit, notifications, backups, and maintenance
The system SHALL support audit logs, domain events, notifications, backup/restore planning, update tracking, and maintenance health visibility.

#### Scenario: Payment is updated
- **WHEN** a transaction payment is created, updated, or removed
- **THEN** the system SHALL record an auditable event for the affected transaction and business
