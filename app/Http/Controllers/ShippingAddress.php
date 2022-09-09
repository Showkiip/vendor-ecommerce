<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Tech;
use App\Models\Admin;
use App\Models\ZipCode;
use App\Models\Alert;
use App\Models\Order;
use App\Models\City;
use App\Models\State;
use App\Models\OrderSale;
use App\Models\ShippingAddr;
use Carbon\Carbon;

class ShippingAddress extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|max:255',
            // 'email' => 'required|email|unique:shipping_addrs',
            // 'mobileNo' => 'required|numeric|between:11,12',
            ]);
        $ship= New ShippingAddr;
        $ship->userId=  Auth::guard('web')->user()->id;
        $ship->name= $request->name;
        $ship->email= $request->email;
        $ship->mobileNo= $request->mobileNo;
        $ship->shipaddress= $request->shipaddress;
        $ship->street_address= $request->street_address;
        $ship->country= $request->country;
        $ship->state= $request->state;
        $ship->city= $request->city;
        $ship->zipcode= $request->zipcode;
        $ship->save();
        return redirect('/profile')->with('message', Alert::_message('success', 'Address Added Successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
         $ship= ShippingAddr::find($id);
        $ship->name= $request->name;
        $ship->email= $request->email;
        $ship->mobileNo= $request->mobileNo;
        $ship->shipaddress= $request->shipaddress;
        $ship->street_address= $request->street_address;
        $ship->country= $request->country;
        $ship->state= $request->state;
        $ship->city= $request->city;
        $ship->zipcode= $request->zipcode;
        $ship->save();
        return redirect('/profile')->with('message', Alert::_message('success', 'Address Updated Successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ship= ShippingAddr::find($id);
        $ship->delete();
      return redirect('/profile')->with('message', Alert::_message('success', 'Address Delete Successfully.'));
    }

// Front end get Address
    public function shipAddress($id)
    {
    //    dd($id);
       $address = ShippingAddr::find($id);

       return view('frontend.shippingAddress.getAddress',compact('address'));
    }

    public function checkAddress(Request $request)
    {


         if($request->address == 'exist')
         {
             $id = $request->id;
             $address = ShippingAddr::find($id);

             return view('frontend.checkout',compact('address'));
         }

    }

    public function createAddress(Request $request)
    {
      // dd($request->all());
            $this->validate($request,[
                'name' => 'required|max:255',
             // 'email' => 'required|email|unique:shipping_addrs',
                'mobileNo' => 'required|string|min:10|max:11|regex:/[0-9]{9}/',

              ],[

                'name.required' =>'Enter Name',
                'mobileNo.required' => 'Enter Mobile Number',
                'mobileNo.min' => 'Phone number should not be less than 10 digits',
                'mobileNo.max' => 'Phone number should not be more than 11 digits',
              ]);

        $address= New ShippingAddr;
        if(Auth::check())
        {
            $address->userId=  Auth::guard('web')->user()->id;
        }
        $address->name= $request->name;
        $address->email= $request->email;
        $address->mobileNo= $request->mobileNo;
        $address->shipaddress= $request->shipaddress;
        $address->street_address= $request->street_address;
        $address->country= $request->country;
        $address->city= $request->city;
        $address->state= $request->state;
        $address->zipcode= $request->zipcode;
        $address->save();
        return view('frontend.checkout',compact('address'));
    }



    public function trackingCode(Request $request)
    {
            // dd($request->all());
        $track = $request->trackingNo;
        //    dd($track);
        $date = Carbon::now();
        $orderSale = OrderSale::where('tracking_code',$track)->first();
        $order = Order::where('orderSales_id',$orderSale->id)->get();
        //    dd($orderSale);
        if(isset($orderSale))
         {
            if($orderSale->status == 1)
            {
                    $orderID = $orderSale->id;

                    $headers = array(
                        "Content-Type: application/json",
                        "Authorization: ShippoToken shippo_test_90211b98e18d43ad569d43c9dec229b55af73642",

                    );

                    $url = "https://api.goshippo.com/tracks/shippo/".$track;


                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                        $response = curl_exec($ch);
                        curl_close($ch);
                        // dd($response);
                         $tracking  =json_decode($response);


            return view('frontend.track-result',compact('tracking','orderID','order','orderSale'));
            }
            elseif($orderSale->status == 0)
            {
                return response()->json();
            }
            else
            {
                // dd('asdas');
                $orderID = $orderSale->id;
                return view('frontend.track-message',compact('orderID','track','date'));
            }

          }
          else
          {
            return response()->json();
            }
    }

    public function confirmTracking(Request $request)
    {
        // dd($request->all());
        $track = $request->orderIDs;
        $order = OrderSale::find($track);
        // dd($order);
        $order->status = 2;
        $order->update();

        return response()->json(['status'=> 'Complete Your Shipping Order . <br> Thanks For Choosing Us...']);


    }

    public function getCity($id)
    {
        // $state = State::find($id);
        $cities  = City::where('state_id',$id)->get();
        $item = null;
        //  dd($cities);
        if($cities->count() > 0)
        {
            // dd('asd');
            foreach($cities as $city)
            {
                 $item .='<option value="'.$city->name.'">'.$city->name.'</option>';
            }
        }
        else
        {
            $item .='<option>No City </option>';
        }
       

        
        return response()->json($item);
    }

}
