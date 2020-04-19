<?php

namespace App\Http\Resources\API\V1\Empleado;

use App\Models\V1\Empleado;
use Illuminate\Http\Resources\Json\ResourceCollection;

class EmpleadoCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->collection->transform(function (Empleado $empleado) {
            return (new EmpleadoResource($empleado));
        });
        return [
            'data' => $this->collection
        ];
    }
}
