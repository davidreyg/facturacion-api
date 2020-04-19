<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\V1\TipoDocumento;
use Faker\Generator as Faker;

$factory->define(TipoDocumento::class, function (Faker $faker) {
    return [
        'nombre' => 'DNI',
        'tamaño' => 8,
    ];
});
