<?php

namespace App\Http\Requests\API\V1\Producto;

use App\Models\V1\Producto;
use InfyOm\Generator\Request\APIRequest;

class CreateProductoAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Producto::$rules;
    }
}
