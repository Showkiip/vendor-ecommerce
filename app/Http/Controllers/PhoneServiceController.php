<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use App\Models\PhoneService;
use App\Models\ProductSerivce;
use Checkout\Models\Payments\Destination;
use Illuminate\Http\Request;

class PhoneServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phoneServices = PhoneService::orderBy('created_at','asc')->get();

        return view('admin.productService.index',compact('phoneServices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.productService.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $image = $request->file('image');
            $new_image = time().$image->getClientOriginalName();
            $destination = 'storage/service/';
            $image->move(public_path($destination),$new_image);

            $phoneService = new PhoneService;
            $phoneService->service_name = $request->service_name;
            $phoneService->image = $new_image;
            $phoneService->save();
            return back()->with('message', Alert::_message('success', 'Phone Service Created Successfully.'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PhoneService  $phoneService
     * @return \Illuminate\Http\Response
     */
    public function show(PhoneService $phoneService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PhoneService  $phoneService
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phoneService = PhoneService::find($id);
        return view('admin.productService.edit',compact('phoneService'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PhoneService  $phoneService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        if($request->hasFile('images'))
        {
        $image = $request->file('image');
        $new_image = time().$image->getClientOriginalName();
        $destination = 'storage/service/';
        $image->move(public_path($destination),$new_image);

        $phoneService = PhoneService::find($id);
        $phoneService->service_name = $request->service_name;
        $phoneService->image = $new_image;
        $phoneService->save();
        return back()->with('message', Alert::_message('success', 'Phone Service Created Successfully.'));
        }
        else
        {
            return back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PhoneService  $phoneService
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PhoneService::where('id',$id)->delete();
        return back()->with('message', Alert::_message('success', 'Phone Service Deleted Successfully.'));
    }
}
