## ADDED Requirements

### Requirement: Product catalog
The system SHALL manage products with categories, subcategories, brands, units, SKU/barcode data, product type, tax mode, and active/inactive state.

#### Scenario: User creates a product
- **WHEN** a user creates a product with required catalog fields
- **THEN** the product SHALL be available for sales, purchase, inventory, and reporting workflows

### Requirement: Product fiscal fields
Products SHALL support fiscal fields needed by Brazilian documents, including NCM, CEST, CFOP, CST/CSOSN, PIS, COFINS, IPI, ICMS, ANP, and related tax attributes.

#### Scenario: Product is used in fiscal sale
- **WHEN** a product is added to a sale that will generate a fiscal document
- **THEN** the fiscal workflow SHALL be able to read the product fiscal attributes

### Requirement: Product variations and pricing
The system SHALL support single and variable products with variations, purchase price, selling price, price groups, and optional e-commerce price data.

#### Scenario: User selects a variation
- **WHEN** a user selects a variable product in POS
- **THEN** the system SHALL use the selected variation's price and stock data

### Requirement: Inventory by location
The system SHALL track stock by product variation and business location, including opening stock, adjustments, transfers, and purchase/sale effects.

#### Scenario: Sale reduces stock
- **WHEN** a stock-enabled product is sold from a location
- **THEN** the available stock for that product variation and location SHALL decrease accordingly
