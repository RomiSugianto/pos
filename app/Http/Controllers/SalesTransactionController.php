<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\SalesTransaction;

class SalesTransactionController extends Controller
{
    public function index()
    {

        $salestransaction = SalesTransaction::paginate(10);
    	return view('salestransaction/salestransaction',['salestransaction' => $salestransaction]);
    }

    public function new()
    {
 
    	return view('salestransaction/addsalestransaction');
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
    
    public function test(Request $request)
	{
		return 'test';
 
	}
}
