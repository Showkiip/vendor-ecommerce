@extends('frontend.layouts.master')
@section('styling')

@endsection

<style>
    .product {
        margin-top: 20px;
        padding-top: 20px top: 100px;
    }

    <style>.checkout-area h3.shoping-checkboxt-title {
        border-bottom: 1px solid #e7e4dd;
        font-size: 24px;
        font-weight: 500;
        margin: 0 0 20px;
        padding-bottom: 10px;
        text-transform: none;
        width: 100%;
    }

    .prod {
        font-size: 2rem;
        line-height: 2.8rem;
        margin: 20px 10px 10px;
        font-family: BodyFont, sans-serif;
        font-weight: 500;
    }

    .single-form-row>input,
    .single-form-row textarea {
        border: 1px solid #e5e5e5;
        height: 42px;
        padding: 0 0 0 10px;
        width: 100%;
    }

    .checkout-review-order {
        background: #f6f6f6 none repeat scroll 0 0;
        padding: 20px;
        margin-top: 40px;
    }

    table.checkout-review-order-table {
        width: 100%;
    }

    .checkout-review-order-table thead th,
    .checkout-review-order-table tbody td,
    .checkout-review-order-table tfoot tr th,
    .checkout-review-order-table tfoot tr td {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border-bottom: 1px solid #dcd8ce;
        border-right: medium none;
        border-top: medium none;
        font-size: 14px;
        padding: 15px 0;
        text-align: left;
    }

    .buy-checkbox-btn {
        margin-top: 20px;
    }

    .buy-checkbox-btn input {
        display: none;
    }

    .buy-checkbox-btn .cbx {
        margin: auto;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        cursor: pointer;
    }

    .buy-checkbox-btn .inp-cbx:checked+.cbx span:first-child {
        background: #00bfa5;
        border-color: #00bfa5;
        animation: wave 0.4s ease;
    }

    .buy-checkbox-btn .inp-cbx:checked+.cbx span:first-child:before {
        transform: scale(3.5);
        opacity: 0;
        transition: all 0.6s ease;
    }

    .buy-checkbox-btn .cbx span:first-child:before {
        content: "";
        width: 100%;
        height: 100%;
        background: #00bfa5;
        display: block;
        transform: scale(0);
        opacity: 1;
        border-radius: 50%;
        transition: 0.5s;
    }

    .buy-checkbox-btn .cbx span:first-child {
        position: relative;
        width: 18px;
        height: 18px;
        border-radius: 3px;
        transform: scale(1);
        vertical-align: middle;
        border: 1px solid #ebebeb;
        transition: all 0.2s ease;
        transition: 0.5s;
    }

    .buy-checkbox-btn .cbx span {
        display: inline-block;
        vertical-align: middle;
        transform: translateZ(0);
    }

    .buy-checkbox-btn .cbx span:first-child svg {
        position: absolute;
        top: 3px;
        left: 2px;
        fill: none;
        stroke: #fff;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
        stroke-dasharray: 16px;
        stroke-dashoffset: 16px;
        transition: all 0.3s ease;
        transition-delay: 0.1s;
        transform: translateZ(0);
        transition: 0.5s;
    }

    .buy-checkbox-btn .inp-cbx:checked+.cbx span:first-child svg {
        stroke-dashoffset: 0;
    }

    .payment-methd {
        border: 1px solid #00bfa5;
        padding: 10px 20px;
        border-radius: 8px;
        margin-right: 15px;
    }

    .btn-checkout {
        background-color: #00bfa5;
        color: #fff;
        border-radius: 15px;
        padding: 10px 40px;
    }

    @media(max-width: 767px) {
        .checkout-review-order {
            padding: 10px;
            margin-top: 20px;
        }

        .payment-methd {
            border: 1px solid #00bfa5;
            padding: 10px 10px;
            border-radius: 8px;
            margin-right: 15px;
        }

        .checkout-area h3.shoping-checkboxt-title {
            padding-left: 10px;
        }
    }

    .S4bdZ3VYnOhPiTGUyVLzy:not(:first-of-type) {
        margin-top: 5.6rem;
    }

    ._3f0Cq5UU:checked~.cFRv-OWR {
        border-color: #343434;
    }

    ._2cj-nKW5,
    .vfVmvzIY,
    ._14X4XpNG,
    ._1RLplcnS,
    ._2HoNsBaT,
    ._2oP9mv4E {
        transition: all 50ms ease-in;
    }

    .cFRv-OWR {
        background-color: #FFFFFF;
        border-radius: 0.6rem;
        border: 0.1rem solid #E5E5E5;
        box-sizing: border-box;
        padding: 2rem;
    }

    ._2cj-nKW5 {
        color: #111111;
        cursor: pointer;
        display: grid;
        grid-template-columns: auto 1fr auto;
        grid-template-rows: minmax(2rem, auto) 1fr;
        grid-template-areas:
            'tick title image'
            'tick description image';
    }

    .remove {
        padding: 12px;
    }

    .carded {

        padding: 2rem;
        margin-top: 20px;

    }

    .S4bdZ3VYnOhPiTGUyVLzy ._3RCSM95D-k4_JqhjxQqJwy {
        display: flex;
        margin-bottom: 2.4rem;
    }

    ._28IelIKC,
    ._2RGsPtNo,
    ._2-OFoVSR {
        font-family: BodyFont, sans-serif;
        font-weight: 300;
        font-size: 1.6rem;
        line-height: 1.9rem;
    }

    .tdQ {
        display: flex;
        align-items: center;
        align-content: center;
        justify-content: center;
    }

