@extends('layouts.app')
@section('title','Products')
@section('css')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

</script>

@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="tc_content">
    <!--begin::Subheader-->
    {{-- <div class="subheader py-2 py-lg-6 subheader-solid">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white mb-0 px-0 py-2">
                    <li class="breadcrumb-item active" aria-current="page">Catalog</li>
                </ol>
            </nav>
        </div>
    </div> --}}
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
                                        <h3 class="card-label mb-0 font-weight-bold text-body">Product list
                                        </h3>
                                    </div>
                                    <div class="icons d-flex">
                                        <a href="{{ route('products.create') }}" class="ml-2">
                                            <span
                                                class="bg-secondary h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center  rounded-circle shadow-sm ">

                                                <svg width="25px" height="25px" viewBox="0 0 16 16"
                                                    class="bi bi-plus white" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                </svg>
                                            </span>
                                        </a>
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

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 ">
                            <div class="card card-custom gutter-b bg-white border-0">
                                <div class="card-body">
                                    <div>
                                        <div class=" table-responsive" id="printableTable">
                                            <table id="productTable" class="display ">
                                                <thead class="text-body">
                                                    @if (session('status'))
                                                    <div class="alert alert-success">
                                                        {{ session('status') }}
                                                    </div>
                                                    @endif
                                                      @if (session('delete'))
                                                    <div class="alert alert-danger">
                                                        {{ session('delete') }}
                                                    </div>
                                                    @endif
                                                    <!--@if ($errors->any())-->
                                                    <!--<div class="alert alert-danger">-->
                                                    <!--    <ul>-->
                                                    <!--        @foreach ($errors->all() as $error)-->
                                                    <!--        <li>{{ $error }}</li>-->
                                                    <!--        @endforeach-->
                                                    <!--    </ul>-->
                                                    <!--</div>-->
                                                    <!--@endif-->
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Products</th>
                                                        <th>Quantity</th>
                                                        <th>Category</th>
                                                        <th>Price</th>
                                                        <th>
                                                            Status
                                                        </th>
                                                        <th class="no-sort"></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="kt-table-tbody text-dark">

                                                    @foreach ($products as $product)
                                                    <tr class="kt-table-row kt-table-row-level-0">
                                                        <td>{{ $loop->index+1 }}</td>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <!-- <div class="h-45px w-45px d-flex align-items-center mr-2">
																				<img class="img-fluid" src="../images/product_images/product_2x.jpg" alt="product">
																			</div> -->
                                                                <details>
                                                                    <summary>{{ $product->name }}</summary>
                                                                    <p>{{ $product->barcode }}</p>
                                                                </details>
                                                            </div>
                                                        </td>
                                                        <td>{{ $product->quantity }}</td>
                                                        <td>{{ $product->category->name }}</td>
                                                        <td>{{ $product->price }}</td>
                                                        <td>
                                                            <div class="">
                                                                <div class="">

                                                                    @if($product->active == 1)
                                                                    <span class=" text-success">Approved</span>
                                                                    @elseif($product->active == 0)
                                                                    <span class=" text-primary">Pending</span>
                                                                    @else
                                                                    <span class=" text-danger">Rejected</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="card-toolbar text-right">
                                                                <button class="btn p-0 shadow-none" type="button"
                                                                    id="dropdowneditButton" data-toggle="dropdown"
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
                                                                </button>
                                                               @role('Inventory|SuperAdmin')
                                                                <div class="dropdown-menu dropdown-menu-right"
                                                                    aria-labelledby="dropdowneditButton">
                                                                        
                                                                    <a type="button" class="dropdown-item"
                                                                        data-toggle="modal" data-target="#updateModal"
                                                                        onclick="show_modal({{ $product->id }})">Edit
                                                                        Product
                                                                    </a>
                                                                     
                                                                     @role('SuperAdmin')
                                                                    <form action="{{ route('products.destroy',$product->id) }}" method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="dropdown-item">Delete</button>
                                                                    </form>
                                                                        @endrole
                                                                </div>
                                                               @endrole
                                                            </div>
                                                        </td>
                                                        <!--Warning -->
                                                        <div class="modal fade text-left" id="warning" tabindex="-1"
                                                            role="dialog" aria-labelledby="myModalLabel140"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                                role="document">

                                                            </div>
                                                        </div>
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

