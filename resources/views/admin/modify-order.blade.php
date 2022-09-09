@extends('admin.layouts.master')

@section('title') Modify Repair Order @endsection

@section('content')
    @component('admin.common-components.breadcrumb')
        @slot('title') Modify Repair Order @endslot
        @slot('li_1') @endslot
        @slot('li_2')@endslot
    @endcomponent
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    @if (Session::has('message'))
                        <div class="form-group row">
                            <div class="col-md-10">
                                <label for="example-text-input" class="col-md-2 col-form-label" center></label>

                                {!! Session::get('message') !!}
                            </div>
                        </div>
                    @endif
                    <div class="card-body">

                        <form action="{{ url('admin/repairModel-update', $repairOrders->id) }}" method="post">
                            {{ csrf_field() }}

                            @if ($repairOrders->order_create == 'admin')
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Customer</label>
                                    <div class="col-md-10">
                                        <select class="form-control selectpic" name="userId" required="">
                                            <option selected="">Select Customer</option>
                                            @foreach (CityClass::allUser() as $user)
                                                <option value="{{ $user->id }}"
                                                    {{ $user->id == $repairOrders->userId ? 'selected' : '' }}>
                                                    {{ $user->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            @else
                                <input type="hidden" name="userId" value="{{ $repairOrders->userId }}">

                            @endif

                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Zip Code</label>
                                <div class="col-md-10">
                                    <select class="form-control selectpic" name="zip_code" required="">
                                        <option selected="">Select Zip Code</option>
                                        @foreach (CityClass::ZipCode() as $zip)
                                            <option value="{{ $zip->id }}"
                                                {{ $zip->name == $zip->zipcode ? 'selected' : '' }}>{{ $zip->zipcode }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Brands</label>
                                <div class="col-md-10">
                                    <select class="form-control selectpic" name="brand" id="brand"
                                        onchange="getModel(this)">
                                        <option selected="">Select Brand</option>
                                        @foreach (CityClass::brands() as $brand)
                                            <option value="{{ $brand->id }},{{ $brand->brand_name }}"
                                                {{ $brand->id == $repairOrders->pModel->brand_Id ? 'selected' : '' }}>
                                                {{ $brand->brand_name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="form-group row" id="showModels">
                                <label for="example-text-input" class="col-md-2 col-form-label">Models</label>
                                <div class="col-md-10">
                                    <select class="form-control selectpic" name="model_Id" id="model_Id" required=""
                                        onchange="getRepair(this)">

                                        <option value="{{ $model->id }}">{{ $model->model_name }}</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Repair Type</label>
                                <div class="col-md-10" id="model-repair">

                                    @forelse ($checkbox as $repair)

                                        <div class="form-check">
                                            <input class="form-check-input" name="repair_type[]" type="checkbox"
                                                value="{{ $repair->repair_type }}" id="{{ $repair->id }}"
                                                {{ $repairOrders->id == $repair->order_Id ? ' checked' : '' }}>
                                            <label class="form-check-label" for="{{ $repair->id }}">
                                                {{ $repair->repair_type }} {{ $repair->price }}
                                            </label>

                                        </div>

                                    @empty
                                        <span>Oops No Repair Product Available !</span>
                                    @endforelse

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Date</label>
                                <div class="col-md-10">
                                    <input class="form-control" name="date" type="date" placeholder="Select date"
                                        title="Select Date" value="{{ $repairOrders->date }}" id="txtDate">
                                    <span class="text-danger">{{ $errors->first('date') }}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Time</label>
                                <div class="col-md-10">
                                    <input class="form-control" name="time" type="time" placeholder="Select time"
                                        title="Select Date" value="{{ $repairOrders->time }}" id="example-text-input"
                                        required>
                                    <span class="text-danger">{{ $errors->first('price') }}</span>
                                </div>
                            </div>
                            <input type="hidden" name="check" value="" id="checkId">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Instruction</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="instruction" type="text"
                                        placeholder="Select instruction" title="Select instruction" @if (old('instruction')) value="{{ $repairOrders->instructions }}" @endif
                                        id="example-text-input" required>{{ $repairOrders->instructions }}</textarea>
                                    <span class="text-danger">{{ $errors->first('instruction') }}</span>
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
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
                                                <div id="brandname">
                                                    <h5>Brand Name:<b style="float: center">
                                                            {{ $model->brand->brand_name }}</b>
                                                        <h5>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="services-aggregation-details-wrapper">

                                            <div id="PmodelName">
                                                <h6>Model Name: <b>{{ $model->model_name }}</b> </h6>
                                            </div>
                                            @php
                                                $total = 0;
                                            @endphp
                                            <div class="services-aggregation-details" id="priceDetails">
                                                @foreach ($checkbox as $item)
                                                    <div class="aggregate-service">
                                                        <span class="service-name">Repair Type:
                                                            {{ $item->repair_type }}</span>
                                                        <span class="service-price"><b>${{ $item->price }}</b></span>
                                                    </div>

                                                    @php

                                                        $total = $total + $item->price;
                                                    @endphp
                                                @endforeach
                                            </div>

                                        </div>
                                        <hr>
                                        <div class="subtotal-container" id="totalCost">
                                            <span>Estimated :</span><span class="my-cart-small-text-bold"><b>
                                                    ${{ $total }}</b></span>
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

        function getModel(event) {
            $("#PmodelName").empty();
            $("#totalCost").empty();
            $("#priceDetails").empty();
            $("#checkId").val('check');
            // alert($(event).val());
            var brand = $(event).val().split(',');
            var id = brand[0];
            var brandName = brand[1];


            $('#brandname').html('<h5>Brand Name :<b>' + brandName + '</b></h5>');
            $('#model-repair').hide();
            //    var id =$(event).val();
            $.ajax({
                url: "{{ url('admin/getModels') }}/" + id,
                type: "get",
                success: function(response) {
                    console.log(response);
                    $('#showModels').html(response);
                    $('#exampleModal' + id).modal('show');
                },

            });

        }

        function getRepair(event) {

            $("#PmodelName").empty();
            $("#totalCost").empty();
            $("#priceDetails").empty();

            var model = $(event).val().split(',');
            // alert(model);
            var id = model[0];
            var modelName = model[1];
            $('#PmodelName').html('<h6>Model Name :<b>' + modelName + '</b></h6>');

            $('#model-repair').show();
            var id = $(event).val();
            $.ajax({
                url: "{{ url('admin/getRepair') }}/" + id,
                type: "get",
                success: function(response) {
                    console.log(response);



                    $('#model-repair').html(response);
                    $('#exampleModal' + id).modal('show');
                },

            });

        }



        $(function() {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;

            // or instead:
            // var maxDate = dtToday.toISOString().substr(0, 10);
            // alert(maxDate);
            $('#txtDate').attr('min', maxDate);
        });


        /// Cart



        var total = 0;

        function custom_check(id, repair_type, price) {

            if ($('#check' + id).is(":checked")) {
                // consol("Checkbox is checked.");
                //  $('#continue_btn').show();
                var html = '<div class="aggregate-service" id="' + id + '">' +
                    '<span class="service-name">' + repair_type + ' </span>' +
                    '<span class="service-price"><b>$' + price + '</b></span>' +
                    '</div>';
                $('#priceDetails').append(html);
                total = total + parseInt(price);
                console.log(total);
                $('#totalCost').show();
                $('#totalCost').html('<span>Estimated</span><span class="my-cart-small-text-bold"> $' + total + '</span>');
            } else {
                console.log('uncheck');
                // $('#continue_btn').hide();
                console.log($('#check' + id).val());
                total = total - parseInt(price);
                $('#totalCost').html('<span>Estimated</span><span class="my-cart-small-text-bold"> $' + total + '</span>');
                $('#' + id).remove();

            }

            // alert(price);

        }
    </script>


@endsection
