<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SalesOutletSeeder extends Seeder
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
            DB::table('sales_outlet')->insert([
                'id' => 'slsotl'.$faker->date($format = 'Ymd', $max = 'now').$i,
                'address' => $faker->city,
                'phone_number' => $faker->e164PhoneNumber,
            ]);
        }
    }
}
