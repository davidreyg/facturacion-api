<?php

namespace App\Models\V1;

use App\User;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Empleado",
 *      required={"nombres", "apellidos"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nombres",
 *          description="nombres",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="apellidos",
 *          description="apellidos",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="correo",
 *          description="correo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="telefono",
 *          description="telefono",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="direccion",
 *          description="direccion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="numero_documento",
 *          description="numero_documento",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class Empleado extends Model
{
    use SoftDeletes;   

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nombres',
        'apellidos',
        'correo',
        'telefono',
        'direccion',
        'numero_documento',
        'id_tipo_documento'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombres' => 'string',
        'apellidos' => 'string',
        'correo' => 'string',
        'telefono' => 'integer',
        'direccion' => 'string',
        'numero_documento' => 'integer',
        'id_tipo_documento' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombres' => 'required',
        'apellidos' => 'required',
        'correo' => 'nullable',
        'telefono' => 'nullable',
        'direccion' => 'nullable',
        'numero_documento' => 'required',
        'id_tipo_documento' => 'required'
    ];

    public function tipo_documento()
    {
        return $this->belongsTo(TipoDocumento::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
