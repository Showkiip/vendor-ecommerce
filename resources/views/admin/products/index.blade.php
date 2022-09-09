@extends('admin.layouts.master')

@section('title') Product List @endsection

@section('content')

    @component('admin.common-components.breadcrumb')
         @slot('title') Product List  @endslot
         @slot('li_1') Product @endslot
         @slot('li_2') Product List @endslot
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

                                                        <th scope="col">Brand Name</th>
                                                        <th scope="col">Model Name</th>
                                                        <th scope="col">Warranty</th>
                                                        {{-- <th scope="col">Conditions</th>
                                                        <th scope="col">Storages</th>
                                                        <th scope="col">Colors/Images</th> --}}

                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($products as $index => $product)
                                                    <tr>
                                                        <td>{{$index + 1}} </td>

                                                        @php
                                                            $model = App\Models\Pmodel::whereId($product->model_id)->first();
                                                            @endphp
                                                        <td>
                                                           {{$model->brand->brand_name}}

                                                        </td>

                                                        <td>
                                                            {{ $model->model_name }}

                                                        </td>
                                                       <td>{{ $product->warranty }}</td>

                                              
                                                        <td>
                                                            <ul class="list-inline font-size-20 contact-links mb-0">
                                                                <li class="list-inline-item px-2">
                                                                    <a href="{{url('product-single/'.$product->id) }}" data-toggle="tooltip" data-placement="top" title="View"><i class="mdi mdi-eye"></i></a>
                                                                </li>
                                                                <li class="list-inline-item px-2">
                                                                    <a href="{{url('admin/product/'.$product->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="mdi mdi-account-edit-outline"></i></a>
                                                                </li>
                                                                <li class="list-inline-item px-2">
                                                                   <form action="{{url('admin/product/'.$product->id)}}" method="post">
                                                                    {{csrf_field()}}
                                                                       @method('DELETE')

                                                                       <button type="submit" style="border: none;background: white;"><i class="mdi mdi-delete-circle-outline"></i></button>
                                                                
                                                                   </form>

                                                                </li>
                                                              <!--   <li class="list-inline-item px-2">
                                                                    <a href="" data-toggle="tooltip" data-placement="top" title="Profile"><i class="mdi mdi-account-circle-outline"></i></a>
                                                                </li> -->
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                      <!--   <div class="row">
                                            <div class="col-lg-12">
                                                <ul class="pagination pagination-rounded justify-content-center mt-4">
                                                    <li class="page-item disabled">
                                                        <a href="#" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="#" class="page-link">1</a>
                                                    </li>
                                                    <li class="page-item active">
                                                        <a href="#" class="page-link">2</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="#" class="page-link">3</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="#" class="page-link">4</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="#" class="page-link">5</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a href="#" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>


@endsection
