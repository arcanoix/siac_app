<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(StateTableSeeder::class);
         $this->call(MunicipalityTableSeeder::class);
         $this->call(ParishTableSeeder::class);
    }
}
