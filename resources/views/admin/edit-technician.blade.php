@extends('admin.layouts.master')

@section('title') Customer Update @endsection

@section('content')
   @component('admin.common-components.breadcrumb')
         @slot('title') Customer Update @endslot
         @slot('li_1')  @endslot
         @slot('li_2')  @endslot
     @endcomponent

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{route('admin.techcreate')}}" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="c_id" value="{{$customer->id}}">
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Name</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="name" type="text" placeholder="Enter name" value="{{$customer->name}}" id="example-text-input">
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label for="example-email-input" class="col-md-2 col-form-label">Email</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="email" type="email" value="{{$customer->email}}" placeholder="Enter email" id="example-email-input">
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-md-2 col-form-label">Address</label>
                                            <div class="col-md-10">
                                                <input class="form-control" value="{{$customer->address}}" type="text" placeholder="Enter Address" name="address" id="example-search-input">
                                                {{ $errors->first('address') }}
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label for="example-tel-input" class="col-md-2 col-form-label">Telephone</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="phoneno" type="tel" value="{{$customer->phoneno}}" placeholder="Enter phone no" id="example-tel-input">
                                                {{ $errors->first('phoneno') }}
                                            </div>
                                        </div>
                                        
                                        <!-- <div class="form-group row">
                                            <label for="example-password-input" class="col-md-2 col-form-label">Password</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="password" placeholder="Enter password" id="example-password-input">
                                            </div>
                                        </div> -->
                                    
                                        <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                                    </div>

                                   </form>

                                    </div>
                                </div>
                            </div> <!-- end col -->

                        </div>
                        <!-- end row -->

                        <!-- end row -->
@endsection