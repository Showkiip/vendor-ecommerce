@extends('layouts.app')
@section('title','Return Sales')
@section('css')
<link href="{{ asset('assets/api/multiple-select/multiple-select.min.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/api/daterange-picker/daterangepicker.css') }}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="tc_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white mb-0 px-0 py-2">
                    <li class="breadcrumb-item " aria-current="page">Report</li>
                    <li class="breadcrumb-item active" aria-current="page">Return Sale Report</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12">
                            <div class="card card-custom gutter-b bg-transparent shadow-none border-0">
                                <div class="card-header align-items-center  border-bottom-dark px-0">
                                    <div class="card-title mb-0">
                                        <h3 class="card-label mb-0 font-weight-bold text-body">Return Sale Report
                                        </h3>
                                    </div>
                                    <div class="icons d-flex">
                                
                                <a href="#" onclick="printDiv()" class="ml-2">
                                    <span
                                        class="icon h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center rounded-circle ">
                                        <svg width="15px" height="15px" viewBox="0 0 16 16" class="bi bi-printer-fill"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z" />
                                            <path fill-rule="evenodd"
                                                d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" />
                                            <path fill-rule="evenodd"
                                                d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                        </svg>
                                    </span>

                                </a>
                             
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                    <div class="row">
                        {{-- <div class="col-12">
                            <div class="card card-custom gutter-b bg-white border-0">

                                <div class="card-body">
                                    <form>
                                        <div class="form-group row justify-content-center mb-0">

                                            <div class="col-md-4">
                                                <label class="text-dark">Choose Your Date</label>
                                                <div id="reportrange"
                                                    style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                                    <i class="fa fa-calendar"></i>&nbsp;
                                                    <span></span> <i class="fa fa-caret-down"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div> --}}

                        <div class="col-12 ">
                            <div class="card card-custom gutter-b bg-white border-0">
                                <div class="card-body">

                                 <a href="#" class="btn btn-secondary" onclick="dailySaleReturn()">Daily Sales Return</a>
                                   <a href="#" class="btn btn-primary" onclick="weeklySaleReturn()">Weekly Sales Return</a>
                                   <a href="#" class="btn btn-info" onclick="monthlySaleReturn()">Monthly Sales Return</a>
                                    <div>
                                        <div class="table-responsive" id="printableTable">
                                            <table id="productUnitTable" class="display" style="width:100%">

                                               <thead>
                                            <tr>
                                                <th>Sale id</th>
                                                <th>Return Date</th>
                                                <th>Sale Date</th>
                                                <th>Grand Total</th>
                                                <th>Return Amount</th>
                                                <th class=" no-sort text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="kt-table-tbody text-dark" id="salesreturn">
                                            @foreach ($sales as $sale)
                                            <tr class="kt-table-row kt-table-row-level-0">
                                                <td>{{ $sale->sale_id}}</td>
                                                <td>{{ $sale->return_date }}</td>
                                                <td>{{ $sale->created_at->format('M-Y-d') }}</td>
                                                <td>{{ round($sale->grand_total) }}</td>
                                                {{-- <td>{{ $sale->user_id }}</td> --}}
                                                <td>{{ round($sale->return_amount) }}</td>
                                                <td>
                                                            <div class="card-toolbar  no-sort text-right">
                                                                <!-- {{-- <button class="btn p-0 shadow-none" type="button"
                                                                    id="dropdowneditButton12" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    <span class="svg-icon">
                                                                        <svg width="20px" height="20px"
                                                                            viewBox="0 0 16 16"
                                                                            class="bi bi-three-dots text-body"
                                                                            fill="currentColor"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd"
                                                                                d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z">
                                                                            </path>
                                                                        </svg>
                                                                    </span>
                                                                </button> --}} -->
                                                                <!-- {{-- <div class="dropdown-menu dropdown-menu-right"
                                                                    aria-labelledby="dropdowneditButton12"
                                                                    style="position: absolute; transform: translate3d(1001px, 111px, 0px); top: 0px; left: 0px; will-change: transform;"> --}} -->

                                                                <button type="button"
                                                                    class="btn-link btn pt-0 pb-0 dropdown-item"
                                                                    onclick="viewDetailOfReturn({{ $sale->id }})">
                                                                    View
                                                                </button>
                                                                <!-- {{-- </div> --}} -->
                                                            </div>
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
        </div>
    </div>
</div>


