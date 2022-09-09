<?php

namespace App\Http\Controllers\Admin\Report;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class StockController extends Controller
{
    public function index()
    {
        $tables = null;
        $records = Product::all();
        // dd($records);
        return view('admin.report.stock', compact('records'));
    }

    public function dailyStock()
    {
        $daystock =Product::whereDate('created_at', Carbon::today())->get();
        $totaldaystock = Product::whereBetween('created_at', [Carbon::now()->startOfday(), Carbon::now()->endOfday()])->sum('price');
        $totaldiscountday = Product::whereBetween('created_at', [Carbon::now()->startOfday(), Carbon::now()->endOfday()])->sum('discount');

        // dd($daystock);
        return response()->json(['daystock'=>$daystock,'totaldaystock'=>$totaldaystock,'totaldiscountday'=>$totaldiscountday]);


    }
    public function weeklyStock()
    {
        $weekstock = Product::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $totalstock = Product::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('price');
        $totalchangestock = Product::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('discount');
        return response()->json(['weekstock'=>$weekstock,'totalstock'=>$totalstock,'totalchangestock'=>$totalchangestock]);


    }
    public function monthlyStock()
    {
        $monthstock = Product::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->get();
        $totalstock = Product::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->sum('price');
        $totalchangestock = Product::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->sum('discount');

        return response()->json(['monthstock'=>$monthstock,'totalstock'=>$totalstock,'totalchangestock'=>$totalchangestock]);

    }
}
