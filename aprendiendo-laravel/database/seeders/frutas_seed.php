<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class frutas_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Aca vamos a insertar 20
        for($i = 0; $i <= 20; $i++) {
            DB::table('frutas')->insert(array(
                'nombre' => 'Cereza ' .$i,
                'descripcion' => 'Descripcion de la fruta ' .$i,
                'precio' => $i,
                'fecha' => date('Y-m-d')
            ));
        }

        // Cuando se termine de ejecutar el insert enviamos un mensaje por consola
        $this->command->info('La tabla de frutas ha sido rellenada');
    }
}
