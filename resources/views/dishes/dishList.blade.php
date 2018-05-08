@extends('layout.master')

@section('content')

<table class="table table-striped table-dark">


    <div class="row">

      @foreach($dishes as $dish)
        <div class="col-6 col-md-4">

          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{$dish->photourl}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">{{$dish->name}}</h5>
              <p class="card-text">{{$dish->description}}</p>
              <div class="row">

                <button class="btn btn-success col-6" type="button" name="price">{{$dish->price}}</button>
                <a href="{{route('dish.page',$dish->id)}}" class="btn btn-primary col-6">More Detais</a>
              </div>

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
      @endforeach
    </div>
  </tbody>
</table>




@endsection
