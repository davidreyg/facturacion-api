<?php

namespace App\Repositories\V1;

use App\Models\V1\Empleado;
use App\Repositories\BaseRepository;

/**
 * Class EmpleadoRepository
 * @package App\Repositories\V1
 * @version April 18, 2020, 2:30 pm -05
*/

class EmpleadoRepository extends BaseRepository
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
        return Empleado::class;
    }
}
