<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campaigns')->insert([
            ['name' => 'Campanha 1'],
            ['name' => 'Campanha 2'],
            ['name' => 'Campanha 3'],
            ['name' => 'Campanha 4'],
            ['name' => 'Campanha 5'],
        ]);
    }
}
