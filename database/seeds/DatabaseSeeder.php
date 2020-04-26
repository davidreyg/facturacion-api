<?php

use App\Models\V1\Empleado;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TipoDocumentoTableSeeder::class);
        $this->call(EmpleadoSeeder::class);
        $this->call(UsersTableSeeder::class);
        
    }
}
