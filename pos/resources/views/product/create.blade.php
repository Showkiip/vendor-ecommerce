@extends('layouts.app')
@section('title','Create')
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
                <div class="col-lg-12 col-xl-12">
                    <div class="card card-custom gutter-b bg-transparent shadow-none border-0">
                        <div class="card-header align-items-center   border-bottom-dark px-0">
                            <div class="card-title mb-0">
                                <h3 class="card-label mb-0 font-weight-bold text-body">Add Product
                                </h3>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-xl-12">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                            <div class="card card-custom gutter-b bg-white border-0">
                                <div class="card-header border-0 align-items-center">
                                    <h3 class="card-label mb-0 font-weight-bold text-body">Add Product
                                    </h3>
                                </div>


                                <div class="card-body" id="printableTable">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <form action="{{ route('products.store') }}" method="post">
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
                                                <label>Categories</label>
                                                <select class="single-select w-100 mb-3 categories-select"
                                                    name="category_id">
                                                    @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="tab-content lang-content" id="v-pills-tabContent">
                                                            <div class="tab-pane fade show active" id="home-basic"
                                                                role="tabpanel" aria-labelledby="home-tab-basic">
                                                                <h6 class="text-body">
                                                                    Product Name
                                                                </h6>
                                                                <fieldset class="form-group mb-3">
                                                                    <input type="text"
                                                                        class="form-control bg-transparent text-dark @error('name')
                                                                         is-invalid
                                                                        @enderror"
                                                                        id="basicInput" name="name"
                                                                        placeholder="Product Name">
                                                                        @error('name')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                </fieldset>
                                                                <h6 class="text-body">
                                                                    In Stock
                                                                </h6>
                                                                <fieldset class="form-group mb-3">
                                                                    <input type="text"
                                                                        class="form-control bg-transparent text-dark @error('quantity')
                                                                         is-invalid
                                                                        @enderror"
                                                                        id="basicInput" name="quantity"
                                                                        placeholder="Instock">
                                                                        @error('quantity')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                </fieldset>
                                                                <h6 class="text-body">
                                                                    Price
                                                                </h6>
                                                                <fieldset class="form-group mb-3">
                                                                    <input type="text"
                                                                        class="form-control bg-transparent text-dark"
                                                                        id="basicInput" name="price"
                                                                        placeholder="Price">
                                                                </fieldset>
                                                                  <h6 class="text-body">
                                                                    Discount
                                                                </h6>
                                                                <fieldset class="form-group mb-3">
                                                                    <input type="number" name="discount"
                                                                        class="form-control bg-transparent text-dark"
                                                                        id="basicInput"
                                                                        placeholder="Enter Discount in %" value="0" MIN="0">
                                                                </fieldset>
                                                                <h6 class="text-body">
                                                                    BarCode
                                                                </h6>
                                                                <fieldset class="form-group mb-3">
                                                                    <input type="number" name="barcode" autofocus
                                                                        class="form-control bg-transparent text-dark @error('barcode')
                                                                        is-invalid
                                                                        @enderror"
                                                                        id="basicInput" placeholder="BarCode">
                                                                        @error('barcode')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                </fieldset>
                                                              

                                                                <div class="col-12 d-flex justify-content-end">
                                                                    <input type="submit" href=""
                                                                        class="btn btn-primary cta">
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
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
@endsection
