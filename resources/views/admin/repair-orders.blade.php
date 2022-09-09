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
                                            <table class="table table-centered table-nowrap" id="example3">
                                                <thead class="thead-light">
                                                    <tr>

                                                        <th>Order ID</th>
                                                        <th>Order Created</th>
                                                        <th>Billing Name</th>
                                                        <th>Date & Time</th>
                                                        <th>Total</th>
                                                        {{-- <th>Pay Status</th>
                                                        <th>Payment Method</th> --}}
                                                         <th>Status</th>
                                                        <th>Technician</th>

                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($RepairOrders as $order)
                                                    <tr>
                                                        <td><a href="javascript: void(0);" class="text-body font-weight-bold">{{$order->id}}</a> </td>
                                                        <td>{{$order->created_at->format('Y-m-d')}}</td>
                                                        <td>{{$order->name}}</td>
                                                        <td>
                                                            {{$order->date}}, {{ CityClass::orderTimeDetail($order->time_id)->fromTime}} - {{ CityClass::orderTimeDetail($order->time_id)->toTime}}
                                                        </td>

                                                        <td>
                                                           ${{$order->repairorderstypes->sum('price')}}
                                                        </td>
                                                         {{-- <td>
                                                            @if($order->pay_status == 'paid')
                                                            <span class="badge badge-pill badge-soft-success font-size-12">Paid</span>
                                                            @else
                                                             <span class="badge badge-pill badge-soft-warning font-size-12">Unpaid</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <!-- Button trigger modal -->
                                                           <span class="badge badge-pill badge-soft-success font-size-12"> {{$order->pay_method}}</span>
                                                        </td> --}}
                                                        @php
                                                          $techId = App\Models\User::where('id',$order->techId)->first();
                                                        @endphp
                                                       <td>
                                                        @if ($order->order_status == 3 && $order->techId !== null)
                                                        <span class="badge badge-pill badge-warning">Assign</span>

                                                        @elseif ($order->order_status == 1  && $order->techId !== null)
                                                        <span class="badge badge-pill badge-warning">Accept</span>
                                                        @elseif ($order->order_status == 0  && $order->techId !== null)
                                                        <span class="badge badge-pill badge-secondary">Pendding</span>
                                                        @elseif ($order->order_status == 2  && $order->techId == null)
                                                        <span class="badge badge-pill badge-danger">Reject</span>
                                                        @elseif ($order->order_status == 4 && $order->techId !== null)
                                                        <span class="badge badge-pill badge-success">Completed</span>
                                                        @else
                                                        <span class="badge badge-pill badge-info">Not Assign</span>
                                                        @endif
                                                       </td>
                                                        <td id="or{{$order->id}}">
                                                          @if ($order->techId === null || $order->techId === 0)
                                                          <select onchange="selectTech(this,'{{$order->id}}')" class="form-control select2">
                                                            <option selected="">Select Technician</option>

                                                            @foreach(CityClass::allTech() as $tech)
                                                                <option value="{{$tech->id}}">{{$tech->name}}</option>
                                                            @endforeach

                                                        </select>
                                                          @elseif ($order->order_status == 3 && $order->techId !== null)
                                                          {{$techId->name ?? 'Deleted Tech'}}
                                                           <button onclick="rejectOrder('{{$order->id}}')" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Cancel The order">cancel</button>
                                                             @else
                                                             {{$techId->name ?? 'Deleted Tech'}}

                                                           @endif

                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal{{$order->id}}" onclick="viewDetail('{{$order->id}}')" class="mr-3 text-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Detail"><i class="mdi mdi-eye font-size-18"></i></a>
                                                            <a href="{{url('admin/modify-order',$order->id)}}" class="mr-3 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                            <a href="{{ url('admin/delete-order',$order->id) }}" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close font-size-18"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                        {{-- <ul class="pagination pagination-rounded justify-content-end mb-2">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                                    <i class="mdi mdi-chevron-left"></i>
                                                </a>
                                            </li>
                                            <li class="page-item active"><a class="page-link" href="javascript: void(0);">1</a></li>
                                            <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                                            <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                                            <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                                            <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="javascript: void(0);" aria-label="Next">
                                                    <i class="mdi mdi-chevron-right"></i>
                                                </a>
                                            </li>
                                        </ul> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <!-- Modal -->
                <div id="showModels"></div>




@endsection

@section('script')

<script type="text/javascript">
$(document).ready(function() {
   $('#example3').DataTable({
        "order": [[ 0, "desc" ]]
    });

} );
    function viewDetail(id){
   $.ajax({
        url: "{{url('admin/repairTypes')}}/"+id,
        type:"get",
        success:function(response){
          console.log(response);
          $('#showModels').html(response);
          $('#exampleModal'+id).modal('show');
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
        error:function(error){
               $("#loader").hide();
               alert(error.responseJSON.message);
            }

       });

    }

    function rejectOrder(id)
    {
        $.ajax({
        url: "{{url('admin/rejectOrder')}}/"+id,
        type:"get",
        success:function(response){
          console.log(response);

         location.reload();
        //   alert(response);
        },

       });
    }
</script>

@endsection
