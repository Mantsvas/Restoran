@extends('layouts.master')

@section('content')

<table class="table table-dark table-striped">
  <tr>
    <th>Name</th>
    <th>Surname</th>
    <th>Email Adress</th>
    <th>Phone Number</th>
    <th>Date</th>
    <th>Time</th>
    <th>People</th>
    <th><a class="btn btn-warning" href="{{route('createReservation.page')}}">Create New</a></th>
    <th></th>

  </tr>

  @foreach($reservations as $reservation)
    <tr>
      <td>{{$reservation->name}}</td>
      <td>{{$reservation->surname}}</td>
      <td>{{$reservation->email}}</td>
      <td>{{$reservation->phoneNumber}}</td>
      <td>{{$reservation->date}}</td>
      <td>{{$reservation->time}}</td>
      <td>{{$reservation->people}}</td>
      <td> <a class="btn btn-success" href="{{route('editReservation.page',$reservation->id)}}">Edit</a> </td>
      <td>
        <form action="{{route('deleteReservation.page',$reservation->id)}}" method="post">
          @csrf
          @method('Delete')
          <button class="btn btn-danger" type="submit">Delete</button>
        </form>
    </tr>
  @endforeach
</table>



@endsection