</style>
@section('content')
    <!--Page Title-->
    <section class="page-title" style="background-image: url(frontend-assets/images/background/3.jpg);">
        <div class="auto-container">
            <ul class="bread-crumb">
                <li><a href="index-2.html">Home</a></li>
                <li class="active">Cart List</li>
            </ul>
            <h1>Shop Detail</h1>
        </div>
    </section>





    <div class="container">
        <div class="row">
            <div class="col-md-8 product col-md">
                <div class="card">

                    <!-- Warenty Box -->
                    <div class="warrenty-box">
                        <h1 class="card-body prod">Your Device(s)</h1>

                        @php
                            if (Auth::check()) {
                                $userID = Auth::user()->id;
                                $items = \Cart::session($userID)->getContent();
                            } else {
                                $collection = \Cart::getContent();
                            }

                        @endphp


                        <div class="table-responsive">
                            <table class="table">

                                <tbody>
                                    @if (Auth::check())
                                        @forelse ($items as $item)
                                            @php
                                                $images = App\Models\ProductImage::where('product_id', $item->associatedModel->id)->first();

                                            @endphp
                                            @if ($item->attributes->category != 'accessory')

                                                <tr>
                                                    <td><img src="{{ asset('storage/images/products/' . $images->image ?? '') }}"
                                                            class="img" height="90px"></td>
                                                    <td><strong>{{ $item->name }} {{ $item->attributes->storage }} -
                                                            {{ $item->attributes->color }}</strong>
                                                        <br>Condition:
                                                        <strong>{{ $item->attributes->conditition ?? 'New' }}
                                                        </strong>
                                                        <br> <strong>${{ $item->price }}<strong>
                                                    </td>
                                                    <td class="tdQ">
                                                        <input type="number" onfocus="removeval({{ $item->id }})"
                                                            class="form-control border-dark w-40px"
                                                            onchange="recal({{ $item->id }})"
                                                            id="change{{ $item->id }}" value="{{ $item->quantity }}"
                                                            MIN="1" style="width: 70;" />
                                                        <div class="card-toolbar text-right">
                                                            <form method="post">
                                                                @csrf
                                                                <input type="hidden" value="" name="id">
                                                                <a class="remove" type="button" title="Delete"
                                                                    onclick="dlt({{ $item->id }})">Remove</i></a>
                                                                {{-- confirm-delete --}}
                                                            </form>
                                                        </div>
                                                    </td>

                                                </tr>
                                            @else

                                            @endif
                                        @empty
                                            <td colspan="7" class="text-center"><b>Your Product Cart is empty..</b></td>
                                        @endforelse
                                    @else

                                        @forelse ($collection as $item)
                                            @php

                                                $images = App\Models\ProductImage::where('product_id', $item->associatedModel->id)->first();

                                            @endphp
                                            @if ($item->attributes->category != 'accessory')
                                                <tr>
                                                    <td><img src="{{ asset('storage/images/products/' . $images->image ?? '') }}"
                                                            class="img" height="90px"></td>
                                                    <td><strong>{{ $item->name }} {{ $item->attributes->storage }} -
                                                            {{ $item->attributes->color }}</strong>
                                                        <br>Condition:
                                                        <strong>{{ $item->attributes->conditition ?? 'New' }} </strong>
                                                        <br> <strong>${{ $item->price }}<strong>
                                                    </td>
                                                    <td class="tdQ">
                                                        <input type="number" onfocus="removeval({{ $item->id }})"
                                                            class="form-control border-dark w-40px"
                                                            onchange="recal({{ $item->id }})"
                                                            id="change{{ $item->id }}" value="{{ $item->quantity }}"
                                                            MIN="1" style="width: 70;" />
                                                        <div class="card-toolbar text-right">
                                                            <form method="post">
                                                                @csrf
                                                                <input type="hidden" value="" name="id">
                                                                <a class="remove" type="button" title="Delete"
                                                                    onclick="dlt({{ $item->id }})">Remove</a>
                                                                {{-- confirm-delete --}}
                                                            </form>
                                                        </div>
                                                    </td>

                                                </tr>
                                            @else

                                            @endif
                                        @empty
                                            <td colspan="7" class="text-center"><b>Your Product Cart is empty..</b></td>
                                        @endforelse
                                    @endif
                                </tbody>
                            </table>
                        </div>




                        <h1 class="card-body prod"> Your Accessory </h1>
                        <!-- Warenty Box -->



                        @php
                            if (Auth::check()) {
                                $userID = Auth::user()->id;
                                $items = \Cart::session($userID)->getContent();
                            } else {
                                $collection = \Cart::getContent();
                            }

                        @endphp
                        <div class="table-responsive">
                            <table class="table">

                                <tbody>

                                    @if (Auth::check())


                                        @forelse ($items as $item)
                                            @php
                                                $image = App\Models\AccessoryImage::where('accessory_id', $item->associatedModel->id)->first();

                                            @endphp
                                            @if ($item->attributes->category == 'accessory')
                                                <tr>
                                                    <td><img src="{{ asset('/storage/accessories/images/' . $image->images) }}"
                                                            class="img" height="90px"></td>
                                                    <td>
                                                        <p> <strong>{{ $item->name }} -
                                                                {{ $item->associatedModel->name }} </strong>
                                                            <br>
                                                            {{ $item->associatedModel->accessoryCategory->category }}<br><strong>${{ $item->price }}</strong>
                                                        </p>
                                                    </td>
                                                    {{-- <td>{{$item->associatedModel->conditition}}</td> --}}
                                                    <td class="tdQ">
                                                        <input type="number" onfocus="removeval({{ $item->id }})"
                                                            class="form-control border-dark w-40px"
                                                            onchange="recal({{ $item->id }})"
                                                            id="change{{ $item->id }}" value="{{ $item->quantity }}"
                                                            MIN="1" style="width: 70;" />
                                                        <div class="card-toolbar text-right">
                                                            <form method="post">
                                                                @csrf
                                                                <input type="hidden" value="" name="id">
                                                                <a class="remove" type="button" title="Delete"
                                                                    onclick="dlt({{ $item->id }})">Remove</a>
                                                                {{-- confirm-delete --}}
                                                            </form>
                                                        </div>
                                                    </td>



                                                </tr>
                                            @else

                                            @endif
                                        @empty
                                            <td colspan="7" class="text-center"><b>Your Accessory Cart is empty..</b>
                                            </td>
                                        @endforelse
                                    @else
                                        @forelse ($collection as $item)
                                            @php
                                                $image = App\Models\AccessoryImage::where('accessory_id', $item->associatedModel->id)->first();

                                            @endphp
                                            @if ($item->attributes->category == 'accessory')
                                                <tr>
                                                    <td><img src="{{ asset('/storage/accessories/images/' . $image->images) }}"
                                                            class="img" height="90px"></td>
                                                    <td>
                                                        <p> <strong>{{ $item->name }} -
                                                                {{ $item->associatedModel->name }} </strong>
                                                            <br>
                                                            {{ $item->associatedModel->accessoryCategory->category }}<br><strong>${{ $item->price }}</strong>
                                                        </p>
                                                    </td>

                                                    {{-- <td>{{$item->associatedModel->conditition}}</td> --}}
                                                    <td class="tdQ">
                                                        <input type="number" onfocus="removeval({{ $item->id }})"
                                                            class="form-control border-dark w-40px"
                                                            onchange="recal({{ $item->id }})"
                                                            id="change{{ $item->id }}" value="{{ $item->quantity }}"
                                                            MIN="1" style="width: 70;" />
                                                        <div class="card-toolbar text-right">
                                                            <form method="post">
                                                                @csrf
                                                                <input type="hidden" value="" name="id">
                                                                <a class="remove" type="button" title="Delete"
                                                                    onclick="dlt({{ $item->id }})">Remove</a>
                                                                {{-- confirm-delete --}}
                                                            </form>
                                                        </div>
                                                    </td>

                                                </tr>
                                            @else

                                            @endif
                                        @empty
                                            <td colspan="7" class="text-center"><b>Your Accessory Cart is empty..</b>
                                            </td>
                                        @endforelse
                                    @endif
                                </tbody>
                            </table>
                        </div>


                        <div class="carded">
                            <div class="S4bdZ3VYnOhPiTGUyVLzy">
                                <span class="_28IelIKC _3RCSM95D-k4_JqhjxQqJwy">
                                    Shipping to US (mainland)
                                </span>
                                <div class="_2sXchhtP6UC8xDg7CAxIOD"><input hidden id="cart-choice-338429-delivery-1943"
                                        type="radio" value="" data-qa="cart-option-3 business days - USPS - 2Days"
                                        data-test="choice-radioline" name="cart-choice-338429-delivery-1943"
                                        class="_3f0Cq5UU" checked> <label for="cart-choice-338429-delivery-1943"
                                        class="_2cj-nKW5 cFRv-OWR">
                                        <div class="_35yAy2pr">
                                            <div class="vfVmvzIY">
                                                <div class="_14X4XpNG"></div>
                                            </div>
                                        </div>
                                        <div class="_1RLplcnS"><span class="_28IelIKC"><span
                                                    class="_2RGsPtNo">
                                                    Free Shipping via USPS in 3 – 5 Business Days
                                                </span> </span></div>
                                        <!---->
                                        <div class="_3xq0jKVx">
                                            <!---->
                                            <!---->
                                        </div>
                                    </label></div>
                            </div>
                        </div>


                        <hr>
                        <div class="row">
                            <div class="col-md-6" style=" margin-left: 16px;">

                                <label>Select Previously Added Address</label>
                                <select class="form-control" onchange="getAddress(this)">
                                    <option value="0"> Select Address</option>
                                    @if (Auth::check())
                                        @foreach (CityClass::shippingAddress() as $shipAddress)
                                            <option value="{{ $shipAddress->id }}">{{ $shipAddress->shipaddress }}
                                            </option>
                                        @endforeach

                                    @else
                                        <option>Fill below Address Info</option>
                                    @endif

                                </select>

                            </div>
                        </div>
                        <br>
                        <div id="getAddress">
                            <form action="{{ url('shippadd.create') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="modal-body">


                                    <div class="form-group">
                                        <label>Full name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Full Name"
                                            required="" @if(Auth::guard('web')->check()) value="{{Auth::guard('web')->user()->name}}" @else value="" @endif>
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Full Email"
                                            required="" @if(Auth::guard('web')->check()) value="{{Auth::guard('web')->user()->email}}" @else value="" @endif>
                                            @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>

                                            <div class="input-group">
                                            <span class="input-group-addon">us +1</span>
                                            <input type="text" class="form-control" name="mobileNo" aria-label="Amount (to the nearest dollar)" placeholder="Phone Number" Min="10" Max="11" @if(Auth::guard('web')->check()) value="{{Auth::guard('web')->user()->phoneno}}" @else value="" @endif>

                                            </div>
                                            @if ($errors->has('mobileNo'))
                                                <span class="text-danger">{{ $errors->first('mobileNo') }}</span>
                                            @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="shipaddress" class="form-control"
                                            placeholder="Full address"  @if(Auth::guard('web')->check()) value="{{Auth::guard('web')->user()->address}}" @else value="" @endif required>
                                    </div>
                                    <!-- <div class="form-group">
                                            <label>Street Address</label>
                                            <input type="text" name="street_address" class="form-control"  placeholder="Street address" required>
                                        </div> -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Country</label>
                                                <input type="text" name="country" placeholder="Country"  @if(Auth::guard('web')->check()) value="{{Auth::guard('web')->user()->country}}" @else value="United States" @endif
                                                    class="form-control"  readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label>State</label>
                                                <select name="state" class="form-control" onchange="getCities(this)"
                                                    required>
                                                    <option value="0">Select State</option>
                                                    @foreach (CityClass::states() as $state)
                                                        <option @if(Auth::guard('web')->check())  {{($state->name == Auth::guard('web')->user()->state) ? 'selected' : ''}} @endif value="{{ $state->name }}">{{ $state->name }}</option>
                                                    @endforeach


                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <label>City</label>
                                                <input type="text" name="city" class="form-control" placeholder="City Name"
                                                    @if(Auth::guard('web')->check()) value="{{Auth::guard('web')->user()->city}}" @else value="" @endif>
                                                @if ($errors->has('city'))
                                                <span class="text-danger">{{ $errors->first('city') }}</span>
                                            @endif
                                                <!-- <select name="city" class="form-control" required id="city">
                                                    <option>Select city</option>
                                                </select> -->
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">Zip Code</label>
                                                <input type="text" name="zipcode" placeholder="Zip Code"
                                                    class="form-control"  @if(Auth::guard('web')->check()) value="{{Auth::guard('web')->user()->zipcode}}" @else value="" @endif required>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
                                    <button type="submit" class="btn btn-primary btn-style-one">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-lg-4  col-xl-4 col-sm-4">
                <div class="card">


                    @php
                        if (Auth::check()) {
                            $userID = Auth::user()->id;
                            $totals = Cart::session($userID)->getTotal();
                            $items = \Cart::session($userID)->getContent();
                        } else {
                            $totals = Cart::getTotal();
                            $items = \Cart::getContent();
                        }

                    @endphp


                    <div class="checkout-review-order">

                        <h3 class="shoping-checkboxt-title">Your order</h3>
                        <table class="checkout-review-order-table">
                            <thead>
                                <tr>
                                    <th class="t-product-name">Product</th>
                                    <th class="product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($items as $item)
                                    <tr class="cart_item cart-545678">
                                        <td class="t-product-name">{{ $item->name }} -
                                            ({{ $item->attributes->category ?? '' }}) - <strong class="product-quantity">
                                                ×
                                                {{ $item->quantity }}</strong></td>
                                        @php
                                            $total = $item->quantity * $item->price;
                                        @endphp
                                        <td class="t-product-price"><span>${{ $total }}</span></td>
                                    </tr>

                                @endforeach


                            </tbody>
                            <tfoot>
                                @php

                                @endphp
                                <tr class="order-total">
                                    <th>Total</th>
                                    <td id="totalss"><strong><span class="total-amount" id="total">$
                                                {{ $totals }}</span></strong></td>

                                </tr>
                            </tfoot>
                        </table>


                    </div>

                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Credit Card</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="payment-form" method="post">

                        <div id="card-container"></div>
                </div>
                <button type="button" class="btn btn-primary btn-style-one" data-dismiss="modal"
                    style="margin-bottom: 5px;margin-left: 5px">Close</button>
                <button id="card-button" class="btn btn-primary btn-style-one" type="button"
                    style="margin-bottom: 5px">Pay</button>
                </form>
            </div>

        </div>

    </div>
