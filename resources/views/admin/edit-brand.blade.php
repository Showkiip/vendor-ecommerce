@extends('admin.layouts.master')

@section('title') Brand Update @endsection

@section('content')
   @component('admin.common-components.breadcrumb')
         @slot('title') Brand Update @endslot
         @slot('li_1')  @endslot
         @slot('li_2')  @endslot
     @endcomponent

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{route('admin.brands.update',$brand->id)}}" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            @method('PUT')
                                            
                                            <input type="hidden" name="c_id" value="{{$brand->id}}">
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Brand Name</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="brand_name" type="text" placeholder="Enter Brand Name" value="{{$brand->brand_name}}" id="example-text-input">
                                                <span class="text-danger">{{ $errors->first('brand_name') }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Brand Image</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="brand_image" type="file" placeholder="Enter Brand image"  @if(old('brand_image')) value="{{ $brand->brand_image }}" @endif  id="example-text-input">
                                                <span class="text-danger">{{ $errors->first('brand_image') }}</span>
                                            </div>
                                        </div>
                                       
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