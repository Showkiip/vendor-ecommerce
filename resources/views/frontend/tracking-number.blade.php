@extends('frontend.layouts.master')


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

                <h2 class="text-center"><span class="dot"></span>Tracking Number</h2>
              </div>
             </div>
             <form class="login-form" >

              <div class="form-group">
                <label>Tracking Number</label>
                <input type="search"  name="trackingNo" id="trackingNo" class="form-control" placeholder="Tracking Number"/>
              </div>

              <button type="button" onclick="trackNo()" class="btn btn-primary">
                <i class="fa fa-search"></i></button>


            </form>

          </div>
        </div>
      </div>
    </div>
    <div id="trackingOrder">

    </div>
  </section>
        <script>
             function trackNo()
                {
                    var trackingNo =$("#trackingNo").val();
                    // alert(trackingNo);
                    // var _token = $('input[name="_token"]').val();

                    $.ajax({
                        type: "POST",
                        url: "{{url('trackingNumber')}}",
                        data: {trackingNo:trackingNo,_token: '{{ csrf_token() }}'},

                        success:function(response){
                            console.log(response);
                            $('#trackingOrder').html(response);
                            // $('#empModal').modal('show');
                            },
                        });
                }
        </script>
   @endsection
