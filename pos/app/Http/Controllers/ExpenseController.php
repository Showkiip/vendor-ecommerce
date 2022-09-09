<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Expensetype;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $extypes = Expensetype::all();
        return view('admin.expense.create', compact('extypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required|string|unique:expensetypes'

        ]);
        $extype = new Expensetype;
        $extype->insert($request->only($extype->getFillable()));
        return back()->with('status', 'Expensetype Created!');
    }
    public function destroy($id)
    {
        
        $expenselist = Expense::where('expensetype_id',$id)->delete();
        Expensetype::find($id)->delete();
        return back()->with('delete', 'Expensetype deleted!');;
    }

    public function editing(Request $request)
    {
        $expense = Expensetype::where('id', $request->id)->first();
        // dd($expense);
        return response()->json($expense);
    }

    public function updated(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $expense =  new Expensetype;
        $expense->where('id', $request->id)->update($request->only($expense->getFillable()));
        return back()->with('status', 'Expensetype Updated!');
    }

}
