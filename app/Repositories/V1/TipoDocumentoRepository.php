<?php

namespace App\Repositories\V1;

use App\Models\V1\TipoDocumento;
use App\Repositories\BaseRepository;

/**
 * Class TipoDocumentoRepository
 * @package App\Repositories\V1
 * @version April 18, 2020, 1:57 pm -05
*/

class TipoDocumentoRepository extends BaseRepository
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
        return TipoDocumento::class;
    }
}
