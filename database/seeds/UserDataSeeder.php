<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class UserDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //faker for fake data
    	$faker = Faker::create();
    	foreach (range(1,1000) as $index) {
    		DB::table('users')->insert([
    			'name' 					=> $faker->name,
    			'email' 			  	=> $faker->email,
    			'phone_number' 		  	=> $faker->e164PhoneNumber,
    			'is_activated'        	=> 1,
    			'activation_code'     	=> str_random(20), 
    			'password' 				=> bcrypt('secret'),
    			]);
    	}
    }
}
