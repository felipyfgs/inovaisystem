<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as BaseFormRequest;

/**
 * Base FormRequest for API endpoints.
 *
 * Concrete requests extend this class and override authorize()/rules() while
 * inheriting JSON error formatting through the global exception handler in
 * bootstrap/app.php.
 */
abstract class FormRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }
}
