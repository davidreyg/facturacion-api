<?php

namespace App\Http\Controllers;

use Response;
use App\Http\Utils\ApiResponser;

/**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   @SWG\Info(
 *     title="Laravel Generator APIs",
 *     version="1.0.0",
 *   )
 * )
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
class AppBaseController extends Controller
{
    use ApiResponser;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        //esta en las rutas principales
        // $this->middleware(['auth.jwt']);
    }
}
