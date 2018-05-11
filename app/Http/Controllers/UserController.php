<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Validator;
use Countries;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::all();

      return view('admin.users.usersList', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Countries::where('extra.eu_member', 'True');
        return view('admin.users.userForm',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $data)
    {
      User::create([
          'name' => $data['name'],
          'surname' => $data['surname'],
          'dateOfBirth'=> $data['dateOfBirth'],
          'phoneNumber'=>$data['phoneNumber'],
          'email' => $data['email'],
          'password' => Hash::make($data['password']),
          'adress'=>$data['adress'],
          'city'=>$data['city'],
          'zipCode'=>$data['zipCode'],
          'country'=>$data['country'],
          'role'=>$data['role'],
      ]);

      return redirect()->route('adminUsers.page')->with('success','User Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $countries = Countries::where('extra.eu_member', 'True');
        return view('admin.users.userForm',compact('user','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserRequest $update, User $user)
    {
      $user->update([
        'name' =>$update->input('name'),
        'surname' =>$update->input('surname'),
        'dateOfBirth' =>$update->input('dateOfBirth'),
        'phoneNumber' =>$update->input('phoneNumber'),
        'email' =>$update->input('email'),
        'adress' =>$update->input('adress'),
        'city' =>$update->input('city'),
        'zipCode' =>$update->input('zipCode'),
        'country' =>$update->input('country'),
        'role' =>$update->input('role'),


        'password' => $user->password,


      ]);

      return redirect()->route('adminUsers.page')->with('success','User Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('adminUsers.page')->with('success','User Deleted');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'surname'=>'required|string|max:255',
            'dateOfBirth'=>'required|date',
            'phoneNumber'=>'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'adress'=>'required|string',
            'city'=>'required|string',
            'zipCode'=>'required|string',
            'country'=>'required|string',

        ]);
    }

}
