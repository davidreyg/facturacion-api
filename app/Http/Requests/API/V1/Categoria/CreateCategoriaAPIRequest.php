<?php

namespace App\Http\Requests\API\V1\Categoria;

use App\Models\V1\Categoria;
use InfyOm\Generator\Request\APIRequest;

class CreateCategoriaAPIRequest extends APIRequest
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
        return Categoria::$rules;
    }
}
