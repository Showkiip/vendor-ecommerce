<?php

namespace App\Http\Controllers;

use App\Mail\TechMail;
use App\Mail\orderModify;
use Hash;
use App\Models\Tech;
use App\Models\User;
use App\Models\Alert;
use App\Models\Brand;
use App\Models\Pmodel;
use Twilio\Rest\Client;
use App\Models\Temporary;
use App\Models\RepairType;
use App\Models\RepairOrder;
use Illuminate\Http\Request;
use App\Models\RepairOrderType;
use App\Models\TemporaryOrderType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class TechController extends Controller
{

      public function techLogin(Request $request)
    {
        if($request->isMethod('post')){

           if(Auth::guard('tech')->attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'tech']))
           {
            //Authentication passed...
            if(Auth::guard('tech')->check()){
                // dd(Auth::guard('tech')->user()->name );
                return redirect(RouteServiceProvider::TECH);

                    }
                }
                return back()->with('loginError','MisMatch the email and password');
            }
            // dd(Auth::guard('tech')->check());
            // dd(Auth::guard('tech'));

     return view('frontend.technician.login-page');
    }

    public function  orderView($id)
    {
        // dd($id);
        $order= RepairOrder::find($id);
        return view('frontend.technician.repair-order-model',compact('order'));
    }


    public function  acceptOrder($id)
    {
        // dd($id);
        $order= RepairOrder::where('id',$id)->update(['order_status'=>'1']);
        $message = "Accept the Order";
        return response()->json($message);
    }

    public function  penddingOrder($id)
    {
        // dd($id);
        $order= RepairOrder::where('id',$id)->update(['order_status'=>'0']);
        $message = "Pendding the Order!";
        return response()->json($message);
    }


    public function rejectOrder($id)
    {
        // dd($id);
        $order= RepairOrder::find($id);
        $order->techId = null;
        $order->order_status= '2';
        $order->update();

        User::where(['id'=>Auth::guard('tech')->user()->id])->update(['jobStatus'=> "available"]);
        $message = "Successfully Reject!";
        return response()->json($message);
    }

    public function orderModify($id)
    {
        // dd($id);
        $repairOrders = RepairOrder::find($id);
        //   dd($repairOrders);

             $model = Pmodel::where('id',$repairOrders->model_Id)->first();

             $checkbox = RepairOrderType::where('order_Id',$repairOrders->id)->get();
            //  dd($checkbox);

            return view('frontend.technician.order-modify',compact('repairOrders','model','checkbox'));
    }
      public function getModels($id)
      {
        $brand= Brand::find($id);
        //  dd($brand);
         $pmodels = Pmodel::where('brand_Id',$brand->id)->get();

         return view('frontend.technician.repairOrder-dropdown',compact('pmodels','brand'));
      }
      public function getrepairTypes($id)
      {
          // dd($id);
           $model= Pmodel::find($id);

           $RepairTypes = RepairType::where('model_Id',$id)->orderBy('id','desc')->get();
          //  dd($RepairTypes);
           return view('frontend.technician.model-repair-checkbox',compact('RepairTypes','model'));
      }
    public function repairOrderUpdate(Request $request,$id)
    {
        $customer = User::whereId($request->userId)->first();

        $model = explode(',',$request->model_Id);
        $model_Id = $model[0];

        // dd($request);
        $RepairOrders =RepairOrder::find($id);
        // dd($RepairOrders);
        $tech = User::whereId($RepairOrders->techId)->first();
        if($temporary =Temporary::where('orderId',$RepairOrders->id)->first())
        {
            $temporary->userId = $request->userId;
            $temporary->techId = $RepairOrders->techId;
            $temporary->orderId = $RepairOrders->id;
            $temporary->model_Id = $model_Id;
            $temporary->date = $request->date;
            $temporary->time = $request->time;
            $temporary->name = $customer->name;
            $temporary->address = $customer->address;
            $temporary->phone = $customer->phoneno;
            $temporary->email = $customer->email;
            $temporary->reason = $request->instruction;
            $temporary->order_status = $RepairOrders->order_status;
            $temporary->update();
        }
        else
        {
        $temporary = new Temporary;
        $temporary->userId = $request->userId;
        $temporary->techId = $RepairOrders->techId;
        $temporary->orderId = $RepairOrders->id;
        $temporary->model_Id = $model_Id;
        $temporary->date = $request->date;
        $temporary->time = $request->time;
        $temporary->name = $customer->name;
        $temporary->address = $customer->address;
        $temporary->phone = $customer->phoneno;
        $temporary->email = $customer->email;
        $temporary->reason = $request->instruction;
        $temporary->order_status = $RepairOrders->order_status;
        $temporary->save();
        }
        $q = "DELETE pp FROM `temporary_order_types` pp
              join temporaries pd on pp.order_Id = pd.orderId
              WHERE pd.orderId = ?";
        //  $sql = "DELETE FROM temporary_order_types as pp join temporaries as pd WHERE pp.order_Id=pd.";


        $status = \DB::delete($q, array($RepairOrders->id));
        // dd($q);
        // dd($request->repair_type);
        foreach ($request->repair_type as $key => $value) {
            $ordertype = new TemporaryOrderType;
            $ordertype->order_Id= $RepairOrders->id;
            if($request->check == 'check')
            {
                  $ordertype->repair_type= RepairType::whereId($value)->first()->repair_type;
                  $ordertype->price= RepairType::whereId($value)->first()->price;
          }
          else{
                 $ordertype->repair_type= RepairType::where('repair_type',$value)->first()->repair_type;
                  $ordertype->price= RepairType::where('repair_type',$value)->first()->price;
          }
            $ordertype->save();
       }

       $details = [
        'title' => 'Mail from CellCity',
        'subject' => 'Update the repair order,',
        'message' => 'Techician  ('.$tech->name.')  updated the customer  (id:'.$ordertype->id.'  Name :'.$customer->name.')  repair order,'
    ];


     // \Mail::to("cellcityus1@gmail.com")->send(new orderModify($details));
     \Mail::to("peek.ali500@gmail.com")->send(new orderModify($details));
    //   $mail = mail ("admin@gmail.com",$subject,$message);


      return back()->with('message', Alert::_message('success', 'Repair Order Update Successfully. Please wait for verify by admin'));
    }
    ///messages twelio
    public function message($phoneno)
    {
        // dd($phoneno);
           $phone ='+'.$phoneno;
        //    dd($phone);
           $message =strip_tags(nl2br(" Dear Customer, \n i have recieved your repair order \n Are you want to repair the order"));
           $account_sid = "ACeb30af8343f53c1b366517b35ea44dc2";
           $auth_token = "ecc8e9d376d7ef8a19ed22778bb466f8";
           $twilio_number = +4842553085;
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($phone,
            ['from' => $twilio_number, 'body' => $message] );

            return back();
    }

}
