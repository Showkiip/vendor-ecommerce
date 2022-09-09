<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReturnListController extends Controller
{
    public function saleReturn()
    {
        $sales = Sale::where('Return_amount', '!=', 0)->get();
        return view('admin.sale', compact('sales'));
    }

    public function returnDetail(Request $request)
    {
        $tables = null;
        $records = DB::select('SELECT products.*,sales.*,product_sale.*
                    FROM sales INNER JOIN
                         product_sale ON sales.id = product_sale.sale_id INNER JOIN
                         products ON product_sale.product_id = products.id
                     WHERE(sales.id = ' . $request->id . ' AND product_sale.Return_quantity IS NOT NULL)');
        // dd($records);
        foreach ($records as $record)
            $tables .=
                '<tr>
                            <td>' . $record->name . '</td>
                            <td>' . $record->quantity . '</td>
                            <td>' . $record->Return_quantity . '</td>
                            <td>' . $record->unit_price . '</td>
                            <td>' . $record->discount . '</td>
                         
                            <td>' . $record->return_date . '</td>
                        </tr>
                    ';
        // <tr>
        //     <td colspan="4">
        //         <strong>Total:</strong>
        //     </td>
        //     <td>3000</td>
        //     <td>0</td>
        //     <td>23000</td>
        // </tr>
        // <tr>
        //     <td colspan="6">
        //         <strong>Order Tax:</strong>
        //     </td>
        //     <td>0(0%)</td>
        // </tr>
        // <tr>
        //     <td colspan="6"><strong>Order Discount:</strong></td>
        //     <td>0</td>
        // </tr>
        // <tr>
        //     <td colspan="6">
        //         <strong>Shipping Cost:</strong>
        //     </td>
        //     <td>0</td>
        // </tr>
        // <tr>
        //     <td colspan="6">
        //         <strong>Grand Total:</strong>
        //     </td>
        //     <td>23000</td>
        // </tr>
        return response()->json($tables);

        // $returns = DB::table('product_sale')->where('sale_id', $request->id)->where('Return_quantity', '!=', '')->get();
        // $sale = Sale::find($request->id);
        // foreach ($returns as $return)
        // $products[] = Product::find($return->product_id);
        // return response()->json(['sale' => $sale, 'return' => $returns, 'product' => $products]);
    }


    public function daySalesReturn()
    {

        $daysales =Sale::whereDate('return_date', Carbon::today())->get();
        $totalday = Sale::whereBetween('return_date', [Carbon::now()->startOfday(), Carbon::now()->endOfday()])->sum('grand_total');
        $totalchangeday = Sale::whereBetween('return_date', [Carbon::now()->startOfday(), Carbon::now()->endOfday()])->sum('return_amount');
        return response()->json(['daysales'=>$daysales,'totalday'=>$totalday,'totalchangeday'=>$totalchangeday]);

    }

    public function weekSalesReturn()
    {
        $weeksales = Sale::whereBetween('return_date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $totalweek = Sale::whereBetween('return_date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('grand_total');
        $totalchangeweek = Sale::whereBetween('return_date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('return_amount');
        return response()->json(['weeksales'=>$weeksales,'totalweek'=>$totalweek,'totalchangeweek'=>$totalchangeweek]);
      

    }

    public function monthSalesReturn()
    {
        $monthsales = Sale::whereMonth('return_date', date('m'))->whereYear('created_at', date('Y'))->get();
        $totalmonth = Sale::whereMonth('return_date', date('m'))->whereYear('created_at', date('Y'))->sum('grand_total');
        $totalchangemonth = Sale::whereMonth('return_date', date('m'))->whereYear('created_at', date('Y'))->sum('return_amount');

        return response()->json(['monthsales'=>$monthsales,'totalmonth'=>$totalmonth,'totalchangemonth'=>$totalchangemonth]);
       
    }
}
