@extends('frontend.layouts.master')
@php
      $tech=Request::get('type');
@endphp
<style>
  .checkout-area h3.shoping-checkboxt-title {
    border-bottom: 1px solid #e7e4dd;
    font-size: 24px;
    font-weight: 500;
    margin: 0 0 20px;
    padding-bottom: 10px;
    text-transform: none;
    width: 100%;
  }
  .single-form-row > input, .single-form-row textarea {
    border: 1px solid #e5e5e5;
    height: 42px;
    padding: 0 0 0 10px;
    width: 100%;
  }
  .checkout-review-order {
    background: #f6f6f6 none repeat scroll 0 0;
    padding: 50px;
  }
  table.checkout-review-order-table {
    width: 100%;
  }
  .checkout-review-order-table thead th, .checkout-review-order-table tbody td, .checkout-review-order-table tfoot tr th, .checkout-review-order-table tfoot tr td {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border-bottom: 1px solid #dcd8ce;
    border-right: medium none;
    border-top: medium none;
    font-size: 14px;
    padding: 15px 0;
    text-align: left;
  }
  .buy-checkbox-btn {
    margin-top: 20px;
  }
  .buy-checkbox-btn input {
    display: none;
  }
  .buy-checkbox-btn .cbx {
    margin: auto;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    cursor: pointer;
  }
  .buy-checkbox-btn .inp-cbx:checked + .cbx span:first-child {
    background: #00bfa5;
    border-color: #00bfa5;
    animation: wave 0.4s ease;
  }
  .buy-checkbox-btn .inp-cbx:checked + .cbx span:first-child:before {
      transform: scale(3.5);
      opacity: 0;
      transition: all 0.6s ease;
  }
  .buy-checkbox-btn .cbx span:first-child:before {
      content: "";
      width: 100%;
      height: 100%;
      background: #00bfa5;
      display: block;
      transform: scale(0);
      opacity: 1;
      border-radius: 50%;
      transition: 0.5s;
  }
  .buy-checkbox-btn .cbx span:first-child {
    position: relative;
    width: 18px;
    height: 18px;
    border-radius: 3px;
    transform: scale(1);
    vertical-align: middle;
    border: 1px solid #ebebeb;
    transition: all 0.2s ease;
    transition: 0.5s;
  }
  .buy-checkbox-btn .cbx span {
    display: inline-block;
    vertical-align: middle;
    transform: translateZ(0);
  }
  .buy-checkbox-btn .cbx span:first-child svg {
      position: absolute;
      top: 3px;
      left: 2px;
      fill: none;
      stroke: #fff;
      stroke-width: 2;
      stroke-linecap: round;
      stroke-linejoin: round;
      stroke-dasharray: 16px;
      stroke-dashoffset: 16px;
      transition: all 0.3s ease;
      transition-delay: 0.1s;
      transform: translateZ(0);
      transition: 0.5s;
  }
  .buy-checkbox-btn .inp-cbx:checked + .cbx span:first-child svg {
      stroke-dashoffset: 0;
  }
  .payment-methd{
    border: 1px solid #00bfa5;
    padding: 10px 20px;
    border-radius: 8px;
    margin-right: 15px;
  }
  .btn-checkout{
    background-color: #00bfa5;
    color: #fff;
    border-radius: 15px;
    padding: 10px 40px;
  }
  @media(max-width: 767px){
    .checkout-review-order {
      padding: 10px;
      margin-top: 20px;
    }
    .payment-methd {
      border: 1px solid #00bfa5;
      padding: 10px 10px;
      border-radius: 8px;
      margin-right: 15px;
    }
    .checkout-area h3.shoping-checkboxt-title{
      padding-left: 10px;
    }
  }
