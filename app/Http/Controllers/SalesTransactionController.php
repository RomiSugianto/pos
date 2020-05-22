<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\SalesTransaction;
use App\PatmenMethod;
use App\Product;

class SalesTransactionController extends Controller
{
    public function index()
    {

        $salestransaction = SalesTransaction::paginate(10);
    	return view('salestransaction/salestransaction',['salestransaction' => $salestransaction]);
    }

    public function new()
    {
        if ( session ('sales_id') == null ) 
        {
            return redirect('welcome');
        }
        $product = Product::all();
    	return view('salestransaction/addsalestransaction',['product' => $product]);
    }

    public function add(Request $request)
    {
        DB::table('sales_transaction')->insert([
            'id' => $request->id,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
        ]);
        return redirect('salestransaction');
    
    }

    public function edit($id)
    {
        $salestransaction = DB::table('sales_transaction')->where('id',$id)->get();
        return view('salestransaction/editsalestransaction',['salestransaction' => $salestransaction]);
    
    }

    public function update(Request $request)
    {
        DB::table('sales_transaction')->where('id',$request->id)->update([
            'address' => $request->address,
            'phone_number' => $request->phone_number,
        ]);
        return redirect('salestransaction');
    }

    public function delete($id)
    {
        DB::table('sales_transaction')->where('id',$id)->delete();
        return redirect('salestransaction');
    }

    public function search(Request $request)
	{
		$search = $request->search;
 
		$salestransaction = DB::table('sales_transaction')
		->where('name','like',"%".$search."%")
		->paginate();
 
		return view('salestransaction/salestransaction',['salestransaction' => $salestransaction]);
 
    }

    public function testadd(Request $request)
	{

        $salestransaction = new SalesTransaction;
        $salestransaction->id = $this->getNextOrderNumber();
        $salestransaction->sales_id = session('sales_id');
        $salestransaction->sales_outlet_id = 'slsotl197205139';

        $list_product = $request->product;
        $list_qty = $request->qty;
        $len_list_product = count($list_product);
        $len_list_qty = count($list_qty);

        if ($len_list_product != $len_list_qty) {
            return 'data cannot be proccesed';
        }
        $total_selling_price = 0;
        $total_buying_price = 0;
        for ($i=0; $i < $len_list_product; $i++) { 
            $product = Product::where('id', [$list_product[$i]])->get();
            $selling_price = $product->first()->selling_price;
            $buying_price = $product->first()->buying_price;
            $qty = $list_qty[$i];
            $total_selling_price_per_row = $selling_price * $qty;
            $total_buying_price_per_row = $buying_price * $qty;
            $total_selling_price = $total_selling_price + $total_selling_price_per_row;
            $total_buying_price = $total_buying_price + $total_buying_price_per_row;
        }
        $salestransaction->total_selling_price = $total_selling_price;
        $salestransaction->total_buying_price = $total_buying_price;
        $salestransaction->save();

        for ($i=0; $i < $len_list_product; $i++) { 
            $product = Product::where('id', [$list_product[$i]])->get();
            $salestransaction->product()->attach($product,['quantity'=>$list_qty[$i]]);
        }

        return $this->getNextOrderNumber();
 
    }
    
    public function getNextOrderNumber()
    {
        $lastTransaction = SalesTransaction::orderBy('created_at', 'desc')->first();

        if ( ! $lastTransaction ) 
        {
            $number = 0;
        } else {
            // SLSTRNSTN202005220001
            $lastDate = substr($lastTransaction->id, 9,8);
            $nowDate = date("Ymd");
            if ( $lastDate != $nowDate) 
            {
                $number = 0;
            }
            $number = substr($lastTransaction->id, 17);
        }
    
        return 'SLSTRNSTN' . date("Ymd") . sprintf('%04d', intval($number) + 1);
    }

}
