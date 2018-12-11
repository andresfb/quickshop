<?php

use Illuminate\Database\Seeder;

class DiscountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('discounts')->insert([
            'min_quantity' => 5,
            'discount' => 0.10,
        ]);

        DB::table('discounts')->insert([
            'min_quantity' => 10,
            'discount' => 0.20,
        ]);

        DB::table('discounts')->insert([
            'min_quantity' => 15,
            'discount' => 0.25,
        ]);
    }
}
