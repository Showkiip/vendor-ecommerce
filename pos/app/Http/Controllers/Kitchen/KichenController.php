<?php

namespace App\Http\Controllers\Kitchen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DB;
use App\Models\KitchenType;
use App\Models\Kitchen;

class KichenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = DB::table('kitchens')
            ->join('kitchen_types', 'kitchens.type_id', '=', 'kitchen_types.id')
            ->select('kitchens.*', 'kitchen_types.name as kitchentype')
            ->get();
         foreach($types as $type){
             $type->quantity = explode("|", $type->quantity);
        }
       // dd($types);
       // $types= Kitchen::with('kitchentype')->get();
       // print_r($types);
        // //$types = Kitchen::all();
       return view('kitchen.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = KitchenType::all();
        return view('kitchen.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //var_dump($request->unit.''.$request->quantity) ;

        $request->validate([
            'name' => 'required|max:255',
            'quantity' => 'required|string|min:0',
            'type_id' => 'required|numeric|exists:kitchen_types,id',
        ]);
        $created_at = Carbon::now();
        $quantity = ($request->unit.'|'.$request->quantity);
        $request->merge(['created_at' => $created_at]);
        $request->merge(['quantity' => $quantity]);
        $type = Kitchen::create($request->all());
        $types= Kitchen::all();
        return redirect()->route('kitchen.index')->with('status', 'Kitchen Created!');
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
        $type = Kitchen::where('id', $request->kitchen_id)->first();
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
            'quantity' => 'required|string|min:0',
            //'type_id' => 'required|numeric|exists:kitchen_types,id',
        ]);
        $type =  new Kitchen;
        $updated_at = Carbon::now();
        $quantity = ($request->unit.'|'.$request->quantity);
        $request->merge(['$updated_at' => $updated_at]);
        $request->merge(['quantity' => $quantity]);
        $type->where('id', $request->id)->update($request->only($type->getFillable()));
        return redirect()->route('kitchen.index')->with('status', 'Kitchen Created!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kitchen::find($id)->delete();
        return back()->with('status', 'Delete Successfull!');
    }
}
