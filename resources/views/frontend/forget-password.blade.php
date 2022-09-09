@extends('frontend.layouts.master')
@section('styling')

@endsection
@section('content')
<section class="signup-area ptb-60">
  <div class="container">
    <div class="row justify-content-center d-flex">
      <div class="col-md-6">
        <div class="login-with-credentials">
          <div class="row">
          <div class="section-title">
            @if(Session::has('message'))
            <div class="alert alert-danger">
                {!!Session::get('message')!!}
            </div>
            @endif
            @if(Session::has('status'))
            <div class="alert alert-success">
                {!!Session::get('status')!!}
            </div>
            @endif
            <div class="login-signup-header">

              <h2 class="text-center"><span class="dot"></span>Send email</h2>
            </div>
           </div>
           <form class="login-form" method="post" action="{{url('/check-password')}}" id="login-form">
            {{csrf_field()}}
            <div class="form-group">
              <label>EMAIL</label>
              <input type="email" class="form-control" placeholder="Enter your email" id="login-email" name="email"  required="">
              <span class="text-danger">{{ $errors->first('email') }}</span>
            </div>

            <button type="submit" class="btn btn-primary bg-black">Submit</button>
            <div class="d-flex justify-content-between">

              <p>Don't have account?<a href="{{url('signup')}}"> Signup</a></p>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>

</section>
@endsection
@section('script')
@endsection
