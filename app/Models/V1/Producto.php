<?php

namespace App\Models\V1;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Producto",
 *      required={"nombre", "stock", "precio_compra", "precio_venta", "ganancia"},
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
 *          property="descripcion",
 *          description="descripcion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="stock",
 *          description="stock",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="precio_compra",
 *          description="precio_compra",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="precio_venta",
 *          description="precio_venta",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="ganancia",
 *          description="ganancia",
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
class Producto extends Model
{
    use SoftDeletes;
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'descripcion',
        'stock',
        'precio_compra',
        'precio_venta',
        'ganancia',
        'categoria_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'stock' => 'integer',
        'precio_compra' => 'integer',
        'precio_venta' => 'integer',
        'ganancia' => 'integer',
        'categoria_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'stock' => 'required',
        'precio_compra' => 'required',
        'precio_venta' => 'required',
        'ganancia' => 'required',
        'descripcion' => 'string|nullable|min:4|max:100',
        'categoria_id' => 'required|exists:categorias,id',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    
}
