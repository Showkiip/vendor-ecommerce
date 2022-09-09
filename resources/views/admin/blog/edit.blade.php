@extends('admin.layouts.master')

@section('title') Blogs Update @endsection

@section('content')
   @component('admin.common-components.breadcrumb')
         @slot('title') Blogs Update @endslot
         @slot('li_1')  @endslot
         @slot('li_2')  @endslot
     @endcomponent

                        <div class="row">
                            <div class="col-12">
                                @if(Session::has('message'))
                                <div class="col-12">
                                    {!!Session::get('message')!!}
                                </div>
                                @endif
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{route('admin.blog.update',$blog->id)}}" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            @method('PUT')


                                            <div class="form-group row">

                                                <label for="example-text-input" class="col-md-2 col-form-label">Image</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" name="image" onchange="readURL(this);" type="file" placeholder="Enter image"  @if(old('image')) value="{{ old('image') }}" @endif  id="example-text-input">
                                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                                    <img id="blah" src="{{asset($blog->image)}}" alt="your image" width="150px" height="150px"/>
                                                </div>
                                            </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Title</label>
                                            <div class="col-md-10">

                                                <input class="form-control" name="title" type="text" placeholder="Enter Brand Name"  @if(old('title'))  @endif value="{{$blog->title}}" id="example-text-input">
                                                <span class="text-danger">{{ $errors->first('title') }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Description</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" name="desc" type="text" placeholder="Enter Brand Name"  @if(old('desc')) value="{{ old('desc') }}" @endif  id="example-text-input">{{$blog->desc}}</textarea>
                                                <span class="text-danger">{{ $errors->first('desc') }}</span>
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
@section('script')
<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result)
                .width(150)
                .height(150);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
