{{-- layout --}}
@extends('layouts.fullLayoutMaster')

{{-- page title --}}
@section('title','User Login')

{{-- page style --}}
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/login.css')}}">
@endsection

{{-- page content --}}
@section('content')
<div div class="row">
<div class="col s12 m3">
</div>
  <div class="col s12 m6 text-center">
  <img class="logo" src="{{asset('images/login-page-logo.png')}}" />
</div>
<div class="col s12 m3">
</div>
</div>
<div id="login-page" class="row">
  <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">
    <form class="login-form" method="POST" action="{{ route('login') }}">
      @csrf
      <div class="row">
        <div class="input-field col s12">
          <h5 class="ml-4">{{ __('Sign in') }}</h5>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">person_outline</i>
          <input id="username" type="text" class=" @error('username') is-invalid @enderror" name="username"
            value="{{ old('username') }}"  autocomplete="username" autofocus>
          <label for="username" class="center-align">{{ __('Username') }}</label>
          @error('username')
          <small class="red-text ml-7" >
            {{ $message }}
          </small>
          @enderror
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">lock_outline</i>
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
            name="password"  autocomplete="current-password">
          <label for="password">{{ __('password') }}</label>
          @error('password')
          <small class="red-text ml-7" >
            {{ $message }}
          </small>
          @enderror
        </div>
      </div>
      <div class="row">
        <div class="col s12 m12 l12 ml-2 mt-1">
          <p>
            <label>
              <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <span>Remember Me</span>
            </label>
          </p>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12 p-2 row" style="padding: 0px 38px 16px;">
          <button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">
            Login
          </button>
        </div>
      </div>
      <!-- <div class="row">
        <div class="input-field col s6 m6 l6">
          <p class="margin medium-small"><a href="{{ route('register') }}">Register Now!</a></p>
        </div>
        <div class="input-field col s6 m6 l6">
          <p class="margin right-align medium-small">
            <a href="{{ route('password.request') }}">Forgot password?</a>
          </p>
        </div> -->
      </div>
    </form>
  </div>
</div>
 <!-- Modal  -->
 <!-- <div id="modal-view-warning" class="sm modal" style="display: block;">
        <div class="modal-content">
          <h6 class="color-red">Final Reminder!</h6>
          <div class="program-content">
            Your Website will shutdown in<br>
            <span style="font-size: 25px;"><span id="demo"></span></span>

            <br> Please settle your bills.
          </div>
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">close</a>
        </div>
      </div> -->

@endsection
@section('page-script')
<script src="{{asset('js/scripts/advance-ui-modals.js')}}"></script>
<script>
// Set the date we're counting down to
var countDownDate = new Date("May 6, 2025 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
@endsection
