@extends('layouts.master')

@section('content')
<table class="table table-dark table-striped">
  <tr>
    <th>Name</th>
    <th><a class="btn btn-warning" href="{{route('createCategory.page')}}">Create New</a></th>
    <th></th>
  </tr>

  @foreach($categories as $category)
    <tr>
      <td>{{$category->title}}</td>
      <td> <a class="btn btn-success" href="{{route('categoryEdit.page',$category->id)}}">Edit</a> </td>
      <td>
        <form action="{{route('categoryDelete.page',$category->id)}}" method="post">
          @csrf
          @method('Delete')
          <button class="btn btn-danger" type="submit">Delete</button>
        </form>
    </tr>
  @endforeach
</table>
@endsection
