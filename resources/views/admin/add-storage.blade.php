@extends('admin.layouts.master')

@section('title') Storage Add @endsection

@section('content')
   @component('admin.common-components.breadcrumb')
         @slot('title') Storage Add  @endslot
         @slot('li_1')  @endslot
         @slot('li_2')@endslot
     @endcomponent

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{url('admin/storages')}}" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Storage</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="storage" type="text" placeholder="Enter Storage"  @if(old('storage')) value="{{ old('storage') }}" @endif  name="name" id="example-text-input">
                                                <span class="text-danger">{{ $errors->first('storage') }}</span>
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