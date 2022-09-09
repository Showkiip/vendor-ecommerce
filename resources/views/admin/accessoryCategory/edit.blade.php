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
                                        <form action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}


                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Category</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" name="category" type="text" placeholder="Enter category"  value="{{ $category->category }}"  id="example-text-input">
                                                    <span class="text-danger">{{ $errors->first('category') }}</span>
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

