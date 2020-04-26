<?php

namespace App\Http\Controllers\API\V1\Categoria;

use App\Models\V1\Categoria;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Controllers\AppBaseController;
use App\Repositories\V1\CategoriaRepository;
use App\Http\Resources\API\V1\Categoria\CategoriaResource;
use App\Http\Resources\API\V1\Categoria\CategoriaCollection;
use App\Http\Requests\API\V1\Categoria\CreateCategoriaAPIRequest;
use App\Http\Requests\API\V1\Categoria\UpdateCategoriaAPIRequest;

/**
 * Class CategoriaController
 * @package App\Http\Controllers\API\V1
 */

class CategoriaAPIController extends AppBaseController
{
    /** @var  CategoriaRepository */
    private $categoriaRepository;

    public function __construct(CategoriaRepository $categoriaRepo)
    {
        dd(env('DATABASE_HOST'));
        $this->categoriaRepository = $categoriaRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/categorias",
     *      summary="Get a listing of the Categorias.",
     *      tags={"Categoria"},
     *      description="Get all Categorias",
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
     *                  @SWG\Items(ref="#/definitions/Categoria")
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
        $categorias = QueryBuilder::for(Categoria::class)
                ->allowedFields(['id', 'nombre','descripcion'])
                ->get();

        return $this->showAll(new CategoriaCollection($categorias));
    }

    /**
     * @param CreateCategoriaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/categorias",
     *      summary="Store a newly created Categoria in storage",
     *      tags={"Categoria"},
     *      description="Store Categoria",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Categoria that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Categoria")
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
     *                  ref="#/definitions/Categoria"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCategoriaAPIRequest $request)
    {
        $campos = $request->validated();

        $categoria = $this->categoriaRepository->create($campos);

        return $this->showOne(new CategoriaResource($categoria),201);
    }

    /**
     * @param Categoria $categoria
     * @return Response
     *
     * @SWG\Get(
     *      path="/categorias/{id}",
     *      summary="Display the specified Categoria",
     *      tags={"Categoria"},
     *      description="Get Categoria",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="categoria",
     *          description="id of Categoria",
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
     *                  ref="#/definitions/Categoria"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show(Categoria $categoria)
    {
        return $this->showOne(new CategoriaResource($categoria),200);
    }

    /**
     * @param int $id
     * @param UpdateCategoriaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/categorias/{id}",
     *      summary="Update the specified Categoria in storage",
     *      tags={"Categoria"},
     *      description="Update Categoria",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Categoria",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Categoria that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Categoria")
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
     *                  ref="#/definitions/Categoria"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCategoriaAPIRequest $request)
    {
        $campos = $request->validated();

        $categoria = $this->categoriaRepository->update($campos, $id);

        return $this->showOne(new CategoriaResource($categoria),200);
    }

    /**
     * @param Categoria $categoria
     * @return Response
     *
     * @SWG\Delete(
     *      path="/categorias/{categoria}",
     *      summary="Remove the specified Categoria from storage",
     *      tags={"Categoria"},
     *      description="Delete Categoria",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="categoria",
     *          description="categoria of Categoria",
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
    public function destroy(Categoria $categoria)
    {
        if ($categoria->productos()->count()) {
            return $this->errorResponse("Esta categoria tiene productos relacionados",403);
        }

        $categoria->delete();

        return $this->showOne(new CategoriaResource($categoria),200);
    }
}
