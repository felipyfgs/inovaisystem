## ADDED Requirements

### Requirement: Purchase lifecycle
The system SHALL manage purchase transactions with supplier, location, purchase lines, status, payment status, totals, taxes, and stock effects.

#### Scenario: Purchase is received
- **WHEN** a user marks a purchase as received
- **THEN** the system SHALL update purchase status and increase stock for received purchase lines

### Requirement: Purchase returns
The system SHALL support returning purchased items to suppliers and reversing associated stock and financial effects.

#### Scenario: User creates purchase return
- **WHEN** a user returns received purchase items
- **THEN** the system SHALL record the return and adjust stock and payable amounts

### Requirement: Financial accounts
The system SHALL manage accounts, account types, bank accounts, and account transactions for cash, bank, expenses, revenues, and payments.

#### Scenario: Payment assigned to account
- **WHEN** a payment is recorded with a financial account
- **THEN** the system SHALL create or update the corresponding account transaction

### Requirement: Expenses and revenues
The system SHALL support expense and revenue records with categories, amounts, payment status, dates, and business context.

#### Scenario: User records expense
- **WHEN** a user creates an expense with valid category and amount
- **THEN** the system SHALL persist it for financial reporting within the active business
