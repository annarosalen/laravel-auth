<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


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

    public function clearIcon(){

        $this-> deleteIcon();

        $user = Auth::user();
        $user -> icon = null;
        $user -> save();

        return redirect() ->back();

    }

    private function deleteIcon(){

        $user = Auth::user();

        try {
            
            $fileName = $user -> icon;

            $file = storage_path('app/public/icon/' . $fileName);
            
            $res= File::delete($file);

            // dd($res, $file);

        }catch (\Exception $e){

        }

    }
}
