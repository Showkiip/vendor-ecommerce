<?php

namespace App\Http\Controllers;

use App\Models\RepairOrder;
use App\Models\User;
use Illuminate\Http\Request;

use Checkout\CheckoutApi;
use Checkout\Library\Exceptions\CheckoutHttpException;
use Checkout\Library\Exceptions\CheckoutModelException;
use Checkout\Models\Tokens\Card;
use Checkout\Models\Payments\TokenSource;
use Checkout\Models\Payments\Payment;
use Checkout\Models\Payments\Customer;
use PayPal\Api\Order;

class CheckoutController extends Controller
{

    public function checkoutPayment(Request $request,$id)
    {


         // dd($request->input('cko-card-token'));
          $repairOrder = RepairOrder::find($id);
         //   dd($repairOrder);

        $customers = User::where('id',$repairOrder->userId)->first();
        //   dd($customers);
        $checkout = new CheckoutApi('sk_test_19e1eb2f-f046-478a-acfc-3d97d05d3e91');

        $method = new TokenSource($request->input('cko-card-token'));
        $payment = new Payment($method, 'USD');

        $customer = new Customer();
        $customer->email = $customers->email;
        $customer->name = $customers->name;

        $payment->customer = $customer;
        $payment->amount = $request->total.''.'00';
        $payment->capture = true;
        //$payment->reference = 'ORD-090857';



    try {
        $details = $checkout->payments()->request($payment);

        //   dd($details);
        $response_code = (int)($details->response_code/1000);
        //dd($response_code);

        if($response_code == 10)
        {
            $repairOrder = RepairOrder::find($id);
            $user = User::where('id',$repairOrder->techId)->first();
            $user->jobStatus = "available";
            $user->update();
            $repairOrder->pay_status = "paid";
            $repairOrder->pay_method = "card";
            $repairOrder->order_status= "4";
            $repairOrder->update();

            return view('frontend.paymentSuccess');
        }
        elseif($response_code == 20)
        {
            return view('frontend.paymentCancel');
        }
        else
        {
            return view('frontend.paymentCancel');
        }
        //   $redirection = $details->getRedirection();
        //   if ($redirection) {
        //       dd($redirection);
        //       return $redirection;
        //   }

        return $details;
    } catch (CheckoutModelException $ex) {
        return $ex->getErrors();
    } catch (CheckoutHttpException $ex) {
        return $ex->getErrors();
    }
        }
}
