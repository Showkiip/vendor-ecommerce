<?php

namespace App\Http\Controllers\inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\RawInventory;
class RawInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rawin = RawInventory::all();
        foreach($rawin as $raw){
            $raw->quantity = explode("|", $raw->quantity);
       }
        return view('inventory.index', compact('rawin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rawin = RawInventory::all();
        return view('inventory.create', compact('rawin'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'item' => 'required|max:255',
            'quantity' => 'required|string|min:0',
        ]);
        $created_at = Carbon::now();
         $raw = new RawInventory;
        $quantity = ($request->unit.'|'.$request->quantity);
        $request->merge(['created_at' => $created_at]);
        $request->merge(['quantity' => $quantity]);
        $raw->create($request->only($raw->getFillable()));
        $rawin = RawInventory::all();
        return view('inventory.index', compact('rawin'))->with('status', 'Inventory Created!');
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
    public function editing(Request $request)
    {
       
        $rawin = RawInventory::where('id', $request->item_id)->first();
        
        
         
        return response()->json($rawin);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updated(Request $request)
    {
        $request->validate([
            'item' => 'required|max:255',
            'quantity' => 'required|string|min:0',
            //'type_id' => 'required|numeric|exists:kitchen_types,id',
        ]);
        $created_at = Carbon::now();
        $raw =  new RawInventory;
        $quantity = ($request->unit.'|'.$request->quantity);
        $request->merge(['created_at' => $created_at]);
        $request->merge(['quantity' => $quantity]);
        $raw->where('id', $request->id)->update($request->only($raw->getFillable()));
        return back()->with('status', 'Inventory Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RawInventory::find($id)->delete();
        return back()->with('status', 'Delete Successfull!');
    }
}
