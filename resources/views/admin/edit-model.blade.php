@extends('admin.layouts.master')

@section('title') Model Update @endsection

@section('content')
   @component('admin.common-components.breadcrumb')
         @slot('title') Model Update @endslot
         @slot('li_1')  @endslot
         @slot('li_2')  @endslot
     @endcomponent

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{route('admin.models.update',$model->id)}}" method="post">
                                            {{csrf_field()}}
                                            @method('PUT')
                                            
                                            <input type="hidden" name="c_id" value="{{$model->id}}">

                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Brand</label>
                                            <div class="col-md-10">
                                                <select class="form-control" name="brand_Id" required="">
                                                    <option selected="">Select Brand</option>
                                                    @foreach(CityClass::brands() as $brand)
                                                     <option value="{{$brand->id}}" {{$model->brand_Id ==$brand->id ? 'selected':'' }}>{{$brand->brand_name}}</option>
                                                    @endforeach
                                                </select>
                                               
                                            </div>
                                        </div>

                                         <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Model </label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="model_name" type="text" placeholder="Enter Model Name" value="{{$model->model_name}}" id="example-text-input">
                                                <span class="text-danger">{{ $errors->first('model_name') }}</span>
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