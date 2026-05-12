## 1. Platform Foundation

- [x] 1.1 Decide whether `backend/` will be API-only and remove/ignore unused Blade/Vite scaffolding accordingly
- [x] 1.2 Add Docker Compose services for PostgreSQL, backend, frontend, and optional Redis
- [x] 1.3 Configure Laravel environment for PostgreSQL
- [x] 1.4 Create `routes/api.php` and register API routing in Laravel 13
- [x] 1.5 Configure CORS, session, and cookie settings for Nuxt-to-Laravel local development
- [x] 1.6 Establish REST API response conventions with Resources, Form Requests, Policies, pagination, sorting, and filtering
- [x] 1.7 Add backend validation commands for tests, formatting, and static checks available in the project
- [ ] 1.8 Create Nuxt 4 frontend from the dashboard template in `frontend/`
- [ ] 1.9 Configure Nuxt runtime API base URL and local development scripts
- [ ] 1.10 Verify backend and frontend can run locally and communicate through a health/API endpoint

## 2. Authentication and Access Control

- [ ] 2.1 Install and configure Laravel Sanctum for SPA authentication
- [ ] 2.2 Install and configure the Nuxt Sanctum integration
- [ ] 2.3 Implement login, logout, current-user, and CSRF initialization endpoints
- [ ] 2.4 Implement frontend auth state and route protection
- [ ] 2.5 Install and configure Spatie Permission
- [ ] 2.6 Create base permissions and roles seeders
- [ ] 2.7 Implement Policies for tenant-owned resources
- [ ] 2.8 Make Nuxt navigation permission-aware
- [ ] 2.9 Add feature tests for login, logout, unauthorized access, and permission denial

## 3. Business Tenancy

- [ ] 3.1 Design PostgreSQL migrations for businesses and business locations based on the legacy `business` and `business_locations` concepts
- [ ] 3.2 Implement Business and BusinessLocation models, factories, seeders, and API resources
- [ ] 3.3 Implement active business and active location context resolution for authenticated users
- [ ] 3.4 Implement tenant query scopes or equivalent tenant-safe query helpers
- [ ] 3.5 Implement business and location CRUD APIs
- [ ] 3.6 Implement Nuxt business/location context UI
- [ ] 3.7 Add tenant isolation tests for cross-business access denial
- [ ] 3.8 Add seed data for demo business and location

## 4. Contacts Management

- [ ] 4.1 Design PostgreSQL migrations for contacts, contact groups, fiscal identity fields, and addresses
- [ ] 4.2 Implement Contact and CustomerGroup models, factories, seeders, and API resources
- [ ] 4.3 Implement contact list API with type, name, document, status, group, and pagination filters
- [ ] 4.4 Implement contact create/update/delete APIs with Form Request validation
- [ ] 4.5 Implement customer/supplier selection endpoints for sales and purchases
- [ ] 4.6 Build Nuxt contact listing page with server-side filters
- [ ] 4.7 Build Nuxt contact create/edit form with fiscal and address fields
- [ ] 4.8 Add tests for contact CRUD, filtering, validation, and tenant isolation

## 5. Catalog and Inventory

- [ ] 5.1 Design PostgreSQL migrations for categories, brands, units, products, variations, product locations, and price groups
- [ ] 5.2 Implement category, brand, unit, product, variation, and price group models/resources
- [ ] 5.3 Implement product fiscal fields needed by future fiscal document workflows
- [ ] 5.4 Implement product list API with filters for name, SKU, category, brand, status, and stock state
- [ ] 5.5 Implement product CRUD APIs with validation for single and variable products
- [ ] 5.6 Implement stock by location read model
- [ ] 5.7 Implement opening stock, stock adjustment, and stock transfer APIs
- [ ] 5.8 Build Nuxt product/catalog screens and reusable product selector
- [ ] 5.9 Build Nuxt inventory views for stock by location, adjustments, and transfers
- [ ] 5.10 Add tests for catalog CRUD, product fiscal fields, inventory movements, and tenant/location isolation

## 6. Sales and POS

- [ ] 6.1 Design PostgreSQL migrations for transactions, sale lines, payments, cash registers, returns, drafts, and quotations
- [ ] 6.2 Implement sale transaction models/resources/services with total calculation boundaries
- [ ] 6.3 Implement POS product search and price lookup endpoints
- [ ] 6.4 Implement sale creation API with lines, discounts, taxes, payments, and stock effects
- [ ] 6.5 Implement cash register open/close and payment summary APIs
- [ ] 6.6 Implement sale return APIs and inventory/payment reversal behavior
- [ ] 6.7 Build Nuxt POS screen with customer, product, cart, payment, and receipt sections
- [ ] 6.8 Build Nuxt sales list, detail, draft, quotation, and return screens
- [ ] 6.9 Add tests for sale creation, POS checkout, stock decrease, payment status, register closing, and returns

## 7. Purchasing and Finance

- [ ] 7.1 Design PostgreSQL migrations for purchases, purchase lines, purchase returns, accounts, account transactions, banks, expenses, and revenues
- [ ] 7.2 Implement purchase creation and receiving APIs with stock effects
- [ ] 7.3 Implement purchase return APIs with stock and payable adjustments
- [ ] 7.4 Implement account, bank, expense category, expense, and revenue models/resources
- [ ] 7.5 Implement payment-to-account transaction recording
- [ ] 7.6 Build Nuxt purchase, purchase return, account, bank, expense, and revenue screens
- [ ] 7.7 Add tests for purchase receiving, purchase returns, account transactions, expenses, revenues, and tenant isolation

