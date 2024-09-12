<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function productIndex(){
        $products = product::all();
        return view('admin.products', compact('products'));
    }

    public function insertProductView(){
        return view('admin.insertproduct');
    }
    public function insertProduct(Request $req){
        // return "Product Has Been Inserted";
        $product = new product();

        $product->product_name = $req->pr_name;
        $product->product_desc = $req->pr_desc;
        $product->product_price = $req->pr_price;


        //Image Insert
        $file = $req->image;
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('uploads/product', $filename);
        $product->product_image = $filename;

        $product->save();
        return redirect()->back()->with('success', 'Product Inserted Successfully');

    }
}
