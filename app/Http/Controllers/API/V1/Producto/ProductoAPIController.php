<?php

namespace App\Http\Controllers\API\V1\Producto;

use Response;
use App\Models\V1\Producto;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Controllers\AppBaseController;
use App\Repositories\V1\ProductoRepository;
use App\Http\Resources\API\V1\Producto\ProductoResource;
use App\Http\Resources\API\V1\Producto\ProductoCollection;
use App\Http\Requests\API\V1\Producto\CreateProductoAPIRequest;
use App\Http\Requests\API\V1\Producto\UpdateProductoAPIRequest;


/**
 * Class ProductoController
 * @package App\Http\Controllers\API\V1
 */

class ProductoAPIController extends AppBaseController
{
    /** @var  ProductoRepository */
    private $productoRepository;

    public function __construct(ProductoRepository $productoRepo)
    {
        $this->productoRepository = $productoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/productos",
     *      summary="Get a listing of the Productos.",
     *      tags={"Producto"},
     *      description="Get all Productos",
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
     *                  @SWG\Items(ref="#/definitions/Producto")
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
        $productos = QueryBuilder::for(Producto::class)
                ->allowedIncludes(['categoria'])
                ->get();

        return $this->showAll(new ProductoCollection($productos));
    }

    /**
     * @param CreateProductoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/productos",
     *      summary="Store a newly created Producto in storage",
     *      tags={"Producto"},
     *      description="Store Producto",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Producto that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Producto")
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
     *                  ref="#/definitions/Producto"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateProductoAPIRequest $request)
    {
        $input = $request->validated();

        $producto = $this->productoRepository->create($input);

        return $this->showOne(new ProductoResource($producto),201);
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/productos/{id}",
     *      summary="Display the specified Producto",
     *      tags={"Producto"},
     *      description="Get Producto",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Producto",
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
     *                  ref="#/definitions/Producto"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show(Producto $producto)
    {
        /** @var Producto $producto */
        return $this->showOne(new ProductoResource($producto),200);
    }

    /**
     * @param int $id
     * @param UpdateProductoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/productos/{id}",
     *      summary="Update the specified Producto in storage",
     *      tags={"Producto"},
     *      description="Update Producto",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Producto",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Producto that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Producto")
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
     *                  ref="#/definitions/Producto"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateProductoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Producto $producto */
        $producto = $this->productoRepository->find($id);

        if (empty($producto)) {
            return $this->sendError('Producto not found');
        }

        $producto = $this->productoRepository->update($input, $id);

        return $this->sendResponse($producto->toArray(), 'Producto updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/productos/{id}",
     *      summary="Remove the specified Producto from storage",
     *      tags={"Producto"},
     *      description="Delete Producto",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Producto",
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
    public function destroy($id)
    {
        /** @var Producto $producto */
        $producto = $this->productoRepository->find($id);

        if (empty($producto)) {
            return $this->sendError('Producto not found');
        }

        $producto->delete();

        return $this->sendSuccess('Producto deleted successfully');
    }
}
