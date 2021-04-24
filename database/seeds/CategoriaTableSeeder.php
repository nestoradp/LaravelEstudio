<?php

use Illuminate\Database\Seeder;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nombres=[
            'Alimentacion',
            'Transporte',
            'Internet',
            'Telefono',
            'Corriente',
            'Ropa',
            'Ocio',
            'Viajes',
            'Salud'


        ];

         foreach ($nombres as $nombre){
             $categoria =\App\Categoria::create(['nombre'=>$nombre]);




         }

    }
}
