<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tech;
use App\Models\ShippingAddr;
use App\Models\Brand;
use App\Models\Pmodel;
use App\Models\RepairType;
use App\Models\ZipCode;
use App\Models\RepairOrder;
use App\Models\RepairOrderType;
use App\Models\Admin;
use App\Models\Alert;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands= Brand::orderBy('id','desc')->get();
        return view('admin.brand-list',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.add-brand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('brand_image');
        $imageName= time().$image->getClientOriginalName();
        $destination ='storage/images/brand';
        $image->move(public_path($destination), $imageName);

        $brand= New Brand;
        $brand->brand_name= $request->brand_name;
        $brand->brand_image= $imageName;
        // $brand->adminId= Auth::guard('admin')->user()->id;
        $brand->save();
        return redirect('/admin/brands')->with('message', Alert::_message('success', 'Mobile Brand Added Successfully.'));
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
        $brand = Brand::find($id);

        return view('admin.edit-brand',compact('brand'));
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
        $brand= Brand::find($id);
        $brand->brand_name= $request->brand_name;

        if($request->file('brand_image')){
            $image = $request->file('brand_image');
            $imageName= time().$image->getClientOriginalName();
            $destination ='storage/images/brand';
            $image->move(public_path($destination), $imageName);
            $brand->brand_image= $imageName;

        }
       
        $brand->save();
         return redirect('/admin/brands')->with('message', Alert::_message('success', 'Mobile Brand Update Successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $brand= Brand::find($id);
       $brand->delete();
       return redirect('/admin/brands')->with('message', Alert::_message('success', 'Mobile Brand Delete Successfully.'));
    }
}
