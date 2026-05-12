## ADDED Requirements

### Requirement: Contact classification
The system SHALL support contacts classified as customers, suppliers, or both.

#### Scenario: User creates a customer
- **WHEN** a user creates a contact with customer type
- **THEN** the contact SHALL be available in customer selection workflows

### Requirement: Fiscal identity fields
Contacts SHALL support Brazilian fiscal identity fields such as CPF/CNPJ, IE/RG, contributor flag, final consumer flag, and foreign identifier where applicable.

#### Scenario: Contact has CNPJ data
- **WHEN** a user saves a business customer with CNPJ and IE
- **THEN** the system SHALL persist those values for sales and fiscal document workflows

### Requirement: Contact addresses
Contacts SHALL support primary address and delivery address data with city/state/country context.

#### Scenario: Sale uses delivery address
- **WHEN** a sale requires shipping to a delivery address
- **THEN** the system SHALL use the contact delivery address when present

### Requirement: Contact listing and filtering
The API SHALL provide paginated and filterable contact listings by type, name, document, status, and group.

#### Scenario: User filters suppliers
- **WHEN** a user filters contacts by supplier type
- **THEN** the API SHALL return only matching supplier contacts within the active business
