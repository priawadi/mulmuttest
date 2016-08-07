<?php

use Illuminate\Database\Seeder;

class DiskonKendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        
        $data = [];
        $cars = ['Toyota', 'Honda', 'Nissan', 'BMW', 'Suzuki'];

        for ($i=0; $i < 100; $i++) { 
            $data[] = [
                'merk' => $cars[mt_rand(0, 4)],
                'diskon' => mt_rand(10000000, 50000000)
            ];
        }

        DB::table('diskon')->insert($data);
    }
}