</style>
@section('content')
<section class="shop-section shop-page">
  <div class="container">

    <!-- checkout-area start -->
    <div class="checkout-area">
      <div class="row">
        <div class="col-lg-12 mb-30">
          <div class="row">
            <div class="col-lg-6 col-xl-6 col-sm-12">
              <div class="checkout-review-order">
              <h3 class="shoping-checkboxt-title">Your order</h3>
              <table class="checkout-review-order-table">
                <thead>
                  <tr>
                    <th class="t-product-name">Product</th>
                    <th class="product-total">Total</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($repairOrderType as $ordertype)
                  <tr class="cart_item cart-545678">

                      <td class="t-product-name">{{$ordertype->repair_type}}</td>
                      <td class="t-product-price"><span>${{$ordertype->price}}</span></td>


                  </tr>
                  @endforeach
                </tbody>
                <tfoot>

                  <!-- <input type="hidden" name="processing" value="9.599">
                  <input type="hidden" name="shipping" value="13.95">
                  <input type="hidden" name="total" value="354.549">
                  <tr class="cart-subtotal">
                    <th>Processing</th>
                    <td><span class="total-amount">$9.60</span></td>
                  </tr>
                  <tr class="shipping">
                    <th>Shipping</th>
                    <td>$13.95</td>
                  </tr> -->
                  <tr class="order-total">
                    <th>Total</th>
                    <td><strong><span class="total-amount">${{$repairOrderType->sum('price')}}</span></strong></td>
                    <input type="hidden" name="total" value="{{$repairOrderType->sum('price')}}">
                  </tr>
                </tfoot>
              </table>
              </div>
          </div>

            <div class="col-lg-6  col-xl-6 col-sm-12">
              <div class="checkout-review-order">
                <!-- <form action="#"> -->



                <div class="checkout-payment">
                  <!-- <div class="payment_methods">
                    <p><label>PayPal Express Checkout <a href="#"><img src="https://sneakerxwars.com/frontend-assets/img/icon/pp-acceptance-small.png" alt=""></a></label></p>
                    <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                  </div> -->
                  <div class="row">
                    <div class="col-lg-12 pl-0 pr-0">
                      <p class="text-dark text-uppercase font-weight-bold"><strong>Payment Method</strong></p>
                    </div>
                  </div>
                  <form action="{{route('payment.order',$repairOrder->id)}}" method="post" >
                    {{csrf_field()}}
                  <div class="row">
                    <input type="hidden" name="total" value="{{$repairOrderType->sum('price')}}">
                    <div class="col-lg-12 pl-0 pr-0 pb-3">
                    <div class="form-group">

                      @if (isset($tech))
                      <label for="credit-card" class="payment-methd">
                        <button type="button"  data-toggle="modal" data-target="#exampleModalCenter"> Credit Card </button>
                      </label>
                      <label for="cash" class="payment-methd">
                        <input type="radio" id="cash" name="payment" value="cash"> Cash
                      </label>
                      @else
                      <label for="cash" class="payment-methd">
                        <input type="radio" id="cash" name="payment" value="cash"> Cash
                      </label>
                      <label for="paypal" class="payment-methd">
                        <input type="radio" id="paypal" name="payment" value="paypal" onchange="valueChanged()"> Paypal
                      </label>
                      <label for="apple-pay" class="payment-methd">
                        <input type="radio" id="apple-pay" name="payment" value="" onchange="valueChanged()"> Apple Pay
                      </label>
                      <label for="credit-card" class="payment-methd">
                        <button type="button"  data-toggle="modal" data-target="#exampleModalCenter"> Credit Card </button>
                      </label>
                      @endif

                    </div>

                  </div>
                  </div>
                  {{-- <button class="btn btn-checkout" id="card-button" type="submit">Checkout</button> --}}
                  <button type="submit" class="btn btn-primary btn-style-one">Save</button>
                </form>
                </div>


              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- checkout-area end -->
  </div>

  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
            <form id="payment-form" method="post">
                <input type="hidden" name="order_id" id="order_id" value="{{$repairOrder->id}}" >
                <input type="hidden" name="total" id="price" value="{{$repairOrderType->sum('price')}}">
                <div id="card-container"></div>
            </div>
               <button type="button" class="btn btn-primary btn-style-one" data-dismiss="modal" style="margin-bottom: 5px;    margin-left: 5px">Close</button>
                <button id="card-button" class="btn btn-primary btn-style-one" type="button" style="margin-bottom: 5px">Pay</button>
                 <button class="buttonload btn btn-primary btn-style-one" style="display: none" id="buttonload">
                  <i class="fa fa-circle-o-notch fa-spin"></i> Loading
                </button>
              </form>
    </div>

      </div>

  </div>
</section>
@endsection
@section('script')
{{-- <script src="https://cdn.checkout.com/js/framesv2.min.js"></script> --}}
<script>
    function valueChanged()
      {
        if($('#credit-card').is(":checked")) {
          $("#card-form").show();
        }else if($('#paypal').is(":checked")){
          $("#card-form").hide();
        }else if($('#apple-pay').is(":checked")){
          $("#card-form").hide();
        }else{
          $("#card-form").hide();
        }

      }
  </script>

  {{-- <script>
    var payButton = document.getElementById("pay-button");
    var form = document.getElementById("payment-form");

    Frames.init({
      publicKey: 'pk_test_c5c7066c-4ed0-4a03-b8c6-8ffff587eca8',
      cardValidationChanged: function () {
        // if all fields contain valid information, the Pay now
        // button will be enabled and the form can be submitted
        payButton.disabled = !Frames.isCardValid();
      },
      cardSubmitted: function () {
        form.disabled = true;
        // display loader
      },
      cardTokenized: function (data) {
        //   alert(data.token);
        Frames.addCardToken(form, data.token)
        form.submit()
      },
      cardTokenizationFailed: function (event) {
        // catch the error
      }
    });

    form.addEventListener('submit', function (event) {
      event.preventDefault();
      Frames.submitCard();
    });
  </script> --}}
  <script src="https://sandbox.web.squarecdn.com/v1/square.js"></script>
  <script type="text/javascript">
    async function main() {
      const payments = Square.payments('sandbox-sq0idb-XTzUm4GcIO3nEEVwThTwRA', 'LEDBH9HCJM9K6');
      const card = await payments.card();
      await card.attach('#card-container');

      async function eventHandler(event) {8
        event.preventDefault();
            $('#card-button').hide();
             $('#buttonload').show();
        try {
          const result = await card.tokenize();
          if (result.status === 'OK') {
            console.log(result.token);
            var squaretoken = (result.token);
            var id = $('#order_id').val();
            var price = $('#price').val();
            // alert($('#order_id').val());
            var _token = $('input[name="_token"]').val();

             // alert(_token);
            $.ajax({

                    url: "{{ route('square.payment') }}",
                    type: 'post',
                    data:{ id:id,squaretoken:squaretoken,price:price, _token: _token},

                    success: function(data) {

                        console.log(data);
                        window.location = '{{ route('payment.completed') }}';
                        // $('#bustype').html(data);
                        //  $("#count").html(data.count);

                        // alert(rowCount);

                    }

                });
          }
        } catch (e) {
          console.error(e);
           $('#buttonload').hide();
          $('#card-button').show();
        }
      };

      const cardButton = document.getElementById('card-button');
      cardButton.addEventListener('click', eventHandler);
    }

    main();
  </script>

  @endsection
