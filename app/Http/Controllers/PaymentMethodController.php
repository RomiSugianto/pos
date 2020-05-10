<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\PaymentMethod;

class PaymentMethodController extends Controller
{
    public function index()
    {

        $paymentmethod = PaymentMethod::paginate(10);
    	return view('paymentmethod/paymentmethod',['paymentmethod' => $paymentmethod]);
    }

    public function new()
    {
 
    	return view('paymentmethod/addpaymentmethod');
    }

    public function add(Request $request)
    {
        DB::table('payment_method')->insert([
            'id' => $request->id,
            'name' => $request->name,
        ]);
        return redirect('paymentmethod');
    
    }

    public function edit($id)
    {
        $paymentmethod = DB::table('payment_method')->where('id',$id)->get();
        return view('paymentmethod/editpaymentmethod',['paymentmethod' => $paymentmethod]);
    
    }

    public function update(Request $request)
    {
        DB::table('payment_method')->where('id',$request->id)->update([
            'name' => $request->name,
        ]);
        return redirect('paymentmethod');
    }

    public function delete($id)
    {
        DB::table('payment_method')->where('id',$id)->delete();
        return redirect('paymentmethod');
    }

    public function search(Request $request)
	{
		$search = $request->search;
 
		$paymentmethod = DB::table('payment_method')
		->where('name','like',"%".$search."%")
		->paginate();
 
		return view('paymentmethod/paymentmethod',['paymentmethod' => $paymentmethod]);
 
	}
}
