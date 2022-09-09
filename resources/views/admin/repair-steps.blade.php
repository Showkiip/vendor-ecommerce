@extends('admin.layouts.master')

@section('title') Repair Order @endsection

@section('content')
   @component('admin.common-components.breadcrumb')
         @slot('title') Repair Order  @endslot
         @slot('li_1')  @endslot
         @slot('li_2')@endslot
     @endcomponent
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        @if(Session::has('message'))
                                           <div class="col-md-8">
                                            {!!Session::get('message')!!}
                                        </div>
                                        @endif
                              <form action="{{url('admin/repairModel-store')}}" method="post">
                                            {{csrf_field()}}

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Customer</label>
                                            <div class="col-md-10">
                                                <select class="form-control selectpic" name="userId" required="">
                                                    <option selected="">Select Customer</option>
                                                    @foreach(CityClass::allUser() as $user)
                                                     <option value="{{$user->id}}">{{$user->name}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Zip Code</label>
                                        <div class="col-md-10">
                                            <select class="form-control selectpic" name="zip_code" required="">
                                                <option selected="">Select Zip Code</option>
                                                @foreach(CityClass::ZipCode() as $zip)
                                                 <option value="{{$zip->id}}">{{$zip->zipcode}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Brands</label>
                                        <div class="col-md-10">
                                            <select class="form-control selectpic" name="brand" id="brand" onchange="getModel(this)">
                                                <option selected="">Select Brand</option>
                                                @foreach(CityClass::brands() as $brand)
                                                 <option value="{{$brand->id}},{{$brand->brand_name}}">{{$brand->brand_name}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group row" id="showModels">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Models</label>
                                    <div class="col-md-10">
                                        <select class="form-control selectpic" name="model_Id"  required="" onchange="getRepair(this)">
                                            <option selected="">Select Model</option>
                                        </select>
                                    </div>
                                </div>

                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Repair Type</label>
                                            <div class="col-md-10"  id="model-repair">

                                                <span>Oops No Model Repair !</span>


                                         </div>
                                        </div>

                                     <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Date</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="date" type="date" placeholder="Select date" title="Select Date"  @if(old('date')) value="{{ old('date') }}" @endif  id="txtDate">
                                                <span class="text-danger">{{ $errors->first('date') }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Time</label>
                                            <div class="col-md-10">
                                                <select name="time" class="form-control selectpic">
                                                <option> Select Time</option>
                                                @foreach(CityClass::orderTimes() as $orderTime)
                                                <option value="{{ $orderTime->id}}">{{$orderTime->fromTime }} - {{$orderTime->toTime}}</option>
                                                @endforeach


                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Instruction</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" name="instruction" type="text" placeholder="Select instruction" title="Select instruction"  @if(old('instruction')) value="{{ old('instruction') }}" @endif  id="example-text-input"></textarea>
                                                <span class="text-danger">{{ $errors->first('instruction') }}</span>
                                            </div>
                                        </div>

                                        <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                                    </div>

                                   </form>

                                    </div>
                                </div>
                            </div> <!-- end col -->

                            {{-- card --}}
                           <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="my-cart-desktop" id="priceCart">
                                        <!-- <div class="my-cart-wrapper-not-fixed "></div> -->
                                        <div class="my-cart-wrapper ">
                                          <div class="my-cart-content-wrapper">
                                            <div class="my-cart-device-section-wrapper">
                                              <div class="my-cart-device-section-header">
                                                <div class="my-cart-device-section-header-image-title">
                                                  <div id="brand_name"></div>
                                                </div>
                                              </div>
                                              <div class="services-aggregation-details-wrapper">
                                               <div id="PmodelName">  </div>
                                                <div class="services-aggregation-details" id="priceDetails">

                                                </div>
                                              </div>
                                              <hr>
                                              <div class="subtotal-container" id="totalCost" style="display: none">

                                              </div>
                                              <div class="disclaimer-container"></div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                            </div>
                           </div>
                        </div>
                    </div>
                        <!-- end row -->

                        <!-- end row -->
@endsection
@section('script')

<script type="text/javascript">
    $(function() {
  $('.selectpic').select2();
});

function getModel(event)
{

    // alert($(event).val());
    $("#priceDetails").empty();
    $("#PmodelName").empty();
    $("#totalCost").empty();

    var brand = $(event).val().split(',');
    var id = brand[0];
    var  brandName = brand[1];
    // alert(brand[0]);

    $('#brand_name').html('<h5>Brand Name :<b>'+brandName+'</b></h5>');
    $('#model-repair').hide();
    //    var id =$(event).val();
  $.ajax({
        url: "{{url('admin/getModels')}}/"+id,
        type:"get",
        success:function(response){
          console.log(response);
          $('#showModels').html(response);
          $('#exampleModal'+id).modal('show');
        },

       });

}

function getRepair(event)
{

    $("#PmodelName").empty();
    $("#totalCost").empty();
    $("#priceDetails").empty();

    var model = $(event).val().split(',');
    // alert(model);
    var id = model[0];
    var  modelName = model[1];
    $('#PmodelName').html('<h6>Model Name :<b>'+modelName+'</b></h6>');

    $('#model-repair').show();
    //    var id =$(event).val();
  $.ajax({
        url: "{{url('admin/getRepair')}}/"+id,
        type:"get",
        success:function(response){
          console.log(response);



          $('#model-repair').html(response);
          $('#exampleModal'+id).modal('show');
        },

       });

}



$(function(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;

    // or instead:
    // var maxDate = dtToday.toISOString().substr(0, 10);
    // alert(maxDate);
    $('#txtDate').attr('min', maxDate);
});


/// Cart



var total=0;
     function custom_check(id,repair_type,price)
     {

          if($('#check'+id).is(":checked")){
                // consol("Checkbox is checked.");
            //  $('#continue_btn').show();
              var html ='<div class="aggregate-service" id="'+id+'">'
                  +'<span class="service-name">'+repair_type+' </span>'
                  +'<span class="service-price"><b>$'+price+'</b></span>'
                  +'</div>';
                  $('#priceDetails').append(html);
                  total = total + parseInt(price);
                  console.log(total);
                  $('#totalCost').show();
                  $('#totalCost').html('<span>Estimated</span><span class="my-cart-small-text-bold"> $'+total+'</span>');
            }
            else{
                  console.log('uncheck');
                  // $('#continue_btn').hide();
                  console.log($('#check'+id).val());
                   total = total - parseInt(price);
                   $('#totalCost').html('<span>Estimated</span><span class="my-cart-small-text-bold"> $'+total+'</span>');
                  $('#'+id).remove();

            }

      // alert(price);

     }
</script>


@endsection

