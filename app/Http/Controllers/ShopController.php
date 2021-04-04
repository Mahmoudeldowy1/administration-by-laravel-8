<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = Shop::paginate(10);
        return view('admin.shop.index',['shops'=>$shops]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shop.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'name'     => 'required | min:5 | max:40',
            'email'    => 'email',
            'website'  => 'url',
            'logo'     =>'file | dimensions:min_width=100,min_height=100',
        ]);

        if (request('logo')){
            $data['logo'] = request('logo')->store('images');
        }


        Shop::create($data);

        session()->flash('shop-created-message','Shop with Name '.$data['name'] . ' was created');

        return redirect()->route('shops.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop = Shop::find($id);
        return view('admin.shop.edit',[
            'shop'=>$shop,
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
        $shop = Shop::find($id);

        $data = request()->validate([
            'name'     => 'required | min:5 | max:40',
            'email'    => 'email',
            'website'  => 'url',
            'logo'     =>'file | dimensions:min_width=100,min_height=100'
        ]);

        if (request('logo')){
            $data['logo'] = request('logo')->store('images');
        }

        $shop->update($data);

        session()->flash('shop-updated-message','Shop with Name '.$data['name'] . ' was updated');

        return redirect()->route('shops.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop = Shop::find($id);
        $shop->delete();
        session()->flash('shop-deleted-message','shop was Deleted');
        return redirect()->route('shops.index');
    }
}
