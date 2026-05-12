## ADDED Requirements

### Requirement: Sales transaction lifecycle
The system SHALL manage sales transactions with status, payment status, customer, location, lines, discounts, taxes, shipping, totals, and creator.

#### Scenario: User creates final sale
- **WHEN** a user submits a valid final sale
- **THEN** the system SHALL persist the transaction, sale lines, totals, payment status, and inventory effects

### Requirement: POS workflow
The frontend SHALL provide a POS workflow for selecting customer, products/variations, quantities, discounts, payments, and receipt output.

#### Scenario: POS checkout
- **WHEN** a cashier completes checkout with valid payment data
- **THEN** the system SHALL create the sale and record the payment details

### Requirement: Cash register
The system SHALL support cash register opening, transaction association, payment tracking, and closing summaries by user and location.

#### Scenario: Register closes
- **WHEN** a cashier closes an active register
- **THEN** the system SHALL calculate totals by payment method and mark the register closed

### Requirement: Sale returns and drafts
The system SHALL support sale returns, drafts, quotations, and suspended sales where enabled by permissions.

#### Scenario: User creates sale return
- **WHEN** a user returns items from an existing sale
- **THEN** the system SHALL create return records and adjust totals, payments, and inventory according to the return
