## ADDED Requirements

### Requirement: Fiscal configuration
The system SHALL store fiscal configuration for businesses, locations, products, contacts, tax rates, operation natures, certificates, series, and fiscal environment.

#### Scenario: Fiscal setup is completed
- **WHEN** a business saves required fiscal configuration
- **THEN** the system SHALL have the data needed for later fiscal document generation

### Requirement: Brazilian fiscal documents
The system SHALL support modeled workflows for NF-e, NFC-e, CT-e, MDF-e, inutilização, contingency, cancellation, correction, and related fiscal events.

#### Scenario: Fiscal document generation requested
- **WHEN** an authorized user requests fiscal document generation for an eligible transaction
- **THEN** the system SHALL validate required transaction, company, contact, product, tax, and certificate data before emission

### Requirement: Fiscal file storage
Fiscal XMLs, PDFs, correction letters, cancellation files, certificates, boletos, and remessas SHALL be stored securely with tenant-aware access control.

#### Scenario: User downloads fiscal XML
- **WHEN** an authorized user downloads a fiscal XML
- **THEN** the system SHALL verify business access before returning the file

### Requirement: Boletos and remessas
The system SHALL support boleto and remessa modeling for compatible banks and payment workflows.

#### Scenario: Boleto is generated
- **WHEN** a user generates a boleto for an eligible transaction
- **THEN** the system SHALL persist boleto metadata and provide authorized access to its generated document
