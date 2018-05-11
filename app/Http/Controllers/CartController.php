<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
      $id = $request->input('id');
      $from = $request->input('from');
      $dish = Dish::findOrFail($id);
      $oldCart = (Session::has('cart'))? Session::get('cart'): null;
      $cart = New Cart($oldCart);

      $cart->addToCart($dish);
      $request->session()->put('cart',$cart);
      if(isset($from)){
        return redirect()->back()->with('success','Dish Added to Cart');
      }
      return response()->json($cart);
    }

    public function index()
    {
      $cart = (Session::has('cart'))? Session::get('cart'): null;
      // dd($cart);
      return view('cart.index',compact('cart'));
    }

    public function removeFromCart(Request $request)
    {
      $id = $request->input('id');


      $oldCart = (Session::has('cart'))? Session::get('cart'): null;
      $cart = New Cart($oldCart);
      $cart->removeFromCart($id);
      $request->session()->put('cart',$cart);
      return redirect()->back()->with('success','Dish Removed From Cart');
    }

    public function removeDishFromCart(Request $request)
    {
      $id = $request->input('id');
      $oldCart = (Session::has('cart'))? Session::get('cart'): null;
      $cart = New Cart($oldCart);
      $cart->removeDish($id);
      $request->session()->put('cart',$cart);
      return redirect()->back()->with('success','Dish Removed From Cart');

    }
    public function cleanCart(Request $request)
    {
      $request->session()->forget('cart');
      return redirect()->back()->with('success','Cart is Clean');


    }

}
