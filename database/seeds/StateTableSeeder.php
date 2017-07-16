<?php

use Illuminate\Database\Seeder;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('state')->insert([
            [
              'name' => 'Estado Amazonas',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'name' => 'Estado Anzoategui',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'name' => 'Estado Apure',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'name' => 'Estado Aragua',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'name' => 'Estado Barinas',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'name' => 'Estado Bolivar',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'name' => 'Estado Carabobo',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'name' => 'Estado Cojedes',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'name' => 'Delta Amacuro',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'name' => 'Estado Falcon',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'name' => 'Estado Guarico',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
                'name' => 'Estado Lara',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'name' => 'Estado Merida',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'name' => 'Estado Miranda',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'name' => 'Estado Monagas',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'name' => 'Estado Nueva Esparta',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'name' => 'Estado Portuguesa',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'name' => 'Estado Sucre',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'name' => 'Estado Tachira',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'name' => 'Estado Trujillo',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'name' => 'Estado Yaracuy',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'name' => 'Estado Zulia',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'name' => 'Dependencias Federales',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'name' => 'Distrito Federal',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],


        ]);
    }
}
