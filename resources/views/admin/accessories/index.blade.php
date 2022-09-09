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
                                                        <th scope="col">Category</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Sell Price</th>
                                                        <th scope="col">Original Price</th>
                                                        <th scope="col">Quantity</th>

                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($accessories as $index => $accessory)
                                                    <tr>
                                                        <td>{{$index + 1}} </td>

                                                        @php
                                                            $model = App\Models\Pmodel::whereId($accessory->model_id)->first();
                                                            @endphp
                                                        <td>
                                                           {{$model->brand->brand_name}}

                                                        </td>

                                                        <td>
                                                            {{ $model->model_name }}

                                                        </td>
                                                       <td>{{ $accessory->category }}</td>
                                                       <td>{{ $accessory->name }}</td>
                                                       <td>{{ $accessory->sell_price }}</td>
                                                       <td>{{ $accessory->orig_price }}</td>
                                                       <td>{{ $accessory->quantity }}</td>




                                                        <td>
                                                            <ul class="list-inline font-size-20 contact-links mb-0">
                                                                <li class="list-inline-item px-2">
                                                                    <a href="#" onclick="viewAccessory('{{$accessory->id}}')" class="mr-3 text-success" title="view order"><i class="fa fa-eye font-size-18"></i></a>
                                                                </li>
                                                                <li class="list-inline-item px-2">
                                                                    <a href="{{url('admin/accessory/'.$accessory->id.'/edit') }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="mdi mdi-account-edit-outline"></i></a>
                                                                </li>
                                                                <li class="list-inline-item px-2">
                                                                   <form action="{{url('admin/product/'.$accessory->id)}}" method="post">
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
                              <div class="modal-body" id="viewAccessory">
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
    function viewAccessory(id)
    {
        // alert(id);

        $.ajax({
        url: "{{url('admin/viewAccessory')}}/"+id,
        type:"get",
        success:function(response){
          console.log(response);
          $('#viewAccessory').html(response);
          $('#empModal').modal('show');
        },

       });

    }
</script>
@endsection
