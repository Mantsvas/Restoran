<?php

namespace App\Http\Controllers\Auth;


use Countries;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dishes';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

        public function showRegistrationForm()
    {
        $countries = Countries::where('extra.eu_member', 'True');
        return view('auth.register', compact('countries'));
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
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

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
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
            'role'=>'user'
        ]);
    }
}
