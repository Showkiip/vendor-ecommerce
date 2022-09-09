<?php

namespace App\Http\Controllers\Kitchen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KitchenType;

class KichenTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $types = KitchenType::all();
        return view('kitchentype.index', compact('types'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kitchentype.create');
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
            'name' => 'required|max:255',
        ]);
        $type = KitchenType::create($request->all());
        $types = KitchenType::all();
        return redirect()->route('kitchentype.index')->with('status', 'Kitchen Created!');
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
        $type = KitchenType::where('id', $request->kitchen_id)->first();
        return response()->json($type);
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
            'name' => 'required|max:255',
        ]);
        $type =  new KitchenType;
        // $updated_at = Carbon::now();
        // $request->merge(['updated_at' => $updated_at]);
        $type->where('id', $request->id)->update($request->only($type->getFillable()));
           return redirect()->route('kitchentype.index')->with('status', 'Kitchen Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KitchenType::find($id)->delete();
        return back()->with('delete', 'Delete Successfull!');
    }
}
