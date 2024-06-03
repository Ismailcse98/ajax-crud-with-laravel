<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;

class ProductController extends Controller
{
    public function products() {
        $products = Product::latest()->paginate(2);
        return view('product-list', compact('products'));
    }

    public function addProduct(Request $request) {
        $request->validate([
            'name' => 'required|unique:products',
            'price' => 'required',
        ],[
            'name.required' => 'Name is required',
            'name.unique' => 'Product already exists',
            'price.required' => 'Price is required',
        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function updateProduct(Request $request) {
        $request->validate([
            'name' => 'required|unique:products,name,'.$request->id,
            'price' => 'required',
        ],[
            'name.required' => 'Name is required',
            'name.unique' => 'Product already exists',
            'price.required' => 'Price is required',
        ]);
        Product::where('id', $request->id)->update([
            'name' => $request->name,
            'price' => $request->price,
        ]);
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function deleteProduct(Request $request) {
        Product::find($request->id)->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function pagination(Request $request) {
        $products = Product::latest()->paginate(2);
        return view('pagination-product-list', compact('products'))->render();
    }

    public function searchProduct(Request $request) {
        $products = Product::where('name', 'like', '%'.$request->search_string.'%')
        ->orWhere('price','like', '%'.$request->search_string.'%')
        ->orderBy('id','desc')
        ->paginate(2);

        if($products->count() >= 1){
            return view('pagination-product-list', compact('products'))->render();
        }else{
            return response()->json([
                'status' => 'Data not found',
            ]);
        }
        
    }
}