<div class="modal fade text-left" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-between">
                <div class="print-page icons d-flex">
                    <a href="#" onclick="printDiv()" class="ml-2">
                        <span
                            class="icon h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center rounded-circle ">
                            <svg width="15px" height="15px" viewBox="0 0 16 16" class="bi bi-printer-fill"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z" />
                                <path fill-rule="evenodd"
                                    d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" />
                                <path fill-rule="evenodd"
                                    d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                            </svg>
                        </span>

                    </a>
                    <a href="#" class="ml-2">
                        <span
                            class="icon h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center rounded-circle ">
                            <svg width="15px" height="15px" viewBox="0 0 16 16" class="bi bi-file-earmark-text-fill"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M2 2a2 2 0 0 1 2-2h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm7 2l.5-2.5 3 3L10 5a1 1 0 0 1-1-1zM4.5 8a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z" />
                            </svg>
                        </span>
                    </a>
                </div>
                <h4 class="modal-title font-size-h4 text-center" id="myModalLabel17">Arooma
                    <span class="d-block ">Quotation Details</span>
                </h4>
                <button type="button" class="close rounded-pill btn btn-sm btn-icon btn-primary m-0"
                    data-dismiss="modal" aria-label="Close">
                    <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z">
                        </path>
                    </svg>
                </button>
            </div>
            <div class="modal-body overflow-auto">
                <strong>Date: </strong>
                <span id="devdate"></span><br>

                <table class="table table-bordered product-quotation-list mt-5">
                    <thead>
                        <tr>
                            @csrf
                            <th>Product </th>
                            <th>Quantity</th>
                            <th>Return Qty</th>
                            <th>Unit Price</th>
                            <th>Discount</th>

                            <th>Return Date</th>
                        </tr>
                    </thead>

                    <tbody id="table">
                    </tbody>
                </table>

                <p>
                    <strong>Note:</strong>
                </p>
                <strong>Created By:</strong><br>admin<br>admin@gmail.com
            </div>

        </div>
    </div>
</div>

<iframe name="print_frame" width="0" height="0" src="about:blank"></iframe>
@endsection
@section('script')

