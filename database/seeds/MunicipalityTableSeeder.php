<?php

use Illuminate\Database\Seeder;

class MunicipalityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('municipality')->insert([
          [
            'id' => 1,
            'name' => 'Bejuma',
            'state_id' => 7,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 2,
            'name' => 'Carlos Arvelo',
            'state_id' => 7,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 3,
            'name' => 'Diego Ibarra',
            'state_id' => 7,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 4,
            'name' => 'Guacara',
            'state_id' => 7,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 5,
            'name' => 'Juan Jose Mora',
            'state_id' => 7,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 6,
            'name' => 'Libertador',
            'state_id' => 7,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 7,
            'name' => 'Los Guayos',
            'state_id' => 7,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 8,
            'name' => 'Miranda',
            'state_id' => 7,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 9,
            'name' => 'Montalban',
            'state_id' => 7,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 10,
            'name' => 'Naguanagua',
            'state_id' => 7,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 11,
            'name' => 'Puerto Cabello',
            'state_id' => 7,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 12,
            'name' => 'San Diego',
            'state_id' => 7,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 13,
            'name' => 'San Joaquin',
            'state_id' => 7,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
          [
            'id' => 14,
            'name' => 'Valencia',
            'state_id' => 7,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
          ],
        ]);
    }
}
