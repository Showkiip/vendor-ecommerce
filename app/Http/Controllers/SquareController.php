<?php

namespace App\Http\Controllers;

use App\Mail\TechMail;
use App\Mail\productMail;
use App\Models\Accessory;
use App\Models\AccessoryOrder;
use App\Models\Order;
use App\Models\OrderSale;
use App\Models\Pmodel;
use App\Models\ProductColor;
use App\Models\ProductCondition;
use App\Models\ProductStorage;
use App\Models\RepairOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Square\SquareClient;
use Square\Environment;
use Square\Exceptions\ApiException;
use Square\Models\Address;
use Square\Models\Country;
use Square\Models\CreateCustomerCardRequest;
use Square\Models\CreateCustomerRequest;
use Square\Models\CreatePaymentRequest;
use Square\Models\Money;
use Twilio\Rest\Client;

class SquareController extends Controller
{

    public function checkoutPayment(Request $request)
    {
       // dd($request->all());

    // dd($request->input('cko-card-token'));
        $repairOrder = RepairOrder::find($request->id);
          // dd($repairOrder);

        $customers = User::where('id',$repairOrder->userId)->first();
          // dd($customers);


        $api_client = new SquareClient([
            'accessToken' => "EAAAECpimoaWPojkWvddJW7kUBgLjtU54bKRE4hDp97Ebohk1YirphYmzj5aETW_",
            'environment' => Environment::SANDBOX
          ]);

          $nonce = $request->squaretoken;
            if (is_null($nonce)) {
            echo "Invalid card data";
            http_response_code(422);
            return;
            }

            $customersApi = $api_client->getCustomersApi();

            $body = new CreateCustomerRequest;
            $body->setIdempotencyKey(uniqid());
            $body->setGivenName($customers->name);
            $body->setEmailAddress($customers->email);
            $apiResponse = $customersApi->createCustomer($body);
            if ($apiResponse->isSuccess()) {
                $createCustomerResponse = $apiResponse->getResult();


            //    $customerId = $createCustomerResponse->getCustomer()->getId();
            //     $body_cardNonce =  $request->squaretoken;
            //     $body2 = new CreateCustomerCardRequest(
            //         $body_cardNonce
            //     );

            //     $body2->setBillingAddress(new Address);
            //     $body2->getBillingAddress()->setAddressLine1('500 Electric Ave');
            //     $body2->getBillingAddress()->setAddressLine2('Suite 600');
            //     $body2->getBillingAddress()->setPostalCode('10003');
            //     $body2->getBillingAddress()->setCountry(Country::US);
            //     $body2->setCardholderName('Amelia Earhart');
            //     $body2->setVerificationToken('verification_token0');
            //     // dd($body2);
            //     $apiResponse2 = $customersApi->createCustomerCard($customerId, $body2);
            //     dd($apiResponse2);

            } else {
                $errors = $apiResponse->getErrors();
            }


            $payments_api = $api_client->getPaymentsApi();

            $money = new Money();
            $money->setAmount(3000);
            $money->setCurrency('USD');
            $create_payment_request = new CreatePaymentRequest($nonce, uniqid(), $money);
            try {
            $response = $payments_api->createPayment($create_payment_request);
// dd($response);
            $repairOrder = RepairOrder::find($request->id);
            $cust = User::where('id',$repairOrder->userId)->first();
            $user = User::where('id',$repairOrder->techId)->first();
            $user->jobStatus = "available";
            $user->update();
            $repairOrder->pay_status = "paid";
            $repairOrder->pay_method = "Credit Card";
            $repairOrder->order_status= "4";
            $repairOrder->update();

            $totalprice = " Total Amount :". $request->price;
            // return view('frontend.paymentSuccess');
            $details = [
                'title' => 'Mail from CellCity',
                'subject' => 'Dear Customer ,',
                'message' => "You have Successfully Pay Repair order  through Credit Card",
                'Total'  =>$request->price
            ];

             \Mail::to($cust->email)->send(new TechMail($details));

             $phone = "+1".$cust->phoneno;
            //  dd($phone);
             $message =strip_tags(nl2br(" Dear Customer ,\n You have Successfully Pay  through Credit Card . \n Total Amount : $". $request->price));
             $account_sid = "ACeb30af8343f53c1b366517b35ea44dc2";
             $auth_token = "ecc8e9d376d7ef8a19ed22778bb466f8";
             $twilio_number = +4842553085;
             $client = new Client($account_sid, $auth_token);
             $client->messages->create($phone,
                 ['from' => $twilio_number, 'body' => $message] );

             return response()->json($message);

            if ($response->isError()) {
                echo 'Api response has Errors';
                $errors = $response->getErrors();
                exit();
                return view('frontend.paymentCancel');
            }
            echo '<pre>';
            print_r($response);
            echo '</pre>';
            } catch (ApiException $e) {
            echo 'Caught exception!<br/>';
            exit();
            }

    }


