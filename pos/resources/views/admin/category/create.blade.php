@extends('layouts.app')
@section('title','Category')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="tc_content">
    <!--begin::Subheader-->
    {{-- <div class="subheader py-2 py-lg-6 subheader-solid">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white mb-0 px-0 py-2">
                    <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                </ol>
            </nav>
        </div>
    </div> --}}
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid addproduct-main">

            <div class="row">
                <div class="col-lg-12 col-xl-6">
                    <div class="card card-custom gutter-b bg-transparent shadow-none border-0">
                        <div class="card-header align-items-center   border-bottom-dark px-0">
                            <div class="card-title mb-0">
                                <h3 class="card-label mb-0 font-weight-bold text-body">Add Category
                                </h3>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-12 col-xl-6">
                    <div class="card card-custom gutter-b bg-transparent shadow-none border-0">
                        <div class="card-header align-items-center   border-bottom-dark px-0">
                            <div class="card-title mb-0">
                                <h3 class="card-label mb-0 font-weight-bold text-body">Category list
                                </h3>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-xl-6">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                            <div class="card card-custom gutter-b bg-white border-0">
                                <div class="card-header border-0 align-items-center">
                                    <h3 class="card-label mb-0 font-weight-bold text-body">Add Category
                                    </h3>
                                </div>
                                <div class="card-body" id="printableTable">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <form action="{{ route('category.store') }}" method="post">
                                                @csrf
                                                {{-- @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif --}}
                                                <h6 class="text-body">
                                                    Category
                                                </h6>
                                                <fieldset class="form-group mb-3">
                                                    <input type="text" class="form-control bg-transparent text-dark @error('name')
                                                     is-invalid
                                                    @enderror"
                                                        name="name" id="basicInput" placeholder="Category Name">
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                </fieldset>
                                                <div class="col-12 d-flex justify-content-end">
                                                    <input type="submit" href="" class="btn btn-info cta">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-6">
                    <table class="table table-striped">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category</th>
                                <th scope="col">Create</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)

                            <tr>
                                <th scope="row">{{ $loop->index+1 }}</th>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->created_at->format('M Y d') }}</td>
                                <td style="display: flex;">
                                    <a type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#updateModal" onclick="show_modal({{ $category->id }})"><i class="fa fa-edit"></i>

                                    </a>
                                    <form action="{{ route('category.destroy',$category->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i></button>
                                    </form>
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

<!--Success -->
<div class="modal fade text-left" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <form action="{{ route('category.updated') }}" method="POST">
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
                        <h6 class="text-body">
                            <input type="hidden" name="id" id="id"><input type="hidden" name="category_id"
                                id="category_id">
                            Product Name
                        </h6>
                        <fieldset class="form-group mb-3">
                            <input type="text" class="form-control bg-transparent text-dark" id="name" name="name"
                                placeholder="Product Name">
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

@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function show_modal(id)
    {
    var _token = $('input[name="_token"]').val();
    $.ajax({
    type:"post",
    url: "{{ route('category.editing') }}",
    data:{user_id: id, _token: _token},
    success: function(user)
    {
        $('#id').val(user.id);
        $('#name').val(user.name);
    },
    error:function(error){
        console.log(error);
    }
    });
    }
</script>

@endsection
