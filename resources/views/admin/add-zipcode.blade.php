@extends('admin.layouts.master')

@section('title') Zip Code Add @endsection

@section('content')
   @component('admin.common-components.breadcrumb')
         @slot('title') Zip Code Add  @endslot
         @slot('li_1')  @endslot
         @slot('li_2')@endslot
     @endcomponent

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{url('admin/zipCode')}}" method="post">
                                            {{csrf_field()}}
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Zip Code</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="zipcode" type="text" placeholder="Enter Zip Code"  @if(old('zipcode')) value="{{ old('zipcode') }}" @endif  name="name" id="example-text-input">
                                                <span class="text-danger">{{ $errors->first('zipcode') }}</span>
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