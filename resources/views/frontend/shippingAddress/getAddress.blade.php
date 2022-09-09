

  <form action="{{route('check.Address')}}" method="post">
    {{csrf_field()}}
    <div class="modal-body">

        <input type="hidden" name="address" value="exist">
        <input type="hidden" name="id" value="{{$address->id}}">

            <div class="form-group">
                <label>Full name</label>
                <input type="text" name="name" class="form-control" placeholder="Full Name" value="{{$address->name}}" required="">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email" value="{{$address->email}}" required="">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <div class="input-group">
                      <span class="input-group-addon">us +1</span>
                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" value="{{ $address->mobileNo ?? '' }}">
                        @if ($errors->has('mobileNo'))
                             <span class="text-danger">{{ $errors->first('mobileNo') }}</span>
                         @endif  
                    </div>
            </div>
            <div class="form-group">
                <label>Full address</label>
                <input type="text" name="shipaddress" class="form-control" placeholder="Full address" value="{{$address->shipaddress}}" required>
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
          
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Country</label>
                        <input type="text" name="country" placeholder="Country" class="form-control" value="{{ $address->country }}"  readonly>
                    </div>
                    <div class="col-md-6">
                        <label>State</label>
                        <select name="state" class="form-control" onchange="getCities(this)"required>
                        <option>Select State</option>
                        <option value="" {{ $address->state == 'Alabama' ? 'selected' : '' }}>{{ $address->state }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                <div class="col-md-6">
                    <label>City</label>
                    <input type="text" name="city" placeholder="Country" class="form-control" value="{{ $address->city }}" >
                    </select>
                </div>
                    <div class="col-md-6">
                        <label class="control-label">Zip Code</label>
                        <input type="text" name="zipcode" placeholder="Zip Code" class="form-control" value="{{$address->zipcode}}" required>
                    </div>
                </div>
            </div>
       </div>
      <div class="modal-footer">
        {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
        <button type="submit" class="btn btn-primary btn-style-one">Next</button>
    </div>
    </form>
