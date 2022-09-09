<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use App\Models\Alert;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
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

    }

    public function wishlist($id)
    {

        $product = Product::find($id);
        $wishlist =  new Wishlist;
        $wishlist->product_id = $product->id;
        $wishlist->user_id = Auth::user()->id;
        $wishlist->category = $product->category;
        $wishlist->status   = 1;
        $wishlist->save();

        return response()->json($wishlist);

    }


    public function delete($id)
    {
        $wishlist =  Wishlist::find($id)->delete();
        return back()->with('message', Alert::_message('success', 'Wishlist Delete Successfully.'));
    }

    public function undoWishlist($id)
    {
          Wishlist::where('user_id',Auth::user()->id)->where('product_id',$id)->delete();

          return response()->json();
    }

    public function accessoryWishlist($id)
    {

        $accessory = Accessory::find($id);
        $wishlist =  new Wishlist;
        $wishlist->accessory_id = $accessory->id;
        $wishlist->user_id = Auth::user()->id;
        $wishlist->category = 'accessory';
        $wishlist->status   = 1;
        $wishlist->save();

        return response()->json($wishlist);

    }
    public function undoAccessoryWishlist($id)
    {
          Wishlist::where('user_id',Auth::user()->id)->where('accessory_id',$id)->delete();

          return response()->json();
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
        //
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
        //
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
}
