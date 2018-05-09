<?php

namespace App;



class Cart
{
  public $cart  = null;
  public $totalQuantity;
  public $totalPrice;

  public function __construct($oldCart)
  {
    if($oldCart){
      $this->cart = $oldCart->cart;
      $this->totalQuantity = $oldCart->totalQuantity;
      $this->totalPrice = $oldCart->totalPrice;
    }


  }

  public function addToCart($dish)
  {

  // dd($dish);
    $storeItem = [
      'item' => $dish,
      'qty' => 0,
      'price'=> $dish->price,
    ];

    if($this->cart)
    {
      if(array_key_exists($dish->id,$this->cart)){
        $storeItem = $this->cart[$dish->id];
      }
    }

    $storeItem['qty']++;
    $storeItem['price'] = $dish->price * $storeItem['qty'];
    $this->cart[$dish->id] = $storeItem;

    $this->totalQuantity++;
    $this->totalPrice+= $dish->price;
  }

  public function removeFromCart($dish)
  {

      $this->cart[$dish]['qty']--;

      $this->cart[$dish]['price']-=$this->cart[$dish]['item']['price'];

      $this->totalQuantity--;
      $this->totalPrice-= $this->cart[$dish]['item']['price'];
      if($this->cart[$dish]['qty']==0){
        unset($this->cart[$dish]);
      }
    }


    public function removeDish($dish)
    {
      $this->totalQuantity -= $this->cart[$dish]['qty'];
      $this->totalPrice -= $this->cart[$dish]['item']['price'] * $this->cart[$dish]['qty'];
      unset($this->cart[$dish]);
    }


  }
