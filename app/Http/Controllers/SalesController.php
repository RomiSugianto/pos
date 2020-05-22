<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Sales;

class SalesController extends Controller
{
    public function index()
    {

        $sales = Sales::paginate(10);
    	return view('sales/sales',['sales' => $sales]);
    }

    public function new()
    {
 
    	return view('sales/addsales');
    }

    public function add(Request $request)
    {
        DB::table('sales')->insert([
            'id' => $request->id,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
        ]);
        return redirect('sales');
    
    }

    public function edit($id)
    {
        $sales = DB::table('sales')->where('id',$id)->get();
        return view('sales/editsales',['sales' => $sales]);
    
    }

    public function update(Request $request)
    {
        DB::table('sales')->where('id',$request->id)->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
        ]);
        return redirect('sales');
    }

    public function delete($id)
    {
        DB::table('sales')->where('id',$id)->delete();
        return redirect('sales');
    }

    public function search(Request $request)
	{
		$search = $request->search;
 
		$sales = DB::table('sales')
		->where('name','like',"%".$search."%")
		->paginate();
 
		return view('sales/sales',['sales' => $sales]);
 
    }
    
}
