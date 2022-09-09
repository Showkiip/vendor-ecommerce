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
use App\Models\ZipCode;
use App\Models\Alert;

class ZipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zipcodes= ZipCode::orderBy('id','desc')->get();
        return view('admin.zipcode-list',compact('zipcodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-zipcode');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $zip= New ZipCode;
        $zip->zipcode= $request->zipcode;
        $zip->adminId= Auth::guard('admin')->user()->id;
        $zip->save();
        return redirect('/admin/zipCode')->with('message', Alert::_message('success', 'Zip Code Added Successfully.'));
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
        $zipcode = ZipCode::find($id);

        return view('admin.edit-zipcode',compact('zipcode'));
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
        // dd($id);
       $zip= ZipCode::find($id);
        $zip->zipcode= $request->zipcode;
        $zip->save();
        return redirect('/admin/zipCode')->with('message', Alert::_message('success', 'Zip Code Updated Successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $zip= ZipCode::find($id);
        $zip->delete();
        return redirect('/admin/zipCode')->with('message', Alert::_message('success', 'Zip Code Deleted Successfully.'));

    }
}
