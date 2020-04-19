<?php

namespace App\Http\Controllers\API\V1\TipoDocumento;


use Response;
use Illuminate\Http\Request;
use App\Models\V1\TipoDocumento;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Controllers\AppBaseController;
use App\Repositories\V1\TipoDocumentoRepository;
use App\Http\Resources\API\V1\TipoDocumento\TipoDocumentoCollection;
use App\Http\Requests\API\V1\TipoDocumento\CreateTipoDocumentoAPIRequest;
use App\Http\Requests\API\V1\TipoDocumento\UpdateTipoDocumentoAPIRequest;
use App\Http\Resources\API\V1\TipoDocumento\TipoDocumentoResource;

/**
 * Class TipoDocumentoController
 * @package App\Http\Controllers\API\V1
 */

class TipoDocumentoAPIController extends AppBaseController
{
    /** @var  TipoDocumentoRepository */
    private $tipoDocumentoRepository;

    public function __construct(TipoDocumentoRepository $tipoDocumentoRepo)
    {
        $this->tipoDocumentoRepository = $tipoDocumentoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/tipoDocumentos",
     *      summary="Get a listing of the TipoDocumentos.",
     *      tags={"TipoDocumento"},
     *      description="Get all TipoDocumentos",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/TipoDocumento")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index()
    {
		$tipoDocumento = QueryBuilder::for(TipoDocumento::class)
                ->allowedIncludes(['tipo_documento'])
                ->get();

        return $this->showAll(new TipoDocumentoCollection($tipoDocumento));
    }

    /**
     * @param CreateTipoDocumentoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/tipoDocumentos",
     *      summary="Store a newly created TipoDocumento in storage",
     *      tags={"TipoDocumento"},
     *      description="Store TipoDocumento",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TipoDocumento that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TipoDocumento")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/TipoDocumento"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTipoDocumentoAPIRequest $request)
    {
        $input = $request->validated();

        $tipoDocumento = $this->tipoDocumentoRepository->create($input);

        return $this->showOne(new TipoDocumentoResource($tipoDocumento),201);
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/tipoDocumentos/{id}",
     *      summary="Display the specified TipoDocumento",
     *      tags={"TipoDocumento"},
     *      description="Get TipoDocumento",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TipoDocumento",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/TipoDocumento"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show(TipoDocumento $tipoDocumento)
    {
        /** @var TipoDocumento $tipoDocumento */
        return $this->showOne(new TipoDocumentoResource($tipoDocumento),200);
    }

    /**
     * @param int $id
     * @param UpdateTipoDocumentoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/tipoDocumentos/{id}",
     *      summary="Update the specified TipoDocumento in storage",
     *      tags={"TipoDocumento"},
     *      description="Update TipoDocumento",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TipoDocumento",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TipoDocumento that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TipoDocumento")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/TipoDocumento"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTipoDocumentoAPIRequest $request)
    {
        $campos = $request->validated();

        $tipoDocumento = $this->tipoDocumentoRepository->update($campos, $id);

        return $this->showOne(new TipoDocumentoResource($tipoDocumento),200);
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/tipoDocumentos/{id}",
     *      summary="Remove the specified TipoDocumento from storage",
     *      tags={"TipoDocumento"},
     *      description="Delete TipoDocumento",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TipoDocumento",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy(TipoDocumento $tipoDocumento)
    {
        /** @var TipoDocumento $tipoDocumento */
        $tipoDocumento->delete();
        return $this->showOne(new TipoDocumentoResource($tipoDocumento),200);
    }
}
