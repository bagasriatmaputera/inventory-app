<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item;

class ItemController extends Controller
{
    public function index(){
        $items = Item::all();
        return inertia('Items/Index',[
            'items' => $items
        ]);
    }

    public function add(){
        return inertia('Items/CreateItemView');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'qty' => 'required|numeric|digits_between:1,6',
            'unit' => 'required|string|max:100',
        ]);
        // dd($request->all());
        Item::create($request->all());
        return redirect()->route('item.index')->with('success','Item created successfully');
    }
}
