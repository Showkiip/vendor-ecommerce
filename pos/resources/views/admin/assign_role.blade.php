@extends('layouts.app')
@section('title','Assign Role')
@section('content')
<div class="container">




</div>

<div class="content d-flex flex-column flex-column-fluid" id="tc_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white mb-0 px-0 py-2">
                    <li class="breadcrumb-item active" aria-current="page">role</li>
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
                <div class="col-lg-12 col-xl-6">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                            <div class="card card-custom gutter-b bg-white border-0">
                                <div class="card-header border-0 align-items-center">
                                    <h3 class="card-label mb-0 font-weight-bold text-body">Assign Role
                                    </h3>
                                </div>
                                <div class="card-body" id="printableTable">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                        <form action="{{route('assigned_role')}}" method="POST">
                            @csrf

                            <div class="form-group">
                                <div class="input-group">
                                    <select class="form-control" name="role_id">
                                        @foreach($roles as $role)
                                        @if($role->name != 'SuperAdmin')
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div><br>
                            <div class="form-group">
                                <div class="input-group">
                                    <select class="form-control" name="user_id">
                                        @foreach($users as $user)
                                        @if(!$user->hasRole("SuperAdmin"))
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <input type="submit" class="btn btn-outline-primary m-2">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
                <div class="col-lg-12 col-xl-6">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                            <div class="card card-custom gutter-b bg-white border-0">
                                <div class="card-header border-0 align-items-center">
                                    <h3 class="card-label mb-0 font-weight-bold text-body">Role
                                    </h3>
                                </div>
                                <div class="card-body" id="printableTable">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <form action="{{route('role.store')}}" method="post">
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
                                                <h6 class="text-body">
                                                    Role
                                                </h6>
                                                <fieldset class="form-group mb-3">
                                                    <input type="text" class="form-control bg-transparent text-dark"
                                                        name="name" id="name" placeholder="Name">
                                                </fieldset>
                                                <div class="col-12 d-flex justify-content-end">
                                                    <input type="submit" href="" class="btn btn-primary cta">
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

            <div class="row">
                <div class="col-lg-12 col-xl-12">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                            <div class="card card-custom gutter-b bg-white border-0">
                                <div class="card-header border-0 align-items-center">
                                    <h3 class="card-label mb-0 font-weight-bold text-body">Role
                                    </h3>
                                </div>
                                <div class="card-body" id="printableTable">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                    <table class="table table-striped">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Role Name</th>

                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($roles as $role)
                          <tr>
                          <td>{{$role->id}}</td>
                          <td>{{$role->name}}</td>

                          <td style="display:flex">
                              <!--<a href="{{route('user.edit',$role->id)}}" class="btn btn-primary">Edit</a>-->
                              <form action="{{route('role.destroy',$role->id)}}">
                               @csrf
                               @method('DELETE')

                               <button type="submit" class="btn btn-danger">Delete</button>
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
</div>
</div>
            </div>

@endsection
