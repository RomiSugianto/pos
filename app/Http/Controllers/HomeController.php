<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function auth(Request $request)
	{
        $username = $request->username;
        $password = $request->password;
        $sales = Sales::where('username', '=', $username)
                        ->where('password', '=', $password)->get();
        if ($sales->count() > 0) {
            session(['sales_id' => $sales->first()->id]);
            session(['name' => $sales->first()->name]);
            return session('name');
        }else {
            return redirect('/');
        }
 
	}
}
