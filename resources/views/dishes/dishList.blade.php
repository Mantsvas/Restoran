@extends('layout.master')

@section('content')




    <div class="row">

      @foreach($dishes as $dish)
        <div class="col-6 col-md-4 col-lg-3">

          <div class="card mx-auto mt-5" style="width: 16.3rem;">
            <img class="card-img-top" src="{{$dish->photourl}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">{{$dish->name}}</h5>
              <p class="card-text">{{$dish->description}}</p>
              <div class="row justify-content-md-center">
                <button class="btn btn-warning" type="button" name="button">
                <a href="{{route('dish.page',$dish->id)}}" >More Detais</a>
                </button>
              </div>
              <div class="row justify-content-md-center">

                <button class="cart btn btn-success btn-product"  data-id="{{$dish->id}}" type="button" name="button">Add To cart</button>
                <a href="#"  data-idd="{{$dish->id}}" class="cart btn btn-success btn-product"><span class="glyphicon glyphicon-shopping-cart"></span> Add 2 Cart</a>

                <form  action="{{route('addToCart')}}" method="post">
                  @csrf
                  <input type="hidden" name="id" value="{{$dish->id}}">
                  <button class="btn btn-success " type="submit">Price: {{$dish->price}} To Cart </button>
                </form>
              </div>

              @if(Auth::user() && Auth::user()->role === 'admin')
                <form class="justify-content-md-between" action="{{route('deleteDish.page',$dish->id)}}" method="post">
                  @csrf
                  @method('Delete')
                  <a class="btn btn-success" href="{{route('adminDishEdit.page',$dish->id)}}">Edit</a>
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
              @endif
            </div>
          </div>

        </div>
      @endforeach
    </div>
    <div class="row justify-content-md-center mt-5">
      <p>
        {{ $dishes->links() }}
      </p>
    </div>


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
                    },
                    error: function (data){
                        console.log('Error:', data);
                    }

                });
            });
        });
    </script>







@endsection
