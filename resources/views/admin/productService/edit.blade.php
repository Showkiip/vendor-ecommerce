@extends('admin.layouts.master')

@section('title') Phone Service Edit @endsection

@section('content')
   @component('admin.common-components.breadcrumb')
         @slot('title') Phone Service Edit @endslot
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
                                        <form action="{{route('admin.service.update',$phoneService->id)}}" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}


                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Serive Name</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" name="service_name" type="text" placeholder="Enter service name" value="{{ $phoneService->service_name }}"  id="example-text-input">
                                                    <span class="text-danger">{{ $errors->first('service_name') }}</span>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-search-input" class="col-md-2 col-form-label">Service Image</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="file" name="image" id="profile-img">
                                                    <span class="text-danger">{{ $errors->first('code') }}</span>

                                                <div id="imagShow">
                                                    <img src="{{  asset('storage/service/'.$phoneService->image)}} " id="profile-img-tag" width="150px" height="100px">
                                                </div>
                                                <div class="gallery">
                                                </div>
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

$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            $(".gallery").empty();
            $('#imagShow').hide();
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };


    $('#profile-img').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
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
