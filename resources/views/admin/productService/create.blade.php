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
                              <div class="col-12">
                                  {!!Session::get('message')!!}
                              </div>
                              @endif
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{route('admin.service.store')}}" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}


                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Serive Name</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" name="service_name" type="text" placeholder="Enter service name" @if(old('service_name')) value="{{ old('service_name') }}" @endif  id="example-text-input">
                                                    <span class="text-danger">{{ $errors->first('service_name') }}</span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-search-input" class="col-md-2 col-form-label">Service Image</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="file" name="image" id="example-search-input">
                                                    <span class="text-danger">{{ $errors->first('code') }}</span>
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
