<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return inertia('Items/Index', [
            'items' => $items
        ]);
    }

    public function add()
    {
        return inertia('Items/CreateItemView');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'qty' => 'required|numeric|digits_between:1,6',
            'unit' => 'required|string|max:100',
        ]);
        // dd($request->all());
        Item::create($request->all());
        return redirect()->route('item.index')->with('success', 'Item created successfully');
    }

    public function editUnit($id)
    {
        $items = Item::findOrFail($id);
        return inertia('Items/EditUnitView', ['item' => $items]);
    }
    public function storeEditUnit(Request $request, $id)
    {
        $items = Item::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'unit' => 'required|string|max:100',
        ]);
        // dd($request->all());
        $items->update($request->all());
        return redirect()->route('item.index')->with('success', 'Item update successfully');
    }
    public function editStock($id)
    {
        $items = Item::findOrFail($id);
        return inertia('Items/EditStockView', ['item' => $items]);
    }
    public function storeEditStock(Request $request, $id)
    {
        $items = Item::findOrFail($id);
        $request->validate([
            'qty' => 'required|numeric|digits_between:1,6',
        ]);
        // dd($request->all());
        $items->update($request->all());
        return redirect()->route('item.index')->with('success', 'Stock Item update successfully');
    }
    public function stockcard($id) {}
}
