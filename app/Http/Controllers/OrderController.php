<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{


    public function checkout()
    {
      $cart = Session::get('cart');
      $order = new Order();
      $order->cart = serialize($cart);
      Auth::user()->hasManyOrders()->save($order);
      Session::forget('cart');
      return redirect()->route('dishes.page');
    }
}
