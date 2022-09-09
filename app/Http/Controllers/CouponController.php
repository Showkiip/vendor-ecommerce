<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupon = Coupon::orderBy('created_at','asc')->get();
        return view('admin.coupon.index',compact('coupon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //    dd($request->all());

       $coupon = new Coupon;
        $coupon->insert($request->only($coupon->getFillable()));
        return back()->with('message', Alert::_message('success', 'Coupon Created Successfully.'));

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
         $coupon = Coupon::find($id);
         return view('admin.coupon.edit',compact('coupon'));
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
        $coupon = Coupon::find($id);
        $coupon->update($request->only($coupon->getFillable()));
        return back()->with('message', Alert::_message('success', 'Coupon Updated Successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function coupon(Request $request)
    {
        // dd($request->all());
        $coupon = Coupon::where('code',$request->coupon)
                        ->where('status',1)
                        ->first();

        if(!$coupon)
        {
            $null = "null";
           return response()->json($null);
        }
        else
        {
        // dd($coupon);
        if(Auth::check())
        {
        $userId = Auth::user()->id;
        $condition = new \Darryldecode\Cart\CartCondition(array(
            'name' => $coupon->name,
            'type' => $coupon->type,
            'target' => 'total',
            'value' => $coupon->value,

        ));

         $conditions=\Cart::session($userId)->condition($condition);

          $total = \Cart::session($userId)->getTotal();
        }
        else
        {
            $condition = new \Darryldecode\Cart\CartCondition(array(
                'name' => $coupon->name,
                'type' => $coupon->type,
                'target' => 'total',
                'value' => $coupon->value,

            ));

             $conditions=\Cart::condition($condition);

              $total = \Cart::getTotal();
        }
            // dd($total);
        return response()->json($total);
        }




    }

    public function couponRemove()
    {
        if(Auth::check())
        {
        $userId = Auth::user()->id;
         $collection =\Cart::session($userId)->getConditions();
         foreach($collection as $item)
         {
            // dd($item->getName());
            $remove= \Cart::session($userId)->removeCartCondition($item->getName());
         }


        }
        else
        {
            $collection =\Cart::getConditions();
            foreach($collection as $item)
            {
               // dd($item->getName());
               $remove= \Cart::removeCartCondition($item->getName());
            }

        }
        return response()->json($collection);
    }
}
