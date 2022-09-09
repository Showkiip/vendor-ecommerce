@extends('admin.layouts.master')

@section('title') Customer Add @endsection

@section('content')
   @component('admin.common-components.breadcrumb')
         @slot('title') Customer Add  @endslot
         @slot('li_1')  @endslot
         @slot('li_2')@endslot
     @endcomponent

                        <div class="row">
                              @if(Session::has('message'))
                              <div class="col-md-12">
                                  {!!Session::get('message')!!}
                              </div>
                              @endif
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{route('admin.role.store')}}" method="post">
                                            {{csrf_field()}}

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Role</label>
                                                <div class="col-md-10">
                                                <select name="role_id"  class="form-control">
                                                    @foreach (CityClass::role() as $rol)
                                                    <option value="{{$rol->id}}">{{$rol->name}}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Name</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" name="name" type="text" placeholder="Enter name" @if(old('name')) value="{{ old('name') }}" @endif  name="name" id="example-text-input">
                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label for="example-email-input" class="col-md-2 col-form-label">Email</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" name="email" type="email" @if(old('email')) value="{{ old('email') }}" @endif placeholder="Enter email" id="example-email-input">
                                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input" class="col-md-2 col-form-label">Address</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" placeholder="Enter Address" @if(old('address')) value="{{ old('address') }}" @endif name="address" id="example-search-input">
                                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label for="example-tel-input" class="col-md-2 col-form-label">Telephone</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" @if(old('phoneno')) value="{{ old('phoneno') }}" @endif name="phoneno" type="tel" placeholder="Enter phone no" id="example-tel-input">
                                                    <span class="text-danger">{{ $errors->first('phoneno') }}</span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-password-input" class="col-md-2 col-form-label">Password</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" name="password" type="password" placeholder="Enter password" id="example-password-input">
                                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                                </div>
                                            </div>
                                        <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                                    </div>

                                   </form>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{route('admin.assigned_role')}}" method="POST">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Role</label>
                                                <div class="col-md-10">
                                                <select name="role_id"  class="form-control">
                                                    @foreach (CityClass::role() as $rol)
                                                    <option value="{{$rol->id}}">{{$rol->name}}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Role</label>
                                                <div class="col-md-10">
                                                <select name="user_id"  class="form-control">
                                                    @foreach (CityClass::allAdmin() as $admin)
                                                    <option value="{{$admin->id}}">{{$admin->name}}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                            </div>

                                        <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Assign Role</button>
                                    </div>

                                   </form>

                                    </div>
                                </div>
                            </div> <!-- end col -->

                        </div>
                        <!-- end row -->

                        <!-- end row -->
@endsection
