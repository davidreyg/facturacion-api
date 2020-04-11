<?php

namespace App\Http\Resources\V1\Categoria;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoriaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('api.categorias.show', $this->id)
                ],
                // [
                //     'rel' => 'categoria.productos',
                //     'href' => route('categorias.productos.index', $this->id)
                // ]
            ]
        ];
    }
}
