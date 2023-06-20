<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index() {

        $items = Item::all();

        // dd($items);

        return inertia('Auth/Item/Index', ['items' => $items]);
    }

    public function create() {
        return inertia('Auth/Item/Create');
    }

    public function store(Request $request) {
        // dd($request);

        $fields = $request->validate([
            'name' => 'required',
            'description' => 'required|max:255',
            'price' => 'required|numeric',
            'qty' => 'required|numeric',
        ]);

        if($request->itemphoto) {
            $filename = time().'.'.$request->itemphoto->extension();
            $request->itemphoto->move(public_path('images/item_images'), $filename);
            $fields['itemphoto'] = $filename;
        }

        Item::create($fields);

        return redirect('/items');
    }

    public function show(Item $item) {
        return inertia('Auth/Item/View', ['item' => $item]);
    }

    public function search($searchKey) {
        return inertia('Auth/Item/Index', ['items' => Item::where('name', 'like', "%$searchKey%")->orWhere('description', 'like', "%$searchKey%")->get()]);
    }
}
