<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\SalesOutlet;

class SalesOutletController extends Controller
{
    public function index()
    {

        $salesoutlet = SalesOutlet::paginate(10);
    	return view('salesoutlet/salesoutlet',['salesoutlet' => $salesoutlet]);
    }

    public function new()
    {
 
    	return view('salesoutlet/addsalesoutlet');
    }

    public function add(Request $request)
    {
        DB::table('sales_outlet')->insert([
            'id' => $request->id,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
        ]);
        return redirect('salesoutlet');
    
    }

    public function edit($id)
    {
        $salesoutlet = DB::table('sales_outlet')->where('id',$id)->get();
        return view('salesoutlet/editsalesoutlet',['salesoutlet' => $salesoutlet]);
    
    }

    public function update(Request $request)
    {
        DB::table('sales_outlet')->where('id',$request->id)->update([
            'address' => $request->address,
            'phone_number' => $request->phone_number,
        ]);
        return redirect('salesoutlet');
    }

    public function delete($id)
    {
        DB::table('sales_outlet')->where('id',$id)->delete();
        return redirect('salesoutlet');
    }

    public function search(Request $request)
	{
		$search = $request->search;
 
		$salesoutlet = DB::table('sales_outlet')
		->where('name','like',"%".$search."%")
		->paginate();
 
		return view('salesoutlet/salesoutlet',['salesoutlet' => $salesoutlet]);
 
	}
}
