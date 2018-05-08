@extends('layouts.master')

@section('content')
<table class="table table-dark table-striped">
  <tr>
    <th>Name</th>
    <th>Surname</th>
    <th>Email Adress</th>
    <th>Phone Number</th>
    <th>Age</th>
    <th>Adress</th>
    <th>City</th>
    <th>Zip Code</th>
    <th>Country</th>
    <th>Role</th>
    <th><a class="btn btn-warning" href="{{route('adminUserCreate.page')}}">Create New</a></th>
    <th></th>

  </tr>

  @foreach($users as $user)
    <tr>
      <td>{{$user->name}}</td>
      <td>{{$user->surname}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->phoneNumber}}</td>
      <td>{{$user->dateOfBirth}}</td>
      <td>{{$user->adress}}</td>
      <td>{{$user->city}}</td>
      <td>{{$user->zipCode}}</td>
      <td>{{$user->country}}</td>
      <td>{{$user->role}}</td>
      <td> <a class="btn btn-success" href="{{route('adminUserEdit.page',$user->id)}}">Edit</a> </td>
      <td>
        <form action="{{route('deleteUser.page',$user->id)}}" method="post">
          @csrf
          @method('Delete')
          <button class="btn btn-danger" type="submit">Delete</button>
        </form>
    </tr>
  @endforeach
</table>



@endsection
