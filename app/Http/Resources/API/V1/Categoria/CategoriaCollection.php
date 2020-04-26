<?php

namespace App\Http\Resources\API\V1\Categoria;

use App\Models\V1\Categoria;
use App\Http\Resources\API\V1\Categoria\CategoriaResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoriaCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->collection->transform(function (Categoria $categoria) {
            return (new CategoriaResource($categoria));
        });
        return [
            'data' => $this->collection
        ];
    }
}
