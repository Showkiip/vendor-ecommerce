

<div class="row">

    <div class="col-md-12">
        <div class="address-box">
            <h6> Name : <strong>   {{ $shippingAddress->name }}  </strong></h6>
            <p>Contact Number : <i class="fa fa-phone"></i> {{ $shippingAddress->mobileNo }}</p>
            <p>Shipping Address :  <i class="fa fa-map-marker"></i> {{ $shippingAddress->shipaddress }}</p>
            <p>City :  {{ $shippingAddress->city }} </p>
            <p> State :  {{ $shippingAddress->state }} </p>
            <p> Country : {{$shippingAddress->country}} </p>
            <p> Zip Code : {{$shippingAddress->zipcode}}</p>

            {{-- <div class="action-btn text-center">
                <button class="btn" data-toggle="modal" href='#modal-editAddress{{$shippingAddress->id}}'><i class="fa fa-edit"></i> Edit</button>
                <form action="{{url('shipAddress/'.$shippingAddress->id)}}" method="post" style="display: contents;">
                {{csrf_field()}}
                   @method('DELETE')

                <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
            </form>
            </div> --}}
        </div>
    </div>

</div>
