<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use App\Customer;
use Yajra\Datatables\Datatables;

class CustomerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::all();
        return view('customer.index',compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.form', [
            'action' => 'customer/tambah',
            'method' => 'post',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:customer',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'age' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect('customer/tambah')
                        ->withErrors($validator)
                        ->withInput();
        }
                        
        $customer = new Customer;
        $customer->username = $request->input('username');
        $customer->password = $request->input('password');
        $customer->fullname = $request->input('fullname');
        $customer->phone = $request->input('phone');
        $customer->email = $request->input('email');
        $customer->pob = $request->input('pob');
        $customer->dob = $request->input('dob');
        $customer->age = $request->input('age');

        $customer->save();

        return redirect('customer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer.detail',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('customer.edit', [
            'action'    => 'customer/edit/' . $id,
            'method'    => 'patch',

            // Data
            'customer' => Customer::find($id),
        ]);
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
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:customer',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'age' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect('customer/tambah')
                        ->withErrors($validator)
                        ->withInput();
        }
                
        $customer = Customer::find($id);
        $customer->username = $request->input('username');
        $customer->password = $request->input('password');
        $customer->fullname = $request->input('fullname');
        $customer->phone = $request->input('phone');
        $customer->email = $request->input('email');
        $customer->pob = $request->input('pob');
        $customer->dob = $request->input('dob');
        $customer->age = $request->input('age');

        $customer->save();

        return redirect('customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::find($id)->delete();
        return redirect('customer');
    }

    public function anyData()
    {
        return Datatables::of(Customer::query())->make(true);
    }      
}
