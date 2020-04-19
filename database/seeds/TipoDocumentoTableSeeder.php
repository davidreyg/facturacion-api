<?php

use App\Models\V1\TipoDocumento;
use Illuminate\Database\Seeder;

class TipoDocumentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TipoDocumento::class, 1)->create();
    }
}
