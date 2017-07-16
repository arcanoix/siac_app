<?php

use Illuminate\Database\Seeder;

class ParishTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parish')->insert([
          [
            'id' => 1,
            'name' => 'Bejuma',
            'municipality_id' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 2,
            'name' => 'Canoabo',
            'municipality_id' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 3,
            'name' => 'Simón Bolívar',
            'municipality_id' => 1,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 4,
            'name' => 'Guigue',
            'municipality_id' => 2,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 5,
            'name' => 'Belen',
            'municipality_id' => 2,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 6,
            'name' => 'Tacarigua',
            'municipality_id' => 2,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 7,
            'name' => 'Mariara',
            'municipality_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 8,
            'name' => 'Aguas Calientes',
            'municipality_id' => 3,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 9,
            'name' => 'Ciudad Alianza',
            'municipality_id' => 4,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 10,
            'name' => 'Guacara',
            'municipality_id' => 4,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 11,
            'name' => 'Yagua',
            'municipality_id' => 4,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 12,
            'name' => 'Moron',
            'municipality_id' => 5,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 13,
            'name' => 'Urama',
            'municipality_id' => 5,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 14,
            'name' => 'Tocuyito',
            'municipality_id' => 6,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 15,
            'name' => 'Independencia',
            'municipality_id' => 6,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 16,
            'name' => 'Los Guayos',
            'municipality_id' => 7,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 17,
            'name' => 'Miranda',
            'municipality_id' => 8,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 18,
            'name' => 'Montalban',
            'municipality_id' => 9,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 19,
            'name' => 'Naguanagua',
            'municipality_id' => 10,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 20,
            'name' => 'Bartolome Salom',
            'municipality_id' => 11,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 21,
            'name' => 'Democracia',
            'municipality_id' => 11,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 22,
            'name' => 'Fraternidad',
            'municipality_id' => 11,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 23,
            'name' => 'Goaigoaza',
            'municipality_id' => 11,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 24,
            'name' => 'Juan Jose Flores',
            'municipality_id' => 11,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 25,
            'name' => 'Union',
            'municipality_id' => 11,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 26,
            'name' => 'Borburata',
            'municipality_id' => 11,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 27,
            'name' => 'Patanemos',
            'municipality_id' => 11,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 28,
            'name' => 'San Diego',
            'municipality_id' => 12,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 29,
            'name' => 'San Joaquin',
            'municipality_id' => 13,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 30,
            'name' => 'Candelaria',
            'municipality_id' => 14,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 31,
            'name' => 'Catedral',
            'municipality_id' => 14,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 32,
            'name' => 'El Socorro',
            'municipality_id' => 14,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 33,
            'name' => 'Miguel Peña',
            'municipality_id' => 14,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 34,
            'name' => 'Rafael Urdaneta',
            'municipality_id' => 14,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 35,
            'name' => 'San Blas',
            'municipality_id' => 14,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 36,
            'name' => 'San Jose',
            'municipality_id' => 14,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 37,
            'name' => 'Santa Rosa',
            'municipality_id' => 14,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 38,
            'name' => 'Negro Primero',
            'municipality_id' => 14,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
        ]);
    }
}
