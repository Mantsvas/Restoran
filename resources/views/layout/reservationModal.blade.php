<!-- Modal -->
<div class="modal fade" id="reservationModal" tabindex="-1" role="dialog" aria-labelledby="reservationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-4 bg-image" style="background-image: url(images/bg_3.jpg);"></div>
          <div class="col-lg-8 p-5">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <small>CLOSE </small><span aria-hidden="true">&times;</span>
            </button>
            <h1 class="mb-4">Reserve A Table</h1>
            <form action="{{ isset($reservation) ? route('updateReservation') : route('storeReservation')}}" method="post">
              @csrf
              @if(isset($reservation))

                @method('PUT')
              @endif
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="m_fname">First Name</label>

                    @if(isset($reservation))
                      <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $reservation->name}}" id="m_fname">

                    @else
                      <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ Auth::user()? Auth::user()->name :old('name')}}" id="m_fname">
                    @endif
                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="col-md-6 form-group">
                  <label for="m_lname">Last Name</label>
                  @if(isset($reservation))
                    <input type="text" class="form-control {{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ $reservation->surname}}" id="m_lname">

                  @else
                    <input type="text" class="form-control {{ $errors->has('surname') ? ' is-invalid' : '' }}" name="surname" value="{{ Auth::user() ? Auth::user()->surname :old('surname')}}" id="m_lname">
                  @endif
                  @if ($errors->has('surname'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('surname') }}</strong>
                      </span>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="m_email">Email</label>
                  @if(isset($reservation))
                    <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $reservation->email}}" id="m_email">

                  @else
                    <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::user() ? Auth::user()->email :old('email')}}" id="m_email">
                  @endif
                  @if ($errors->has('email'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="m_people">How Many People</label>

                  @if(isset($reservation))
                    <select name="people" id="m_people" class="form-control {{ $errors->has('people') ? ' is-invalid' : '' }}" value="{{ $reservation->people}}">
                  @else
                    <select name="people" id="m_people" class="form-control {{ $errors->has('people') ? ' is-invalid' : '' }}" value="{{ old('people')}}">
                  @endif
                      <option value="1">1 People</option>
                      <option value="2">2 People</option>
                      <option value="3">3 People</option>
                      <option value="4">4+ People</option>
                    </select>
                  @if ($errors->has('people'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('people') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="col-md-6 form-group">
                  <label for="m_phone">Phone</label>
                  @if(isset($reservation))
                    <input name="phoneNumber" type="text" class="form-control {{ $errors->has('phoneNumber') ? ' is-invalid' : '' }}" value="{{ $reservation->phoneNumber}}" id="m_phone">

                  @else
                    <input name="phoneNumber" type="text" class="form-control {{ $errors->has('phoneNumber') ? ' is-invalid' : '' }}" value="{{ Auth::user()? Auth::user()->phoneNumber : old('phoneNumber')}}" id="m_phone">
                  @endif
                  @if ($errors->has('phoneNumber'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('phoneNumber') }}</strong>
                      </span>
                  @endif
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="date">Date</label>
                  @if(isset($reservation))
                    <input type="date" name="date" class="form-control {{ $errors->has('date') ? ' is-invalid' : '' }}" value="{{ $reservation->date}}" id="date">

                  @else
                    <input type="date" name="date" class="form-control {{ $errors->has('date') ? ' is-invalid' : '' }}" value="{{ old('date')}}" id="date">
                  @endif
                  @if ($errors->has('date'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('date') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="col-md-6 form-group">
                  <label for="time">Time</label>
                  @if(isset($reservation))
                    <select id="time" class="form-control {{ $errors->has('time') ? ' is-invalid' : '' }}" name="time" value="{{ $reservation->time}}">

                  @else
                    <select id="time" class="form-control {{ $errors->has('time') ? ' is-invalid' : '' }}" value="{{ old('time')}}" name="time">
                      @for( $h=8;$h<=23;$h++)
                        <option value="{{$h.':00'}}">{{$h.':00'}}</option>
                        <option value="{{$h.':15'}}">{{$h.':15'}}</option>
                        <option value="{{$h.':30'}}">{{$h.':30'}}</option>
                        <option value="{{$h.':45'}}">{{$h.':45'}}</option>
                      @endfor
                    </select>
                  @endif
                  @if ($errors->has('time'))
                      <span class="invalid-feedback">
                          <strong>{{ $errors->first('time') }}</strong>
                      </span>
                  @endif
                </div>
              </div>


              <div class="row">
                <div class="col-md-12 form-group">
                  <input type="submit" class="btn btn-primary btn-lg btn-block" value="{{ isset($reservation) ? 'Submit Changes' : 'Reserve Now'}}">
                </div>
              </div>

            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<!-- END Modal -->
