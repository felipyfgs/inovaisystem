## Context

The existing reference system at `.factory/stude/sistema` is a Laravel 8 monolith with MySQL, Blade/Dashmin screens, legacy route/controller patterns, fiscal services, payment integrations, e-commerce APIs, restaurant workflows, and optional modules. Its scale is large: hundreds of migrations, more than one hundred domain classes/entities, extensive web routes, and many views. The new project already has a Laravel 13 backend scaffold in `backend/`; the frontend will be a separate Nuxt 4 application.

The rewrite will use the legacy system as a domain map, not as code to copy directly. The architectural target is a clean API-first ERP platform with Laravel 13, PostgreSQL, Nuxt 4, Sanctum SPA cookies, Spatie Permission, REST JSON APIs, and explicit domain boundaries.

High-level target:

```text
┌───────────────────────┐
│ Nuxt 4 ERP Frontend   │
│ Nuxt UI dashboard     │
│ nuxt-auth-sanctum     │
└───────────┬───────────┘
            │ REST JSON + cookies/CSRF
┌───────────▼───────────┐
│ Laravel 13 API        │
│ Resources/Requests    │
│ Policies/Services     │
└───────────┬───────────┘
            │
┌───────────▼───────────┐
│ PostgreSQL            │
│ business_id tenancy   │
└───────────────────────┘
```

## Goals / Non-Goals

**Goals:**

- Recreate the legacy ERP capabilities as a modern, domain-phased Laravel 13 + Nuxt 4 platform.
- Preserve business concepts from the legacy system: business/company, locations, users, contacts, products, stock, sales/POS, purchases, finance, fiscal, e-commerce, restaurant, reports, and optional modules.
- Use `business_id` as the initial tenant boundary and enforce it consistently in queries, policies, resources, and APIs.
- Model fiscal and integration-heavy domains early enough to avoid schema rewrites, while implementing their operational flows after the core domains are stable.
- Use seeders/minimal fixtures for early validation instead of importing the legacy database at project start.
- Keep OpenSpec specs as the contract for phased implementation.

**Non-Goals:**

- Directly port legacy Blade/Dashmin screens.
- Preserve legacy route names, controller shapes, or MySQL-specific implementation details.
- Import the full legacy database in the first implementation phase.
- Implement all optional modules in the first delivery slice.
- Replace fiscal/legal validation with unverified approximations; fiscal flows require dedicated validation before production use.

## Decisions

### Laravel 13 API and Nuxt 4 as separate applications

Use separate backend and frontend applications rather than embedding Nuxt inside Laravel.

Alternatives considered:
- **Embed Nuxt in Laravel**: rejected because Nuxt/Nitro has its own runtime and routing model.
- **Keep Blade and modernize backend only**: rejected because the target UX is a new ERP dashboard.
- **Use Nuxt as full backend**: rejected because fiscal, tenancy, and ERP domain logic fit better in Laravel.

### PostgreSQL as the new database

Use PostgreSQL for the new schema and design migrations specifically for PostgreSQL instead of replaying the MySQL legacy migrations.

Alternatives considered:
- **MySQL compatibility migration**: easier from legacy, but preserves old assumptions.
- **SQLite**: unsuitable for this ERP/fiscal workload and already blocked locally by missing driver.

### `business_id` tenancy first

Retain the legacy-style `business_id` tenancy model initially. All tenant-owned records MUST include a `business_id` or derive tenant ownership through a parent relation.

Alternatives considered:
- **Schema per tenant**: stronger isolation but more complex migrations and reporting.
- **Database per tenant**: strongest isolation but high operational overhead.
- **No tenancy initially**: rejected because the legacy domain is already tenant-oriented.

### Sanctum SPA cookies for authentication

Use Laravel Sanctum SPA authentication with HTTP-only cookies and CSRF, integrated from Nuxt via a Sanctum Nuxt module.

Alternatives considered:
- **Bearer tokens in browser storage**: simpler but weaker against token leakage.
- **JWT custom implementation**: unnecessary complexity.
- **Passport/OAuth**: too heavy for first-party SPA auth.

### Spatie Permission for RBAC

Use Spatie Permission for roles/permissions, scoped by business where needed, and layer Laravel Policies over domain actions.

