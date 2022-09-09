@extends('admin.layouts.master')

@section('title') Coupon List @endsection

@section('content')

    @component('admin.common-components.breadcrumb')
         @slot('title') Coupon List  @endslot
         @slot('li_1') Coupon @endslot
         @slot('li_2') Coupon List @endslot
     @endcomponent
   @section('css')

   @endsection

                        <div class="row">
                             @if(Session::has('message'))
                              <div class="col-12">
                                  {!!Session::get('message')!!}
                              </div>
                              @endif
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-centered table-nowrap table-hover" id="example" cellspacing="0" width="100%" >
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Question</th>
                                                        <th scope="col">Answer</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($faqs as $index => $faq)
                                                    <tr>
                                                        <td>{{$index + 1}} </td>
                                                        <td>{{ $faq->question }}</td>
                                                        <td>
                                                            <textarea class="form-control" cols="50">{{ $faq->answer }}</textarea></td>
                                                          <td>
                                                            <ul class="list-inline font-size-20 contact-links mb-0">

                                                                <li class="list-inline-item px-2">
                                                                    <a href="{{url('admin/faqs/'.$faq->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="mdi mdi-account-edit-outline"></i></a>
                                                                </li>
                                                                <li class="list-inline-item px-2">
                                                                   <form action="{{url('admin/faqs/'.$faq->id)}}" method="post">
                                                                    {{csrf_field()}}
                                                                       @method('DELETE')

                                                                       <button type="submit" style="border: none;background: white;"><i class="mdi mdi-delete-circle-outline"></i></button>
                                                                   </form>

                                                                </li>

                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                     <tr>
                                                         <td class="text-center" colspan="4">
                                                             Oops No Data
                                                         </td>
                                                     </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>



@endsection

