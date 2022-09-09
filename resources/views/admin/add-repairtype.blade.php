@extends('admin.layouts.master')

@section('title') Repair Type Add @endsection

@section('content')
   @component('admin.common-components.breadcrumb')
         @slot('title') Repair Type Add  @endslot
         @slot('li_1')  @endslot
         @slot('li_2')@endslot
     @endcomponent

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{url('admin/repairTypes')}}" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}

                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Models</label>
                                            <div class="col-md-10">
                                                <select class="form-control selectpic" name="model_Id" required="">
                                                    <option selected="">Select Model</option>
                                                    @foreach(CityClass::allModels() as $model)
                                                     <option value="{{$model->id}}">{{$model->model_name}}</option>
                                                    @endforeach
                                                </select>
                                               
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Repair Type</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="repair_type" type="text" placeholder="Enter Repair Type"  @if(old('repair_type')) value="{{ old('repair_type') }}" @endif  id="example-text-input">
                                                <span class="text-danger">{{ $errors->first('repair_type') }}</span>
                                            </div>
                                        </div>
                                      
                                     <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Price</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="price" type="text" placeholder="Enter Price"  @if(old('price')) value="{{ old('price') }}" @endif  id="example-text-input">
                                                <span class="text-danger">{{ $errors->first('price') }}</span>
                                            </div>
                                        </div>
                                     <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Repair Image</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="repair_image" type="file"  @if(old('repair_image')) value="{{ old('repair_image') }}" @endif  id="example-text-input">
                                                <span class="text-danger">{{ $errors->first('repair_image') }}</span>
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
@section('script')

<script type="text/javascript">
    $(function() {
  $('.selectpic').select2();
});
</script>

@endsection