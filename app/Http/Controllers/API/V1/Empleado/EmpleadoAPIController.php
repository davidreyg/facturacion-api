<?php

namespace App\Http\Controllers\API\V1\Empleado;

use Response;
use App\Models\V1\Empleado;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Controllers\AppBaseController;
use App\Repositories\V1\EmpleadoRepository;
use App\Http\Requests\API\V1\CreateEmpleadoAPIRequest;
use App\Http\Requests\API\V1\UpdateEmpleadoAPIRequest;
use App\Http\Resources\API\V1\Empleado\EmpleadoCollection;
use App\Http\Resources\API\V1\Empleado\EmpleadoResource;

/**
 * Class EmpleadoController
 * @package App\Http\Controllers\API\V1
 */

class EmpleadoAPIController extends AppBaseController
{
    /** @var  EmpleadoRepository */
    private $empleadoRepository;

    public function __construct(EmpleadoRepository $empleadoRepo)
    {
        $this->empleadoRepository = $empleadoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/empleados",
     *      summary="Get a listing of the Empleados.",
     *      tags={"Empleado"},
     *      description="Get all Empleados",
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
     *                  @SWG\Items(ref="#/definitions/Empleado")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
		$empleados = QueryBuilder::for(Empleado::class)
                ->allowedIncludes(['tipo_documento'])
                ->get();

        return $this->showAll(new EmpleadoCollection($empleados));
    }

    /**
     * @param CreateEmpleadoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/empleados",
     *      summary="Store a newly created Empleado in storage",
     *      tags={"Empleado"},
     *      description="Store Empleado",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Empleado that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Empleado")
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
     *                  ref="#/definitions/Empleado"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateEmpleadoAPIRequest $request)
    {
        $input = $request->validated();

        $empleado = $this->empleadoRepository->create($input);

        return $this->showOne(new EmpleadoResource($empleado),201);
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/empleados/{id}",
     *      summary="Display the specified Empleado",
     *      tags={"Empleado"},
     *      description="Get Empleado",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Empleado",
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
     *                  ref="#/definitions/Empleado"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show(Empleado $empleado)
    {
        /** @var Empleado $empleado */
        return $this->showOne(new EmpleadoResource($empleado),200);
    }

    /**
     * @param int $id
     * @param UpdateEmpleadoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/empleados/{id}",
     *      summary="Update the specified Empleado in storage",
     *      tags={"Empleado"},
     *      description="Update Empleado",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Empleado",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Empleado that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Empleado")
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
     *                  ref="#/definitions/Empleado"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateEmpleadoAPIRequest $request)
    {
        $campos = $request->validated();

        $empleado = $this->empleadoRepository->update($campos, $id);

        return $this->showOne(new EmpleadoResource($empleado),200);
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/empleados/{id}",
     *      summary="Remove the specified Empleado from storage",
     *      tags={"Empleado"},
     *      description="Delete Empleado",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Empleado",
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
    public function destroy(Empleado $empleado)
    {
        /** @var Empleado $empleado */
        $empleado->delete();
        return $this->showOne(new EmpleadoResource($empleado),200);
    }
}
