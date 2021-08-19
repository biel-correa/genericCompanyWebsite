<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function getProducts(){
        $products = Products::all();
        return view('content.products', ['products'=>$products]);
    }

    public function addProduct(){
        return view('content.product.addProduct');
    }

    public function delete(int $id){
        Products::find($id)->delete($id);
        return redirect()->route('products');
    }

    public function saveNewProduct(Request $request){
        $validated = $request->validate([
            'name'=>['required', 'max:100'],
            'description'=>['max:1000']
        ]);
        if ($validated) {
            Products::create([
                'name'=>$request->input('name'),
                'description'=>$request->input('description')
            ]);
            return redirect()->route('products');
        }else{
            return redirect()->route('content.product.addProduct')->withErrors($validated);
        }
    }
}
