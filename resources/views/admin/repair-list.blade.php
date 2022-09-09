@extends('admin.layouts.master')

@section('title') Repair Type List @endsection

@section('content')

    @component('admin.common-components.breadcrumb')
         @slot('title') Repair Type List  @endslot
         @slot('li_1') Repair Type @endslot
         @slot('li_2') Repair Type List @endslot
     @endcomponent


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
                                            <table id="example" class="table table-centered table-nowrap table-hover">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col" style="width: 70px;">#</th>
                                                        <th scope="col">Model</th>
                                                        <th></th>
                                                        <th scope="col">Repair Type</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($RepairTypes as $index => $RepairType)
                                                    <tr>
                                                        <td>
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle">
                                                                    {{ $RepairType->id }}
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            {{CityClass::modelName($RepairType->model_Id)}}
                                                        </td>
                                                            <td>
                                                                <h5 class="font-size-14 mb-1"><img src="{{asset('storage/images/repair/'.$RepairType->repair_image)}}" ></a></h5>
    
                                                            </td>

                                                            <td>
                                                            <h5 class="font-size-14 mb-1"><a href="#" class="text-dark">{{$RepairType->repair_type}}</a></h5>
</td>

                                                        </td>
                                                          <td>
                                                            <h5 class="font-size-14 mb-1"><a href="#" class="text-dark">{{$RepairType->price}}</a></h5>

                                                        </td>

                                                        <td>
                                                            <ul class="list-inline font-size-20 contact-links mb-0">
                                                                <li class="list-inline-item px-2">
                                                                    <a href="{{url('admin/repairTypes/'.$RepairType->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="mdi mdi-account-edit-outline"></i></a>
                                                                </li>
                                                                <li class="list-inline-item px-2">
                                                                   <form action="{{url('admin/repairTypes/'.$RepairType->id)}}" method="post">
                                                                    {{csrf_field()}}
                                                                       @method('DELETE')

                                                                       {{-- <label for="delZipss" data-toggle="tooltip" data-placement="top" title="Delete" style="cursor: pointer;"><i class="mdi mdi-delete-circle-outline"></i></label>
                                                                       <input id="delZipss" type="submit" name="" style="display: none"> --}}
                                                                       <button type="submit" style="border: 0; background: transparent;"><i class="mdi mdi-delete-circle-outline"></i></button>
                                                                   </form>

                                                                </li>
                                                              <!--<li class="list-inline-item px-2">
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
