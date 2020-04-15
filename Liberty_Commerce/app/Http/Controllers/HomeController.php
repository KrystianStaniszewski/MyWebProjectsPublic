<?php

namespace App\Http\Controllers;

use App\Produit;
use Illuminate\Http\Request;
use App\Model\Catalogue;
use App\Model\basket;
use DB;
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
    public function index()
    {
        return view('home');
    }

    public function catalogue()
    {
        $select = DB::select('select * from produit');
        return view ('catalogue')->with('name',$select);
    }

    public function produit()
    {
        return view ('produit');
    }

    public function basket()
    {
        $select = DB::select('select * from produit');
        return view ('basket')->with('name',$select);
    }
    public function phone()
    {
        return view('phone');
    }
    public function tablet()
    {
        return view('tablet');
    }
    public function laptop()
    {
        return view('laptop');
    }
    public function software()
    {
        return view('software');
    }
    public function console()
    {
        return view('console');
    }

}
