<?php

namespace App\Http\Controllers;

use App\Mail\forgetPassword;
use App\Mail\TechMail;
use Carbon\Carbon;
use App\Models\Tech;
use App\Models\User;
use App\Mail\VerifyMail;
use App\Models\Alert;
use App\Models\Order;
use App\Models\RepairOrder;
use App\Models\RepairOrderType;
use App\Models\VerifyUser;
use App\Models\ShippingAddr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Payment;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use Twilio\Rest\Client;



// use Checkout\Models\Payments\Payment;

class UserController extends Controller
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



  public function accountLogin(Request $request)
    {
        if($request->isMethod('post')){


        if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'user','verified'=>1]))
        {

        if(Auth::guard('web')->check()){
            // dd(Auth::guard('web')->user()->shippingaddress);
           // $user= User::find(Auth::guard('web')->user()->id);
           //  dd($user->shippingaddress->name);
            return redirect(RouteServiceProvider::HOME);


                }
            }
            else
            {
                return back()->with('message','MisMatch the email and password');
            }
        }


     return view('frontend.signin')->with('message','Please check email verification');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->isMethod('post')){
            // dd($request->all());
                $this->validate($request,[
                'name' => 'required|min:5|max:50',
                'phoneno' => 'min:2|max:17',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:5|max:50'

              ],[

                'name.required' =>'Enter Name',
                'email.unique' => 'Email must be unique',
                'email.required' => 'Enter Email',
                'phoneno.required' => 'Enter Mobile Number',
                'password.required' => 'Enter password',
              ]);

                $user = new User;
                $user->name = $request->name;
                $user->email =  $request->email;
                $user->address =  $request->address;
                $user->phoneno =  $request->phoneno;
                $user->role = 'user';
                $user->password = Hash::make($request->password);
                $user->save();

                $verifyUser = VerifyUser::create([
                    'userId' => $user->id,
                    'token' => sha1(time())
                  ]);
                  \Mail::to($user->email)->send(new VerifyMail($user));
                  return back()->with('message','Please check your email for verification');
                //   return $user;


        }

        return view('frontend.signup');

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
        $updated_at = Carbon::now();
        $request->merge(['updated_at'=>$updated_at]);

        $user = User::find($id);
        $user->update($request->only($user->getFillable()));
        return back()->with('success','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function verifyUserByEmail($token)
    {
        // dd($token);
    $verifyUser = VerifyUser::where('token', $token)->first();
    if(isset($verifyUser) ){

        $user = User::where('id',$verifyUser->userId)->first();
        // $user = $verifyUser->user;
        // dd($user->verified);
        if(!$user->verified) {
            // dd($user->verified);
        $user->verified = 1;
        $user->update();
        $status = "Your e-mail is verified. You can now login.";
        } else {
        $status = "Your e-mail is already verified. You can now login.";
        }
    } else {
        return redirect()->route('signin')->with('warning', "Sorry your email cannot be identified.");
    }
    return redirect()->route('signin')->with('status', $status);
    }

     public function viewOrderRepair($id)
     {
        $order= RepairOrder::find($id);
        return view('frontend.orderViewModel',compact('order'));
     }

    public function completeOrder($id)
    {
       $repairOrder = RepairOrder::find($id);
    //    dd($repairOrder);
    $repairOrderType = RepairOrderType::where('order_Id',$repairOrder->id)->get();
    // dd($repairOrderType);
       $customer = User::where('id',$repairOrder->userId)->first();

       return view('frontend.payment',compact('repairOrder','customer','repairOrderType'));

    }

    public function payment(Request $request, $id)
    {
        // dd($request->all());


       $repairOrder = RepairOrder::find($id);
    //    dd($repairOrder);
         $user = User::where('id',$repairOrder->techId)->first();
         $cust = User::where('id',$repairOrder->userId)->first();
    //  dd($user);

    if($request->payment == "cash")
    {
        $user->jobStatus = "available";
        $user->update();
       $repairOrder->pay_status = "paid";
       $repairOrder->pay_method = "cash";
       $repairOrder->order_status= "4";
       $repairOrder->update();
       $details = [
        'title' => 'Mail from PeekInternational.com',
        'subject' => 'Dear Customer ,',
        'message' => 'Payment completed Successfully through Cash',
        'Total'  =>$request->total
    ];
     $messgae = "Succesfully Transferred";
     \Mail::to($cust->email)->send(new TechMail($details));
    //  return response()->json($messgae);
    $phone = "+".$cust->phoneno;
    //  dd($phone);
     $message =strip_tags(nl2br("Dear Customer, \n You have Successfully Pay  through Cash . \n Total Amount : $". $request->total));

     $account_sid = "ACeb30af8343f53c1b366517b35ea44dc2";
     $auth_token = "ecc8e9d376d7ef8a19ed22778bb466f8";
     $twilio_number = +14842553085;
     $client = new Client($account_sid, $auth_token);
     $client->messages->create($phone,
         ['from' => $twilio_number, 'body' => $message] );

       return view('frontend.paymentSuccess');
    }

    elseif($request->payment == "paypal")
    {


        $sume = $request->total;
        //    dd($sume);
        $desc = $repairOrder->id;
        $apiContext = new ApiContext(
          new OAuthTokenCredential(
              'AY9mTzyew4I5bQDY82ZT23Hw6CVvRNN_gxGdFNFD1dBeP_JtMjM2ubFS8NkFqjnieO_nJ-g54ZZEiwB5',
            'EKdd3HTSiu1Rgptb7VZfEY2zON7xdsBpCRjdEVvl36u54DO7_AWmyChF-zpIo7l6LWwlETL4vUnCxN0n'
               )
      );
// dd($apiContext);
      $payer = new Payer();
      $payer->setPaymentMethod("paypal");
      // dd($payer);
      // Set redirect URLs
      $redirectUrls = new RedirectUrls();
      $redirectUrls->setReturnUrl(route('paypal.success'))
          ->setCancelUrl(route('paypal.cancel'));
      // dd($redirectUrls);
      // Set payment amount
      $amount = new Amount();
      $amount->setCurrency("USD")
          ->setTotal($sume);


      // Set transaction object
      $transaction = new Transaction();
      $transaction->setAmount($amount)
          ->setDescription($desc);
      //   dd($transaction);
      // Create the full payment object
      $payment = new Payment();
      $payment->setIntent('sale')
          ->setPayer($payer)
          ->setRedirectUrls($redirectUrls)
          ->setTransactions(array($transaction));
      // dd($payment);
      // Create payment with valid API context
      try {

          $payment->create($apiContext);
          // dd($payment);
          // Get PayPal redirect URL and redirect the customer
          // $approvalUrl =
          return redirect($payment->getApprovalLink());
          // dd($approvalUrl);
          // Redirect the customer to $approvalUrl
      } catch (PayPalConnectionException $ex) {
          echo $ex->getCode();
          echo $ex->getData();
          die($ex);
      } catch (Exception $ex) {
          die($ex);
      }
  }


  }

public function success(Request $request)
{
    $apiContext = new ApiContext(
        new OAuthTokenCredential(
            'AY9mTzyew4I5bQDY82ZT23Hw6CVvRNN_gxGdFNFD1dBeP_JtMjM2ubFS8NkFqjnieO_nJ-g54ZZEiwB5',
            'EKdd3HTSiu1Rgptb7VZfEY2zON7xdsBpCRjdEVvl36u54DO7_AWmyChF-zpIo7l6LWwlETL4vUnCxN0n'
                    )
    );

    // Get payment object by passing paymentId
    $paymentId = $_GET['paymentId'];
    $payment = Payment::get($paymentId, $apiContext);
    $payerId = $_GET['PayerID'];

    // Execute payment with payer ID
    $execution = new PaymentExecution();
    $execution->setPayerId($payerId);

    try {
        // Execute payment
        $result = $payment->execute($execution, $apiContext);
        // dd($result->transactions[0]->amount->total);
        $str = $result->transactions[0]->description;
        $id = $str;
        $total = $result->transactions[0]->amount->total;
        // dd($str);
      // $total_amount =$result->transactions[0]->amount->total;

        $repairOrder = RepairOrder::find($id);
        $cust = User::where('id',$repairOrder->userId)->first();
        $user = User::where('id',$repairOrder->techId)->first();
        $user->jobStatus = "available";
        $user->update();
        $repairOrder->pay_status = "paid";
        $repairOrder->pay_method = "paypal";
        $repairOrder->order_status= "4";
        $repairOrder->update();


   //$subject = "Booking Confirmation";
    // dd($repairOrder);

  //   $retval = mail ($user->email,$subject,$message);
  $details = [
      'title' => 'Mail from PeekInternational.com',
      'subject' => 'Dear Customer ,',
      'message' => 'Payment completed through PayPal',
      'Total'  =>  $total
  ];
  //  $messgae = "Succesfully Transferred";
   \Mail::to($cust->email)->send(new TechMail($details));
  //  return response()->json($messgae);

  $phone = "+".$cust->phoneno;
//    dd($phone);
   $message =strip_tags(nl2br("Dear customer,\n You have Successfully Pay  through PayPal \n Total Amount : $". $total));
   $account_sid = "ACeb30af8343f53c1b366517b35ea44dc2";
           $auth_token = "ecc8e9d376d7ef8a19ed22778bb466f8";
           $twilio_number = +14842553085;
   $client = new Client($account_sid, $auth_token);
   $client->messages->create($phone,
       ['from' => $twilio_number, 'body' => $message] );

      return view('frontend.paymentSuccess');

    } catch (PayPalConnectionException $ex) {
        echo $ex->getCode();
        echo $ex->getData();
        die($ex);
    } catch (Exception $ex) {
        die($ex);
    }
}

  public function cancel()
{
        dd('payment cancel');
}


//////////////orderViewDetails////////////////

public function orderViewDetails($id)
{
    $productOrder = Order::where('orderSales_id',$id)->where('type','phone')->get();
    $accessoryOrder = Order::where('orderSales_id',$id)->where('type','accessory')->get();
   return view('frontend.order.view',compact('productOrder','accessoryOrder'));
}

public function forgetPassword(Request $request)
{
      $request->validate([
          'email'=>'required|exists:users,email'
      ]);

      $user = User::where('email',$request->email)->first();

      if($user === null)
      {
        return back()->with('message','User Email not found');
      }
      else
      {
          $token = mt_rand(100000,999999);
        $details = [
            'title' => 'Mail from PeekInternational.com',
            'token' => $token,
            'message' => 'Order Placed successfully, A technician will reach out to you as soon as possible. Thank you!!'
        ];

        $user->token_forget = $token;
        $user->update();

         \Mail::to($request->email)->send(new forgetPassword($details));

         return back()->with('message','Please check your email for verification');
      }


}

    public function setPassword($token)
    {
        $user = User::where('token_forget',$token)->first();

        if($user === null)
        {
            return back();
        }
        else{
            return view('frontend.set-password',compact('user'));
        }
    }

    public function updatePassword(Request $request,$id)
    {
        $this->validate($request,[
            'password' => 'required|min:5|max:50|confirmed'

          ],[
            'password.required' => 'Enter password',
          ]);
            // dd($id);
            $user = User::find($id);
            $user->password = Hash::make($request->password);
            $user->update();
            return redirect('/signin')->with('message', 'Changed Password Successfully');

    }


}
