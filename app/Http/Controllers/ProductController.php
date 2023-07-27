<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index(){
        return view("Product.index",['products'=>Product::get()]);
    }
    public function create(){
        return view("Product.newProduct");
    }
    public function store(Request $request){
        $request->validate([
            'pr_name'=>'required',
            'pr_desc'=>'required',
            'pr_image'=>'required|mimes:jpeg,jpg,png|max:10000',
            'pr_price'=>'required'
        ]);
        $imageName=time().'.'.$request->pr_image->extension();;
        $request->pr_image->move(public_path('products'),$imageName);
        $product=new Product;
        $product->image=$imageName;
        $product->name=$request->pr_name;
        $product->description=$request->pr_desc;
        $product->price=$request->pr_price;
        $product->save();
        // echo "<script>alert('Your product is submitted')</script>";
        return back()->withSuccess('Product Created!!!!!');

    }
    public function edit($id){
        $product=Product::where('id',$id)->first();
        return view("Product.productUpdate",['productData'=>$product]);    
    }
    public function update(Request $request,$id){
        $request->validate([
            'pr_name'=>'required',
            'pr_desc'=>'required',
            'pr_image'=>'nullable|mimes:jpeg,jpg,png|max:10000',
            'pr_price'=>'required'
        ]);
        $product=Product::where('id',$id)->first();
        if(isset($request->image)){
            $imageName=time().'.'.$request->pr_image->extension();;
            $request->pr_image->move(public_path('products'),$imageName);
            $product->image=$imageName;
        }
        $product->name=$request->pr_name;
        $product->description=$request->pr_desc;
        $product->price=$request->pr_price;
        $product->save();
        // echo "<script>alert('Your product is submitted')</script>";
        return back()->withSuccess('Product Updated!!!!!');

    }
    public function delete($id){

        $product=Product::where('id',$id)->first();
        $product->delete();
        return back()->withDelete('Product Delete!!!!!');

    }
}
