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

    public function add(Request $request){
        return inertia('Items/CreateItemView');
    }
}