## 8. Fiscal Compliance

- [ ] 8.1 Map legacy fiscal services and fields into a Laravel 13-compatible fiscal design
- [ ] 8.2 Decide and install fiscal libraries compatible with Laravel 13/PHP 8.3+
- [ ] 8.3 Design PostgreSQL migrations for fiscal configuration, certificates, operation natures, fiscal document metadata, boletos, and remessas
- [ ] 8.4 Implement secure private storage for certificates, XMLs, PDFs, boletos, remessas, and correction/cancellation files
- [ ] 8.5 Implement fiscal readiness validation for business, contact, product, and transaction data
- [ ] 8.6 Implement NF-e modeling and homologation-oriented emission service boundary
- [ ] 8.7 Implement NFC-e modeling and contingency service boundary
- [ ] 8.8 Implement CT-e and MDF-e modeling and service boundaries
- [ ] 8.9 Implement boleto and remessa modeling and generation boundary
- [ ] 8.10 Build Nuxt fiscal configuration and fiscal document status screens
- [ ] 8.11 Add tests for fiscal readiness validation, file authorization, and tenant isolation

## 9. Operational Settings

- [ ] 9.1 Design migrations for invoice layouts, invoice schemes, printers, barcodes, labels, notification templates, dashboard configuration, and localization settings
- [ ] 9.2 Implement invoice layout and scheme CRUD APIs
- [ ] 9.3 Implement printer, barcode, and label configuration APIs
- [ ] 9.4 Implement notification template CRUD APIs
- [ ] 9.5 Implement localization preferences for currency, timezone, date/time, language, and decimal precision
- [ ] 9.6 Build Nuxt settings screens for operational configuration
- [ ] 9.7 Add tests for settings CRUD and business/location scoping

## 10. E-commerce Public API

- [ ] 10.1 Design migrations for e-commerce customers, addresses, cart/order support, coupons, freight fields, and public catalog settings
- [ ] 10.2 Implement public catalog endpoints for categories, featured products, search, and product details
- [ ] 10.3 Implement e-commerce customer registration, login, profile, and address APIs
- [ ] 10.4 Implement cart, coupon, freight, order creation, and order status APIs
- [ ] 10.5 Implement payment initiation boundaries for PIX, card, and boleto
- [ ] 10.6 Add public API rate limiting and request validation
- [ ] 10.7 Add tests for catalog visibility, customer auth, cart/order flow, and payment initiation

## 11. Advanced Modules

- [ ] 11.1 Implement module enablement model and business-level module visibility rules
- [ ] 11.2 Map CRM tables, workflows, and Nuxt screens into a dedicated follow-up change if needed
- [ ] 11.3 Map Essentials/RH tables, workflows, and Nuxt screens into a dedicated follow-up change if needed
- [ ] 11.4 Map Manufacturing tables, workflows, and Nuxt screens into a dedicated follow-up change if needed
- [ ] 11.5 Map Repair tables, workflows, and Nuxt screens into a dedicated follow-up change if needed
- [ ] 11.6 Map Restaurant tables, workflows, and Nuxt screens into a dedicated follow-up change if needed
- [ ] 11.7 Map Superadmin/SaaS package and subscription workflows into a dedicated follow-up change if needed
- [ ] 11.8 Map WooCommerce sync settings, jobs, webhooks, and logs into a dedicated follow-up change if needed

## 12. Data Operations, Audit, and Notifications

- [ ] 12.1 Create development seeders for admin user, business, location, permissions, contacts, products, stock, and sample transactions
- [ ] 12.2 Create conceptual legacy-to-new mapping notes for tables and fields before any future import work
- [ ] 12.3 Implement import/export framework with row-level validation and error reporting
- [ ] 12.4 Implement media/document upload storage with tenant-aware access
- [ ] 12.5 Implement audit log integration for key domain events
- [ ] 12.6 Implement notification channels and queue boundaries for e-mail/SMS/database/broadcast as selected
- [ ] 12.7 Implement backup/update/maintenance health planning hooks
- [ ] 12.8 Add tests for imports, document access, audit events, and notification dispatch boundaries

## 13. Reporting and Analytics

- [ ] 13.1 Define dashboard metrics for sales, purchases, stock, finance, fiscal, and modules
- [ ] 13.2 Implement tenant-scoped dashboard metrics APIs
- [ ] 13.3 Implement sales, purchases, stock, tax, contacts, expense, register, commission, product, and account report APIs
- [ ] 13.4 Implement report export behavior with authorization and filters preserved
- [ ] 13.5 Build Nuxt dashboard and report screens
- [ ] 13.6 Add tests for report filters, tenant scoping, authorization, and exports

## 14. Validation and Hardening

- [ ] 14.1 Run backend formatting/tests after each implemented domain phase
- [ ] 14.2 Run frontend lint/typecheck after each implemented frontend phase
- [ ] 14.3 Add end-to-end manual validation scripts for login, CRUD, POS sale, payment, and report flows
- [ ] 14.4 Add security review checklist for tenant isolation, storage, cookies/CORS, payment webhooks, and public APIs
- [ ] 14.5 Update `TODO_IMPLEMENTACAO.md` as implementation phases are completed or split into smaller OpenSpec changes
