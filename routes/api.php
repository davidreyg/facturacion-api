<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1'], function () {
    Route::post('auth/login', 'V1\LoginAPIController@login');
    Route::post('auth/register', 'V1\LoginAPIController@register');
    
    Route::group(['middleware' => ['auth.jwt']], function () {
        Route::post('auth/logout', 'V1\LoginAPIController@logout');
        Route::get('auth/refresh', 'V1\LoginAPIController@refresh');
        Route::get('auth/user', 'V1\LoginAPIController@me');
        
        
        Route::apiResource('categorias', 'V1\Categoria\CategoriaAPIController');
        Route::apiResource('productos', 'V1\Producto\ProductoAPIController');
        Route::apiResource('empleados', 'V1\Empleado\EmpleadoAPIController');
        Route::apiResource('tipo_documentos', 'V1\TipoDocumento\TipoDocumentoAPIController');
    });
});