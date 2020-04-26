<?php

namespace App\Models\V1;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="TipoDocumento",
 *      required={"nombre", "tamaño"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nombre",
 *          description="nombre",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tabla",
 *          description="tabla",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tamaño",
 *          description="tamaño",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class TipoDocumento extends Model
{
    use SoftDeletes;

    public $table = 'tipo_documentos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'tabla',
        'tamaño'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'tabla' => 'string',
        'tamaño' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|string',
        'tabla' => 'string|nullable',
        'tamaño' => 'required|numeric'
    ];

    public function empleados()
    {
        return $this->hasMany(Empleado::class);
    }
}
