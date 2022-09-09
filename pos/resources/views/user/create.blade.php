@extends('layouts.app')
@section('title','Create')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="tc_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white mb-0 px-0 py-2">
                    <li class="breadcrumb-item active" aria-current="page">Add User</li>
                </ol>
            </nav>
        </div>
    </div>
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
                                <h3 class="card-label mb-0 font-weight-bold text-body">Add User
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
                                    <h3 class="card-label mb-0 font-weight-bold text-body">General Information
                                    </h3>
                                </div>


                                <div class="card-body" id="printableTable">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <form action="{{ route('user.store') }}" method="post">
                                                @csrf
                                                @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif


                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="tab-content lang-content" id="v-pills-tabContent">
                                                            <div class="tab-pane fade show active" id="home-basic"
                                                                role="tabpanel" aria-labelledby="home-tab-basic">
                                                                <h6 class="text-body">
                                                                    UserName
                                                                </h6>
                                                                <fieldset class="form-group mb-3">
                                                                    <input type="text"
                                                                        class="form-control bg-transparent text-dark"
                                                                        id="basicInput" name="name"
                                                                        placeholder="User Name">
                                                                </fieldset>

                                                                <h6 class="text-body">
                                                                    Email
                                                                </h6>
                                                                <fieldset class="form-group mb-3">
                                                                    <input type="eamil" name="email" autofocus
                                                                        class="form-control bg-transparent text-dark"
                                                                        id="email" placeholder="Email">
                                                                </fieldset>
                                                                <h6 class="text-body">
                                                                    Password
                                                                </h6>
                                                                <fieldset class="form-group mb-3">
                                                                    <input type="password" name="password"
                                                                        class="form-control bg-transparent text-dark"
                                                                        id="password"
                                                                        placeholder="Enter password ">
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
