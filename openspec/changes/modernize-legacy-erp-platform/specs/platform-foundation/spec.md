## ADDED Requirements

### Requirement: Separate Laravel API and Nuxt frontend
The system SHALL run the Laravel backend and Nuxt frontend as separate applications with independent development and production build processes.

#### Scenario: Frontend calls backend API
- **WHEN** the Nuxt frontend needs ERP data
- **THEN** it SHALL call the Laravel REST JSON API using the configured API base URL

### Requirement: PostgreSQL-backed persistence
The backend SHALL use PostgreSQL as the primary relational database for the new system.

#### Scenario: Application starts with database configured
- **WHEN** the backend boots in local development
- **THEN** it SHALL connect to PostgreSQL using environment configuration

### Requirement: REST API conventions
The backend SHALL expose JSON APIs using Laravel Resources, Form Requests, Policies, pagination, sorting, and server-side filters.

#### Scenario: Listing an entity collection
- **WHEN** a user requests a list endpoint with pagination and filters
- **THEN** the API SHALL return validated, authorized, paginated JSON data

### Requirement: Validation gates
The project SHALL provide backend and frontend validation commands for formatting, tests, linting, and type checking where applicable.

#### Scenario: Developer completes a change
- **WHEN** implementation work changes application code
- **THEN** the relevant validators SHALL pass before the work is considered complete
