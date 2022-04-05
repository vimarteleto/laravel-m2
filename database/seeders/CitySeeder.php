<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            ['name' => 'Cidade 1', 'group_id' => 1],
            ['name' => 'Cidade 2', 'group_id' => 2],
            ['name' => 'Cidade 3', 'group_id' => 3],
            ['name' => 'Cidade 4', 'group_id' => 4],
            ['name' => 'Cidade 5', 'group_id' => 5],
            ['name' => 'Cidade 11', 'group_id' => 1],
            ['name' => 'Cidade 12', 'group_id' => 2],
            ['name' => 'Cidade 13', 'group_id' => 3],
            ['name' => 'Cidade 14', 'group_id' => 4],
            ['name' => 'Cidade 15', 'group_id' => 5],
            ['name' => 'Cidade 20', 'group_id' => 10],
            ['name' => 'Cidade 21', 'group_id' => 11],
        ]);
    }
}
