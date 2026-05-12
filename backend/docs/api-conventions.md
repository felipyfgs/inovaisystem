# REST API conventions

This document describes the conventions every Inovai backend endpoint MUST
follow. Capability specs build on top of these rules.

## Routing

- All endpoints live in `routes/api.php` and are exposed under the `/api`
  prefix configured in `bootstrap/app.php`.
- Resource routes use plural, kebab-cased nouns (e.g. `/api/business-locations`).
- Action endpoints that are not pure CRUD use verbs after the resource path,
  e.g. `POST /api/sales/{sale}/cancel`.

## Controllers

- Concrete controllers extend `App\Http\Controllers\Api\ApiController`.
- Use Form Requests for validation (`App\Http\Requests\FormRequest` subclasses).
- Authorize through Policies registered against models, not inside controllers.
- Use Eloquent API Resources for output (`App\Http\Resources\JsonResource`).

## Pagination, filtering, sorting

- List endpoints accept the following query parameters:
  - `page` — page number (default `1`).
  - `per_page` — items per page (default `25`, clamped to `100`).
  - `sort` — sort key with optional leading `-` for descending order.
  - Resource-specific filter keys (e.g. `q`, `status`, `category_id`).
- Apply filters/sorting with `App\Support\Api\QueryOptions::apply()` to
  declare which keys are supported.
- Return paginated responses via `Resource::collection(...)->paginated()`
  to preserve Laravel's standard `data`/`links`/`meta` envelope.

## Response envelopes

- Single resource: the resource shape, **not** wrapped (handled by the base
  resource class).
- Collection: Laravel default envelope (`data`, `links`, `meta`).
- Created / updated: 200 or 201 with the resource shape.
- Deleted: 204 with empty body.
- Errors: JSON object with `message` and `errors` fields (handled globally
  for `ValidationException` and other API exceptions).

## Authorization

- Tenant-owned models MUST have a Policy that restricts access by the
  authenticated user's active `business_id`.
- Resource controllers MUST call `$this->authorize('action', $model)` (or
  use `authorizeResource`) for every action.

## Tenant isolation

- Every tenant-scoped query MUST filter by `business_id` either through a
  global scope on the model or an explicit query builder helper. Direct
  unscoped queries are forbidden outside dedicated admin/superadmin paths.
