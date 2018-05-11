<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReservationRequest;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $reservations = Reservation::paginate(20);
      return view('admin.reservation.reservationList', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reservation.reservationForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservationRequest $data)
    {
      Reservation::create([
          'name' => $data['name'],
          'surname' => $data['surname'],
          'email'=> $data['email'],
          'phoneNumber'=>$data['phoneNumber'],
          'people' => $data['people'],
          'date'=>$data['date'],
          'time'=>$data['time'],
      ]);

      if(Auth::user()->role === 'admin'){
        return redirect()->route('adminReservation.page')->with('success','Your table was reserved');
      }
      return redirect()->route('ho')->with('success','Your table was reserved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        return view('admin.reservation.reservationForm',compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $update, Reservation $reservation)
    {
      $reservation->update([
        'name' =>$update->input('name'),
        'surname'=>$update->input('surname'),
        'email'=>$update->input('email'),
        'phoneNumber'=>$update->input('phoneNumber'),
        'people'=>$update->input('people'),
        'time'=>$update->input('time'),
        'date'=>$update->input('date'),
      ]);

      return redirect()->route('adminReservation.page')->with('success','Reservation Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
      $reservation->delete();
      return redirect()->route('adminReservation.page')->with('success','Reservation Deleted');
    }
}
