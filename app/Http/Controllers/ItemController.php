<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\item;
use App\Models\StockCard;

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
        // dd($items);
        return inertia('Items/EditStockView', [
            'item' => $items
        ]);
    }
    public function storeEditStock(Request $request, $id)
    {
        $items = Item::findOrFail($id);
        $request->validate([
            'qty' => 'required|numeric|digits_between:1,6',
            'status' => 'required|in:in,out',
            'description' => 'required|min:5|string'
        ]);

        $dataStockCard = [
            'item_id' => $items->id,
            'qty' => $request->qty,
            'status' => $request->status,
            'description' => $request->description
        ];

        if ($request->status == 'in') {
            $newQty = $items->qty + $request->qty;
        } else if($request->status === 'out'){
            if ($request->qty > $items->qty) {
                return redirect()->route('item.index')->with('error','stock are not availible!! ');
            }
            $newQty = $items->qty - $request->qty;
        }

        $items->update(['qty' => $newQty]);
        StockCard::create($dataStockCard);
        return redirect()->route('item.index')->with('success', 'Stock Item update successfully');
    }
    public function stockcard($id)
    {
        $item = Item::findOrFail($id);
        $stockcards = StockCard::where('item_id', $id)->orderBy('created_at', 'desc')->get();
        return inertia('Items/StockCardView', [
            'items' => $stockcards,
            'item' => $item,
        ]);
    }
}
