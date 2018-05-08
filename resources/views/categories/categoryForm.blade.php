@extends('layouts.master')

@section('content')
  <form class="" action="{{isset($category) ? route('updateCategory.page',$category->id) : route('storeCategory.page')}}" method="post">
    @if(isset($category))

      @method('PUT')
    @endif


      @csrf

      <div class="form-group row">
          <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

          <div class="col-md-6">
            @if(isset($category))
              <input id="name" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $category->title }}"  autofocus>
            @else
              <input id="name" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}"  autofocus>
            @endif
              @if ($errors->has('title'))
                  <span class="invalid-feedback">
                      <strong>{{ $errors->first('title') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <button type="submit" name="button">{{isset($category)? 'Submit Changes' :'Submit New Category'}}</button>






  </form>



@endsection
