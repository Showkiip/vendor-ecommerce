<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Tech;
use App\Models\ShippingAddr;
use App\Models\Brand;
use App\Models\OrderTime;
use App\Models\Pmodel;
use App\Models\RepairType;
use App\Models\ZipCode;
use App\Models\RepairOrder;
use App\Models\RepairOrderType;
use Illuminate\Support\Facades\Hash;
use PayPal\Api\Order;
use App\Mail\orderPlace;
use App\Mail\NotifVerify;
use App\Mail\VerifyMail;
use App\Models\VerifyUser;
use Twilio\Rest\Client;

// use Hash;

class RepairController extends Controller
{

  public function checkZip(Request $request){

    	$code = ZipCode::whereZipcode($request->zipcode)->first();
	    	if($code){

	    	 return response()->json(['status' => 1]);
	    	}else{
	    		return response()->json(['status' => 0]);
	    	}
    	}

  public function getBrands(){

  	$brands = Brand::get();
  	return view('frontend.repair-steps',compact('brands'));
  }

  public function getModels($id){

  	$models = Pmodel::whereBrandId($id)->orderBy('created_at','desc')->get();
  	// dd($models);
  	return view('frontend.models',compact('models'));
  }

  public function getrepairTypes($id){

  	$RepairTypes = RepairType::whereModelId($id)->get();
  	// dd($models);
  	return view('frontend.repair-type',compact('RepairTypes'));
  }

