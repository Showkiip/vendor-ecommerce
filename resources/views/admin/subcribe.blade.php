@extends('admin.layouts.master')

@section('title') Subcribe List @endsection

@section('content')



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
                                                        <th scope="col">Email</th>
                                                      
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($subcribes as $index => $subcribe)
                                                    <tr>
                                                        <td>
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle">
                                                                    {{ $subcribe->id }}
                                                                </span>
                                                            </div>
                                                        </td>
                                                       
                                                        
                                                            <td>
                                                            <h5 class="font-size-14 mb-1"><a href="#" class="text-dark">{{ $subcribe->email }}</a></h5>
                                                           </td>

                                                      
                                                         

                                                       <td>
                                                            <ul class="list-inline font-size-20 contact-links mb-0">
                                                                <li class="list-inline-item px-2">
                                                                    <a href="{{url('admin/repairTypes/'.$subcribe->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="mdi mdi-account-edit-outline"></i></a>
                                                                </li>
                                                                <li class="list-inline-item px-2">
                                                                   <form action="{{url('admin/repairTypes/'.$subcribe->id)}}" method="post">
                                                                    {{csrf_field()}}
                                                                       @method('DELETE')

                                                                       {{-- <label for="delZipss" data-toggle="tooltip" data-placement="top" title="Delete" style="cursor: pointer;"><i class="mdi mdi-delete-circle-outline"></i></label>
                                                                       <input id="delZipss" type="submit" name="" style="display: none"> --}}
                                                                       <button type="submit" style="border: 0; background: transparent;"><i class="mdi mdi-delete-circle-outline"></i></button>
                                                                   </form>

                                                                </li>
                                                             
                                                            </ul>
                                                        </td> 
                                                     </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                
                                    </div>
                                </div>
                            </div>
                        </div>
@endsection
