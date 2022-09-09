<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Expensetype;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ExpenseListController extends Controller
{
    public function index()
    {
        $exps = Expensetype::all();
        $expenses = Expense::with('expensetype')->get();


        // dd($expenses);
        return view('admin.expense.list', compact('exps', 'expenses'));
    }

    public function store(Request $request)
    {
        $request->validate([
          'amount' => 'required|numeric',
          'description' => 'required|string'
        ]);
        $created_at = Carbon::now();
        $request->merge(['user_id' => Auth::id(), 'created_at' => $created_at]);
        $extype = new Expense;
        $extype->insert($request->only($extype->getFillable()));
        return back()->with('status', 'Expense Created!');
    }

    public function edit(Request $request)
    {
        $data = Expense::find($request->id);
        return response()->json($data);
    }

    public function delete(Request $request)
    {
        Expense::find($request->id)->delete();
        return back()->with('delete','Deleted Successfully');
    }

    public function update(Request $request)
    {
        $updated_at = Carbon::now();
        $request->merge(['user_id' => Auth::id(), 'created_at' => $updated_at]);
        $extype = new Expense;
        $extype->where('id', $request->id)->update($request->only($extype->getFillable()));
        return back()->with('status', 'Expense Updated!');
    }
    public function expense()
    {
        $exps = Expensetype::all();
        $expenses = Expense::with('expensetype')->get();
        return view('admin.report.expense.expense', compact('exps', 'expenses'));
    }


    public function dailyExpense()
    {

        $dayexpense =Expense::whereDate('created_at', Carbon::today())->with('expensetype')->get();
        $totalexpense = Expense::whereBetween('created_at', [Carbon::now()->startOfday(), Carbon::now()->endOfday()])->sum('amount');
        return response()->json(['dayexpense'=>$dayexpense,'totalexpense'=>$totalexpense]);

    }

    public function weeklyExpense()
    {
        $weekexpense = Expense::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->with('expensetype')->get();
        $totalexpense = Expense::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('amount');
        return response()->json(['weekexpense'=>$weekexpense,'totalexpense'=>$totalexpense]);


    }

    public function monthlyExpense()
    {
        $monthexpense = Expense::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->with('expensetype')->get();
        $totalexpense = Expense::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->sum('amount');

        return response()->json(['monthexpense'=>$monthexpense,'totalexpense'=>$totalexpense]);

    }
}