@endsection
@section('script')

    <script>
        function couponCode() {
            var coupon = $('#coupon').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                type: "POST",
                url: "{{ route('apply.coupon') }}",
                data: {
                    coupon: coupon,
                    _token: _token
                },
                success: function(response) {
                    console.log(response);
                    if (response == "null") {
                        alert('Coupon Code is Not Valid.');

                        $('#coupon').val('');
                    } else {
                        alert('Coupon Code Apply Successfully');
                        // window.location.reload();

                        $("#total").hide();
                        var total = '<strong><span class="total-amount" id="totalss">$' + response +
                            '</span></strong>';
                        $("#totalss").append(total);

                    }
                }
            });
        }



        // window.onload = function() {
        //     var reloading = sessionStorage.getItem("reloading");
        //     if (reloading) {
        //         sessionStorage.removeItem("reloading");
        //         myFunction();
        //     }
        // }

        function myFunction() {

            $.ajax({
                type: "get",
                url: "{{ route('coupon.remove') }}",
                success: function(response) {
                    // console.log(response);
                    // alert('Coupon Remove');


                }
            });
        }



        function recal(pid) {
            // var _token = $('input[name="_token"]').val();
            // alert(pid);
            var id = pid;
            var value = $('#change' + id).val();
            $.ajax({
                type: "post",
                url: "{{ route('cart.update') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: pid,
                    quantity: value
                },
                success: function(user) {
                    window.location.reload();
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        // function removeval(id){
        //     //  alert(id);
        //     $("#change"+id).removeVal('value');

        //     }

        function dlt(item) {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                type: "post",
                url: "{{ route('cart.remove') }}",
                data: {
                    id: item,
                    _token: _token
                },
                success: function(user) {
                    window.location.reload();
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function getAddress(event) {
            var id = $(event).val();
            // alert(id);
            console.log(id);
            if (id == 0) {
                $('#getAddress').reset();
            }

            $.ajax({
                url: "{{ url('getAddress') }}/" + id,
                type: "get",
                success: function(response) {
                    console.log(response);
                    $('#getAddress').html(response);
                    //   $('#exampleModal'+id).modal('show');
                },

            });


        }

        function getCities(event) {
            var id = $(event).val();
            // alert(id);
            console.log(id);
            if (id == 0) {
                $('#city').reset();
            }

            $.ajax({
                url: "{{ url('getcity') }}/" + id,
                type: "get",
                success: function(response) {
                    console.log(response);
                    $("#city").html(response);
                },

            });

        }
    </script>



@endsection