  public function checkDate(Request $request)
  {
      // dd($request->date);
    //   $user = User::find($request->id);
    // dd(Auth::user());
    $repairOrder = RepairOrder::with('OrderTime')->where('order_status','<>', '4')
                                ->whereDate('date','=',$request->date)
                                ->select('time_id')
                                ->get();
      // dd($repairOrder);
  $repairOrder2 = RepairOrder::where('order_status','<>', '4')
                                ->whereDate('date','=',$request->date)
                                ->select('time_id')
                                ->get();
        $times =OrderTime::whereNotIn('id', $repairOrder2)->get();
        // $nottimes =OrderTime::where('id', $repairOrder)->get();
       

        return response()->json(['times'=>$times,'notime'=>$repairOrder]);

  }

public function saverepairType(Request $request){
// dd(Auth::guard('web')->check());

      if($request->isMethod('post')){
     
           // dd($request->all());
     if(Auth::guard('web')->check())
            {
            
              $user= Auth::guard('web')->user();
             
 
               $phone = '+1'.$user->phoneno;
 
               $message =strip_tags(nl2br("Dear customer,\n Order Placed successfully, \n A technician will reach out to you as soon as possible.\n Thank you!!"));
 
               $account_sid = "ACeb30af8343f53c1b366517b35ea44dc2";
                       $auth_token = "ecc8e9d376d7ef8a19ed22778bb466f8";
                       $twilio_number = +4842553085;
                 $client = new Client($account_sid, $auth_token);
                 $client->messages->create($phone,
                     ['from' => $twilio_number, 'body' => $message] );


                   $details = [
                     'title' => 'Mail from CellCity.com',
                     'subject' => 'Dear Customer ,',
                     'message' => 'Order Placed successfully, A technician will reach out to you as soon as possible. Thank you!!'
                 ];
 
               \Mail::to($user->email)->send(new orderPlace($details));
 
 

                $order = New RepairOrder;
                 $order->userId = $user->id;
                 $order->model_Id = $request->model_Id;
                 $order->date = $request->date;
                 $order->time_id = $request->time;
                 $order->name = $request->name;
                 $order->address = $request->address;
                 $order->phone = $user->phoneno;
                 $order->email = $user->email;
                 $order->instructions = $request->instructions;
                 $order->save();
 
                 foreach ($request->repair_type as $key => $value) {
                   $ordertype = New RepairOrderType;
                   $ordertype->order_Id= $order->id;
                   $ordertype->repair_type= RepairType::whereId($value)->first()->repair_type;
                   $ordertype->price= RepairType::whereId($value)->first()->price;
                   $ordertype->save();
                 }
 
            
                return response()->json(['repairOrder'=>'success']);
               }

         if($request->input('userType') == 'member'){

           if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'user','verified'=>1])){

               if(Auth::guard('web')->check()){
          
                // dd('checked');
                  $user= Auth::guard('web')->user();
                  

                   

                    $phone = '+1'.$user->phoneno;

                    $message =strip_tags(nl2br("Dear customer,\n Order Placed successfully, \n A technician will reach out to you as soon as possible.\n Thank you!!"));

                    $account_sid = "ACeb30af8343f53c1b366517b35ea44dc2";
                            $auth_token = "ecc8e9d376d7ef8a19ed22778bb466f8";
                            $twilio_number = +4842553085;
                      $client = new Client($account_sid, $auth_token);
                      $client->messages->create($phone,
                          ['from' => $twilio_number, 'body' => $message] );

                           $details = [
                          'title' => 'Mail from CellCity.com',
                          'subject' => 'Dear Customer ,',
                          'message' => 'Order Placed successfully, A technician will reach out to you as soon as possible. Thank you!!'
                      ];

                    \Mail::to($user->email)->send(new orderPlace($details));



                  $order = New RepairOrder;
                      $order->userId = $user->id;
                      $order->model_Id = $request->model_Id;
                      $order->date = $request->date;
                      $order->time_id = $request->time;
                      $order->name = $request->name;
                      $order->address = $request->address;
                      $order->phone =  $user->phoneno;
                      $order->email =  $user->email;
                      $order->instructions = $request->instructions;
                      $order->save();

                      foreach ($request->repair_type as $key => $value) {
                        $ordertype = New RepairOrderType;
                        $ordertype->order_Id= $order->id;
                        $ordertype->repair_type= RepairType::whereId($value)->first()->repair_type;
                        $ordertype->price= RepairType::whereId($value)->first()->price;
                        $ordertype->save();
                      }
                     return response()->json(['repairOrder'=>'success']);
                    }

           }else{
             return response()->json(['repairOrder'=>'fail']);
           }


              
          
        } else
          {
            // dd($request->all());
            
             $this->validate($request,[
              'name' => 'required|min:5|max:50',
              'phone' => 'required|string|min:10|max:11|regex:/[0-9]{9}/',
              'email' => 'required|email|unique:users,email',
              'password' => 'required|min:5|max:50'
    
            ],[
    
              'name.required' =>'Enter Name',
              'email.unique' => 'Email must be unique',
              'email.required' => 'Enter Email',
              'phone.required' => 'Enter Mobile Number',
              'phone.min' => 'Phone number should not be less than 10 digits',
              'phone.max' => 'Phone number should not be more than 11 digits',
              'password.required' => 'Enter password',
            ]);
    
        
        
    
              // \Mail::to($user->email)->send(new VerifyMail($user));
            
    
    
    
       try {

       $phone = '+1'.$request->phone;
    
         $message =strip_tags(nl2br("Dear customer,\n Order Placed successfully, \n A technician will reach out to you as soon as possible.\n Thank you!!"));
    
         $account_sid = "ACeb30af8343f53c1b366517b35ea44dc2";
                 $auth_token = "ecc8e9d376d7ef8a19ed22778bb466f8";
                 $twilio_number = +4842553085;
           $client = new Client($account_sid, $auth_token);
           $client->messages->create($phone,
               ['from' => $twilio_number, 'body' => $message] );

              $details = [
                'title' => 'Mail from CellCity.com',
                'subject' => 'Dear Customer ,',
                'message' => 'Order Placed successfully, A technician will reach out to you as soon as possible. Thank you!!'
            ];
          
            
         
        $user = new User;
        $user->name = $request->name;
        $user->email =  $request->email;
        $user->address =  $request->address;
        $user->phoneno =  $request->phone;
        $user->role = 'user';
        $user->password = Hash::make($request->password);
        $user->save();
        // dd($user->id);

        $verifyUser = new VerifyUser;
        $verifyUser->userId = $user->id;
        $verifyUser->token = sha1(time());
        $verifyUser->save();

         \Mail::to($request->email)->send(new NotifVerify($details,$user));
         
         $userId=0;
         if(Auth::guard('web')->check()){
           $userId= Auth::guard('web')->user()->id;
         }else{
            $userId=$user->id;
         }
    
         $order = New RepairOrder;
    
    
         $order->userId = $userId;
         $order->model_Id = $request->model_Id;
         $order->date = $request->date;
         $order->time_id = $request->time;
         $order->name = $request->name;
         $order->address = $request->address;
         $order->phone = $request->phone;
         $order->email = $request->email;
         $order->instructions = $request->instructions;
         $order->save();
    
         foreach ($request->repair_type as $key => $value) {
            $ordertype = New RepairOrderType;
            $ordertype->order_Id= $order->id;
            $ordertype->repair_type= RepairType::whereId($value)->first()->repair_type;
            $ordertype->price= RepairType::whereId($value)->first()->price;
            $ordertype->save();
         }

      }
      catch (exception $e) {
          dd('twilio error');
      }
       }
    
      return response()->json(['repairOrder'=>'success']);
        //  return redirect('repairorder-completed')->with('message','Please check your email for verification');
          }
        }

        

    }

