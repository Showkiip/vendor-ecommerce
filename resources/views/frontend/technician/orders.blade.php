@extends('frontend.technician.layouts.master')
@section('content')
  <div class="wrapper">
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Orders Management</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">

            <ul class="navbar-nav">

              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="{{ url('technician/logout') }}">Logout</a>
                </div>
              </li>

            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-sm">


</div> -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Orders List</h4>
              </div>

              <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table" >
                    <thead class=" text-primary">
                      <th colspan="2">Order ID#</th>
                      <th colspan="3">Modal</th>
                      <th colspan="2">Repair Type</th>
                      <th colspan="2">Price</th>
                      <th colspan="3">Payment Method</th>
                      <th colspan="3">Order Time</th>
                      <th>Status</th>
                      <th>Action</th>

                    </thead>
                    <tbody>
                     @php
                       
                        $repairorders = App\Models\RepairOrder::where('techId',Auth::guard('tech')->user()->id)
                                                ->where('order_status','!=','4')
                                                ->get();
                        // dd($repairorders);
                     @endphp
                      @foreach($repairorders as $index => $order)
                      <tr>
                        <td colspan="2">#{{$order->id}}</td>
                        <td colspan="2">{{CityClass::modelName($order->model_Id)}}</td>
                        <td colspan="3">
                          @foreach($order->repairorderstypes as $repair)
                             {{$repair->repair_type}}<br>
                           @endforeach
                         </td>
                         <td colspan="2">
                            ${{$order->repairorderstypes->sum('price')}}
                         </td>
                        <td colspan="3">
                            <!-- Button trigger modal -->
                           <span class="badge badge-pill badge-success font-size-12"> {{$order->pay_method}}</span>
                        </td>
                        <td colspan="3">{{$order->date}} {{$order->time}}</td>
                        <td>
                            @if ($order->order_status == 3)

                            <a href="#" onclick="acceptOrder('{{$order->id}}')" title="Accept"> <i class="fa fa-check text-primary"></i> </a>
                            <a href="#"  onclick="penddingOrder('{{$order->id}}')" title="Pendding"> <i class="fa fa-clock-o text-info"></i></a>
                            <a href="#" onclick="rejectOrder('{{$order->id}}')" title="Reject"> <i class="fa fa-times text-danger"></i></a>

                            @elseif ($order->order_status == 1 && $order->techId !== null)
                            <span class="badge badge-pill badge-primary">Accept</span>
                            @elseif ($order->order_status == 0)
                            <span class="badge badge-pill badge-secondary">Pendding</span>
                            <a href="#" onclick="acceptOrder('{{$order->id}}')" title="Accept"> <i class="fa fa-check text-primary"></i> </a>
                            <a href="#" onclick="rejectOrder('{{$order->id}}')" title="Reject"> <i class="fa fa-times text-danger"></i></a>
                            @elseif ($order->order_status == 4 && $order->techId !== null)
                            <span class="badge badge-pill badge-success">Completed</span>
                            @endif
                        </td>
                        <td>
                            @if ($order->order_status == 4 && $order->techId !== null)
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal{{$order->id}}" onclick="viewModal('{{$order->id}}')" class="mr-3 text-success" data-toggle="tooltip" data-placement="top" title="View Detail" data-original-title="View Detail"> <i class="fa fa-eye text-success"></i></a>
                            @elseif ($order->order_status == 1 && $order->techId !== null)
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal{{$order->id}}" onclick="viewModal('{{$order->id}}')" class="mr-3 text-success" data-toggle="tooltip" data-placement="top" title="View Detail" data-original-title="View Detail"> <i class="fa fa-eye text-success"></i></a>
                            <a href="{{url('tech/order-modify',$order->id)}}" title="Edit Order" > <i class="fa fa-pencil text-warning"></i></a>
                            <a href="{{route('complete.order',$order->id.'?type=tech')}}" class="btn btn-primary btn-sm" title="pay the Order"><i class="fa fa-cash">Pay</i></a>
                            @else
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal{{$order->id}}" onclick="viewModal('{{$order->id}}')" class="mr-3 text-success" data-toggle="tooltip" data-placement="top" title="View Detail" data-original-title="View Detail"> <i class="fa fa-eye text-success"></i></a>
                            <a href="{{url('tech/order-modify',$order->id)}}" title="Edit Order" > <i class="fa fa-pencil text-warning"></i></a>

                            @endif



                        </td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
{{-- View modal --}}
<div id="showModels"></div>

@endsection



@section('script')
<script>
    function acceptOrder(id)
    {
        $.ajax({
        url: "{{url('tech/acceptOrder')}}/"+id,
        type:"get",
        success:function(response){
          console.log(response);
        //  alert(response);
         location.reload();
        },

       });
    }
    function viewModal(id)
    {
        $.ajax({
        url: "{{url('tech/orderView')}}/"+id,
        type:"get",
        success:function(response){
          console.log(response);
          $('#showModels').html(response);
          $('#exampleModal'+id).modal('show');
        },

       });
    }

    function penddingOrder(id)
    {
        // alert(id);
        $.ajax({
        url: "{{url('tech/penddingOrder')}}/"+id,
        type:"get",
        success:function(response){
          console.log(response);

          location.reload();
          // alert(response);
        },

       });
    }

    function rejectOrder(id)
    {
        $.ajax({
        url: "{{url('tech/rejectOrder')}}/"+id,
        type:"get",
        success:function(response){
          console.log(response);

          location.reload();
          // alert(response);
        },

       });
    }
</script>
@endsection
