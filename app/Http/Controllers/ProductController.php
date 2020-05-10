<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {

        $product = Product::paginate(10);
    	return view('product/product',['product' => $product]);
    }

    public function new()
    {
 
    	return view('product/addproduct');
    }

    public function add(Request $request)
    {
        DB::table('product')->insert([
            'id' => $request->id,
            'name' => $request->name,
            'buying_price' => $request->buying_price,
            'selling_price' => $request->selling_price,
        ]);
        return redirect('product');
    
    }

    public function edit($id)
    {
        $product = DB::table('product')->where('id',$id)->get();
        return view('product/editproduct',['product' => $product]);
    
    }

    public function update(Request $request)
    {
        DB::table('product')->where('id',$request->id)->update([
            'name' => $request->name,
            'buying_price' => $request->buying_price,
            'selling_price' => $request->selling_price,
        ]);
        return redirect('product');
    }

    public function delete($id)
    {
        DB::table('product')->where('id',$id)->delete();
        return redirect('product');
    }

    public function search(Request $request)
	{
		$search = $request->search;
 
		$product = DB::table('product')
		->where('name','like',"%".$search."%")
		->paginate();
 
		return view('product/product',['product' => $product]);
 
	}
}
