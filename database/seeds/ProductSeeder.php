<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
 
        for($i = 1; $i <= 50; $i++)
        {
            DB::table('product')->insert([
                'id' => 'prd'.$faker->date($format = 'Ymd', $max = 'now').$i,
                'name' => 'product'.$i,
                'buying_price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 50000, $max = 100000),
                'selling_price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 100000, $max = 150000),
            ]);
        }
    }
}