Alternatives considered:
- **Custom RBAC**: more maintenance for little benefit.
- **Only admin/user roles**: insufficient for the legacy ERP permissions model.

### REST JSON API conventions

Use conventional REST JSON endpoints with Resource classes, Form Requests, Policies, server-side pagination, filtering, sorting, and explicit action endpoints for workflows that are not simple CRUD.

Alternatives considered:
- **GraphQL**: flexible but adds complexity.
- **JSON:API formal spec**: consistent but heavier than needed.
- **Ad hoc endpoints only**: risks repeating legacy controller sprawl.

### Domain-phased implementation

Implement by domain phases while maintaining a full-system map:

```text
Foundation
  ↓
Business/Tenancy + Auth/RBAC
  ↓
Contacts + Catalog/Inventory
  ↓
Sales/POS + Purchasing/Finance
  ↓
Fiscal + Operational Settings
  ↓
E-commerce + Restaurant + Advanced Modules
  ↓
Reporting + Data Operations hardening
```

This avoids a big bang while keeping the target system complete.

### Legacy system as domain reference only

Legacy artifacts are used to understand requirements and edge cases. New code must be written with modern Laravel/Nuxt patterns.

Reference areas:
- `database/migrations` and module migrations for data shape.
- `app/Models` and `Modules/*/Entities` for relationships and business concepts.
- `app/Http/Controllers`, module controllers, and routes for workflows.
- `resources/views` and module views for screen inventory.
- `app/Services`, `app/Utils`, integrations, `public/xml_*`, `public/certificados`, and `public/boletos` for fiscal and file workflows.

## Risks / Trade-offs

- **[Risk] Scope explosion from recreating the full legacy suite** → Mitigation: keep full map, but implement and validate by domain phase.
- **[Risk] Tenant data leakage through missing `business_id` filters** → Mitigation: central tenant context, policies, query scopes, tests, and API assertions for tenant isolation.
- **[Risk] Fiscal flows are legally sensitive and hard to validate** → Mitigation: isolate fiscal services, model data early, implement after core transactions, and add dedicated homologation/testing workflows.
- **[Risk] MySQL-to-PostgreSQL differences alter semantics** → Mitigation: design new migrations explicitly, avoid blindly converting legacy migrations, and use seeders/tests to validate behavior.
- **[Risk] Payment webhooks may create duplicate or inconsistent payments** → Mitigation: define idempotency keys, gateway event logs, and transaction boundaries.
- **[Risk] Public file exposure of certificates/XMLs/boletos/uploads** → Mitigation: use private storage by default, signed downloads, tenant authorization, and explicit retention rules.
- **[Risk] Nuxt UI template is only a shell** → Mitigation: define reusable ERP components early: tables, forms, drawers, fiscal inputs, file upload, payment selectors, and report widgets.

## Migration Plan

1. Keep `.factory/stude/sistema` read-only as the reference implementation.
2. Build the new platform foundations: Docker/PostgreSQL, Laravel API, Nuxt frontend, auth, tenancy, RBAC, REST conventions, and seeders.
3. Implement core domains in dependency order: business/locations, users/roles, contacts, catalog/inventory.
4. Implement transaction domains: sales/POS, purchases, finance, payments, cash register.
5. Implement fiscal data and then fiscal operational flows: NF-e, NFC-e, CT-e, MDF-e, boletos, remessas, and document storage.
6. Add operational settings, imports/exports, notifications, audit logs, reports, and maintenance tooling.
7. Add optional/advanced modules: e-commerce, restaurant, CRM, RH/Essentials, manufacturing, repair, superadmin, WooCommerce.
8. Defer any real legacy data import until the new schema and workflows are stable; create a separate import plan if needed.

Rollback for early phases is simple because no production migration is assumed. Once production data exists, rollback must be handled through database backups, reversible migrations where possible, and feature flags for high-risk modules.

## Open Questions

- Should the backend be made strictly API-only by removing/ignoring Laravel Blade/Vite scaffolding?
- Should the first applied slice include sales/POS, or stop after catalog/inventory to reduce first implementation risk?
- Which fiscal libraries are compatible with Laravel 13/PHP 8.3+ and should replace/upgrade the legacy packages?
- Should advanced modules remain in one `advanced-modules` capability or split into individual OpenSpec changes later?
- What production deployment target should drive Docker and environment design?
