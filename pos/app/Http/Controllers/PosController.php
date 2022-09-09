<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Draft;
use App\Models\Product;
use Barryvdh\DomPDF\Facade as PDF;
use Darryldecode\Cart\Cart;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Darryldecode\Cart\CartCollection;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\ImagickEscposImage;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

class PosController extends Controller
{
    public function add(Request $request)
    {
        // dd($request->product);
        if ($request->has('barcode')) {
              
                $var =$request->barcode;
            $var = $var/100000000;
            $var = (int)$var;
            $location =  strpos($var,"0");
            if($location < 4){
            $var = $var%10000000;
            $var =(int)$var/100;
            $barcode = str_replace(".","",$var);
            }
              $var =$request->barcode;

                $var = $var%100000000000;

                $var = (string)$var;

                $location =  strpos($var,"0");

                if($location < 4){
                $var = $var%10000000;
                $var = $var/10;

                $vars= (int)$var/100;

        }

            $product = Product::where('barcode', $barcode)->first();
            if ($product)
                \Cart::add(array(
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' =>  $vars,
                    'quantity' => 1,
                    'discount' => $product->discount,
                ));
            else
                return response()->json('no');
        } else {
            $product = Product::where('id', $request->product)->first();
            // dd($product->id);
            \Cart::add(array(
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'discount' => $product->discount,
            ));
        }
        return response()->json('add');
        // $value = $request->session()->get('key', function () {
        //     return 'default';
        // });
        // dd($request->product['id']);
    }

