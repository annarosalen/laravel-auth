<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function updateIcon(Request $request){

        $data= $request -> all();

        $image = $request -> file('icon');
        $ext = $image -> getClientOriginalExtension();
        $nameImg = rand(100000, 999999) . '_' . time();
        $destFile = $nameImg . '.' . $ext;

        $file = $image -> storeAs('icon', $destFile, 'public');

        $user = Auth::user();
        $user -> icon = $destFile;
        $user -> save();

        return redirect() -> back();

    }
}
