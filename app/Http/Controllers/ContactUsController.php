<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Alert;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
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
        // dd($request->all());
        $this->validate($request, [
            'username'     =>  'required',
            'email'  =>  'required|email',
            'phone_number'  =>  'required',
            'order_number'  =>  'required',
            'subject'  =>  'required',
            'message' =>  'required'
           ]);

              $data = array(
                  'username'      =>  $request->username,
                  'email'      =>  $request->email,
                  'phone_number'      =>  $request->phone_number,
                  'order_number'      =>  $request->order_number,
                  'subject'      =>  $request->subject,
                  'message'   =>   $request->message
              );
            //
           \Mail::to('contact@cellcity.us')->send(new SendMail($data));
           return back()->with('message', Alert::_message('success', 'Thanks for contacting us!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function show(ContactUs $contactUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactUs $contactUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactUs $contactUs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactUs $contactUs)
    {
        //
    }
}
