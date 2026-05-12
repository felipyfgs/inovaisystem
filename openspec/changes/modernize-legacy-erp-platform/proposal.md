## Why

The legacy ERP/POS system is a large Laravel 8 + MySQL + Blade application with hundreds of migrations, controllers, views, fiscal integrations, and optional modules; it is too coupled to modernize safely by copying code directly.
This change establishes a Laravel 13 + PostgreSQL + Nuxt 4 rewrite guided by the legacy domain model, with implementation split by domain so the full system can be mapped without a risky big-bang delivery.

## What Changes

- Introduce a new API-first backend in Laravel 13 using PostgreSQL, REST JSON APIs, Laravel Resources, Form Requests, Policies, Sanctum SPA authentication, and Spatie Permission.
- Introduce a new Nuxt 4 ERP frontend based on the Nuxt UI dashboard template, replacing the legacy Blade/Dashmin UI instead of porting views directly.
- Preserve the legacy multitenant model using `business_id` as the initial tenant boundary, with strict scopes/policies to prevent cross-business data access.
- Use the legacy system as domain reference only; initial data will come from seeders/minimal fixtures, not a full legacy database import.
- Model fiscal, payment, e-commerce, restaurant, and advanced module concerns early, while implementing them in controlled phases after foundational domains are stable.
- Create OpenSpec capability contracts for the main ERP domains so implementation can proceed incrementally via `/opsx:apply`.
- **BREAKING**: The new system will not be source-compatible with the Laravel 8 app, legacy Blade screens, legacy route names, or direct MySQL schema assumptions.

## Capabilities

### New Capabilities

- `platform-foundation`: Laravel 13 backend, Nuxt 4 frontend, PostgreSQL, Docker/local services, REST API conventions, validation, and quality gates.
- `auth-access-control`: Sanctum SPA authentication, Nuxt Sanctum integration, Spatie Permission roles/permissions, and authorization policies.
- `business-tenancy`: Business/company tenancy, business locations, active business/location context, and `business_id` isolation.
- `contacts-management`: Customers, suppliers, contact groups, fiscal identity fields, addresses, and contact CRUD/listing behavior.
- `catalog-inventory`: Products, categories, brands, units, variations, pricing, fiscal product fields, stock by location, adjustments, and transfers.
- `sales-pos`: Sales transactions, POS flow, sale lines, payments, cash registers, returns, quotations/drafts, and receipt/printing concerns.
- `purchasing-finance`: Purchases, purchase lines, purchase returns, accounts, account transactions, banks, expenses, revenues, and financial reports.
- `fiscal-compliance`: Brazilian fiscal configuration, certificates, NF-e, NFC-e, CT-e, MDF-e, inutilização, contingência, XML/PDF storage, boletos, and remessas.
- `operational-settings`: Invoice layouts/schemes, printers, barcodes, labels, notification templates, dashboard configuration, localization, and system settings.
- `ecommerce-public-api`: Public/e-commerce API, catalog, cart, customer portal, orders, coupons, freight, and payment initiation.
- `advanced-modules`: CRM, Essentials/RH, Manufacturing, Repair, Product Catalogue, Superadmin/SaaS packages, WooCommerce sync, and Restaurant module boundaries.
- `data-operations`: Seeders, conceptual legacy-to-new mapping, imports/exports, media/documents, backups, updates, install/maintenance, audit logs, and notifications.
- `reporting-analytics`: Dashboard metrics and operational reports for sales, purchases, inventory, finance, fiscal, contacts, commissions, and modules.

### Modified Capabilities

- None. There are no existing OpenSpec capabilities yet.

## Impact

- Affected systems: `backend/` Laravel 13 app, future `frontend/` Nuxt 4 app, PostgreSQL database, Docker/local development setup, and OpenSpec project artifacts.
- Legacy reference system: `.factory/stude/sistema` remains read-only input for domain analysis, including its Laravel 8 models, migrations, controllers, views, modules, fiscal services, integrations, and assets.
- Dependencies likely to be introduced or evaluated: Laravel Sanctum, Spatie Permission, Nuxt UI, Nuxt Sanctum module, PostgreSQL driver, fiscal libraries compatible with Laravel 13/PHP 8.3+, payment SDKs, storage/backup tooling, and import/export tooling.
- Security-sensitive areas: tenant isolation by `business_id`, Sanctum cookie/CORS configuration, digital certificates, fiscal XML/PDF storage, public API rate limiting, payment webhooks, and file/media access control.