<script src="{{ asset('assets/api/multiple-select/multiple-select.min.js') }}"></script>
<script src="{{ asset('assets/api/daterange-picker/moment.min.js') }}"></script>
<script src="{{ asset('assets/api/daterange-picker/daterangepicker.min.js') }}"></script>

        <script>
        jQuery(function() {
            jQuery('.english-select').multipleSelect({
            filter: true,
            filterAcceptOnEnter: true
        })
        });
        jQuery(function() {
            jQuery('.arabic-select').multipleSelect({
            filter: true,
            filterAcceptOnEnter: true
        })
        });
        jQuery(document).ready( function () {
        jQuery('#productUnitTable').dataTable( {
        "pagingType": "simple_numbers",

        "columnDefs": [ {
            "targets"  : 'no-sort',
            "orderable": false,
        }]
        });
        });

        jQuery(function() {

        var start = moment().subtract(29, 'days');
        var end = moment();

function cb(start, end) {
    jQuery('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
}

    jQuery('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
        //    'Today': [moment(), moment()],
        //    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        //    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        //    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        //    'This Month': [moment().startOf('month'), moment().endOf('month')],
        //    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

    });

   
    function viewDetailOfReturn(id){
        var _token = $('input[name="_token"]').val();
        var id=id;
        $.ajax({
            type:"post",
            url:"{{ route('return.detail') }}",
            data:{id:id,_token:_token},
            success: function(data){
                $('#table').html(data)
            jQuery('#large').modal('show')
            },error:function(error){
            console.log(error);
            }
            });
    }


        </script>


    <!-- Sale Reports Daily ,Weekly and Monthly Basis  -->
    <script>
        function dailySaleReturn()
        {
            var _token = $('input[name="_token"]').val();
            $.ajax({url: "{{ route('day.sale-return') }}",
                    
            success: function(result)
            {    
                console.log(result);
                var len = 0;
                if(result['daysales'] != 0)
                {
                    len = result['daysales'].length;
                }
                $('#salesreturn').empty();

                  console.log(result['daysales']);
                if(len > 0)
                {
                    for(var i=0; i<len; i++)
                    {
                    
                        var sale_id = result['daysales'][i].sale_id;
                        var return_date = result['daysales'][i].return_date;
                        var created_at = result['daysales'][i].created_at;
                         var created_at_date = created_at.split("T");
                        var grand_total = result['daysales'][i].grand_total;
                        var return_amount = result['daysales'][i].return_amount;
                        var edit = result['daysales'][i].id;
                    
                    
                        var tr_str = "<tr>"+
                                    "<td >"+sale_id+"</td>"+
                                    "<td >"+return_date+"</td>"+
                                    "<td >"+created_at_date[0]+"</td>"+
                                    "<td >"+parseInt(grand_total)+"</td>"+
                                    "<td >"+parseInt(return_amount)+"</td>"+
                                    "<td><div class='card-toolbar  no-sort text-right'><button type='button' class='btn-link btn pt-0 pb-0 dropdown-item' onclick='viewDetailOfReturn("+edit+")'> View</button></div></td>"+
                                    "</tr>";
                            $('#salesreturn').append(tr_str);

                    }
                    var tr_str ="<tr>"+
                                "<td ></td>"+
                                "<td >Total</td>"+
                                "<td ></td>"+
                                "<td >"+parseInt(result['totalday'])+"</td>"+
                                "<td >"+parseInt(result['totalchangeday'])+"</td>"+
                            "</tr>";
                            $('#salesreturn').append(tr_str); 

                    }
                    else
                    {
                        alert("Ops No record");
                    }
                    
                    }
            
            });
        }   
    
        function weeklySaleReturn()
        {
            var _token = $('input[name="_token"]').val();
            $.ajax({url: "{{ route('week.sale-return') }}",
                    
            success: function(result)
            {    
                var len = 0;
                if(result['weeksales'] != 0)
                {
                    len = result['weeksales'].length;
                }
                
                
                $('#salesreturn').empty();

                if(len > 0)
                {
                    for(var i=0; i<len; i++)
                    {
                        var sale_id = result['weeksales'][i].sale_id;
                        var return_date = result['weeksales'][i].return_date;
                        var created_at = result['weeksales'][i].created_at;
                         var created_at_date = created_at.split("T");
                        var grand_total = result['weeksales'][i].grand_total;
                        var return_amount = result['weeksales'][i].return_amount;
                        var edit = result['weeksales'][i].id;
                    
                    
                        var tr_str = "<tr>"+
                                    "<td >"+sale_id+"</td>"+
                                    "<td >"+return_date+"</td>"+
                                    "<td >"+created_at_date[0]+"</td>"+
                                    "<td >"+parseInt(grand_total)+"</td>"+
                                    "<td >"+parseInt(return_amount)+"</td>"+
                                    "<td><div class='card-toolbar  no-sort text-right'><button type='button' class='btn-link btn pt-0 pb-0 dropdown-item' onclick='viewDetailOfReturn("+edit+")'> View</button></div></td>"+
                                    "</tr>";
                            $('#salesreturn').append(tr_str);

                    }
                    var tr_str ="<tr>"+
                                "<td ></td>"+
                                "<td >Total</td>"+
                                "<td ></td>"+
                                "<td >"+parseInt(result['totalweek'])+"</td>"+
                                "<td >"+parseInt(result['totalchangeweek'])+"</td>"+
                            "</tr>";
                            $('#salesreturn').append(tr_str); 

                    }
                    else
                    {
                        alert("Ops No record");
                    }
                    
                    }
            
            });
        }   
    
        function monthlySaleReturn()
        {
            var _token = $('input[name="_token"]').val();
            $.ajax({url: "{{ route('month.sale-return') }}",
                    
            success: function(result)
            {    
                //  console.log(result['monthsales']);
                var len = 0;
                if(result['monthsales'] != 0)
                {
                    len = result['monthsales'].length;
                }
                
                
                $('#salesreturn').empty();

                if(len > 0)
                {
                    for(var i=0; i<len; i++)
                    {
                        var sale_id = result['monthsales'][i].sale_id;
                        var return_date = result['monthsales'][i].return_date;
                        var created_at = result['monthsales'][i].created_at;
                         var created_at_date = created_at.split("T");
                        var grand_total = result['monthsales'][i].grand_total;
                        var return_amount = result['monthsales'][i].return_amount;
                        var edit = result['monthsales'][i].id;
                
                        var tr_str = "<tr>"+
                                    "<td >"+sale_id+"</td>"+
                                    "<td >"+return_date+"</td>"+
                                    "<td >"+created_at_date[0]+"</td>"+
                                    "<td >"+parseInt(grand_total)+"</td>"+
                                    "<td >"+parseInt(return_amount)+"</td>"+
                                    "<td><div class='card-toolbar  no-sort text-right'><button type='button' class='btn-link btn pt-0 pb-0 dropdown-item' onclick='viewDetailOfReturn("+edit+")'> View</button></div></td>"+
                                    "</tr>";
                            $('#salesreturn').append(tr_str);

                    }
                    var tr_str ="<tr>"+
                                "<td ></td>"+
                                "<td >Total</td>"+
                                "<td ></td>"+
                                "<td >"+parseInt(result['totalmonth'])+"</td>"+
                                "<td >"+parseInt(result['totalchangemonth'])+"</td>"+
                            "</tr>";
                            $('#salesreturn').append(tr_str); 

                    }
                    else
                    {
                        alert("Ops No record");
                    }
                    
                    }
            
            });
        }



</script>
    @endsection
