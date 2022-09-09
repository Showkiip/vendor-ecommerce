@extends('admin.layouts.master')

@section('title') Coupon Add @endsection

@section('content')
   @component('admin.common-components.breadcrumb')
         @slot('title') Coupon Add  @endslot
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
                                        <form action="{{route('admin.coupon.update',$coupon->id)}}" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            @method('PUT')


                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Coupon Name</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" name="name" type="text" placeholder="Enter name" value="{{ $coupon->name }}"  name="name" id="example-text-input">
                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-search-input" class="col-md-2 col-form-label">Coupon Code</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" placeholder="Enter Coupon Code" value="{{ $coupon->code }}" name="code" id="example-search-input">
                                                    <span class="text-danger">{{ $errors->first('code') }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input" class="col-md-2 col-form-label"> Coupon Type</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" placeholder="Enter type" value="{{ $coupon->type }}" name="type" id="example-search-input">
                                                    <span class="text-danger">{{ $errors->first('orig_price') }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-search-input" class="col-md-2 col-form-label"> value</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text" placeholder="Enter value" value="{{ $coupon->value }}" name="value" id="example-search-input">
                                                    <span class="text-danger">{{ $errors->first('quantity') }}</span>
                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label for="example-tel-input" class="col-md-2 col-form-label">Description</label>
                                                <div class="col-md-10">
                                                    <textarea type="text" name="description" class="form-control" >{{ $coupon->description }}</textarea>
                                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label for="example-tel-input" class="col-md-2 col-form-label">Status</label>
                                                <div class="col-md-10">
                                                  <select name="status" class="form-control">
                                                    <option value="1"> Active </option>
                                                    <option value="0"> InActive </option>
                                                  </select>
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

<script>
    $(function() {
$('.selectpic').select2();
});

</script>

<script>
    function getModel(event)
    {
        var id = $(event).val();
        $.ajax({
        url: "{{url('admin/accessory/getModels')}}/"+id,
        type:"get",
        success:function(response){
          console.log(response);
          $('#showModels').html(response);
        },

       });
    }
</script>
@endsection
