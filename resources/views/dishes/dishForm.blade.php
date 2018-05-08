@extends('layouts.master')

@section('content')
  <form class="" action="{{isset($dish) ? route('updateDish.page',$dish->id) : route('storeDish.page')}}" method="post">
    @if(isset($dish))

      @method('PUT')
    @endif


      @csrf

      <div class="form-group row">
          <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

          <div class="col-md-6">
            @if(isset($dish))
              <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $dish->name }}"  autofocus>
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
          <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

          <div class="col-md-6">
            @if(isset($dish))
              <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ $dish->description }}"  autofocus>
            @else
              <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}"  autofocus>
            @endif
              @if ($errors->has('description'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('description') }}</strong>
                  </span>
              @endif
          </div>
      </div>


      <div class="form-group row">
          <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

          <div class="col-md-6">
            @if(isset($dish))
              <input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ $dish->price }}"  autofocus>
            @else
              <input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}"  autofocus>
            @endif
              @if ($errors->has('price'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('price') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group row">
          <label for="photourl" class="col-md-4 col-form-label text-md-right">{{ __('Photo URL') }}</label>

          <div class="col-md-6">
            @if(isset($dish))
              <input id="photourl" type="text" class="form-control{{ $errors->has('photourl') ? ' is-invalid' : '' }}" name="photourl" value="{{ $dish->photourl }}" autofocus>
            @else
              <input id="photourl" type="text" class="form-control{{ $errors->has('photourl') ? ' is-invalid' : '' }}" name="photourl" value="{{ old('photourl') }}" autofocus>
            @endif
              @if ($errors->has('photourl'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('photourl') }}</strong>
                  </span>
              @endif
          </div>
      </div>


      <div class="form-group row">

          <label class="col-md-4 col-form-label text-md-right" for="main">{{__('Main')}}</label>

          <div class="col-md-4">
            @if(isset($dish))
            <select id="main" name="main_id">
              @foreach($mains as $main)
                <option value="{{$main->id}}" {{ $dish->main_id == $main->id ? 'selected' :''}}>

                  {{$main->title}}

                </option>

              @endforeach
            </select>
            @else
              <select id="main" name="main_id">
                @foreach($mains as $main)
                  <option value="{{$main->id}}" {{ old('main_id') == $main->id ? 'selected' :''}}>

                    {{$main->title}}

                  </option>

                @endforeach
              </select>
            @endif
        </div>
      </div>

      <button type="submit" name="button">{{isset($dish)? 'Submit Changes' :'Submit New Dish'}}</button>






  </form>



@endsection
