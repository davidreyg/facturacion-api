<?php

namespace App\Http\Utils;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

trait ApiResponser
{
    private function successResponse($data,$code)
    {
        return response()->json($data,$code);
    }
    protected function errorResponse($message,$code)
    {
        return response()->json(['error' => $message,'code' => $code],$code);
    }
    protected function showAll(ResourceCollection $coleccion,$code = 200)
    {
        return $this->successResponse($coleccion,$code);
    }

    protected function showOne(JsonResource $modelo,$code = 200)
    {
        return $this->successResponse($modelo,$code);
    }
}
