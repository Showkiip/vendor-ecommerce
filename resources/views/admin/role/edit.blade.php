@extends('admin.layouts.master')

@section('title') User Role Edit @endsection

@section('content')
   @component('admin.common-components.breadcrumb')
         @slot('title') User Role Edit  @endslot
         @slot('li_1')  @endslot
         @slot('li_2')@endslot
     @endcomponent

                        <div class="row">
                              @if(Session::has('message'))
                              <div class="col-12">
                                  {!!Session::get('message')!!}
                              </div>
                              @endif
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{route('admin.role.update',$user->id)}}" method="post">
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
                                                    <input class="form-control" name="name" type="text" placeholder="Enter name" value="{{$user->name}}" name="name" id="example-text-input">
                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label for="example-email-input" class="col-md-2 col-form-label">Email</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" name="email" type="email"  value="{{ $user->email}}"  placeholder="Enter email" id="example-email-input">
                                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input" class="col-md-2 col-form-label">Address</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" placeholder="Enter Address"  value="{{ $user->address }}"  name="address" id="example-search-input">
                                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label for="example-tel-input" class="col-md-2 col-form-label">Telephone</label>
                                                <div class="col-md-10">
                                                    <input class="form-control"  value="{{ $user->phoneno }}"  name="phoneno" type="tel" placeholder="Enter phone no" id="example-tel-input">
                                                    <span class="text-danger">{{ $errors->first('phoneno') }}</span>
                                                </div>
                                            </div>


                                        <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                                    </div>

                                   </form>

                                    </div>
                                </div>
                            </div> <!-- end col -->

                        </div>
                        <!-- end row -->

                        <!-- end row -->
@endsection
