<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampaignGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campaign_group')->insert([
            ['campaign_id' => 1, 'group_id' => 1],
            ['campaign_id' => 1, 'group_id' => 2],
            ['campaign_id' => 1, 'group_id' => 5],

            ['campaign_id' => 2, 'group_id' => 3],
            ['campaign_id' => 2, 'group_id' => 4],
            ['campaign_id' => 2, 'group_id' => 1],

            ['campaign_id' => 3, 'group_id' => 3],
            ['campaign_id' => 3, 'group_id' => 2],

            ['campaign_id' => 4, 'group_id' => 4],
            ['campaign_id' => 4, 'group_id' => 2],

            ['campaign_id' => 5, 'group_id' => 5],
            ['campaign_id' => 5, 'group_id' => 1],
            ['campaign_id' => 5, 'group_id' => 3],
        ]);
    }
}
