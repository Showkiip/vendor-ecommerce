@extends('layouts.app')
@section('css')
<link href="{{ asset('assets/api/multiple-select/multiple-select.min.css') }}" rel="stylesheet">

@endsection
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="tc_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white mb-0 px-0 py-2">
                    <li class="breadcrumb-item " aria-current="page">Report</li>
                    <li class="breadcrumb-item active" aria-current="page">Expense Reportt</li>
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
                                        <h3 class="card-label mb-0 font-weight-bold text-body">Expenses Report
                                        </h3>
                                    </div>
                                    <div class="icons d-flex">
                                        <!--<button class="btn ml-2 p-0" id="kt_notes_panel_toggle" data-toggle="tooltip"-->
                                        <!--    title="" data-placement="right" data-original-title="Check out more demos">-->
                                        <!--    <span  class="bg-secondary h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center  rounded-circle shadow-sm ">-->

                                        <!--        <svg width="25px" height="25px" viewBox="0 0 16 16"-->
                                        <!--            class="bi bi-plus white" fill="currentColor"-->
                                        <!--            xmlns="http://www.w3.org/2000/svg">-->
                                        <!--            <path fill-rule="evenodd"-->
                                        <!--                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />-->
                                        <!--        </svg>-->
                                        <!--    </span>-->

                                        <!--</button>-->
                                        <a href="#" onclick="printDiv()" class="ml-2">
                                            <span
                                                class="icon h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center rounded-circle ">
                                                <svg width="15px" height="15px" viewBox="0 0 16 16"
                                                    class="bi bi-printer-fill" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z" />
                                                    <path fill-rule="evenodd"
                                                        d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" />
                                                    <path fill-rule="evenodd"
                                                        d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                                </svg>
                                            </span>

                                        </a>
                                        <!-- <a href="#" class="ml-2">
                                            <span
                                                class="icon h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center rounded-circle ">
                                                <svg width="15px" height="15px" viewBox="0 0 16 16"
                                                    class="bi bi-file-earmark-text-fill" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M2 2a2 2 0 0 1 2-2h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm7 2l.5-2.5 3 3L10 5a1 1 0 0 1-1-1zM4.5 8a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z" />
                                                </svg>
                                            </span>

                                        </a> -->

                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                    <div class="row">

                        <div class="col-12 ">
                            <div class="card card-custom gutter-b bg-white border-0">
                                <div class="card-body">
                                <a href="#" class="btn btn-secondary" onclick="dailyExpenses()">Daily Expense</a>
                                   <a href="#" class="btn btn-primary" onclick="weeklyExpense()">Weekly Expense</a>
                                   <a href="#" class="btn btn-info" onclick="monthlyExpense()">Monthly Expense</a>
                                    <div>
                                        <div class=" table-responsive" id="printableTable">
                                            <table id="productUnitTable" class="display ">

                                                <thead class="text-body">
                                                    <tr>
                                                        <th style="text-align:left;">
                                                            Date
                                                        </th>
                                                        <th style="text-align:left;">Category</th>
                                                        <th style="text-align:left;">Amount</th>
                                                        <th style="text-align:left;">Note</th>
                                                        <!--<th class="no-sort text-right">Action</th>-->
                                                    </tr>
                                                </thead>
                                                <tbody class="kt-table-tbody text-dark" id="expense-report">
                                                    @php
                                                    $total=0;
                                                    @endphp
                                                    @foreach($expenses as $expense)
                                                    <tr class="kt-table-row kt-table-row-level-0">
                                                        <td>{{ $expense->created_at->format('M-Y-d') }}</td>
                                                        <td class="">{{ $expense->expensetype->name }}</td>
                                                        <td class="">{{ $expense->amount }}</td>
                                                        <td class="">{{ $expense->description }}</td>
                                                        <!--<td>-->
                                                        <!--    <div class="card-toolbar text-right">-->
                                                        <!--        <button class="btn p-0 shadow-none" type="button"-->
                                                        <!--            id="dropdowneditButton" data-toggle="dropdown"-->
                                                        <!--            aria-haspopup="true" aria-expanded="false">-->
                                                        <!--            <span class="svg-icon">-->
                                                        <!--                <svg width="20px" height="20px"-->
                                                        <!--                    viewBox="0 0 16 16"-->
                                                        <!--                    class="bi bi-three-dots text-body"-->
                                                        <!--                    fill="currentColor"-->
                                                        <!--                    xmlns="http://www.w3.org/2000/svg">-->
                                                        <!--                    <path fill-rule="evenodd"-->
                                                        <!--                        d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z">-->
                                                        <!--                    </path>-->
                                                        <!--                </svg>-->
                                                        <!--            </span>-->
                                                        <!--        </button>-->
                                                        <!--        <div class="dropdown-menu">-->
                                                        <!--            {{-- aria-labelledby="dropdowneditButton" --}}-->
                                                        <!--            {{-- style="position: absolute; transform: translate3d(1001px, 111px, 0px); top: 0px; left: 0px; will-change: transform;"> --}}-->

                                                        <!--            @csrf-->
                                                        <!--            <button class="btn btn-primary ml-4"-->
                                                        <!--                onclick="edited({{ $expense->id }})"><i  class="fa fa-edit"></i></button>-->

                                                        <!--            <form action="{{ route('expense.list.delete') }}"-->
                                                        <!--                method="post">-->
                                                        <!--                @csrf-->
                                                        <!--                <input type="hidden" name="id"-->
                                                        <!--                    value="{{ $expense->id }}">-->
                                                        <!--                {{-- confirm-delete" --}}-->
                                                                       
                                                        <!--                 <button type="submit" class="btn btn-danger ml-4"><i class="fa fa-trash"></i></button>-->
                                                                     
                                                        <!--            </form>-->
                                                        <!--        </div>-->
                                                        <!--    </div>-->
                                                        <!--</td>-->
                                                    </tr>
                                                    @php
                                                    $total = $total + $expense->amount;
                                                    @endphp
                                                    @endforeach


                                                </tbody>
                                                <!-- <tfoot>
                                                    <tr class="kt-table-row kt-table-row-level-0">

                                                        <th>Total</th>
                                                        <th class=""></th>
                                                        <th class="">{{ $total }}</th>
                                                        <th class="">

                                                        </th>

                                                        <th class=""> </th>


                                                    </tr>

                                                </tfoot> -->
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






<div id="kt_notes_panel" class="offcanvas offcanvas-right kt-color-panel p-5">
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-3">
        <h4 class="font-size-h4 font-weight-bold m-0">Add Expense
        </h4>
        <a href="#" class="btn btn-sm btn-icon btn-light btn-hover-primary" id="kt_notes_panel_close">
            <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z">
                </path>
            </svg>
        </a>
    </div>
    <form action="{{ route('expense.list.store') }}" method="post">
        @csrf
        <div class="row">

            <div class="col-12">
                <div class="form-group">
                    <label class="text-dark">Expense Category</label>
                    <select name="expensetype_id" class="arabic-select w-100 mb-3 h-30px">
                        @foreach ($exps as $exp)
                        <option value="{{ $exp->id }}">{{ $exp->name }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label class="text-dark">Amount</label>
                    <input type="text" name="amount" class="form-control">
                    <small class="form-text text-muted">please enter</small>
                </div>

                <div class="form-group">
                    <label for="label-textarea2">Note</label>
                    <fieldset class="form-label-group">
                        <textarea class="form-control" name="description" id="label-textarea2" rows="3"
                            placeholder="Note"></textarea>

                    </fieldset>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


<!--Success -->
<div class="modal fade text-left" id="success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title white" id="myModalLabel110">Success Modal</h5>
                <button type="button" class="white close rounded-pill btn btn-sm btn-icon btn-success  m-0"
                    data-dismiss="modal" aria-label="Close">
                    <svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z">
                        </path>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('expense.list.update') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="hidden" id="id" name="id">
                                <label class="text-dark">Expense Category</label>
                                <select name="expensetype_id" class="arabic-select w-100 mb-3 h-30px">
                                    @foreach ($exps as $exp)
                                    <option value="{{ $exp->id }}">{{ $exp->name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group">
                                <label class="text-dark">Amount</label>
                                <input type="text" id="amount" name="amount" class="form-control">
                                <small class="form-text text-muted">please enter</small>
                            </div>

                            <div class="form-group">
                                <label for="label-textarea2">Note</label>
                                <fieldset class="form-label-group">
                                    <textarea class="form-control" id="description" name="description"
                                        id="label-textarea2" rows="3" placeholder="Note"></textarea>

                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
    </div>
</div>
<iframe name="print_frame" width="0" height="0" src="about:blank"></iframe>

@endsection

@section('script')
<script src="{{asset('assets/api/multiple-select/multiple-select.min.js')}}"></script>
<script src="{{asset('assets/js/sweetalert.js')}}"></script>
<script src="{{asset('assets/js/sweetalert1.js')}}"></script>
<script src="{{asset('assets/js/script.bundle.js')}}"></script>
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
function edited(id){

var _token = jQuery('input[name="_token"]').val();
var value = id
jQuery.ajax({
type:"post",
url: "{{ route('expense.list.edit') }}",
data:{id: id, _token: _token},
success: function(user)
{

jQuery('#success').modal('show')
jQuery('#id').val(user.id);
jQuery('#cat').val(user.expensetype_id);
jQuery('#amount').val(user.amount);
jQuery('#description').html(user.description);
},error:function(error){
console.log(error);
}
});

 }

 function deleted(id){

var _token = jQuery('input[name="_token"]').val();
var value = id
jQuery.ajax({
type:"post",
url: "{{ route('expense.list.delete') }}",
data:{id: id, _token: _token},
success: function(user)
{
//   alert(user);
   jQuery('#expense-report').empty();

},error:function(error){
console.log(error);
}
});

 }


</script>

<script>

       function dailyExpenses()
        {
            var _token = jQuery('input[name="_token"]').val();
            jQuery.ajax({url: "{{ route('expense.day') }}",

                    
            success: function(result)
            {    
                console.log(result);
                var len = 0;
                if(result['dayexpense'] != 0)
                {
                    len = result['dayexpense'].length;
                }
                jQuery('#expense-report').empty();
                if(len > 0)
                {
                    for(var i=0; i<len; i++)
                    {
                        
                        var amount = result['dayexpense'][i].amount;
                        var created_at = result['dayexpense'][i].created_at;
                         var created_at_date = created_at.split("T");
                        var expensetype_id = result['dayexpense'][i].expensetype.name;
                        var description = result['dayexpense'][i].description;
                        // var edit = result['dayexpense'][i].id;
                    
                    
                        var tr_str = "<tr>"+
                                 
                                    "<td >"+created_at_date[0]+"</td>"+
                                    "<td >"+expensetype_id+"</td>"+
                                    "<td >"+amount+"</td>"+
                                    "<td >"+description+"</td>"+
                                    // "<td><button type='button' class='btn-link btn pt-0 pb-0 dropdown-item' onclick='edited("+edit+")'> <i  class='fa fa-edit'></i></button>"+
                                    // "<button type='button' class='btn-link btn pt-0 pb-0 dropdown-item' onclick='deleted("+edit+")'><i  class='fa fa-trash'></i></button></td>"+
                                    "</tr>";
                                    jQuery('#expense-report').append(tr_str);

                    }
                    var tr_str ="<tr>"+
                               
                                "<td >Total</td>"+
                                "<td ></td>"+
                                "<td >"+result['totalexpense']+"</td>"+
                             
                                
                            "</tr>";
                            jQuery('#expense-report').append(tr_str); 

                    }
                    else
                    {
                        alert("Ops No record");
                    }
                    
                    }
            
            });
        }   
    
        function weeklyExpense()
        {
            var _token = jQuery('input[name="_token"]').val();
            jQuery.ajax({url: "{{ route('expense.week') }}",
                    
            success: function(result)
            {    
                var len = 0;
                if(result['weekexpense'] != 0)
                {
                    len = result['weekexpense'].length;
                }
                
                
                jQuery('#expense-report').empty();

                if(len > 0)
                {
                    for(var i=0; i<len; i++)
                    {
                        var amount = result['weekexpense'][i].amount;
                        var created_at = result['weekexpense'][i].created_at;
                         var created_at_date = created_at.split("T");
                        var expensetype_id = result['weekexpense'][i].expensetype.name;
                        var description = result['weekexpense'][i].description;
                        // var edit = result['weekexpense'][i].id;
                    
                    
                        var tr_str = "<tr>"+
                                 
                                    "<td >"+created_at_date[0]+"</td>"+
                                    "<td >"+expensetype_id+"</td>"+
                                    "<td >"+amount+"</td>"+
                                    "<td >"+description+"</td>"+
                                    // "<td><button type='button' class='btn-link btn pt-0 pb-0 dropdown-item' onclick='edited("+edit+")'> <i  class='fa fa-edit'></i></button>"+
                                    // "<button type='button' class='btn-link btn pt-0 pb-0 dropdown-item' onclick='deleted("+edit+")'><i  class='fa fa-trash'></i></button></td>"+
                                    "</tr>";
                                    jQuery('#expense-report').append(tr_str);

                    }
                    var tr_str ="<tr>"+
                               
                                "<td >Total</td>"+
                                "<td ></td>"+
                                "<td >"+result['totalexpense']+"</td>"+
                             
                                
                            "</tr>";
                            jQuery('#expense-report').append(tr_str); 

                    }
                    else
                    {
                        alert("Ops No record");
                    }
                    }
            
            });
        }   
    
        function monthlyExpense()
        {
            var _token = jQuery('input[name="_token"]').val();
            jQuery.ajax({url: "{{ route('expense.month') }}",
                    
            success: function(result)
            {    
                //  console.log(result['monthsales']);
                var len = 0;
                if(result['monthexpense'] != 0)
                {
                    len = result['monthexpense'].length;
                }
                
                
                jQuery('#expense-report').empty();

                if(len > 0)
                {
                    for(var i=0; i<len; i++)
                    {
                        var amount = result['monthexpense'][i].amount;
                        var created_at = result['monthexpense'][i].created_at;
                         var created_at_date = created_at.split("T");
                        var expensetype_id = result['monthexpense'][i].expensetype.name;
                        var description = result['monthexpense'][i].description;
                        // var edit = result['monthexpense'][i].id;
                    
                    
                        var tr_str = "<tr>"+
                                 
                                    "<td >"+created_at_date[0]+"</td>"+
                                    "<td >"+expensetype_id+"</td>"+
                                    "<td >"+amount+"</td>"+
                                    "<td >"+description+"</td>"+
                                    // "<td><button type='button' class='btn-link btn pt-0 pb-0 dropdown-item' onclick='edited("+edit+")'> <i  class='fa fa-edit'></i></button>"+
                                    // "<button type='button' class='btn-link btn pt-0 pb-0 dropdown-item' onclick='deleted("+edit+")'><i  class='fa fa-trash'></i></button></td>"+
                                    "</tr>";
                                    jQuery('#expense-report').append(tr_str);

                    }
                    var tr_str ="<tr>"+
                               
                                "<td >Total</td>"+
                                "<td ></td>"+
                                "<td >"+result['totalexpense']+"</td>"+
                             
                                
                            "</tr>";
                            jQuery('#expense-report').append(tr_str); 

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
