<?php

namespace App\Http\Resources\API\V1\Empleado;

use App\Http\Resources\API\V1\TipoDocumento\TipoDocumentoResource;
use Illuminate\Http\Resources\Json\JsonResource;

class EmpleadoResource extends JsonResource
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
            'nombres' => $this->nombres,
            'apellidos' => $this->apellidos,
            'correo' => $this->correo,
            'telefono' => $this->telefono,
            'direccion' => $this->direccion,
            'numero_documento' => $this->numero_documento,
            'documento' => TipoDocumentoResource::make($this->tipo_documento),
			'tipo_documento_id' => $this->tipo_documento->id,
            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('api.empleados.show', $this->id)
                ]
            ]
        ];
    }
}
