@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{isset($user)? route('adminUserUpdate.page',$user->id) :route('adminUserStore.page') }}">
                      @if(isset($user))

                        @method('PUT')
                      @endif

                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                              @if(isset($user))
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}"  autofocus>

                              @else
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"  autofocus>
                              @endif
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                            <div class="col-md-6">
                              @if(isset($user))
                                <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ $user->surname }}"  autofocus>
                              @else
                                <input id="surname" type="text" class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ old('surname') }}"  autofocus>
                              @endif
                                @if ($errors->has('surname'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dateOfBirth" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>

                            <div class="col-md-6">
                              @if(isset($user))
                                <input id="dateOfBirth" type="text" class="form-control{{ $errors->has('dateOfBirth') ? ' is-invalid' : '' }}" name="dateOfBirth" value="{{ $user->dateOfBirth }}"  autofocus>
                              @else
                                <input id="dateOfBirth" type="date" class="form-control{{ $errors->has('dateOfBirth') ? ' is-invalid' : '' }}" name="dateOfBirth" value="{{ old('dateOfBirth') }}"  autofocus>
                              @endif
                                @if ($errors->has('
                                dateOfBirth'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('dateOfBirth') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phoneNumber" class="col-md-4 col-form-label text-md-right">{{ __('phone Number') }}</label>

                            <div class="col-md-6">
                              @if(isset($user))
                                <input id="phoneNumber" type="text" class="form-control{{ $errors->has('phoneNumber') ? ' is-invalid' : '' }}" name="phoneNumber" value="{{ $user->phoneNumber }}"  autofocus>
                              @else
                                <input id="phoneNumber" type="text" class="form-control{{ $errors->has('phoneNumber') ? ' is-invalid' : '' }}" name="phoneNumber" value="{{ old('phoneNumber') }}"  autofocus>
                              @endif
                                @if ($errors->has('
                                phoneNumber'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phoneNumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                              @if(isset($user))
                                <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}"  autofocus>
                              @else
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" >
                              @endif
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @if(!(isset($user)))
                                  <div class="form-group row">
                                      <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                      <div class="col-md-6">
                                          <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >

                                          @if ($errors->has('password'))
                                              <span class="invalid-feedback">
                                                  <strong>{{ $errors->first('password') }}</strong>
                                              </span>
                                          @endif
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                      <div class="col-md-6">
                                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                                      </div>
                                  </div>
                        @endif
                        <div class="form-group row">
                            <label for="adress" class="col-md-4 col-form-label text-md-right">{{ __('Adress') }}</label>

                            <div class="col-md-6">
                              @if(isset($user))
                                <input id="adress" type="text" class="form-control{{ $errors->has('adress') ? ' is-invalid' : '' }}" name="adress" value="{{ $user->adress }}"  autofocus>
                              @else
                                <input id="adress" type="text" class="form-control{{ $errors->has('adress') ? ' is-invalid' : '' }}" name="adress" value="{{ old('adress') }}"  autofocus>
                              @endif
                                @if ($errors->has('
                                adress'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('adress') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                              @if(isset($user))
                                <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ $user->city }}"  autofocus>
                              @else
                                <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}"  autofocus>
                              @endif
                                @if ($errors->has('
                                city'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="zipCode" class="col-md-4 col-form-label text-md-right">{{ __('Zip Code') }}</label>

                            <div class="col-md-6">
                              @if(isset($user))
                                <input id="zipCode" type="text" class="form-control{{ $errors->has('zipCode') ? ' is-invalid' : '' }}" name="zipCode" value="{{ $user->zipCode }}"  autofocus>
                              @else
                                <input id="zipCode" type="text" class="form-control{{ $errors->has('zipCode') ? ' is-invalid' : '' }}" name="zipCode" value="{{ old('zipCode') }}"  autofocus>
                              @endif
                                @if ($errors->has('
                                zipCode'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('zipCode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-6">
                              @if(isset($user))
                                <select id='country' class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" value="{{ $user->country }}" name="country">
                                  @foreach($countries as $country)
                                    <option value="{{$country->name->common}}">{{$country->name->common}}</option>
                                  @endforeach
                                </select>
                              @else
                                <select id='country' class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" value="{{ old('country') }}" name="country">
                                  @foreach($countries as $country)
                                    <option value="{{$country->name->common}}">{{$country->name->common}}</option>
                                  @endforeach
                                </select>
                              @endif



                                @if ($errors->has('
                                Country'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('Country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                            <div class="col-md-6">
                              @if(isset($user))
                                <select id='role' class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" value="{{ $user->role }}" name="role">
                                  <option value="user">User</option>
                                  <option value="admin">Admin</option>
                                </select>

                              @else
                                <select id='role' class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" value="{{ old('role') }}" name="role">
                                  <option value="user">User</option>
                                  <option value="admin">Admin</option>
                                </select>
                              @endif



                                @if ($errors->has('
                                Country'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('Country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ isset($user)? 'Save Changes': 'Create New User' }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
