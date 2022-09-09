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
                                        <form action="{{route('admin.repairTypes.update',$repair->id)}}" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            @method('PUT')
                                            
                                            <input type="hidden" name="c_id" value="{{$repair->id}}">
                                    <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Models</label>
                                            <div class="col-md-10">
                                                <select class="form-control selectpic" name="model_Id" required="">
                                                    <option selected="">Select Model</option>
                                                    @foreach(CityClass::allModels() as $model)
                                                     <option value="{{$model->id}}" {{$repair->model_Id ==$model->id ? 'selected':'' }}>{{$model->model_name}}</option>
                                                    @endforeach
                                                </select>
                                               
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Repair Type</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="repair_type" type="text" placeholder="Enter Repair Type" value="{{ $repair->repair_type }}"  id="example-text-input">
                                                <span class="text-danger">{{ $errors->first('repair_type') }}</span>
                                            </div>
                                        </div>
                                      
                                     <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Price</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="price" type="text" placeholder="Enter Price"   value="{{ $repair->price }}"  id="example-text-input">
                                                <span class="text-danger">{{ $errors->first('price') }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Repair Image</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="repair_image" type="file"  @if(old('repair_image')) value="{{ $repair->repair_image }}" @endif  id="example-text-input">
                                                <span class="text-danger">{{ $errors->first('repair_image') }}</span>
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