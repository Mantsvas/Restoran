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
      <td id='dqty'>{{$dish['qty']}}</td>
      <td>{{$dish['price']}}</td>
      <td class="row">

      <button class="cart btn btn-success btn-product"  data-id="{{$dish['item']['id']}}" type="button" name="button">+</button>
      <form class="col-6" action="{{route('removeFromCart')}}" method="post">
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
    <td>
      <a  class="btn btn-warning" name="checkout" href="{{route('checkout')}}">Checkout</a>
    </td>
  </tr>
</table>

@else
  <h1>empty</h1>
@endif



<script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
 <script type="text/javascript">
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('button.cart').click(function () {

            var dish_id = $(this).data('id');
            var url = "/addToCart";
            console.log(dish_id);

            $.ajax({
                type:'Post',
                url: url,
                data:{id:dish_id},
                dataType:'json',
                success: function (data) {
                    console.log(data);
                    $('#cartQuantity').html('<i class="fas fa-shopping-cart"></i>' + data.totalQuantity);
                    $('#dqty').html(data.cart.qty);
                },
                error: function (data){
                    console.log('Error:', data);
                }

            });
        });
    });
</script>


@endsection
