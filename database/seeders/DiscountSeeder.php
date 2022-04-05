<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('discounts')->insert([
            ['name' => 'Desconto 1', 'percentage' => 10],
            ['name' => 'Desconto 2', 'percentage' => 20],
            ['name' => 'Desconto 3', 'percentage' => 30],
            ['name' => 'Desconto 4', 'percentage' => 40],
            ['name' => 'Desconto 5', 'percentage' => 50],
            ['name' => 'Desconto 6', 'percentage' => 60],
        ]);
    }
}
