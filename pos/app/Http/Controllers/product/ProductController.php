<?php

namespace App\Http\Controllers\product;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('product.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }
   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|string|min:0',
            'category_id' => 'required|numeric|exists:categories,id',
            'barcode' => 'required|numeric',
            'dicount' => 'numeric'
        ]);
        
        $product =  new Product;
        $created_at = Carbon::now();
        if($request->has('barcode'))
        {
            $var =$request->barcode;
            $var = $var/100000000;
            $var = (int)$var;
            $location =  strpos($var,"0");
            if($location < 4){
            $var = $var%10000000;
            $var =(int)$var/100;
            $barcode = str_replace(".","",$var);
            }
        }
        
        $request->merge(['active' => 1, 'created_at' => $created_at,'barcode'=>$barcode]);
        $product->insert($request->only($product->getFillable()));
        $products = Product::all();
        return view('product.index', compact('products'))->with('status', 'Product Created!');
    }
     public function show()
    {
        
    }
    public function editing(Request $request)
    {
        $user = Product::with('category')->where('id', $request->user_id)->first();
        return response()->json($user);
    }
    public function updated(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|string|min:0',
            'category_id' => 'required|numeric|exists:categories,id',
            'discount' => 'string|min:0',
        ]);
         if($request->has('barcode'))
        {
            $var =$request->barcode;
            $var = $var/100000000;
            $var = (int)$var;
            $location =  strpos($var,"0");
            if($location < 4){
            $var = $var%10000000;
            $var =(int)$var/100;
            $barcode = str_replace(".","",$var);
            }
        }
        $product =  new Product;
        $updated_at = Carbon::now();
        $request->merge(['updated_at' => $updated_at,'barcode'=>$barcode]);
        $product->where('id', $request->id)->update($request->only($product->getFillable()));
        return back()->with('status', 'Product Updated!');
    }
    public function destroy($id)
    {
        Product::find($id)->delete();

        return redirect()->back()->with('delete', 'Product Deleted!');
    }
    public function inventory(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|string|min:1',
        ]);
        $product =  new Product;
        $product->find($id)->update($request->only($product->getFillable()));
        return back()->with('status', 'Inventory Updated!');
    }

    public function subcategory(Request $request)
    {
        // dd($request->all());
        $parent_id = $request->cat_id;

        $subcategories =Product::where('category_id', $parent_id)->get();

                            // dd($subcategories);
                              $temp = null;

                              foreach ($subcategories as $dra)
                              {
                                //   dd($dra);

                                $temp .= '
                                <div class="col-xl-4 col-lg-2 col-md-3 col-sm-4 col-6" style="cursor: pointer"
                                onclick="addToCart(' . $dra->id. ')">
                                    <div class="productCard">
                                        <div class="productThumb" style="background-color: #f8f1cd; padding: 5px 10px">
                                            <span style="font-weight: bold">' .$dra->name.'</span>
                                        </div>
                                    </div>
                                </div>
                                ';

                            }

      return response()->json($temp);

    }
}
