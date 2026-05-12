<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;

/**
 * Base controller for REST JSON endpoints.
 *
 * Concrete API controllers extend this class to inherit authorization and
 * validation helpers and a small set of JSON response conventions.
 */
abstract class ApiController extends Controller
{
    use AuthorizesRequests;
    use ValidatesRequests;

    /**
     * Standard JSON envelope for a single resource or arbitrary payload.
     */
    protected function ok(mixed $data = null, int $status = 200): JsonResponse
    {
        return response()->json($data, $status);
    }

    /**
     * Standard JSON envelope for created resources.
     */
    protected function created(mixed $data = null): JsonResponse
    {
        return $this->ok($data, 201);
    }

    /**
     * Standard JSON envelope for accepted but pending operations.
     */
    protected function accepted(mixed $data = null): JsonResponse
    {
        return $this->ok($data, 202);
    }

    /**
     * Empty success response, suitable for DELETE endpoints.
     */
    protected function noContent(): JsonResponse
    {
        return response()->json(null, 204);
    }
}