<!--Success -->
<div class="modal fade text-left" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <form action="{{ route('product.updated') }}" method="POST">
                @csrf
                <div class="modal-header bg-success">
                    <h5 class="modal-title white" id="myModalLabel110">Product</h5>
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
                    <div class="tab-pane fade show active" id="home-basic" role="tabpanel"
                        aria-labelledby="home-tab-basic">
                        {{-- <h6 class="text-body">
                            Category
                        </h6> --}}
                        <fieldset class="form-group mb-3">
                            {{-- @php
                            $categories = App\Models\Category::all();
                            @endphp
                            <select class="single-select w-100 mb-3 categories-select" name="category_id">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                            </select> --}}
                            @role('SuperAdmin')
                            <h6 class="text-body">
                                Active
                            </h6>
                            <fieldset class="form-group mb-3">
                                <select name="active" class="single-select w-100 mb-3">
                                    <option value="1">Active</option>
                                    <option value="2">Deactive</option>
                                </select>
                            </fieldset>
                            
                        </fieldset>
                        <h6 class="text-body">
                            <input type="hidden" name="id" id="id"><input type="hidden" name="category_id"
                                id="category_id">
                            Product Name
                        </h6>
                        <fieldset class="form-group mb-3">
                            <input type="text" class="form-control bg-transparent text-dark" id="name" name="name"
                                placeholder="Product Name">
                        </fieldset>
                        @endrole
                        @role('Inventory')
                           <h6 class="text-body">
                           
                            Product Name
                        </h6>
                        <fieldset class="form-group mb-3">
                            <input type="text" class="form-control bg-transparent text-dark" id="name" name="name"
                                placeholder="Product Name" readonly>
                        </fieldset>
                        @endrole
                        <h6 class="text-body">
                            In Stock
                        </h6>
                        <fieldset class="form-group mb-3">
                            <input type="text" class=" form-control bg-transparent
                            text-dark" id="quantity" name="quantity" placeholder="Instock">
                        </fieldset>
                        <h6 class="text-body">
                            Price
                        </h6>
                        <fieldset class="form-group mb-3">
                            <input type="text" class=" form-control bg-transparent
                            text-dark" id="price" name="price" placeholder="Price">
                        </fieldset>
                        @role('SuperAdmin')
                        <h6 class="text-body">
                            Discount
                        </h6>
                        <fieldset class="form-group mb-3">
                            <input type="text" id="discount" class=" form-control bg-transparent
                                                text-dark" id="discount" name="discount" placeholder="Discount">
                        </fieldset>
                        @endrole
                        <h6 class="text-body">
                            BarCode
                        </h6>
                        <fieldset class="form-group mb-3">
                            <input type="text" name="barcode" autofocus class=" form-control bg-transparent
                            text-dark" id="barcode" placeholder="BarCode">
                        </fieldset>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">

                        <span class="">Close</span>
                    </button>
                    <button type="submit" class="btn btn-success ml-1">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<iframe name="print_frame" width="0" height="0" src="about:blank"></iframe>

@endsection
@section('script')
<script>
    jQuery(document).ready( function () {
	jQuery('#productTable').dataTable( {
    "pagingType": "simple_numbers",

    "columnDefs": [ {
      "targets"  : 'no-sort',
      "orderable": false,
    }]
});
});

function show_modal(id)
{
var _token = $('input[name="_token"]').val();
$.ajax({
type:"post",
url: "{{ route('product.editing') }}",
data:{user_id: id, _token: _token},
success: function(user)
{
$('#id').val(user.id);
$('#name').val(user.name);
$('#quantity').val(user.quantity);
$('#price').val(user.price);
$('#discount').val(user.discount);
$('#barcode').val(user.barcode);
$('#discount').val(user.discount);
$('#category_id').val(user.category_id);
},error:function(error){
console.log(error);
}
});
}
</script>
<script src="{{ asset('assets/api/editor/classic.ckeditor.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert1.js') }}"></script>
@endsection
