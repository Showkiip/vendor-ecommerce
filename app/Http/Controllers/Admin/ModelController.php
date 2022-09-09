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
use App\Models\Product;

class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $models= Pmodel::orderBy('id','desc')->get();
        return view('admin.model-list',compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-model');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $model= New Pmodel;
        $model->brand_Id= $request->brand_Id;
        $model->model_name= $request->model_name;
        // $model->adminId= Auth::guard('admin')->user()->id;
        $model->save();
        return redirect('/admin/models')->with('message', Alert::_message('success', 'Model Added Successfully.'));
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
        $model = Pmodel::find($id);

        return view('admin.edit-model',compact('model'));
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
        $model = Pmodel::find($id);
        $model->brand_Id= $request->brand_Id;
        $model->model_name= $request->model_name;
         $model->save();
        return redirect('/admin/models')->with('message', Alert::_message('success', 'Model Update Successfully.'));
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
        $model = Pmodel::find($id);
        $model->delete();
        Product::where('model_id',$model->id)->delete();
         return redirect('/admin/models')->with('message', Alert::_message('success', 'Model Delete Successfully.'));
    }
}
