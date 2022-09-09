<?php

namespace App\Http\Controllers;

use App\Models\Subcribe;
use Illuminate\Http\Request;

class SubcribeController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
  
        $this->validate($request,[
        
            'email' => 'required|email|unique:subcribes,email',
         

          ],[

            
            'email.unique' => 'You already Subscribe !',
            'email.required' => 'Please Enter Email',
         
          ]);


       $subcribe = new Subcribe;
       $subcribe->insert($request->only($subcribe->getFillable()));
       return view('frontend.subcribe');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcribe  $subcribe
     * @return \Illuminate\Http\Response
     */
    public function show(Subcribe $subcribe)
    {
        //
    }
    public function list()
    {
        $subcribes = Subcribe::orderBy('created_at','asc')->get();
        return view('admin.subcribe',compact('subcribes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcribe  $subcribe
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcribe $subcribe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subcribe  $subcribe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcribe $subcribe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcribe  $subcribe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcribe $subcribe)
    {
        //
    }
}
