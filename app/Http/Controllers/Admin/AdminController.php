<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Tech;
use App\Models\Admin;
use App\Models\Alert;
use App\Models\RepairOrder;
use Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
   public function adminLogin(Request $request)
    {
    	 if($request->isMethod('post')){
           if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'admin'])){
        //Authentication passed...
        if(Auth::guard('admin')->check()){
            // dd(Auth::guard('tech')->user()->name );
            return redirect(RouteServiceProvider::ADMIN);

                }
            }
        }
        return view('admin.auth.login');
    }


    public function editCustomer(Request $request,$id){
      $customer= User::find($id);
      // dd($customer);

      return view('admin.edit-customer',compact('customer'));
    }


	public function addCustomer(Request $request){


         if($request->isMethod('post')){
            // dd($request->all());

	           if($request->input('c_id')){

                $id=$request->input('c_id');
                $user = User::find($id);
                $user->name = $request->name;
                $user->email =  $request->email;
                $user->address =  $request->address;
                $user->phoneno =  $request->phoneno;
                $user->role = 'user';
                $user->password = Hash::make($request->password);
                $user->save();
                 // dd($user);
                return redirect('/admin/customers')->with('message', Alert::_message('success', 'Customer Updated Successfully.'));

              }else{
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

             return redirect('/admin/customers')->with('message', Alert::_message('success', 'Customer Added Successfully.'));

           }


        }

      return view('admin.add-customer');
	}

    public function showCustomers(){

    	$customers = User::whereRole('user')->orderBy('id','desc')->get();
    	// dd($customers);
    	return view('admin.contacts-list',compact('customers'));
    }

    public function deleteCustomer($id){
        User::whereId($id)->delete();
    	return redirect()->back()->with('message',  Alert::_message('success', 'Customer Deleted Successfully.'));
    }




     public function editTechnician(Request $request,$id){
      $customer= User::find($id);
      // dd($customer);

      return view('admin.edit-technician',compact('customer'));
    }

	public function addTechnician(Request $request){


         if($request->isMethod('post')){
            // dd($request->all());

	           if($request->input('c_id')){

                $id=$request->input('c_id');
                $user = User::find($id);
                $user->name = $request->name;
                $user->email =  $request->email;
                $user->address =  $request->address;
                $user->phoneno =  $request->phoneno;
                $user->role = 'tech';
                $user->jobStatus = 'available';
                $user->password = Hash::make($request->password);
                $user->save();
                 // dd($user);
                return redirect('/admin/technicians')->with('message', Alert::_message('success', 'Technician Updated Successfully.'));

	              }else{
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

           	    $user = new Tech;
                $user->name = $request->name;
                $user->email =  $request->email;
                $user->address =  $request->address;
                $user->phoneno =  $request->phoneno;
                $user->role = 'tech';
                $user->jobStatus = 'available';
                $user->password = Hash::make($request->password);
                $user->save();

             return redirect('/admin/technicians')->with('message', Alert::_message('success', 'Technician Added Successfully.'));

           }

        }

      return view('admin.add-technician');
	}

    public function showTechnicians(){

    	$customers = User::whereRole('tech')->orderBy('id','desc')->get();
    	// dd($customers);
    	return view('admin.technicians-list',compact('customers'));
    }

    public function deleteTechnician($id){
        User::whereId($id)->delete();
    	return redirect()->back()->with('message',  Alert::_message('success', 'Technician Deleted Successfully.'));
    }

    public function rejectOrder($orderId)
    {
        $order= RepairOrder::find($orderId);

        if($user=User::where('id',$order->techId)->first())
        {
          $user->jobStatus = 'available';
          $user->update(['jobStatus'=> "available"]);

          $order->techId = null;
          $order->order_status= '3';
          $order->update();
           }
        else
        {
          $order->techId = null;
          $order->order_status= '3';
          $order->update();
        }

        $message = "Successfully Reject!";
        return response()->json($message);
    }

    public function addRole()
    {
        return view('admin.role.create');
    }

    public function storeRole(Request $request)
    {
        // dd($request);

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
            $user->role = 'admin';
            $user->password = Hash::make($request->password);


            $user->save();
            // $role = $request->role_id;
            // // dd($role);
            // $user->assignRole($role);
            // // $role = Role::create(['name' => $request->role]);
        return back()->with('message',Alert::_message('success', 'Role Assign Successfully.'));
    }

    public function roleAssign(Request $request)
    {
        $user = User::find($request->user_id);
        $role = $request->role_id;
        $user->assignRole($role);
        return back()->with('message',Alert::_message('success', 'Role Assign Successfully.'));
    }
    public function roleList()
    {
        $users = User::whereIn('role',['admin'])->get();

        $user_id = $users->pluck('id');
        $user = $user_id->all();
        // dd($user);
        $userID = implode(',',$user);
        // $roles = Role::all();
        // dd($users);
        $userRoles = DB::table('model_has_roles')->whereIn('model_id',explode("," , $userID))->get();
        // dd($userRoles);


        return view('admin.role.index',compact('users','userRoles'));

    }

    public function editRole($id)
    {
        $user = User::find($id);
        return view('admin.role.edit',compact('user'));
    }

     public function updateRole(Request $request,$id)
    {
      $this->validate($request,[
        'name' => 'required|min:5|max:50',
        'phoneno' => 'min:2|max:17',
        'email' => 'required|email|exists:users',
        // 'password' => 'required|min:5|max:50'

      ],[

        'name.required' =>'Enter Name',
        'email.unique' => 'Email must be unique',
        'email.required' => 'Enter Email',
        'phoneno.required' => 'Enter Mobile Number',
        // 'password.required' => 'Enter password',
      ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email =  $request->email;
        $user->address =  $request->address;
        $user->phoneno =  $request->phoneno;
        $user->role = 'admin';
        $user->update();

        DB::table('model_has_roles')->where('model_id',$id)->delete();
        // dd($user);
        $role = $request->role_id;
        // dd($role);
        $user->assignRole($role);

    return back()->with('message',Alert::_message('success', 'Role Udated Successfully.'));
    }

    // public function Track()
    // {
    //     $id = "EJ123456780US";
    //    $host_v = "http://production.shippingapis.com/ShippingAPI.dll?API=TrackV2%20&XML=%3CTrackRequest%20USERID=%22353SNEAK5425%22%3E%20%3CTrackID%20ID=%22".$id."%22%3E%3C/TrackID%3E%3C/TrackRequest%3E";
    //    $ch = curl_init();
    //    $timeout = 10;
    //    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)');
    //    curl_setopt($ch, CURLOPT_URL,$host_v);
    //    curl_setopt($ch, CURLOPT_HEADER, 0);
    //    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    //    $result = curl_exec($ch);
   	// 	curl_close ($ch);
    //   $xml = simplexml_load_string($result);
    //   $json = json_encode($xml);
    //   $array = json_decode($json,TRUE);
    //   $check = count($array['TrackInfo']);
    //   if ($check == 3) {
    //     $description = $array['TrackInfo']['TrackSummary'];
    //     $details = $array['TrackInfo']['TrackDetail'];
    //   }else {
    //     $description = $array['TrackInfo']['Error']['Description'];
    //     $details = [];
    //   }
    //   dd($description);
    // //   return view('admin.track-result',compact('id','description','check','details'));
    // }
}
