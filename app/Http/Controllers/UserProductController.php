<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Unit;
use App\Models\Storeroom;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UserProductController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $rules = [
            'product_id' => 'required|exists:products,id',
            'category_id' => 'required|exists:categories,id',
            'quantity' => 'required|numeric',
            'unit_id' => 'required|exists:units,id'
        ];
        $this->validate($request, $rules);

        $productExist = Storeroom::where('user_id', auth()->user()->id)->where('product_id' ,$request->product_id)->exists();
        if(!$productExist){
            Storeroom::create([
                'user_id' => auth()->user()->id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'unit_id' => $request->unit_id
            ]);
            return true;
        }

        return false;
    }

    public function update(Request $request, User $user, Product $product)
    {
        $rules = [
            'quantity' => 'required|numeric',
            'unit_id' => 'required|exists:units,id'
        ];
        $this->validate($request, $rules);

        $storedProduct = Storeroom::where('product_id', $product->id)->where('user_id', auth()->user()->id)->first();

        $storedProduct->update([
            'quantity' => $request->quantity,
            'unit_id' => $request->unit_id
        ]);

        session()->flash('success', 'Product Updated Successfully');
        return redirect()->back();
    }
    public function grocery()
    {
        $categories = Category::all();
        $groceryList = $this->getProductsForUserInGroceryList();
        $units = Unit::all();
        return view('grocery.index', compact(['categories', 'groceryList', 'units']));
    }

    public function getGroceryList(Request $request): JsonResponse
    {
        $products = $this->getProductsForUserInGroceryList();
        $data = [];
        $data['products'] = $products;
        return JsonResponse::fromJsonString(json_encode($data));
    }

    private function getProductsForUserInGroceryList()
    {
        $products = Storeroom::where('user_id', auth()->user()->id)->where('isPurchased', 0)->latest('updated_at')->with('product', 'unit')->get();
        return $products;
    }

    public function destroy(User $user, Product $product)
    {
        $storeroomProduct = Storeroom::where('user_id', $user->id)
                                ->where('product_id', $product->id)
                                ->where('isPurchased', 0)
                                ->where('isConsumed', 0)
                                ->first();

        $storeroomProduct->delete();

    }
}
