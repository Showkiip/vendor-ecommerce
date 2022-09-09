<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tech;
use App\Models\User;
use App\Models\Admin;
use App\Models\Alert;
use App\Models\Brand;
use App\Mail\TechMail;
use App\Mail\orderAssign;
use App\Models\Pmodel;
use App\Models\ZipCode;
use App\Models\RepairType;
use App\Models\RepairOrder;
use App\Models\ShippingAddr;
use Illuminate\Http\Request;
use App\Models\RepairOrderType;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Temporary;
use App\Models\TemporaryOrderType;
use Twilio\Rest\Client;

class AdminRepairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $RepairTypes= RepairType::orderBy('created_at','desc')->get();
        return view('admin.repair-list',compact('RepairTypes'));
    }


    public function repairOrders()
    {
        RepairOrder::where('notification', '=', 0)
                   ->update(['notification' => 1]);


        $RepairOrders= RepairOrder::where('order_status','!=','4')->orderBy('id','desc')
                                ->get();

        return view('admin.repair-orders',compact('RepairOrders'));
    }

    public function orderCompleted()
    {
        RepairOrder::where('notification', '=', 0)
                   ->update(['notification' => 1]);


        $RepairOrders= RepairOrder::where(['order_status'=>'4'])->orderBy('created_at','desc')->get();
        return view('admin.orderCompleted',compact('RepairOrders'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.add-repairtype');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $repair= New RepairType;
        $repair->model_Id= $request->model_Id;
        $repair->repair_type= $request->repair_type;
        $repair->price= $request->price;
        // $repair->adminId= Auth::guard('admin')->user()->id;
        $repair->save();
        return redirect('/admin/repairTypes')->with('message', Alert::_message('success', 'Repair Type Added Successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order= RepairOrder::find($id);
        return view('admin.repair-order-model',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $repair = RepairType::find($id);

        return view('admin.edit-repairtype',compact('repair'));
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
        $repair = RepairType::find($id);
         $repair->model_Id= $request->model_Id;
        $repair->repair_type= $request->repair_type;
        $repair->price= $request->price;
        // $repair->adminId= Auth::guard('admin')->user()->id;
        $repair->save();
        return redirect('/admin/repairTypes')->with('message', Alert::_message('success', 'Repair Type Update Successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $repair = RepairType::find($id);
        $repair->delete();
        return back()->with('message', Alert::_message('success', 'Repair Type Delete Successfully.'));
    }

    public function delete($id)
    {
        // dd($id);
        $repair = RepairType::find($id);
        $repair->delete();
        return back()->with('message', Alert::_message('success', 'Repair Type Delete Successfully.'));
    }
    public function assignTech(Request $request){
        // dd($request->techid);
        $user = User::find($request->techid);
      
        $details = [
            'title' => 'Mail from PeekInternational.com',
            'subject' => 'Dear Technician ,',
            'message' => 'You have Recieved  a new Order.'
        ];

         \Mail::to($user->email)->send(new orderAssign($details));

         $phone = '+1'.$user->phoneno;
           $message = strip_tags(nl2br("Dear Technician, \n You have Recieved  a new Repair Order"));

           $account_sid = "ACeb30af8343f53c1b366517b35ea44dc2";
           $auth_token = "ecc8e9d376d7ef8a19ed22778bb466f8";
           $twilio_number = +4842553085;
             $client = new Client($account_sid, $auth_token);
             $client->messages->create($phone,
                 ['from' => $twilio_number, 'body' => $message] );
             
        $user->jobStatus = 'busy';
        $user->update();
        // dd($request->orderId);
        RepairOrder::whereId($request->orderId)->update(['techId' => $user->id,'order_status'=>'3']);


         return response()->json($message);
    }

    public function repairStep()
    {
        return view('admin.repair-steps');
    }

    public function getModels($id)
    {
         $brand= Brand::find($id);
        //  dd($brand);
         $pmodels = Pmodel::where('brand_Id',$brand->id)->get();

         return view('admin.repairOrder-dropdown',compact('pmodels','brand'));
    }


    public function getRepair($id)
    {
        // dd($id);
         $model= Pmodel::find($id);

         $RepairTypes = RepairType::where('model_Id',$id)->get();
        //  dd($RepairTypes);
         return view('admin.model-repair-checkbox',compact('RepairTypes','model'));
    }

    public function repairModelStore(Request $request)
    {
        $customer = User::whereId($request->userId)->first();
        $model = explode(',',$request->model_Id);
        $model_Id = $model[0];

        // dd($request->model_Id);
        $RepairOrders = new RepairOrder;
        $RepairOrders->userId = $request->userId;
        $RepairOrders->model_Id = $model_Id;
        $RepairOrders->date = $request->date;
        $RepairOrders->time_id = $request->time;
        $RepairOrders->name = $customer->name;
        $RepairOrders->address = $customer->address;
        $RepairOrders->phone = $customer->phoneno;
        $RepairOrders->email = $customer->email;
        $RepairOrders->instructions = $request->instruction;
        $RepairOrders->save();

        foreach ($request->repair_type as $key => $value) {
            // dd($RepairOrders->id);
            $ordertype = New RepairOrderType;
            $ordertype->order_Id= $RepairOrders->id;
            $ordertype->repair_type= RepairType::whereId($value)->first()->repair_type;
            $ordertype->price= RepairType::whereId($value)->first()->price;
            $ordertype->save();
       }

      return back()->with('message', Alert::_message('success', 'Repair Order Created Successfully.'));

    }


    public function modifyOrder($id)
    {
        $repairOrders = RepairOrder::find($id);
    //   dd($repairOrders);

         $model = Pmodel::where('id',$repairOrders->model_Id)->first();
        //  dd($model);

         $checkbox = RepairOrderType::where('order_Id',$repairOrders->id)->get();

            // dd($checkbox->repairType->repair_type);


        $rapairType = RepairType::where('model_Id',$model->id)->get();
        // dd($rapairType);

        return view('admin.modify-order',compact('repairOrders','model','checkbox'));
    }




    public function modifyOrderUpdate(Request $request, $id)
    {
        // dd($request->repair_type);

        $customer = User::whereId($request->userId)->first();

        // dd($customer);
        $model = explode(',',$request->model_Id);
        $model_Id = $model[0];
        $RepairOrders =RepairOrder::find($id);
        $RepairOrders->userId = $request->userId;
        $RepairOrders->model_Id = $model_Id;
        $RepairOrders->date = $request->date;
        $RepairOrders->time = $request->time;

            $RepairOrders->name = $customer->name;
            $RepairOrders->address = $customer->address;
            $RepairOrders->phone = $customer->phoneno;
            $RepairOrders->email = $customer->email;



        $RepairOrders->instructions = $request->instruction;
        $RepairOrders->update();


        $q = "DELETE pp FROM `repair_order_types` pp
              join repair_orders pd on pp.order_Id = pd.id
              WHERE pd.id = ?";


        $status = \DB::delete($q, array($id));
        // dd($q);

        foreach ($request->repair_type as $key => $value) {
            // dd($value);
            $ordertype = new RepairOrderType;
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

      return back()->with('message', Alert::_message('success', 'Repair Order Update Successfully.'));
    }

    public function deleteOrder($id)
    {
            RepairOrder::find($id)->delete();
            return back()->with('message', Alert::_message('danger', 'Repair Order Deleted Successfully.'));

    }
    public function checkUpdateOrders()
    {

        Temporary::where('notification', '=', 0)
                   ->update(['notification' => 1]);
        $RepairOrders= Temporary::orderBy('id','desc')->get();


        return view('admin.checkupdate',compact('RepairOrders'));
    }

    public function checkRepairTypes($id)
    {
        $order= Temporary::find($id);
        return view('admin.check-order-model',compact('order'));
    }

    public function acceptOrderUpdate($id)
    {
        $RepairOrders =Temporary::find($id);
        $repairOrderTypes = TemporaryOrderType::where('order_id',$RepairOrders->orderId)->get();

        $customer = User::whereId($RepairOrders->userId)->first();

        // dd($customer);
        // $model = explode(',',$repairOrderTypes->model_Id);
        // $model_Id = $model[0];
        $repairOrders =RepairOrder::find($RepairOrders->orderId);
        $repairOrders->userId = $RepairOrders->userId;
        $repairOrders->techId = $RepairOrders->techId;
        $repairOrders->model_Id = $RepairOrders->model_Id;
        $repairOrders->date = $RepairOrders->date;
        $repairOrders->time = $RepairOrders->time;

            $repairOrders->name = $customer->name;
            $repairOrders->address = $customer->address;
            $repairOrders->phone = $customer->phoneno;
            $repairOrders->email = $customer->email;

        $repairOrders->instructions = $RepairOrders->reason;
        $repairOrders->order_status = $RepairOrders->order_status;
        $repairOrders->order_create = $RepairOrders->order_create;

        $repairOrders->update();


        $q = "DELETE pp FROM `repair_order_types` pp
              join repair_orders pd on pp.order_Id = pd.id
              WHERE pd.id = ?";


        $status = \DB::delete($q, array($repairOrders->id));
        // dd($q);
        // dd($repairOrderTypes);
        foreach ($repairOrderTypes as $key => $value) {
            // dd($value);
            $ordertype = new RepairOrderType;
            $ordertype->order_Id= $repairOrders->id;

                  $ordertype->repair_type= $value->repair_type;
                  $ordertype->price= $value->price;

            $ordertype->save();
       }
       TemporaryOrderType::where('order_id',$RepairOrders->orderId)->delete();
       $RepairOrders->delete();

      return back()->with('message', Alert::_message('success', 'Repair Order Update Successfully.'));
    }
    public function deleteOrderUpdate($id)
    {
        $RepairOrders =Temporary::find($id);
        TemporaryOrderType::where('order_id',$RepairOrders->orderId)->delete();
        $RepairOrders->delete();

        return back()->with('message', Alert::_message('success','Reject this Update Order Request '));
    }
}