    public function remove(Request $request)
    {
        \Cart::remove($request->id);
        return response()->json();
    }
    public function update(Request $request)
    {
        // dd($request->all());
        if ($request->quantity == 0) {
            \Cart::remove($request->id);
        }
        \Cart::update(
            $request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
            )
        );
        return response()->json();
    }

    public function clear()
    {
        \Cart::clear();
        return response()->json();
    }

    public function draft(Request $request)
    {
        $draft = new Draft;
        $id = Auth::id();
        $created_at = Carbon::now();
        $total = 0;
        $cartCollection = \Cart::getContent();
        $data = $cartCollection->all();
        // dd($cartCollection->all());
        // $request->merge(['id' => $id, 'created_at' => $created_at, 'products'=> $cartCollection]);
        foreach ($data as $item)
            $total = $total + ($item->price - ($item->price * $item->discount) / 100) * $item->quantity;
        $request->merge(['user_id' => $id, 'total' => $total, 'created_at' => $created_at, 'products' => $data]);
        // dd(gettype($request->user_id));
        $data =  $draft->insert([
            'user_id' => Auth::id(),
            'grand_total' => $request->total,
            'created_at' => $request->created_at,
            'products' => json_encode(
                $request->products
            ),
        ]);
        \Cart::clear();
        return response()->json($data);
    }

    public function draftshow()
    {
        // $draft = Draft::where('user_id', Auth::id())->get();
        $draft = Draft::all();
        // dd($draft);
        $i = 1;
        $temp = null;
        foreach ($draft as $dra)

            $temp .= '
                            <div class="col-lg-4">
                                <div class="pos-order">
                                    <h3 class="pos-order-title" id="iddraft">Order ' . $i++ . '</h3>
                                        <div class="orderdetail-pos">
                                            <p><strong>Date:   </strong>' . $dra->created_at . '</p>
                                            <p><strong>Grand Total:   </strong>' . $dra->grand_total . '</p>

                                                <div class="d-flex justify-content-end">
                                                    <a  onclick="draftedit(' . $dra->id . ')" class="confirm-edit ml-3" title="Edit"><i
                                                        class="fas fa-edit"></i></a>
                                                    <a onclick="draftdlt(' . $dra->id . ')" class="confirm-delete ml-3" title="Delete"><i
                                                        class="fas fa-trash-alt"></i></a>
                                                </div>

                                        </div>
                                </div>
                            </div>
                        ';

        return response()->json($temp);
    }

    public function draftdelete(Request $request)
    {
        // dd($request->id);
       $dlt = Draft::find($request->id)->delete();
        return response()->json($dlt);
    }

    public function draftEdit(Request $request)
    {
        \Cart::clear();
        $draft = Draft::where('id',$request->id)->get();
        ($draft);
        foreach ($draft as $dra)
            $out = json_decode($dra->products);
        foreach ($out as $product) // dd($ot->id);
            \Cart::add(array(
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $product->quantity,
                'discount' => $product->discount,
            ));
        $dra->delete();
        return response()->json('add');
    }

    public function checkout(Request $request)
    {

        // $product = Product::all();
        session(['receive' => $request->receive]);

        // session(['receive_amount',$request->receive]);
        $cartCollection = \Cart::getContent();

        $sale = new Sale;
        $id = Auth::id();
        $created_at = Carbon::now();
        $total = 0;
        $data = $cartCollection->all();
        foreach ($data as $item) {
            $total = $total + ($item->price - ($item->price * $item->discount) / 100) * $item->quantity;
           //decrement product quantity from product tables
            $product = Product::find($item->id);
             if($item->quantity <= $product->quantity)
             {
               $product->decrement('quantity', $item->quantity);
             }
             else
             {
                return response()->json(' Enough Quantity of:' . $product->name);
             }

        }
        $request->merge(['user_id' => $id, 'total' => $total, 'created_at' => $created_at, 'products' => $data]);
        // dd(gettype($request->user_id));
        $id = $sale->create([
            'user_id' => Auth::id(),
            'grand_total' => $request->total,
            'receive' => $request->receive,
            'change' => $request->receive - $request->total,
            'created_at' => $request->created_at,
        ]);


        $customKey = "Arooma-" . $id->id;
        Sale::where('id', $id->id)->update(['sale_id' => $customKey]);
        $sale = Sale::find($id->id);
      
        foreach ($cartCollection as $cart) {
            $pro_id = $cart->id;
            $pro_qty = $cart->quantity;
            $pro_price = $cart->price;
            $pro_discount = $cart->discount;
            $sale->products()->attach($pro_id, ['quantity' => $pro_qty,'unit_price'=>$pro_price,'discount'=>$pro_discount]);
        }

        // \Cart::clear();
    }

    public function returncart(Request $request)
    {

        $sale = Sale::where('sale_id', $request->id)->first();
        // dd($sale);
        if (empty($sale)) {
            // dd($sale);
            \Cart::clear();
            return response()->json("ID Not Matched");
        }
        else {
            // dd($sale);
            $total = 0;
            $i = 0;
            $cartCollection = \Cart::getContent();

            foreach ($cartCollection as $cart) {

                $count = DB::table('product_sale')->where(['sale_id' => $sale->id, 'product_id' => $cart->id])->get();
                // dd($count);
                foreach ($count as $c)
                    //   dd($c->quantity);
                    if ($c->quantity >= $cart->quantity && $c->Return_quantity != $c->quantity) {


                      DB::table('product_sale')->where(['sale_id' => $sale->id, 'product_id' => $cart->id])->increment('Return_quantity' , $cart->quantity);

                   $product = Product::find($cart->id);

                          if($c->quantity <= $product->quantity)
                              {
                               $product->increment('quantity',$cart->quantity);
                            }
                            else
                            {
                                return response()->json(' Enough Quantity of:' . $product->name);
                            }

                       //increment quantity in product table
                        $total = $total + ($cart->price - ($cart->price * $cart->discount) / 100) *
                            $cart->quantity;


                            //   dd($product);
                            //   $product->increment('quantity', $cart->quantity);



                        \Cart::remove($cart->id);
                        Sale::where('id', $sale->id)->update(['return_amount' => $total, 'return_date' => Carbon::now()]);



                        \Cart::clear();
                        // $product = Product::where('id', $cart->id)->first();
                        // if ($product) {
                        //     \Cart::add(array(
                        //         'id' => $product->id,
                        //         'name' => $product->name,
                        //         'price' => $product->price,
                        //         'quantity' => 1,
                        //         'discount' => $product->discount,
                        //     ));
                        // } else
                        //     return response()->json('no1');
                    } else {
                        return response()->json('QuantityMissMatch');
                    }
            }
            return response()->json('Return Amount : ' . $total);

            // if ($request->has('barcode')) {

            // }


        }
    }

    public function generateReceipt(){

        $cartCollection = \Cart::getContent();
       
        $data = $cartCollection->all();
        //  dd($data);
         $created_at = Carbon::now();
        return view('receipt', compact('cartCollection','created_at'));
    }
    public function printReceipt(){

        $cartCollection = \Cart::getContent();
        
         $created_at = Carbon::now();
        $data = ['cartCollection' => $cartCollection,'created_at'=>$created_at];
        $pdf = PDF::loadView('receipt-pdf', $data);
        \Cart::clear();
            return $pdf->setPaper( array(20 , 0 , 220 , 600 ))->stream("invoice.pdf");

    }
}
