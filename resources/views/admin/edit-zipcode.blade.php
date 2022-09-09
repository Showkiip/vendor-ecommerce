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
                                        <form action="{{route('admin.zipCode.update',$zipcode->id)}}" method="post">
                                            {{csrf_field()}}
                                            @method('PUT')
                                            
                                            <input type="hidden" name="c_id" value="{{$zipcode->id}}">
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Zip Code</label>
                                            <div class="col-md-10">
                                                <input class="form-control" name="zipcode" type="text" placeholder="Enter Zip code" value="{{$zipcode->zipcode}}" id="example-text-input">
                                                <span class="text-danger">{{ $errors->first('zipcode') }}</span>
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