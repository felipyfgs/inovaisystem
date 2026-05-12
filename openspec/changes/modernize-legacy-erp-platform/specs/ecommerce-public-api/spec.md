## ADDED Requirements

### Requirement: Public catalog API
The system SHALL expose controlled public/e-commerce APIs for product catalog, categories, featured products, search, and product details.

#### Scenario: Public catalog requested
- **WHEN** a public client requests featured products
- **THEN** the API SHALL return only products enabled for e-commerce visibility

### Requirement: E-commerce customer portal
The system SHALL support e-commerce customer registration, login, profile updates, password changes, and saved addresses.

#### Scenario: Customer logs in
- **WHEN** an e-commerce customer submits valid credentials
- **THEN** the system SHALL authenticate the customer for portal/cart operations

### Requirement: Cart and order flow
The system SHALL support cart items, discounts/coupons, freight calculation, order creation, and order status retrieval.

#### Scenario: Customer submits cart
- **WHEN** a customer submits a valid cart for checkout
- **THEN** the system SHALL create an e-commerce order associated with the customer and business

### Requirement: E-commerce payment initiation
The system SHALL support initiation of configured e-commerce payment methods such as PIX, card, and boleto.

#### Scenario: Customer selects PIX
- **WHEN** a customer chooses PIX for an eligible order
- **THEN** the system SHALL create payment initiation data and expose status retrieval for the order
