<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource as BaseJsonResource;

/**
 * Base API resource that disables the default "data" wrapping for single
 * resources. Collections are still wrapped via Laravel's ResourceCollection
 * and the AnonymousResourceCollection's automatic pagination meta.
 */
abstract class JsonResource extends BaseJsonResource
{
    public static $wrap = null;
}
