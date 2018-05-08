@extends('layouts.master')

@section('content')
  <table class="table table-dark table-striped">
    <tr>
      <th>Name</th>
      <th>Price</th>
      <th>Category</th>
      <th><a class="btn btn-warning" href="{{route('createDish.page')}}">Create New</a></th>
      <th></th>
      <th></th>
    </tr>

    @foreach($dishes as $dish)
      <tr>
        <td>{{$dish->name}}</td>
        <td>{{$dish->price}}</td>
        <td>{{$dish->toMain->title}}</td>
        <td><a class="btn btn-warning" href="{{route('dish.page',$dish->id)}}">Preview</a></td>
        <td> <a class="btn btn-success" href="{{route('adminDishEdit.page',$dish->id)}}">Edit</a> </td>
        <td>
          <form action="{{route('deleteDish.page',$dish->id)}}" method="post">
            @csrf
            @method('Delete')
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
      </tr>
    @endforeach
  </table>
@endsection
