<?php

namespace App\Http\Resources\API\V1\TipoDocumento;

use App\Models\V1\TipoDocumento;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TipoDocumentoCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->collection->transform(function (TipoDocumento $tipoDocumento) {
            return (new TipoDocumentoResource($tipoDocumento));
        });
        return [
            'data' => $this->collection
        ];
    }
}
