<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SalesSeeder extends Seeder
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
            DB::table('sales')->insert([
                'id' => 'sls'.$faker->date($format = 'Ymd', $max = 'now').$i,
                'name' => $faker->name,
                'phone_number' => $faker->e164PhoneNumber,
            ]);
        }
    }
}