    //Product Square Payment
    public function paymentProduct(Request $request)
    {

        // dd($request->all());
        if(Auth::check())
        {
          $userID = Auth::user()->id;
          $total = \Cart::session($userID)->getTotal();
          $cartCollection = \Cart::session($userID)->getContent();
        }
        else
        {

            $total = \Cart::getTotal();
            $cartCollection = \Cart::getContent();
        }
        // dd($total);
        $api_client = new SquareClient([
            'accessToken' => "EAAAECpimoaWPojkWvddJW7kUBgLjtU54bKRE4hDp97Ebohk1YirphYmzj5aETW_",
            'environment' => Environment::SANDBOX
          ]);

          $nonce = $request->squaretoken;
            if (is_null($nonce)) {
            echo "Invalid card data";
            http_response_code(422);
            return;
            }

            $customersApi = $api_client->getCustomersApi();

            $body = new CreateCustomerRequest;
            $body->setIdempotencyKey(uniqid());
            $body->setGivenName($request->name);
            $body->setEmailAddress($request->email);
            $apiResponse = $customersApi->createCustomer($body);
            if ($apiResponse->isSuccess()) {
                $createCustomerResponse = $apiResponse->getResult();



            } else {
                $errors = $apiResponse->getErrors();
            }


            $payments_api = $api_client->getPaymentsApi();

            $money = new Money();
            $money->setAmount($total*100);
            $money->setCurrency('USD');
            $create_payment_request = new CreatePaymentRequest($nonce, uniqid(), $money);
            try {
            $response = $payments_api->createPayment($create_payment_request);
           // dd($response);
            //
            // $totals = \Cart::session($userID)->getTotal();

            $orderSale               = new OrderSale;
            if(Auth::check())
            {
            $orderSale->user_id      = $userID;
            }
            $orderSale->grand_total  = $total;
            $orderSale->shipping_id  = $request->address_id;
            $orderSale->save();



            foreach ($cartCollection as $cart) {

                if ($cart->attributes->category != "accessory")
                {
                    $model = Pmodel::where('id',$cart->associatedModel->model_id)->first();
                    $color = ProductColor::where('product_id',$cart->associatedModel->id)->first();
                    $storage = ProductStorage::where('color_id',$color->id)->first();
                    $total = $cart->quantity*$cart->price;
                    // dd($cart->attributes->color);
                    $order = new Order;
                    $order->orderSales_id = $orderSale->id;
                    $order->product_id = $cart->associatedModel->id;

                    $order->brand_name = $model->brand->brand_name;
                    $order->model_name  = $model->model_name;
                    $order->color       =  $cart->attributes->color;
                    $order->condition   = $cart->attributes->conditition;
                    $order->storage     = $cart->attributes->storage;
                    $order->quantity     = $cart->quantity;
                    $order->price        = $cart->price;
                    $order->grand_price  =$total;
                    $order->type            = "phone";
                    $order->payment_method = "Credit Card";
                    $order->status = 0;

                    $order->save();


                    $condition = ProductCondition::where('storage_id',$storage->id)->first();
                    if($cart->quantity <= $condition->quantity)
                    {
                        $condition->increment('quantity',$cart->quantity);
                    }
                    else
                    {
                        return redirect()->route('view.cart')->with('status' ,'Enough Quantity of:' . $condition->name);
                    }
                }
                else{
                    // dd('asdsad');
                    $model = Pmodel::where('id',$cart->associatedModel->model_id)->first();
                    $total = $cart->quantity*$cart->price;
                    // dd($cart->attributes->color);
                    $order                  = new Order;
                    $order->orderSales_id   = $orderSale->id;
                    $order->accessory_id    = $cart->associatedModel->id;
                    $order->brand_name      = $model->brand->brand_name;
                    $order->model_name      = $model->model_name;
                    $order->access_category = $cart->associatedModel->accessoryCategory->category;
                    $order->access_name     = $cart->associatedModel->name;
                    $order->quantity        = $cart->quantity;
                    $order->price           = $cart->price;
                    $order->grand_price     = $cart->quantity*$cart->price;
                    $order->type            = "accessory";
                    $order->payment_method  = "Credit Card";


                    $order->save();

                    $accessory = Accessory::find($cart->associatedModel->id);
                    if($cart->quantity <= $accessory->quantity)
                     {
                        $accessory->decrement('quantity',$cart->quantity );
                     }
                     else
                     {
                         return redirect()->route('view.cart')->with('status' ,'Enough Quantity of:' . $cart->associatedModel->name);
                     }
                }



             }
        // $total = \Cart::session($userID)->getTotal();
            $details = [
                'title' => 'Mail from CellCity',
                'subject' => 'Dear Customer ,',
                'message' => 'Payment completed Successfully through Credit Card',
                'shippment' => '“Shipment detail will be sent once order is shipped within 24 hours”',
                'Total'  => $total
            ];
             $messgae = "Succesfully Transferred";
             \Mail::to($request->email)->send(new productMail($details));
            //  return response()->json($messgae);


            $phone = "+1".$request->phoneno;
            //  dd($phone);
             $message =strip_tags(nl2br("Dear Customer, \n You have Successfully Pay  through Credit Card . \n Total Amount : $". $total." \n Shipment detail will be sent once order is shipped within 24 hours."));

             $account_sid = "ACeb30af8343f53c1b366517b35ea44dc2";
             $auth_token = "ecc8e9d376d7ef8a19ed22778bb466f8";
             $twilio_number = +4842553085;
             $client = new Client($account_sid, $auth_token);
             $client->messages->create($phone,
                 ['from' => $twilio_number, 'body' => $message] );

                 \Cart::clear();
                //  return redirect()->route('view.cart');
             return response()->json($message);

            if ($response->isError()) {
                echo 'Api response has Errors';
                $errors = $response->getErrors();
                exit();
                return view('frontend.paymentCancel');
            }
            echo '<pre>';
            print_r($response);
            echo '</pre>';
            } catch (ApiException $e) {
            echo 'Caught exception!<br/>';
            exit();
            }
    }

}
