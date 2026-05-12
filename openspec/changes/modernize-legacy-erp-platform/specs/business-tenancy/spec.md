## ADDED Requirements

### Requirement: Business as tenant boundary
Tenant-owned data SHALL be isolated by `business_id` or by a parent relation that resolves to a business.

#### Scenario: User lists tenant data
- **WHEN** an authenticated user lists tenant-owned records
- **THEN** the API SHALL return only records belonging to the user's active business context

### Requirement: Business location context
The system SHALL support business locations and allow workflows to operate under an active location where required.

#### Scenario: User creates location-specific sale
- **WHEN** a user creates a sale requiring inventory location
- **THEN** the sale SHALL be associated with the active business location

### Requirement: Tenant-safe authorization
Policies and queries SHALL prevent access to records outside the user's permitted business and locations.

#### Scenario: Cross-business record access
- **WHEN** a user requests a record from another business
- **THEN** the API SHALL deny access even if the record identifier is valid

### Requirement: Business fiscal configuration
Businesses SHALL store fiscal identity and operational settings needed by later fiscal workflows.

#### Scenario: Business is configured for fiscal documents
- **WHEN** business fiscal settings are saved
- **THEN** the system SHALL persist required company identity, address, certificate metadata, series, environment, and tax defaults
