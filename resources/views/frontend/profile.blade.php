@extends('frontend.layouts.master')

@section('content')
<!--Page Title-->
<!-- <section class="page-title" style="background-image: url(frontend-assets/images/background/3.jpg);">
	<div class="auto-container">
    	<ul class="bread-crumb">
            <li><a href="index-2.html">Home</a></li>
            <li class="active">Shop</li>
        </ul>
    	<h1>Shop</h1>
    </div>
</section> -->
<!--End Page Title-->
<style>
    .tracking-card
    {
    background: #f3f3f32e;
    padding-top: 45px;
    box-shadow: 1px 1px 4px #88888880;
    box-shadow: 0 ,8px,20px, #000;
    padding-bottom: 45px;
    }
    @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

fieldset, label { margin: 0; padding: 0; }
body{ margin: 20px; }
h1 { font-size: 1.5em; margin: 10px; }

/****** Style Star Rating Widget *****/

.rating {
  border: none;
  float: left;
}

.rating > input { display: none; }
.rating > label:before {
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before {
  content: "\f089";
  position: absolute;
}

.rating > label {
  color: #ddd;
 float: right;
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  }
</style>


<section class="shop-section shop-page profile-page">
	<div class="auto-container">
		 @if(Session::has('message'))
                  <div class="col-12">
                      {!!Session::get('message')!!}
                  </div>
                  @endif
		<div role="tabpanel">
			<div class="row">

				<div class="col-md-3">
					<!-- Nav tabs -->
					<ul class="nav nav-pills nav-stacked profile-tabs nav-tabs-dropdown" role="tablist">
						<li role="presentation" class="active">
							<a href="#MyProfile" aria-controls="MyProfile" role="tab" data-toggle="tab">My Profile</a>
						</li>
						<li role="presentation">
							<a href="#repairs" aria-controls="repairs" role="tab" data-toggle="tab">Repair</a>
						</li>
						<li role="presentation">
							<a href="#myOrders" aria-controls="myOrders" role="tab" data-toggle="tab">My Orders</a>
						</li>
						<li role="presentation">
							<a href="#billStatus" aria-controls="billStatus" role="tab" data-toggle="tab">Bill Status</a>
						</li>
						<li role="presentation">
							<a href="#savedAddress" aria-controls="savedAddress" role="tab" data-toggle="tab">Saved Address</a>
						</li>
						<li role="presentation">
							<a href="#shipTracking" aria-controls="shipTracking" role="tab" data-toggle="tab">Tracking</a>
						</li>
                        <li role="presentation">
                            <a href="#wishlists" aria-controls="wishlists" role="tab" data-toggle="tab"> Wishlist</a>
                         </li>
						<li role="presentation">
							<a href="{{url('/logout')}}" >Logout</a>
						</li>
					</ul>
				</div>

				<div class="col-md-9">
					<!-- Tab panes -->

					<div class="tab-content">
                        @if(Session::has('success'))
                    <div class="alert alert-success">
                       {!!Session::get('success')!!}
                    </div>
                    @endif
						<div role="tabpanel" class="tab-pane active" id="MyProfile">
							<h3 class="title-section">My Profile</h3><br>
							<form action="{{route('update.profile',Auth::guard('web')->user()->id)}}" method="POST">
                                @csrf
                                @method('PUT')
								<div class="form-group">
									<label>Name</label>
									<input type="text" name="name" class="form-control" value="{{Auth::guard('web')->user()->name}}">
								</div>
								<div class="form-group">
									<label>Phone</label>
									<input type="number" name="phoneno" class="form-control" value="{{Auth::guard('web')->user()->phoneno}}" >
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" class="form-control" value="{{Auth::guard('web')->user()->email}}">
								</div>
								<div class="form-group">
									<label>Address</label>
									<textarea cols="4" rows="4" name="address" class="form-control">{{Auth::guard('web')->user()->address}}</textarea>
								</div>
                                  <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Country</label>
                                                <input type="text" name="country" placeholder="Country" class="form-control" value="{{Auth::guard('web')->user()->country}}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>State</label>
                                                <select name="state" class="form-control" onchange="getCities(this)"
                                                    required>
                                                    <option value="0">Select State</option>
                                                    @foreach (CityClass::states() as $state)
                                                        <option {{($state->name == Auth::guard('web')->user()->state) ? 'selected' : ''}} value="{{ $state->name }}">{{ $state->name }}</option>
                                                    @endforeach


                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <label>City</label>
                                                <input type="text" name="city" class="form-control" placeholder="City Name" value="{{Auth::guard('web')->user()->city}}"
                                                   required >
                                                @if ($errors->has('city'))
                                                <span class="text-danger">{{ $errors->first('city') }}</span>
                                            @endif
                                                <!-- <select name="city" class="form-control" required id="city">
                                                    <option>Select city</option>
                                                </select> -->
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">Zip Code</label>
                                                <input type="text" value="{{Auth::guard('web')->user()->zipcode}}" name="zipcode" placeholder="Zip Code"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
								<div class="form-group text-right">
									<input type="submit" name="submit" class="btn btn-style-one" value="save">
								</div>
							</form>
						</div>
						<div role="tabpanel" class="tab-pane" id="repairs">
							<h3 class="title-section">Repairs</h3><br>
							<div class="table-responsive">
								<table id="example" class="table table-bordered table-hover" >
									<thead>
										<tr>
											<th colspan="2">Sr#</th>
											<th colspan="2">Model</th>
											<th colspan="2">Repair Type</th>
											<th colspan="2">Time & Date</th>
											<th colspan="2">Price</th>
                                            <th colspan="2">Payment Method</th>
											<th colspan="2">Status</th>
                                            <th colspan="2">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach(Auth::guard('web')->user()->repairorders as $index => $order)
										<tr>
											<td colspan="2">{{$index + 1}}</td>
											<td colspan="2">{{CityClass::modelName($order->model_Id)}}</td>
											<td colspan="2">
												@foreach($order->repairorderstypes as $repair)
												   {{$repair->repair_type}}<br>
                                                @endforeach
											</td>
											<td colspan="2">{{$order->date}} {{$order->time}}</td>
											<td colspan="2">
												@foreach($order->repairorderstypes as $repair)
												   ${{$repair->price}}<br>
                                                @endforeach
											</td>
                                            <td colspan="2"><span class="badge  badge-success" style="background-color: #f1b44c">{{$order->pay_method}}</span></td>

											<td colspan="2"> @if ($order->order_status == 3 && $order->techId !== null)
                                                <span class="badge badge-pill badge-warning" style="background-color: #f1b44c">Assign</span>
                                                @elseif ($order->order_status == 1  && $order->techId !== null)
                                                <span class="badge badge-pill badge-success" style="     background-color: #51cbce;
												">Accept</span>

                                                @elseif ($order->order_status == 0  && $order->techId !== null)
                                                <span class="badge badge-pill badge-secondary">Pendding</span>
                                                @elseif ($order->order_status == 4 && $order->techId !== null)
                                                <span class="badge badge-pill badge-success" style="background-color: #6bd098">Complete</span>
                                                @else
                                                <span class="badge badge-primary" style="background-color: #50a5f1">Not Assign</span>
                                                @endif</td>
											<!-- <td><a href=""><i class="fa fa-eye text-danger"></i></a></td> -->
                                            <td colspan="2">
                                                @if ($order->order_status == 1  && $order->techId !== null)
                                                <a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal{{$order->id}}" onclick="viewDetail('{{$order->id}}')" class="mr-3 text-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Detail"><i class="fa fa-eye font-size-18"></i></a>
                                                <a href="{{route('complete.order',$order->id)}}" title="Pay the Order" class="btn btn-warning btn-sm">Pay</a>
                                                @else
                                                 <a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal{{$order->id}}" onclick="viewDetail('{{$order->id}}')" class="mr-3 text-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Detail"><i class="fa fa-eye font-size-18"></i></a>

                                                @endif


                                            </td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="myOrders">
							<h3 class="title-section">My Orders</h3><br>
							<div class="table-responsive">
                                <table id="example" class="table table-bordered table-hover">
									<thead>
										<tr>
											<th>OrderSale ID</th>
                                            <th>Name</th>
											<th>Created At</th>
											<th>Shipping Address</th>
                                            <th>Status</th>
                                            <th>Tracking</th>
											<th>Grand Price</th>

											<th>Action</th>
										</tr>
									</thead>
									<tbody>
                                        @forelse (CityClass::orderlist(Auth::user()->id) as $orderSale)
                                        <tr>
                                            {{-- @php
                                                $order= App\Models\Order::where('orderSales_id',$orderSale->id)->first();
                                                // dd($order);
                                            @endphp --}}
                                            <td>{{$orderSale->id}}</td>
                                            <td>{{$orderSale->user->name ?? ''}}</td>
											<td>{{$orderSale->created_at->format('D-M-y h:s')}}</td>

											<td>{{$orderSale->shipAddress->shipaddress ?? ''}}</td>
											
                                               <td>
                                                @if ($orderSale->status == 2)
                                                <span class="badge badge-success" style="background: rgb(1, 100, 1)">complete</span>
                                                @elseif ($orderSale->status == 1)
                                                <span class="badge badge-warning" style="background: rgb(223, 223, 2)">shipping</span>
                                                @else
                                                <span class="badge badge-secondary">Pending</span>
                                                @endif
                                               </td>
                                               <td>@if ($orderSale->status == 1) <a href="https://tools.usps.com/go/TrackConfirmAction_input?origTrackNum={{$orderSale->tracking_code }}" target="_blank">Track Order</a>
                                                @endif
                                               </td>

                                               <td>
                                                ${{$orderSale->grand_total}}
                                               </td>

											<td>
                                                <a href="#" onclick="orderViewDetails('{{$orderSale->id}}')" class="mr-3 text-success"><i class="fa fa-eye font-size-18"></i></a>
                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">
                                                  Soory No Order Yet...
                                                </td>
                                            </tr>
                                        @endforelse


									</tbody>
								</table>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="billStatus">
							<h3 class="title-section">Bill Status</h3><br>
							<div class="table-responsive">
                                <table id="example" class="table table-bordered table-hover" >
									<thead>
										<tr>
											<th>Sr#</th>
											<th>Paid Through</th>
											<th>Payment</th>
											<th>Paid on</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>VISA/Master</td>
											<td>$100</td>
											<td>12-07-21</td>
											<td>Paid</td>
											<td><a href=""><i class="fa fa-trash text-danger"></i></a></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
                        <div role="tabpanel" class="tab-pane" id="wishlists">
                            <h3 class="title-section">wishlist</h3><br>
                            <div class="table-responsive">
                                <table id="example" class="table table-bordered table-hover" >
                                    <thead>
                                        <tr>
                                            <th colspan="2">Sr#</th>
                                            <th colspan="2">User</th>
                                            <th colspan="2">Product</th>


                                            <th colspan="2">Status</th>
                                            <th colspan="2">Time & Date</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(Auth::guard('web')->user()->wishlist as $index => $wishl)
                                        @php
                                        // dd($wishl);
                                        $product = App\Models\Product::where('id',$wishl->product_id)->first();
                                        $accessory = App\Models\Accessory::where('id',$wishl->accessory_id)->first();

                                        if (isset($product)) {
                                            $model = App\Models\Pmodel::where('id',$product->model_id)->first();
                                        }
                                        elseif (isset($accessory)) {
                                            $model = App\Models\Pmodel::where('id',$accessory->model_id)->first();
                                            // dd($accessory);
                                        }
                                        else {
                                            # code...
                                        }


                                            // dd($model);
                                        @endphp
                                        <tr>
                                            <td colspan="2">{{$index}}</td>
                                            <td colspan="2">{{$wishl->user->name}}</td>
                                            <td colspan="2">{{$model->model_name ?? ''}}</td>
                                            <td>
                                                @if (isset($wishl->product_id))
                                                <span class="badge badge-pill badge-success" style="background-color: #f1b44c;">Phone</span>
                                                @else
                                                <span class="badge badge-pill badge-warning" style="background-color: #337ab7;">Accessory</span>
                                                @endif
                                            </td>
                                            <td colspan="2">{{$wishl->created_at}}</td>

                                            <td colspan="2">
                                                @if ($wishl->status == 1)
                                                 <span class="badge badge-pill badge-warning" style="background-color: #f1b44c;">Favourite</span>
                                                 @endif
                                            </td>
                                           <td>
                                            <a href="{{url('delete-wishlist',$wishl->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            @if (isset($wishl->product_id))
                                            <a href="{{route('product.details',$product->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a></td>
                                            @elseif (isset($wishl->accessory_id))
                                            <a href="{{route('accessory.details',$accessory->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a></td>

                                            @endif

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="shipTracking">
                            <div class="card tracking-card" >

                                <form  style="max-width:100%">

                                    <div class=" row d-flex justify-content-between align-items-center">
                                        <div>
                                            <h3 class="title-section" style="margin-top: 5px">Tracking</h3>
                                        </div>

                                         <div class="d-flex">
                                        <div class="form-outline">
                                        <input type="search"  name="trackingNo" id="trackingNo" class="form-control" placeholder="Tracking Number"/>

                                        </div>
                                        <div>
                                            <button type="button" onclick="trackNo()" class="btn btn-primary">
                                                <i class="fa fa-search"></i></button>

                                        </div>
                                       </div>

                                    </div>
                                </form>


                            </div>
                            <div id="trackingOrder">

                            </div>
                        </div>

						<div role="tabpanel" class="tab-pane" id="savedAddress">
							<div class="d-flex justify-content-between title-section">
								<h3>My Address</h3><br>
								<a class="btn btn-primary btn-style-one" data-toggle="modal" href='#modal-addAddress'>Add New Address</a>

							</div>
							<div class="row">
								@foreach(Auth::guard('web')->user()->shippingaddress as $shipingAdd)
								<div class="col-md-6">
									<div class="address-box">
										<h6><strong>{{$shipingAdd->name}}</strong></h6>
										<p><i class="fa fa-phone"></i> {{$shipingAdd->mobileNo}}</p>
										<p><i class="fa fa-map-marker"></i> {{$shipingAdd->shipaddress}}</p>
										<p>{{$shipingAdd->city}}, {{$shipingAdd->state}}, {{$shipingAdd->country}},{{$shipingAdd->zipcode}}</p>

										<div class="action-btn text-center">
											<button class="btn" data-toggle="modal" href='#modal-editAddress{{$shipingAdd->id}}'><i class="fa fa-edit"></i> Edit</button>
											<form action="{{url('shipAddress/'.$shipingAdd->id)}}" method="post" style="display: contents;">
                                            {{csrf_field()}}
                                               @method('DELETE')

											<button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
										</form>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<!-- Add New Address Modal -->

							<div class="modal fade" id="modal-addAddress">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header d-flex justify-content-between">
											<h4 class="modal-title"><strong>Add New Address</strong></h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										</div>
										<form action="{{url('shipAddress')}}" method="post">
										<div class="modal-body">

												 {{csrf_field()}}
												<div class="form-group">
													<label>Full name</label>
													<input type="text" name="name" class="form-control" placeholder="Full Name" required="">
												</div>
												<div class="form-group">
													<label>Email</label>
													<input type="text" name="email" class="form-control" placeholder="Email" required>
												</div>
												<div class="form-group">
													<label>Phone Number</label>
													<!-- <input type="text" name="mobileNo" class="form-control" placeholder="Phone Number" required> -->
                                                    <div class="input-group">
                                                    <span class="input-group-addon">us +1</span>
                                                    <input type="number" class="form-control" name="mobileNo" aria-label="Amount (to the nearest dollar)" placeholder="Phone Number"  required>
                                           
                                            </div>
                                            @if ($errors->has('mobileNo'))
                                                <span class="text-danger">{{ $errors->first('mobileNo') }}</span>
                                            @endif
                                                </div>
												<div class="form-group">
													<label>Address</label>
													<input type="text" name="shipaddress" class="form-control" placeholder="address" required>
												</div>
                                                <!-- <div class="form-group">
													<label>Street Address</label>
													<input type="text" name="street_address" class="form-control" placeholder="Street address" required>
												</div> -->
												<div class="form-group">
													<div class="row">
														<div class="col-md-6">
															<label>Country</label>
															<input type="text" name="country" placeholder="Country" class="form-control" value="America" readonly>
														</div>
														<div class="col-md-6">
															<label>State</label>
															<input type="text" name="state" placeholder="State" class="form-control" required>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-md-6">
															<label>City</label>
															<input type="text" placeholder="City" name="city" class="form-control" required>
														</div>
														<div class="col-md-6">
															<label class="control-label">Zip Code</label>
															<input type="text" name="zipcode" placeholder="Zip Code" class="form-control" required>
														</div>
													</div>
												</div>

										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary btn-style-one">Save</button>
										</div>
										</form>
									</div>
								</div>
							</div>
							<!-- End Add New Address -->
							<!-- Add New Address Modal -->
                @foreach(Auth::guard('web')->user()->shippingaddress as $shipingAdd)
							<div class="modal fade" id="modal-editAddress{{$shipingAdd->id}}">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header d-flex justify-content-between">
											<h4 class="modal-title"><strong>Edit Address</strong></h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										</div>
										<form action="{{route('shipAddress.update',$shipingAdd->id)}}" method="post">
                                            {{csrf_field()}}
                                            @method('PUT')
										<div class="modal-body">

												<div class="form-group">
													<label>Full name</label>
													<input type="text" name="name" class="form-control" value="{{$shipingAdd->name}}" placeholder="Full Name">
												</div>
												<div class="form-group">
													<label>Email</label>
													<input type="text" name="email" class="form-control" value="{{$shipingAdd->email}}" placeholder="Email">
												</div>
												<div class="form-group">
													<label>Phone Number</label>
													<input type="text" name="mobileNo" class="form-control" value="{{$shipingAdd->mobileNo}}" placeholder="Phone Number">
												</div>
												<div class="form-group">
													<label>Address</label>
													<input type="text" name="shipaddress" class="form-control" value="{{$shipingAdd->shipaddress}}" placeholder="Full address">
												</div>
                                                <div class="form-group">
													<label>Street Address</label>
													<input type="text" name="street_address" class="form-control" value="{{$shipingAdd->street_address}}" placeholder="Street address" >
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-md-6">
															<label>Country</label>
															<input type="text" name="country" placeholder="Country" value="{{$shipingAdd->country}}" class="form-control">
														</div>
														<div class="col-md-6">
															<label>State</label>
															<input type="text" name="state" placeholder="State" value="{{$shipingAdd->state}}" class="form-control">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-md-6">
															<label>City</label>
															<input type="text" placeholder="City" name="city" value="{{$shipingAdd->city}}" class="form-control">
														</div>
														<div class="col-md-6">
															<label class="control-label">Zip Code</label>
															<input type="text" name="zipcode" placeholder="Zip Code" value="{{$shipingAdd->zipcode}}" class="form-control">
														</div>
													</div>
												</div>

										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary btn-style-one">Save</button>
										</div>
										</form>
									</div>
								</div>
							</div>

							@endforeach
							<!-- End Add New Address -->
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
    <div id="showModels"></div>
</section>

<div class="modal fade" id="empModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Sale Order </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
      <div class="modal-body" id="saleOrder">
        ...
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

{{-- //////// Review Model --}}
<div class="modal fade" id="accessReview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Sale Order </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
      <div class="modal-body" id="saleOrder">
        <form method="post" action="{{route('accessory.rating')}}">
            @csrf
            <div class="row">
                <div>

                <h1>Review & Rating</h1>
                <fieldset class="rating">
                    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                    <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                    <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                    <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                    <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                    <input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                </fieldset>
                 <input type="hidden" name="accessoryID" id="orderID">
                 <input type="hidden" name="productID" id="productID">
                </div>
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
					<label>Your Review</label>
                    <textarea name="review" class="form-control"></textarea>

                </div>
                <div class="form-group text-right col-md-12 col-sm-12 col-xs-12">
                    <button type="submit" class="theme-btn btn-style-one">Add Review</button>
                </div>
            </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




<!--Shop Section-->

@endsection
@section('script')
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
<script>
  $('.nav-tabs-dropdown')
    .on("click", "li:not('.active') a", function(event) {  $(this).closest('ul').removeClass("open");
    })
    .on("click", "li.active a", function(event) { $(this).closest('ul').toggleClass("open");
    });


    function viewDetail(id){
   $.ajax({
        url: "{{url('customer/orderRepairView')}}/"+id,
        type:"get",
        success:function(response){
          console.log(response);
          $('#showModels').html(response);
          $('#exampleModal'+id).modal('show');
        },

       });
    }
    function orderViewDetails(id)
    {
        $.ajax({
        url: "{{url('customer/orderViewDetails')}}/"+id,
        type:"get",
        success:function(response){
          console.log(response);
          $('#saleOrder').html(response);
          $('#empModal').modal('show');
        },

       });
    }

    function trackNo()
    {
        var trackingNo =$("#trackingNo").val();
        // alert(trackingNo);
        var _token = $('input[name="_token"]').val();

        $.ajax({
            type: "POST",
            url: "{{url('trackingNumber')}}",
            data: {trackingNo:trackingNo,_token:_token},

            success:function(response){
                console.log(response);
                $('#trackingOrder').html(response);
                // $('#empModal').modal('show');
                },
            });
    }

    function confirmOrder()
    {
        var orderIDs =$("#orderIDs").val();
        // alert(trackingNo);
        var _token = $('input[name="_token"]').val();
        $.ajax({
            type: "POST",
            url: "{{url('confirm-tracking')}}",
            data: {orderIDs:orderIDs,_token:_token},

            success:function(response){
     console.log(response);
                  alert(response);
                //   $("#model").modal('show');
                },
            });
    }


function accessoryReview(id)
{
    $('#orderID').val(id);
    $('#accessReview').modal('show');
}
function productReview(id)
{
    $('#productID').val(id);
    $('#accessReview').modal('show');
}
</script>

@endsection
