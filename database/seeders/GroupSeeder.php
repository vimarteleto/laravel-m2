<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            ['name' => 'Grupo 1', 'campaign_id' => 1],
            ['name' => 'Grupo 2', 'campaign_id' => 2],
            ['name' => 'Grupo 3', 'campaign_id' => 3],
            ['name' => 'Grupo 4', 'campaign_id' => 4],
            ['name' => 'Grupo 5', 'campaign_id' => 5],
            ['name' => 'Grupo 11', 'campaign_id' => 1],
            ['name' => 'Grupo 12', 'campaign_id' => 2],
            ['name' => 'Grupo 13', 'campaign_id' => 3],
            ['name' => 'Grupo 14', 'campaign_id' => 4],
            ['name' => 'Grupo 15', 'campaign_id' => 5],

            ['name' => 'Grupo 20', 'campaign_id' => null],
            ['name' => 'Grupo 21', 'campaign_id' => null],
        ]);
    }
}
