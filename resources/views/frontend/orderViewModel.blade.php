<div class="modal fade exampleModal" id="exampleModal{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mb-2">Order id: <span class="text-primary">#{{$order->id}}</span></p>
                <p class="mb-4">Billing Name: <span class="text-primary">{{$order->name}}</span></p>

                <div class="table-responsive">
                    <table class="table table-centered table-nowrap">
                        <thead>
                            <tr>
                            <th scope="col">Repair Type</th>
                            <th></th>
                            <th scope="col">Price</th>
                            </tr>
                         
                        </thead>
                        <tbody>
                            <tr>

                                <td>
                                  @foreach($order->repairorderstypes as $type)
                                    <div>
                                        <h5 class="text-truncate font-size-14">{{$type->repair_type}}</h5>
                                    </div>
                                     @endforeach
                                </td>

                                <td></td>

                                <td>
                                @foreach($order->repairorderstypes as $rprice)

                                  <span>  ${{$rprice->price}}</span><br>

                                 @endforeach
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <h6 class="m-0 text-right">Sub Total:</h6>
                                </td>
                                <td>
                                    ${{$order->repairorderstypes->sum('price')}}
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <h6 class="m-0 text-right">Total:</h6>
                                </td>
                                <td>
                                    ${{$order->repairorderstypes->sum('price')}}
                                </td>
                            </tr>

                            <tr>
                                <th>Issue Details</th>
                                <td class="text-center">{{ $order->instructions }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
