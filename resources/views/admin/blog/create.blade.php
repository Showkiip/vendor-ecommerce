@extends('admin.layouts.master')

@section('title') Blog @endsection

@section('content')
   @component('admin.common-components.breadcrumb')
         @slot('title') Blog Add  @endslot
         @slot('li_1')  @endslot
         @slot('li_2')@endslot
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
                                        <form action="{{url('admin/blog')}}" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Image</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" name="image" type="file" placeholder="Enter Brand Name"  @if(old('image')) value="{{ old('image') }}" @endif  id="example-text-input">
                                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                                </div>
                                            </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Title</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="title" type="text" placeholder="Enter Brand Name"  @if(old('title')) value="{{ old('title') }}" @endif  id="example-text-input">
                                                <span class="text-danger">{{ $errors->first('title') }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Description</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" name="desc" type="text" placeholder="Enter Brand Name"  @if(old('desc')) value="{{ old('desc') }}" @endif  id="example-text-input"></textarea>
                                                <span class="text-danger">{{ $errors->first('desc') }}</span>
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
