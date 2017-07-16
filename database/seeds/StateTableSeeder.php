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
              'id' => 1,
              'name' => 'Estado Amazonas',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'id' => 2,
              'name' => 'Estado Anzoategui',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'id' => 3,
              'name' => 'Estado Apure',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'id' => 4,
              'name' => 'Estado Aragua',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'id' => 5,
              'name' => 'Estado Barinas',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'id' => 6,
              'name' => 'Estado Bolivar',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'id' => 7,
              'name' => 'Estado Carabobo',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'id' => 8,
              'name' => 'Estado Cojedes',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'id' => 9,
              'name' => 'Delta Amacuro',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'id' => 10,
              'name' => 'Estado Falcon',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'id' => 11,
              'name' => 'Estado Guarico',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'id' => 12,
                'name' => 'Estado Lara',
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'id' => 13,
              'name' => 'Estado Merida',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'id' => 14,
              'name' => 'Estado Miranda',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'id' => 15,
              'name' => 'Estado Monagas',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'id' => 16,
              'name' => 'Estado Nueva Esparta',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'id' => 17,
              'name' => 'Estado Portuguesa',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'id' => 18,
              'name' => 'Estado Sucre',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'id' => 19,
              'name' => 'Estado Tachira',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'id' => 20,
              'name' => 'Estado Trujillo',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'id' => 21,
              'name' => 'Estado Yaracuy',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'id' => 22,
              'name' => 'Estado Zulia',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'id' => 23,
              'name' => 'Dependencias Federales',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],
            [
              'id' => 24,
              'name' => 'Distrito Federal',
              'created_at' => date('Y-m-d H:m:s'),
              'updated_at' => date('Y-m-d H:m:s')
            ],


        ]);
    }
}
