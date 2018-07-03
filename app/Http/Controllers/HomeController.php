<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\buku;

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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        if ($request->input('search')===null) {
           $list = buku::all();
           $search = null;
            return view('user')->with("list", $list)->with("search", $search);
        
        }
        

        else{
            $search = buku::where('judul_buku', $request->input('search'))->orWhere('judul_buku', 'like', '%' . $request->input('search') . '%')->get();
            return view('user')->with("search", $search);    
        }
        
    }
}
