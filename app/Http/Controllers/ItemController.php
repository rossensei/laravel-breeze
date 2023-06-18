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
}
