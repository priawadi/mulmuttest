<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        $cust = [
        	[
        		'id' => 1,
        		'username' => 'priawadi',
        		'password' => 'pass',
        		'fullname' => 'Ozi Priawadi',
        		'phone' => '086256788',
        		'email' => 'jie@gmail.com',
        		'pob'	=> 'Manna',
        		'dob' => '1991-08-11',
        		'age' => '24',
        	],
        ];
        DB::table('customer')->insert($cust);
    }
}
