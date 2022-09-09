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

                                                        <th scope="col">Coupon Name</th>
                                                        <th scope="col">Coupon Code</th>
                                                        <th scope="col">Coupon type</th>
                                                        <th scope="col">Coupon value</th>
                                                        <th scope="col">Coupon Status</th>
                                                        <th scope="col">description</th>


                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($coupon as $index => $coup)
                                                    <tr>
                                                        <td>{{$index + 1}} </td>

                                                        <td>
                                                           {{$coup->name}}

                                                        </td>

                                                        <td>
                                                            {{ $coup->code }}

                                                        </td>
                                                       <td>{{ $coup->type }}</td>
                                                       <td>{{ $coup->value }}</td>
                                                       <td>
                                                        @if ($coup->status == 1)
                                                        <span class="badge badge-pill badge-success">Active</span>
                                                        @else
                                                        <span class="badge badge-pill badge-danger">InActive</span>
                                                       @endif</td>
                                                       <td>{{ $coup->description }}</td>
                                                        <td>
                                                            <ul class="list-inline font-size-20 contact-links mb-0">

                                                                <li class="list-inline-item px-2">
                                                                    <a href="{{url('admin/coupon/'.$coup->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="mdi mdi-account-edit-outline"></i></a>
                                                                </li>
                                                                <li class="list-inline-item px-2">
                                                                   <form action="{{url('admin/coupon/'.$coup->id)}}" method="post">
                                                                    {{csrf_field()}}
                                                                       @method('DELETE')

                                                                       <button type="submit" style="border: none; background: white;"><i class="mdi mdi-delete-circle-outline"></i></button>
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

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="empModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Sale Order </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                              <div class="modal-body" id="viewcoup">
                                ...
                              </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>

@endsection

@section('script')

<script>
    function viewcoup(id)
    {
        // alert(id);

        $.ajax({
        url: "{{url('admin/viewcoup')}}/"+id,
        type:"get",
        success:function(response){
          console.log(response);
          $('#viewcoup').html(response);
          $('#empModal').modal('show');
        },

       });

    }
</script>
@endsection
