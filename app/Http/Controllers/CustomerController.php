<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Shop;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index()
    {
        $customers = Customer::paginate(10);
        return view('admin.customer.index',['customers'=>$customers]);
    }

    public function create()
    {
        $shops = Shop::all();
        return view('admin.customer.create',['shops'=>$shops]);
    }

    public function store()
    {
        $data = request()->validate([
            'firstName'    => 'required',
            'lastName'     => 'required',
            'shop_id'      => 'numeric',
            'email'        => 'email',
            'phone'      => 'numeric',
        ]);

        Customer::create($data);

        session()->flash('customer-created-message','Customer with Name '.$data['firstName'] . ' was created');

        return redirect()->route('customers.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shops = Shop::all();
        $customer = Customer::find($id);
        return view('admin.customer.edit',[
            'shops'=>$shops,
            'customer'=>$customer
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
        $customer = Customer::find($id);

        $data = request()->validate([
            'firstName'    => 'required',
            'lastName'     => 'required',
            'shop_id'      => 'numeric',
            'email'        => 'email',
            'phone'      => 'numeric',
        ]);

        $customer->firstName = $data['firstName'];
        $customer->lastName  = $data['lastName'];
        $customer->email     = $data['email'];
        $customer->shop_id   = $data['shop_id'];
        $customer->phone     = $data['phone'];

        $customer->save();

        session()->flash('customer-updated-message','Customer with Name '.$data['firstName'] . ' was Updated');

        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        session()->flash('customer-deleted-message','Customer was Deleted');
        return redirect()->route('customers.index');
    }
}
