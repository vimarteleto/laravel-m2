<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ['name' => 'Produto 1', 'price' => 100, 'campaign_id' => 1, 'discount_id' => 1],
            ['name' => 'Produto 2', 'price' => 200, 'campaign_id' => 2, 'discount_id' => 2],
            ['name' => 'Produto 3', 'price' => 300, 'campaign_id' => 3, 'discount_id' => 3],
            ['name' => 'Produto 4', 'price' => 400, 'campaign_id' => 4, 'discount_id' => 4],
            ['name' => 'Produto 5', 'price' => 500, 'campaign_id' => 5, 'discount_id' => 5],

            ['name' => 'Produto 11', 'price' => 500, 'campaign_id' => 1, 'discount_id' => 1],
            ['name' => 'Produto 12', 'price' => 500, 'campaign_id' => 2, 'discount_id' => 2],
            ['name' => 'Produto 13', 'price' => 500, 'campaign_id' => 3, 'discount_id' => 3],
            ['name' => 'Produto 14', 'price' => 500, 'campaign_id' => 4, 'discount_id' => 4],
            ['name' => 'Produto 15', 'price' => 500, 'campaign_id' => 5, 'discount_id' => 5],
        ]);
    }
}
