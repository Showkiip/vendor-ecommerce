<?php

namespace App\Http\Controllers;

use App\Mail\ShipppingCode;
use App\Models\Alert;
use App\Models\Order;
use App\Models\OrderSale;
use App\Models\ShippingAddr;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Twilio\Rest\Client;

class ProductOrderController extends Controller
{
    //
    public function productOrder()
    {

        $productOrder = OrderSale::orderBy('created_at', 'asc')->get();

        OrderSale::where('notification', '=', 0)
                        ->update(['notification' => 1]);

        return view('admin.productOrder.list', compact('productOrder'));

    }

    public function productShipping($id)
    {
        $productOrder = Order::find($id);
        $shippingAddress = ShippingAddr::where('id', $productOrder->shipAddress_id)->first();
        return view('admin.productOrder.shippingAdr', compact('shippingAddress'));
    }

    public function orderViewDetails($id)
    {
        //dd($id);
        $productOrder = Order::where('orderSales_id', $id)->where('type', 'phone')->get();
        $accessoryOrder = Order::where('orderSales_id', $id)->where('type', 'accessory')->get();
        return view('admin.productOrder.order_modal', compact('productOrder', 'accessoryOrder'));
    }

    public function sendCode(Request $request)
    {
        // dd($request->all());
        $productOrder = OrderSale::find($request->id);
        $user = User::where('id', $productOrder->user_id)->first();
        $shippingAddress = ShippingAddr::where('id', $productOrder->shipping_id)->first();
        // dd($shippingAddress);

    \Shippo::setApiKey('shippo_test_d407c81890d432b50de9c93bbbededbc7f28a5ba');

// Example from_address array
// The complete refence for the address object is available here: https://goshippo.com/docs/reference#addresses
$from_address = array(
    'name' => 'Mohsin Sardar',
    'company' => 'CELL CITY',
    'street1' => '16 E Sunrise Hwy',
    'city' => 'Freeport',
    'state' => 'NY',
    'zip' => '11520',
    'country' => 'United States',
    'phone' => '+15164764715',
    'email' => 'contact@cellcity.us',
);

// Example to_address array
// The complete refence for the address object is available here: https://goshippo.com/docs/reference#addresses

$to_address = array(
    'name' => $shippingAddress->name,
    'company' => $shippingAddress->name,
    'street1' => $shippingAddress->shipaddress,
    'city' => $shippingAddress->city,
    'state' => $shippingAddress->state,
    'zip' => $shippingAddress->zipcode,
    'country' => 'US',
    'phone' => '+1'.$shippingAddress->mobileNo,
    'email' =>  $shippingAddress->email,
);

// Parcel information array
// The complete reference for parcel object is here: https://goshippo.com/docs/reference#parcels
$parcel = array(
    'length'=> '200',
    'width'=> '100',
    'height'=> '12',
    'distance_unit'=> 'mm',
    'weight'=> '250',
    'mass_unit'=> 'g',
);
// $from_address = array(
//     'name' => $request->name,
//     'company' => $request->company,
//     'street1' => $request->street1,
//     'city' => $request->city,
//     'state' => $request->state,
//     'zip' => $request->zip,
//     'country' => $request->country,
//     'phone' => $request->phone,
//     'email' => $request->email,
// );

// // Example to_address array
// // The complete refence for the address object is available here: https://goshippo.com/docs/reference#addresses

// $to_address = array(
//     'name' => $shippingAddress->name,
//     'company' => $shippingAddress->name,
//     'street1' => '215 Clayton St.',
//     'city' => 'San Francisco',
//     'state' => 'CA',
//     'zip' => '94117',
//     'country' => 'US',
//     'phone' => '+1 555 341 9393',
//     'email' =>  $shippingAddress->email,
// );

// // Parcel information array
// // The complete reference for parcel object is here: https://goshippo.com/docs/reference#parcels
// $parcel = array(
//     'length'=> $request->length,
//     'width'=> $request->width,
//     'height'=> $request->height,
//     'distance_unit'=> $request->distance_unit,
//     'weight'=> $request->weight,
//     'mass_unit'=> $request->mass_unit,
// );


$shipment = \Shippo_Shipment::create(
array(
    'address_from'=> $from_address,
    'address_to'=> $to_address,
    'parcels'=> array($parcel),
    'async'=> false,
));

// Rates are stored in the `rates` array
// The details on the returned object are here: https://goshippo.com/docs/reference#rates
// Get the first rate in the rates results for demo purposes.
$rate = $shipment['rates'][0];

// Purchase the desired rate with a transaction request
// Set async=false, indicating that the function will wait until the carrier returns a shipping label before it returns
$transaction = \Shippo_Transaction::create(array(
    'rate'=> $rate['object_id'],
    'async'=> false,
));

// Print the shipping label from label_url
// Get the tracking number from tracking_number
if ($transaction['status'] == 'SUCCESS'){
     $productOrder->status = 1;
        $productOrder->tracking_code = $transaction['tracking_number'];
        $productOrder->update();
          if(isset($user))
        {
            $phone = '+'.$user->phoneno;
            $email =      $user->email;
            $shippingCode = $transaction['tracking_number'];
        }
        else
        {
            $phone          = '+'.$shippingAddress->mobileNo;
            $email          =      $shippingAddress->email;
            $shippingCode   =      $transaction['tracking_number'];
        }

          $details = [
            'title' => 'Mail from CellCity',
            'subject' => 'Dear Customer,',
            'message' => 'Track Your Order on Following Link',
            'ShippingCode'  => $shippingCode,
            'OrderID'     =>  $productOrder->id
                ];

        \Mail::to($email)->send(new ShipppingCode($details));

        $message = strip_tags(nl2br("Dear Customer, \n Your Shipping Address Code is :. \n Shipping Code :" .$shippingCode.'Order ID'.$productOrder->id));
    // echo "--> " . "Shipping label url: " . $transaction['label_url'] . "\n";
    // echo "--> " . "Shipping tracking number: " . $transaction['tracking_number'] . "\n";
    // dd('ddd');
} else {
    // echo "Transaction failed with messages:" . "\n";
    return $transaction['messages'];
    // foreach ($transaction['messages'] as $message) {
    //     echo "--> " . $message . "\n";
    // }
}



      
      

        // $account_sid = "ACeb30af8343f53c1b366517b35ea44dc2";
        // $auth_token = "ecc8e9d376d7ef8a19ed22778bb466f8";
        // $twilio_number = +14842553085;
        // $client = new Client($account_sid, $auth_token);
        // $client->messages->create(
        //     $phone,
        //     ['from' => $twilio_number, 'body' => $message]
        // );
        return response()->json();
    }

    public function deleteOrderSale($id)
    {
        //dd($id);
        OrderSale::find($id)->delete();
        return back()->with('message', Alert::_message('success', 'Delete Order Successfully.'));
    }
}
