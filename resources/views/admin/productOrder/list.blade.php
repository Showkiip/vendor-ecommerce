@extends('admin.layouts.master')

@section('title') Orders @endsection
@section('css')
<style>
    .loader {
      border: 16px solid #f3f3f3;
      border-radius: 50%;
      border-top: 16px solid #3498db;
      width: 100px;
      height: 100px;
      -webkit-animation: spin 2s linear infinite; /* Safari */
      animation: spin 2s linear infinite;
    }

    /* Safari */
    @-webkit-keyframes spin {
      0% { -webkit-transform: rotate(0deg); }
      100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    .code
    {
        margin-bottom:10px;
    }
    </style>

@endsection
@section('content')

   @component('admin.common-components.breadcrumb')
         @slot('title') Orders @endslot
         @slot('li_1') Repair @endslot
         @slot('li_2') Orders @endslot
     @endcomponent

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            {{-- <div class="col-sm-4">
                                                <div class="search-box mr-2 mb-2 d-inline-block">
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control" placeholder="Search...">
                                                        <i class="bx bx-search-alt search-icon"></i>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            {{-- <div class="col-sm-8">
                                                <div class="text-sm-right">
                                                    <button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-plus mr-1"></i> Add New Order</button>
                                                </div>
                                            </div><!-- end col--> --}}
                                            <div id="loader" class="loader justify-content-center" style="display: none; margin: auto;
                                            padding: 10px;">

                                            </div>
                                        </div>

                                        <div class="table-responsive">
                                            <table id="example3" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Mobile No</th>
                                                        <th>Email</th>
                                                        <th>Shipping Address</th>
                                                        <th>Zip Code</th>
                                                        <th>Grand Price</th>
                                                        <th>Order Date</th>
                                                        <th>Status</th>

                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($productOrder as $orderSale)
                                                    <tr>
                                                        {{-- @php
                                                            $order= App\Models\Order::where('orderSales_id',$orderSale->id)->first();
                                                            // dd($order);
                                                        @endphp --}}
                                                        <td>{{$orderSale->id}}</td>
                                                        @if (isset($orderSale->user_id))
                                                        <td>{{$orderSale->user->name ?? ''}}</td>
                                                        @else
                                                        <td>{{$orderSale->shipAddress->name }}</td>
                                                        @endif


                                                        <td>{{$orderSale->shipAddress->mobileNo}}</td>
                                                        <td>{{$orderSale->shipAddress->email}}</td>
                                                       
                                                        <td>{{$orderSale->shipAddress->shipaddress}}, {{$orderSale->shipAddress->city}}, {{$orderSale->shipAddress->state}}</td>
                                                        <td>{{$orderSale->shipAddress->zipcode}}</td>
                                                        <td>
                                                            ${{$orderSale->grand_total}}
                                                        </td>

                                                        <td>{{$orderSale->created_at->format('D-m-Y h:s')}}</td>

                                                        <td>
                                                            @if ($orderSale->status == 2)
                                                            <span class="badge badge-success">complete</span>
                                                            @elseif ($orderSale->status == 1)
                                                            <span class="badge badge-warning">shipping</span>
                                                            @else
                                                            <span class="badge badge-secondary">Pending</span>
                                                            @endif
                                                        </td>
                                                        <td style="display: flex">
                                                            <a href="#" onclick="orderViewDetails('{{$orderSale->id}}')" class="mr-3 text-success" title="view order"><i class="fa fa-eye font-size-18"></i></a>
                                                            @if ($orderSale->status == 0)
                                                            <a href="#" onclick="sendCode('{{$orderSale->id}}')" class="mr-3 text-warning" title="send Tracking Code" > <i class="fa fa-ship font-size-18"></i></a>
                                                            @endif
                                                            <a href="{{route('admin.delete.productorder',$orderSale->id)}}" class="mr-3 text-danger" title="delete order"><i class="fa fa-trash font-size-18"></i></a>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="5">
                                                              Sorry No Order Yet...
                                                            </td>
                                                        </tr>
                                                    @endforelse


                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <!-- Modal -->


  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Shipping Address </h4>
        </div>
        <div class="modal-body">
            <div id="showModels">

            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

</div>

{{-- /////////////order sale modaL --}}

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

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


  {{-- Send Code  --}}
<div class="modal fade bd-example-modal-lg" id="codeModel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 570px;">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Order Shipping</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
          <div class="modal-body" >
            <form id="sendcode" method="POST">
                @csrf
                 <input type="hidden" name="id" id="id" >
                  <!-- <h6>From Address:</h6>
                <div class="code row">
                  <div class="col-md-6">
                    <div class="form-group">
                   <input type="text" id="code" name="name" class="form-control" placeholder="Enter name" required>
                  </div>
                  
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                   <input type="text" class="form-control" placeholder="Enter company name" name="company"  required>
                 </div>
                  </div>
                      <div class="col-md-6">
                    <div class="form-group">
                   <input type="text" id="code" name="phone" placeholder="Enter mobile no" class="form-control"  required>
                  </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                   <input type="text" class="form-control" placeholder="Enter email" name="email"  required>
                 </div>
                  </div>

                  <div class="col-md-12">
                   <div class="form-group">
                     <input type="text" class="form-control" placeholder="Enter address" name="street1" required  >
                   </div>
                 </div>
                 <div class="col-md-3">
                   <div class="form-group">
                     <input type="text" class="form-control" placeholder="Enter city " name="city"required  >
                   </div>
                 </div>
                   <div class="col-md-3">
                    <div class="form-group">
                   <input type="text" id="code" name="state" placeholder="Enter state" class="form-control" required>
                  </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group">
                   <input type="text" class="form-control" placeholder="Enter country" value="US" name="country"  readonly>
                 </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group">
                   <input type="text" class="form-control" placeholder="Enter zipcode" name="zip" required >
                 </div>
                  </div>
               
                </div>
                <h6>Parcel Size:</h6>
                <div class="row">
                 <div class="col-md-6">
                     <div class="form-group">
                      <select class="form-control" name="distance_unit" required>
                        <option selected>Select distance unit</option>
                        <option value="cm">cm</option>
                        <option value="in">in</option>
                        <option value="ft">ft</option>
                        <option value="mm">mm</option>
                        <option value="m">m</option>
                        <option value="yd">yd</option>
                      </select>
                  
                 </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                     <select class="form-control" name="mass_unit" required>
                        <option selected>Select distance unit</option>
                        <option value="g">g</option>
                        <option value="oz">oz</option>
                        <option value="lb">lb</option>
                        <option value="kg">kg</option>
                      </select>
                 </div>
                  </div>
                  <div class="col-md-3">
                   <div class="form-group">
                     <input type="text" class="form-control" placeholder="Enter length" name="length"required  >
                   </div>
                 </div>
                   <div class="col-md-3">
                    <div class="form-group">
                   <input type="text" id="code" name="width" placeholder="Enter width" class="form-control" required>
                  </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group">
                   <input type="text" class="form-control" placeholder="Enter height" name="height"  required>
                 </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group">
                   <input type="text" class="form-control" placeholder="Enter weight" name="weight"  required>
                 </div>
                  </div>
                 
                </div> -->
                <div class="row" style="margin-top: 10px;margin-bottom: 30px;">
                  <div class="col-md-12">
                     <div class="text-center">
                      <p>Do you want to shipp this order ?</p>
                   <button id="submit" style="width: 30%;" class="btn btn-primary">Yes</button>
                   <button class="buttonload btn btn-primary btn-style-one" style="display: none" id="buttonload">
                  <i class="fa fa-circle-o-notch fa-spin"></i> Loading
                </button>
                </div>
                  </div>
                </div>
               
            </form>
          </div>

        </div>
    </div>
  </div>
@endsection

@section('script')

<script type="text/javascript">
$(document).ready(function() {
   $('#example3').DataTable({
        "order": [[ 0, "desc" ]]
    });

    });
    function viewDetail(id){
   $.ajax({
        url: "{{url('admin/shippingAddress')}}/"+id,
        type:"get",
        success:function(response){
          console.log(response);
          $('#showModels').html(response);
          $('#myModal').modal('show');
        },

       });
    }

    function selectTech(event,id){

        $("#loader").show();
    var value=$(event).val()
     let _token   = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
        url: "{{url('admin/assignTech')}}",
        type:"post",
        data:{
            orderId:id,
            techid:value,
            _token:_token
        },
        success:function(response){
        //   console.log(response);
        $("#loader").hide();
          window.location.reload();
        //   alert(response);
        //   $('#or'+id).empty();
        },

       });

    }


    function orderViewDetails(id)
    {
        $.ajax({
        url: "{{url('admin/orderViewDetails')}}/"+id,
        type:"get",
        success:function(response){
          console.log(response);
          $('#saleOrder').html(response);
          $('#empModal').modal('show');
        },

       });
    }

   function sendCode(id)
   {
       $('#codeModel').modal('show');
       $('#id').val(id);
   }
    $('#sendcode').on('submit',function(e){
        e.preventDefault();
       $('#submit').hide();
       $('#buttonload').show();
        let _token = "{{ csrf_token() }}";
        // alert(name);
        $.ajax({
          url: "{{url('admin/send-code')}}",
          type:"POST",
          data:$("#sendcode").serialize(),
          success:function(response){
            console.log(response);
            alert('Successfully Send The Shipping Tracking from Desired User');
            window.location.reload();
          },
          error: function (xhr) {
            $('#buttonload').hide();
            $('#submit').show();
            if(JSON.parse(xhr.responseJSON.message).rate){
              alert(JSON.parse(xhr.responseJSON.message).rate[0]);
            }
            if(JSON.parse(xhr.responseJSON.message).address_from){
             alert(JSON.parse(xhr.responseJSON.message).address_from[0].__all__[0]);
            }else{
              console.log(JSON.parse(xhr.responseJSON.message));
            }
          },
         });
        });

</script>

@endsection
