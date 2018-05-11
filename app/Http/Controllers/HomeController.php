<?php

namespace App\Http\Controllers;

use App\Main;
use App\Dish;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mains = Main::all();
        $dishes = Dish::all();

        return view('welcome',compact('mains','dishes'));
    }
}
