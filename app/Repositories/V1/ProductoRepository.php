<?php

namespace App\Repositories\V1;

use App\Models\V1\Producto;
use App\Repositories\BaseRepository;

/**
 * Class ProductoRepository
 * @package App\Repositories\V1
 * @version April 11, 2020, 11:37 am -05
*/

class ProductoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Producto::class;
    }
}
