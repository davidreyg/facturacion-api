<?php

namespace App\Http\Resources\API\V1\Producto;

use App\Models\V1\Producto;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductoCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->collection->transform(function (Producto $producto) {
            return (new ProductoResource($producto));
        });
        return [
            'data' => $this->collection
        ];
    }
}
