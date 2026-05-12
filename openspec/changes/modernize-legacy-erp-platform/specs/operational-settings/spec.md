## ADDED Requirements

### Requirement: Invoice and receipt configuration
The system SHALL manage invoice layouts, invoice schemes, numbering, receipt labels, custom fields, and print/display options per business or location.

#### Scenario: User selects invoice layout
- **WHEN** a location is configured with an invoice layout
- **THEN** generated receipts and documents SHALL use the selected layout settings

### Requirement: Printing and barcode settings
The system SHALL manage printers, barcode formats, label settings, and product label generation configuration.

#### Scenario: Product labels are requested
- **WHEN** a user requests labels for products
- **THEN** the system SHALL generate labels according to the selected barcode and label configuration

### Requirement: Notification templates
The system SHALL manage templates for email, SMS, and other notification channels.

#### Scenario: Template is used
- **WHEN** a notification is sent for a supported event
- **THEN** the system SHALL render the configured template for the active business context

### Requirement: Localization and system preferences
The system SHALL support language, timezone, currency, date/time format, decimal precision, and business operational preferences.

#### Scenario: User views monetary value
- **WHEN** a monetary value is displayed in the frontend
- **THEN** it SHALL follow the active business localization and currency preferences
