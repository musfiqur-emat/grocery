<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Items;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	$items = Items::orderBy('id','desc')->paginate(20);
        return view('developer.items.index', compact('items'));
    }

    public function itemSearch($data)
    {
        
        $price = explode('&', $data)[0];       
        $aisle= explode('&', $data)[1];

        $items=Items::when($price!="0", function ($query) use($price) {
                return $query->where('price', '<=' ,$price);
            })
           ->when($aisle!="0", function ($query) use($aisle) {
                return $query->where('aisle', $aisle);
            })
           ->paginate(20);

        return view('developer.items.search', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('developer.items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
        $item = new Items();
        $item->fill($request->all());
        $item->save();

        return redirect('items');
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
        $item = Items::find($id);
        return view('developer.items.edit', compact('item'));
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
        $item = Items::find($id);
        $item->fill($request->all());
        $item->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=Items::find($id)->delete();
        if($delete){
            return response()->json([
                "success"=>true
            ]);
        }else{
            return response()->json([
                "success"=>false
            ]);
        }
        
     
    }
}
