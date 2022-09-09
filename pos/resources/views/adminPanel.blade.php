@extends('layouts.app')
        @section('title','Dashboard')
        @section('content')
            <div class="content d-flex flex-column flex-column-fluid" id="tc_content">
        <!--begin::Subheader-->
        {{-- <div class="subheader py-2 py-lg-6 subheader-solid">
            <div class="container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-white mb-0 px-0 py-2">
    
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div> --}}
        <!--end::Subheader-->
        <!--begin::Entry-->
    
        {{-- <h1>Dashboard</h1> --}}
        <div class="d-flex flex-column-fluid">
    
            <!--begin::Container-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-6 col-xl-3">
                                <div
                                    class="card card-custom gutter-b bg-white border-0 theme-circle theme-circle theme-circle-secondary">
                                    <div class="card-body">
                                        <h3 class="text-body font-weight-bold">Products</h3>
                                        <div class="mt-3">
                                            <div class="d-flex align-items-center">
                                                <span class="text-dark font-weight-bold font-size-h1 mr-3"><span
                                                        class="counter" data-target="{{ $productCount }}"></span></span>
                                            </div>
                                            <div class="text-black-50 mt-3">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-3">
                                <div class="card card-custom gutter-b bg-white border-0 theme-circle theme-circle-success">
                                    <div class="card-body">
                                        <h3 class="text-body font-weight-bold">Employee</h3>
                                        <div class="mt-3">
                                            <div class="d-flex align-items-center">
                                                <span class="text-dark font-weight-bold font-size-h1 mr-3"><span
                                                        class="counter" data-target="{{$userCount}}"></span></span>
                                            </div>
                                            <div class="text-black-50 mt-3">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-3">
                                <div class="card card-custom gutter-b bg-white border-0 theme-circle theme-circle-info">
    
                                    <div class="card-body">
                                        <h3 class="text-body font-weight-bold">Sales</h3>
                                        <div class="mt-3">
                                            <div class="d-flex align-items-center">
                                                <span class="text-dark font-weight-bold font-size-h1 mr-3"><span
                                                        class="counter" data-target="{{ $saleCount }}" ></span></span>
                                                <span class="font-weight-bold font-size-h4 text-danger"></span>
    
                                            </div>
                                            <div class="text-black-50 mt-3">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-3">
                                <div class="card card-custom gutter-b bg-white border-0 theme-circle theme-circle-primary">
                                    <div class="card-body">
                                        <h3 class="text-body font-weight-bold">Expenses</h3>
                                        <div class="mt-3">
                                            <div class="d-flex align-items-center">
                                                <span class="text-dark font-weight-bold font-size-h1 mr-3"><span
                                                        class="counter" data-target="{{ $expenseCount }}"></span></span>
                                            </div>
                                            <div class="text-black-50 mt-3">
                                            </div>
                                        </div>
    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6  col-xl-12">
                                <div class="card card-custom gutter-b bg-white border-0">
                                    <div class="card-header align-items-center  border-0">
                                        <div class="card-title mb-0">
                                            <h3 class="card-label text-body font-weight-bold mb-0">Users
                                            </h3>
                                        </div>
    
                                    </div>
                                    <div class="card-body pt-3">
                                        <div id="chart-4">
                                        </div>
                                    </div>
                                </div>
                            </div>
    
    
    
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-xl-12">
                                <div class="card card-custom gutter-b bg-white border-0">
                                    <div class="card-header align-items-center  border-0">
                                        <div class="card-title mb-0">
                                            <h3 class="card-label font-weight-bold mb-0 text-body">Weekly
                                                Sales
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="card-body pt-3">
                                        <div id="chart-3">
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
        @section('script')
            <script>
                var options = {
            	  debug: 'info',
        	      modules: {
        		    toolbar: '#toolbar'
        	    },
        	    placeholder: 'Compose an epic...',
        	    readOnly: true,
        	    theme: 'snow'
        	    };
        	    var editor = new Quill('#editor', options);
        	    jQuery(document).ready( function () {
        		jQuery('#myTable').DataTable();
            	} );
            </script>
        @endsection
