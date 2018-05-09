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







@endsection
