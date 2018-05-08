@extends('layout.master')


@section('content')

<div class="card mx-auto" style="width: 18rem;">
  <img class="card-img-top" src="{{$dish->photourl}}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{$dish->name}}</h5>
    <p class="card-text">{{$dish->description}}</p>
    <div class="row">

      <button class="btn btn-success col-6" type="button" name="price">{{$dish->price}}</button>
      @if(Auth::user() && Auth::user()->role === 'admin')
        <form action="{{route('deleteDish.page',$dish->id)}}" method="post">
          @csrf
          @method('Delete')
          <a class="btn btn-success" href="{{route('adminDishEdit.page',$dish->id)}}">Edit</a>
          <button class="btn btn-danger" type="submit">Delete</button>
        </form>
      @endif
    </div>
  </div>
</div>

@endsection
