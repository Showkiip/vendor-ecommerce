<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class RoleController extends Controller
{
    public function user_role()
    {
        $roles = Role::all();
        $users = User::all();
        return view('admin.assign_role', compact('roles', 'users'));
    }

    public function user_role_assign(Request $request)
    {
        // return $request->all();
        $user = User::find($request->user_id);
        $role = $request->role_id;
        $role_name = Role::find($request->role_id);
        $user->save();
        $delete = DB::table('model_has_roles')->where('model_id', $request->user_id);
        $delete->delete();
        $user->assignRole($role);
        return redirect()->back();
    }


    public function addRole(Request $request)
    {
       Role::create($request->all());
       return back()->with('status','Role Added!');
    }

//user
    public function index()
    {
        $users = User::all();
        return view('user.index',compact('users'));
    }
    public function create()
    {

        return view('user.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            // 'password' => 'required|string|confirmed|min:8',

         ]);
           User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);
        return redirect()->route('user.index')->with('statu','User Added!');
    }
    public function show()
    {

    }
    public function edit()
    {

    }
    public function update()
    {

    }

    public function role(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:users',
            'id' => 'auto-increment',

         ]);
           Role::create([
            'name' => $request->name,


        ]);
        return redirect()->route('user_role')->with('statu','User Added!');
    }
    public function roleDestroy($id)
    {
           Role::where('id',$id)->delete();

           return back()->with('status','User Deleted!');
    }
    public function destroy($id)
    {
           User::where('id',$id)->delete();

           return back()->with('status','User Deleted!');
    }

    public function editing(Request $request)
    {
        $user = User::where('id', $request->id)->first();

        return response()->json($user);
    }

    public function updated(Request $request)
    {
          $request->validate([
               'password' => 'required',
               'name' => 'required',
               
              ]);
        
        $user=User::where('id',$request->id)->first();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->update();
        return back()->with('status', 'User Updated!');
    }
}
