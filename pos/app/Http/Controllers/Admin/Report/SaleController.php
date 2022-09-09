<?php

namespace App\Http\Controllers\Admin\Report;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SaleController extends Controller
{
    public function index()
    {
        
        $sales = Sale::all();
        
        return view('admin.report.sales.sale', compact('sales'));
    }

    public function detail(Request $request)
    {
        $tables = '';

        // $records = DB::select('SELECT products.*,sales.*,product_sale.*
        // FROM sales
        // INNER JOIN product_sale ON sales.id = product_sale.sale_id
        // INNER JOIN products ON product_sale.product_id = products.id
        // WHERE (sales.id = ' . $request->id . ')');

        $records = DB::table('product_sale')
                  ->join('sales','sales.id','=','product_sale.sale_id')
                  ->join('products','products.id','=','product_sale.product_id')
                  ->where('sales.id',$request->id)
                  ->select('*','product_sale.unit_price','product_sale.quantity','product_sale.discount')
                  ->get();

    //   dd($records);
             
        foreach ($records as $record)
         { 
             
                  if( $record->discount>0 )
                    {
                       $discount = round(($record->unit_price*$record->discount)/100);
                       $discount_price= round(($record->unit_price - $discount)*$record->quantity);
                     }
                  else
                 {
                      $discount_price = round(($record->unit_price-$record->discount)*$record->quantity);
                    //   echo 'adasd2';
                 }
                
            $tables .=
                '<tr>'.
                            '<td>' . $record->id . '</td>'.
                           '<td>' . $record->name . '</td>'.
                           '<td>' . $record->quantity . '</td>'.
                            '<td>' . $record->Return_quantity . '</td>'.
                            '<td>' . $discount_price . '</td>'.
                            '<td>' . $record->discount . '</td>'.
                '</tr>';
       
         }
         return response()->json($tables);
        //   dd('asdasd');
    }

    public function daySales()
    {

        $daysales =Sale::whereDate('created_at', Carbon::today())->get();
        $totalday = Sale::whereBetween('created_at', [Carbon::now()->startOfday(), Carbon::now()->endOfday()])->sum('grand_total');
        $totalchangeday = Sale::whereBetween('created_at', [Carbon::now()->startOfday(), Carbon::now()->endOfday()])->sum('change');
        $totalreceiveday = Sale::whereBetween('created_at', [Carbon::now()->startOfday(), Carbon::now()->endOfday()])->sum('receive');
        $return_amount = Sale::whereBetween('created_at', [Carbon::now()->startOfday(), Carbon::now()->endOfday()])->sum('return_amount');
        return response()->json(['daysales'=>$daysales,'totalday'=>$totalday,'totalchangeday'=>$totalchangeday,'totalreceiveday'=>$totalreceiveday,'return_amount'=>$return_amount]);

    }

    public function weekSales()
    {
        $weeksales = Sale::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $totalweek = Sale::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('grand_total');
        $totalchangeweek = Sale::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('change');
        $totalreceiveweek =  Sale::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('receive');
        $return_amount = Sale::whereBetween('created_at', [Carbon::now()->startOfday(), Carbon::now()->endOfday()])->sum('return_amount');
        return response()->json(['weeksales'=>$weeksales,'totalweek'=>$totalweek,'totalchangeweek'=>$totalchangeweek,'totalreceiveweek'=>$totalreceiveweek,'return_amount'=>$return_amount]);


    }

    public function monthSales()
    {
        $monthsales = Sale::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->get();
        $totalmonth = Sale::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->sum('grand_total');
        $totalchangemonth = Sale::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->sum('change');
        $totalreceivemonth = Sale::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->sum('receive');
        $return_amount = Sale::whereBetween('created_at', [Carbon::now()->startOfday(), Carbon::now()->endOfday()])->sum('return_amount');
        // dd($monthsales);
        return response()->json(['monthsales'=>$monthsales,'totalmonth'=>$totalmonth,'totalchangemonth'=>$totalchangemonth,'totalreceivemonth'=>$totalreceivemonth,'return_amount'=>$return_amount]);

    }
}
