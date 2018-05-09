@extends('layout.master')

@section('content')

@if(isset($cart) && $cart->totalQuantity !== 0)



<table  class="table table-dark table-striped mx-auto text-danger">
  <tr>
    <th>Name</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Total Price</th>
    <td></td>
    <td></td>

  </tr>

  @foreach($cart->cart as $dish)
    <tr>
      <td> <a href="{{route('dish.page',$dish['item']['id'])}}"> {{$dish['item']['name']}}</a></td>
      <td>{{$dish['item']['price']}}</td>
      <td>{{$dish['qty']}}</td>
      <td>{{$dish['price']}}</td>
      <td class="row"><form class="col-6" action="{{route('addToCart')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$dish['item']['id']}}">
        <button class="btn btn-success float-right" type="submit">+</button>
      </form><form class="col-6" action="{{route('removeFromCart')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$dish['item']['id']}}">
        <button class="btn btn-warning float-left" type="submit">-</button>
      </form></td>
      <td><form class="" action="{{route('removeWholeDishFromCart')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$dish['item']['id']}}">
        <button class="btn btn-danger " type="submit">Remove</button>
      </form></td>

    </tr>
  @endforeach

  <tr>
    <td></td>
    <td>Total</td>
    <td>{{$cart->totalQuantity}}</td>
    <td>{{$cart->totalPrice}}</td>
    <td><a class="btn btn-danger" href="{{route('cleanCart')}}">Clean Cart</a></td>
    <td><form class="" action="{{route('removeWholeDishFromCart')}}" method="post">
      @csrf
      <input type="hidden" name="id" value="{{$dish['item']['id']}}">
      <button class="btn btn-warning " type="submit">Checkout</button>
    </form></td>
  </tr>
</table>

@else
  <h1>empty</h1>
@endif

@endsection
