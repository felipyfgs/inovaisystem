## ADDED Requirements

### Requirement: Sanctum SPA authentication
The system SHALL authenticate first-party Nuxt users through Laravel Sanctum SPA cookies with CSRF protection.

#### Scenario: User logs in from Nuxt
- **WHEN** a valid user submits credentials from the Nuxt frontend
- **THEN** the backend SHALL establish an authenticated session using HTTP-only cookies

### Requirement: Nuxt Sanctum integration
The frontend SHALL use a Nuxt Sanctum integration to handle CSRF initialization, authenticated requests, and auth state.

#### Scenario: Authenticated API request
- **WHEN** an authenticated Nuxt page requests protected API data
- **THEN** the request SHALL include the session cookies and CSRF handling required by Sanctum

### Requirement: Role and permission enforcement
The backend SHALL use role and permission checks for protected actions using Spatie Permission and Laravel Policies.

#### Scenario: User lacks permission
- **WHEN** a user attempts an action without the required permission
- **THEN** the API SHALL reject the request with an authorization error

### Requirement: Permission-aware frontend navigation
The frontend SHALL hide or disable navigation/actions that the authenticated user is not authorized to use.

#### Scenario: User lacks product access
- **WHEN** a user without product permissions views the ERP sidebar
- **THEN** product management links SHALL not be presented as available actions
