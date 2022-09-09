@extends('admin.layouts.master')

@section('title') FAQs Add @endsection

@section('content')
   @component('admin.common-components.breadcrumb')
         @slot('title') FAQs Add  @endslot
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
                                        <form action="{{route('admin.faqs.store')}}" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}


                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Question</label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" name="question" type="text" placeholder="Enter Question" ></textarea>
                                                    <span class="text-danger">{{ $errors->first('Question') }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-md-2 col-form-label">Answer</label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" name="answer" type="text" placeholder="Enter Answer" ></textarea>
                                                    <span class="text-danger">{{ $errors->first('Question') }}</span>
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

@endsection
