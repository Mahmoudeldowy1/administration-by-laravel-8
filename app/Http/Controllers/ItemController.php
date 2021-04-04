<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Shop;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::paginate(10);
        return view('admin.item.index',['items'=>$items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shops = Shop::all();
        return view('admin.item.create',['shops'=>$shops]);

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
            'name'        => 'required | min:5 | max:40',
            'price'       => 'numeric',
            'shop_id'     => 'numeric',
            'description' => 'min:15 | max:100',
        ]);


        Item::create($data);

        session()->flash('item-created-message','item with Name '.$data['name'] . ' was created');

        return redirect()->route('items.index');
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
        $item = Item::find($id);
        return view('admin.item.edit',[
            'shops'=>$shops,
            'item'=>$item
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
        $item = Item::find($id);

        $data = request()->validate([
            'name'        => 'required | min:5 | max:40',
            'price'       => 'numeric',
            'shop_id'     => 'numeric',
            'description' => 'min:15 | max:100',

        ]);

        $item->name = $data['name'];
        $item->price = $data['price'];
        $item->shop_id = $data['shop_id'];
        $item->description = $data['description'];

        $item->save();

        session()->flash('item-updated-message','Item with Name '.$data['name'] . ' was Updated');

        return redirect()->route('items.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();
        session()->flash('item-deleted-message','Item was Deleted');
        return redirect()->route('items.index');
    }
}
