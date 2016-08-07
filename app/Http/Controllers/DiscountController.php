<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Discount;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discount = Discount::all();
        $master_cars = ['Toyota', 'Honda', 'Nissan', 'BMW', 'Suzuki'];
        $first_data = $discount[0];
        $last_data = $discount[count($discount) - 1];
        $diskon_by_merk = [];

        $inserted_cars = [];

        for ($i = 0; $i < 100; $i++) { 
            if (!in_array($discount[$i]->merk, $inserted_cars)){
                $inserted_cars[] = $discount[$i]->merk;
            }

            // Daftar diskon tiap mobil
            $diskon_by_merk[$discount[$i]->merk][] = $discount[$i]->diskon;
        }

        $stat_by_merk = [];

        // Check diskon by merk
        foreach ($diskon_by_merk as $merk => $discounts) {
            $max_discount = 0;
            $total_discount = 0;
            

            foreach ($discounts as $discount) {

                // Set max discount by merk
                if ($discount > $max_discount) {
                    $max_discount = $discount;
                }

                // Total discount by merk
                $total_discount += $discount;
            }
            

            $max_disc_by_merk[$merk] = $max_discount;
            $stat_by_merk[$merk]['total_discount'] = $total_discount;
            $stat_by_merk[$merk]['avg_discount'] = $total_discount / count($discounts);
            $stat_by_merk[$merk]['total_car'] = count($discounts);
        }

        natcasesort($max_disc_by_merk);
        $max_disc_by_merk = array_reverse($max_disc_by_merk, true);
        // print_r($fruits);
        // print_r($max_disc_by_merk);
        // die();

        $max_car = 0;
        $max_merk = '';
        $first = true;
        foreach ($stat_by_merk as $merk => $stat) {
            if ($stat['total_car'] > $max_car){
                $max_car = $stat['total_car'];
                $max_merk = $merk;
            }

            if ($first) {
                $min_merk = $merk;
                $min_car = $stat['total_car'];
                $first = false;
            }

            if ($stat['total_car'] < $min_car){
                $min_car = $stat['total_car'];
                $min_merk = $merk;
            }
        }

        $not_inserted_merk = [];
        $not_inserted_merk = array_diff($master_cars, $inserted_cars);

        // print_r(asort($max_disc_by_merk));
        // print_r($stat_by_merk);
        // die();
        
        return view('discount.index', [
            'raw_data' => $diskon_by_merk,
            'first_data' => $first_data,
            'last_data' => $last_data,
            'discount_per_merk' => $stat_by_merk,
            'max_disc_per_merk' => $max_disc_by_merk,
            'max_car' => [
                'merk' => $max_merk,
                'total' => $max_car
            ],
            'min_car' => [
                'merk' => $min_merk,
                'total' => $min_car
            ],
            'not_inserted_merk' => $not_inserted_merk
        ]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
