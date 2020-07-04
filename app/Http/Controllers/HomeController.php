<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Sales;
use App\SalesOutlet;

class HomeController extends Controller
{
    public function index()
    {
        return view('home/welcome');
    }

    public function login()
    {
        return view('home/login');
    }

    public function auth(Request $request)
	{
        $username = $request->username;
        $password = $request->password;
        $sales = Sales::where('username', '=', $username)->get();
        $hashedpassword = $sales->first()->password;
        if (Hash::check($password, $hashedpassword)) {
            session(['sales_id' => $sales->first()->id]);
            session(['name' => $sales->first()->name]);
            return redirect('listoutlet');
        } else {
            return redirect('/');
        }
    }

    public function logout()
    {
        session()->flush();
        return view('home/login');
    }

    public function listOutlet()
    {
        $list_outlet = SalesOutlet::all();
        return view('home/listOutlet', ['list_outlet' => $list_outlet]);
    }

    public function selectOutlet(Request $request)
    {
        session (['sales_outlet_id' => $request->outlet]);
        return redirect('/');
    }
}
