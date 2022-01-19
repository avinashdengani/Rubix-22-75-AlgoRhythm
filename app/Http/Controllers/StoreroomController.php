<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Storeroom;
use App\Models\Unit;
use Illuminate\Http\Request;

class StoreroomController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $units = Unit::all();

        $productsInStoreroom = Storeroom::where('user_id', auth()->user()->id)
                ->isPurchased()
                ->with('product')
                ->latest('updated_at')->get();
        return view('storeroom.index', compact(['categories', 'units', 'productsInStoreroom']));
    }
}
