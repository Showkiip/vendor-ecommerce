<?php

namespace App\Http\Controllers\Admin;

use App\Facade\CityClass;
use App\Models\Product;
use App\Models\Brand;
use App\Models\ProductCondition;
use App\Models\Pmodel;
use App\Models\ProductColor;
use App\Models\ProductStorage;

use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\TechMail;
use App\Mail\productMail;
use App\Models\Accessory;
use App\Models\AccessoryImage;

use App\Models\Alert;
use App\Models\Order;
use App\Models\OrderSale;
use App\Models\PhoneSerivceProduct;

use App\Models\Wishlist;
use Darryldecode\Cart\Cart;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;
use Twilio\Rest\Client;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products =Product::orderBy('id','desc')->get();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    public function getModels($id)
    {

         $brand= Brand::find($id);
        //  dd($brand);
         $pmodels = Pmodel::where('brand_Id',$brand->id)->get();

         return view('admin.products.getModel',compact('pmodels','brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // dd($request->file('image')[0]->getSize()/1024);
        if($request->file('image')){
            foreach ($request->file('image') as $key => $img) {
            $data = $img->getSize()/1024;
            // dd(intval($data));
            if(intval($data) > 5000){
                return back()->with('message2', Alert::_message('danger', 'Sorry! Maximum allowed size for an image is 5MB'));
            }
         }
        }


        //try {
        $product = new Product;
        //  $product->insert($request->only($product->getFillable()));

        //  $product->category = $request->category;
         $product->type = $request->type;
         $product->memory = $request->memory;
         $product->locked = $request->locked;
         $product->warranty = $request->warranty;
         $product->desc = $request->desc;
         $product->screen_size = $request->screen_size;
         $product->megapixel = $request->megapixel;
         $product->OS = $request->OS;
         $product->resolution = $request->resolution;
         $product->screen_type = $request->screen_type;
         $product->network = $request->network;
         $product->sim_card_format = $request->sim_card_format;
         $product->double_sim = $request->double_sim;
         $product->release_year = $request->release_year;
         $product->model_id = $request->model_id;
        //  dd($product);
        $product->save();


        $service = $request->phone_service;
        if($service){
            foreach($service as $serve)
            {
                $phoneService = new PhoneSerivceProduct;
                $phoneService->phone_service_id = $serve;
                $phoneService->product_id =  $product->id;
                $phoneService->save();

            }
        }

if ($request->color_name[0] != null) {


        foreach($request->color_name as $key=> $colors)
        {

            $color = new ProductColor;
            $color->color_name = $colors;
            $color->product_id = $product->id;
            $color->save();

            foreach($request->storage[$key] as $key2=>$storages)
            {

                $storage = new ProductStorage;
                $storage->storage = $storages;
                $storage->color_id = $color->id;
                $storage->save();


            foreach($request->price[$key2] as $key3=>$price)
            {
                //  dd($request->condition[$key2][$key3]);
                $condition = new ProductCondition;
                if($request->condition[0][0] != '0'){
                  $condition->condition = $request->condition[$key2][$key3];
                }

                $condition->price = $price;
                $condition->orig_price = $request->orig_price[$key2][$key3];
                $condition->quantity = $request->quantity[$key2][$key3];
                $condition->storage_id = $storage->id;
                $condition->save();
            }
        }
if($request->file('image')){
           foreach($request->file('image') as $image)
            {

                $imageName= time().$image->getClientOriginalName();
                $destination ='storage/images/products';
                $image->move(public_path($destination), $imageName);

                // dd($imageName);
                $imagefile = new ProductImage;
                $imagefile->image = $imageName;
                $imagefile->product_id = $product->id;
                $imagefile->color_id = $color->id;
                $imagefile->save();

        }
}
        }

        }



        //     DB::commit();

        // } catch (\Exception $e) {
        //     DB::rollback();
        //     return back()->with('message', Alert::_message('success', 'somthing wrong.'));
        // }

        return back()->with('message', Alert::_message('success', 'Product Created Successfully.'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
         $images = ProductImage::where('product_id',$product->id)->get();
        //  dd($product);
        return view('admin.products.edit',compact('product','images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $product = Product::find($id);
        //  $product->category = $request->category;
         $product->type = $request->type;
         $product->memory = $request->memory;
         $product->locked = $request->locked;
         $product->warranty = $request->warranty;
         $product->desc = $request->desc;
         $product->screen_size = $request->screen_size;
         $product->megapixel = $request->megapixel;
         $product->OS = $request->OS;
         $product->resolution = $request->resolution;
         $product->screen_type = $request->screen_type;
         $product->network = $request->network;
         $product->sim_card_format = $request->sim_card_format;
         $product->double_sim = $request->double_sim;
         $product->release_year = $request->release_year;
         $product->model_id = $request->model_Id;
         $product->update();


         $servi = $request->phone_service;
         $product->service()->sync($servi);

        return back()->with('message', Alert::_message('success', 'Product Updated Successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Product::find($id)->delete();
        return back()->with('message', Alert::_message('success', 'Product Deleted Successfully.'));


    }
//Store Product Ajax
  public function storeProduct(Request $request)
    {


        //         DB::beginTransaction();
        // dd($request->all());
        // try {
            $product = new Product;
            //  $product->insert($request->only($product->getFillable()));

            // $product->category = $request->category;
            $product->type = $request->type;
            $product->memory = $request->memory;
            $product->locked = $request->locked;
            $product->warranty = $request->warranty;
            $product->desc = $request->desc;
            $product->screen_size = $request->screen_size;
            $product->megapixel = $request->megapixel;
            $product->OS = $request->OS;
            $product->resolution = $request->resolution;
            $product->screen_type = $request->screen_type;
            $product->network = $request->network;
            $product->sim_card_format = $request->sim_card_format;
            $product->double_sim = $request->double_sim;
            $product->release_year = $request->release_year;
            $product->model_id = $request->model_id;
            //  dd($product);
            $product->save();



            foreach($request->color_name as $key=> $colors)
            {

                $color = new ProductColor;
                $color->color_name = $colors;
                $color->product_id = $product->id;
                $color->save();

                foreach($request->storage[$key] as $key2=>$storages)
                {

                    $storage = new ProductStorage;
                    $storage->storage = $storages;
                    $storage->color_id = $color->id;
                    $storage->save();


                 foreach($request->condition[$key2] as $key3=>$condit)
                 {
                    //  dd($condition);
                    $condition = new ProductCondition;
                    $condition->condition =$condit;
                    $condition->price = $request->price[$key2][$key3];
                    $condition->orig_price = $request->orig_price[$key2][$key3];
                    $condition->quantity = $request->quantity[$key2][$key3];
                    $condition->storage_id = $storage->id;
                    $condition->save();
                 }
                }



             foreach($request->file('image')[$key] as $image)
                {

                    $imageName= time().$image->getClientOriginalName();
                    $destination ='storage/images/products';
                    $image->move(public_path($destination), $imageName);

                    // dd($imageName);
                    $imagefile = new ProductImage;
                    $imagefile->image = $imageName;
                    $imagefile->product_id = $product->id;
                    $imagefile->color_id = $color->id;
                    $imagefile->save();
                    // dd($request->condition);




                }


            }


        //     DB::commit();

        // } catch (\Exception $e) {
        //     DB::rollback();
        //     return back()->with('message', Alert::_message('success', 'somthing wrong.'));
        // }

    return response()->json($product);
  }

    public function storeMoreProduct(Request $request)
    {


           $product_id = $request->product_id;
        //    dd($product_id);

        foreach($request->color_name as $key=> $colors)
        {

            $color = new ProductColor;
            $color->color_name = $colors;
            $color->product_id = $product_id;
            $color->save();

            foreach($request->storage[$key] as $key2=>$storages)
            {

                $storage = new ProductStorage;
                $storage->storage = $storages;
                $storage->color_id = $color->id;
                $storage->save();


            foreach($request->price[$key2] as $key3=>$price)
            {
                 // dd($request->condition[0][0]);
                $condition = new ProductCondition;
                if($request->condition[0][0] != '0'){
                  $condition->condition = $request->condition[$key2][$key3];
                }

                $condition->price = $price;
                $condition->orig_price = $request->orig_price[$key2][$key3];
                $condition->quantity = $request->quantity[$key2][$key3];
                $condition->storage_id = $storage->id;
                $condition->save();
            }
        }

         foreach($request->file('image')[$key] as $image)
            {

                $imageName= time().$image->getClientOriginalName();
                $destination ='storage/images/products';
                $image->move(public_path($destination), $imageName);

                // dd($imageName);
                $imagefile = new ProductImage;
                $imagefile->image = $imageName;
                $imagefile->product_id = $product_id;
                $imagefile->color_id = $color->id;
                $imagefile->save();
                // dd($request->condition);

                // dd($storage);


        }

        }


    return response()->json($product_id);
   }
    /// Frontend buy phones

    public function getPhones()
    {
        $products = Product::where('category','phone')->paginate(9);
        $models   = Pmodel::orderBy('id','asc')->get();
        // $colors  = ProductColor::all();
        // if(Auth::check())
        // {
        //     $products = Product::where('category','phone')->paginate(8);
        //     $wishlist  = Wishlist::where('user_id',Auth::user()->id)->first();
        //     return view('frontend.buy-phone',compact('products'));
        // }

        return view('frontend.buy-phone',compact('products','models'));
    }

   public function productDetail($id)
   {
       $colors = Product::find($id)->color;
       $product = Product::find($id);
    //    dd($product);
       $color = ProductColor::where('product_id',$id)->first();

       $storage = ProductStorage::where('color_id',$color->id)->first();
       $model = Pmodel::where('id',$product->model_id)->first();
       $images = ProductImage::where('color_id',$color->id)->get();
       $image = ProductImage::where('color_id',$color->id)->first();
    //    dd($images);


    $related = Product::where('memory',$product->memory)->limit(4)->get();
    // dd($related);
       $condition = ProductCondition::where('storage_id',$storage->id)->first();
       return view('frontend.single',compact('product','color','model','condition','images','storage',
       'colors','related','image'));
   }

   public function accessoryDetails($id)
   {
       $accessory  = Accessory::find($id);
       $images     = AccessoryImage::where('accessory_id',$accessory->id)->get();

       $model      = Pmodel::where('id',$accessory->model_id)->first();

       return view('frontend.accessorySingle',compact('accessory','images','model'));
   }


   public function getStorage($id)
   {
    //    dd($id);
       $color = ProductColor::find($id);
       $storages = ProductStorage::where('color_id',$color->id)->get();
       $images = ProductImage::where('color_id',$color->id)->get();

       $temp= null;

       foreach($storages as $storage)
       {

            $temp .='<input type="hidden" name="storageId" id="storageId" value="'.$storage->storage.'">
                    <div class="select-color">
                        <input type="radio" name="storage" class="hidden" id="'.$storage->id.'">
                        <label class="color" for="'.$storage->id.'" onclick="geCondition('.$storage->id.')">
                            '.$storage->storage.'
                        </label>
                    </div>';
        }


       $imgs = null;
        foreach ($images as $image )
        {


             $imgs .='<div class="owl-item" style="width:360px; margin-right: 0;"><li>
                        <a href="'.asset('storage/images/products/'.$image->image).'" class="lightbox-image" title="Image Caption Here">
                         <img src="'.asset('storage/images/products/'.$image->image).'" alt=""></a>
                     </li></div>';
         }

         $imgg = null;
        foreach($images as $img)
        {
            $imgg .='<div class="owl-item active"><li><img src="'.asset('storage/images/products/'.$img->image).'" alt=""></li></div>';
        }
        return response()->json(['temp'=>$temp ,'imgs'=> $imgs,'color'=>$color->color_name,'imgg'=>$imgg]);
        //return view(['frontend.productmanagment.get-storage'=>$storages,'teams'=>teamInfo,'points'=>pointslist]);
    //return view('frontend.productmanagment.get-storage',compact('storages'));

   }

   public function getCondition($id)
   {
     $storage = ProductStorage::find($id);
    //  dd($storage->storage)
     $conditions = ProductCondition::where('storage_id',$storage->id)->get();

     $condit = null;

      foreach($conditions as $condition)
      {
          if($condition->orig_price >= $condition->price)
          {
            $discountPrice = $condition->orig_price - $condition->price;
            $discount = round(($discountPrice / $condition->orig_price) * 100);
            }
         else
         {
             $discount = 0;
         }
          if($condition->quantity > 0)
          {
            $condit .=' <div class="select-color">

                    <input type="radio" name="condition" class="hidden condition" id="'.$condition->price.'">
                    <label class="color" for="'.$condition->price.'"  onclick="getPrice('.$condition->price.','.$condition->quantity.','.$condition->id.','.$condition->orig_price.','.$discount.')">
                    '.$condition->condition.' <br> $'.$condition->price.'
                    </label>
                    </div>';
          }
          else
          {
            $condit .=' <div class="select-color">

            <input type="radio" name="condition" class="hidden condition" id="'.$condition->condition.'" readonly>
            <label class="color" style="opacity: .4;">
            '.$condition->condition.' <br> Sold out
            </label>
            </div>';
          }
      }

      return response()->json(['condit'=>$condit,'storage'=>$storage->storage]);
   }


///Add To Cart
   public function addToCart(Request $request)
   {
    //    dd($request->all());

       $product = Product::find($request->product);
       $condit = ProductCondition::find($request->condition);
    //    $color = ProductColor::find($request->colorId);
    //    $storage = ProductStorage::find($request->storageId);

    // dd($condit);
    if($request->quantity <= $condit->quantity)
    {

       $id = mt_rand(100, 9000);

       if(Auth::guard('web')->check())
       {
         $userID = Auth::user()->id;

         $cart= \Cart::session($userID)->add(array(
        'id' =>  $id,
        'name' =>  $request->brand_name.' '.$request->model_name,
        'price' => $request->getprice,
        'quantity' => $request->quantity,
        'attributes' => array(
                        'userID' => $userID,
                        'storage' => $request->getStorages,
                        'color' => $request->getcolor,
                        'category' => "phone",
                        'conditition' => $condit->condition

                        ),
        'associatedModel' => $product

        ));
    }
    else
    {
        $cart= \Cart::add(array(
            'id' =>  $id,
            'name' =>  $request->brand_name.' '.$request->model_name,
            'price' => $request->getprice,
            'quantity' => $request->quantity,
            'attributes' => array(
                            'storage' => $request->getStorages,
                            'category' => "phone",
                            'color' => $request->getcolor,
                            'conditition' => $condit->condition

                            ),
            'associatedModel' => $product

            ));
    }

}
else
{
    return response()->json(['status'=>'null']);
}



      return response()->json(['status'=>'Successfully item add into your cart!']);


   }

   public function cartUpdate(Request $request)
   {
       // dd($request->all());
       if(Auth::guard('web')->check())
       {
       $userID = Auth::user()->id;
       if ($request->quantity == 0) {
           \Cart::remove($request->id);
       }
       \Cart::session($userID)->update(
           $request->id,
           array(
               'quantity' => array(
                   'relative' => false,
                   'value' => $request->quantity
               ),
           )
       );
    }
    else
    {

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
    }
       return response()->json();
   }
   public function remove(Request $request)
   {
    //    dd($request->id);
    if(Auth::check())
    {
       $userID = Auth::user()->id;
       \Cart::session($userID)->remove($request->id);
    }
    else{
        \Cart::remove($request->id);
    }
       return response()->json();
   }
   public function viewToCart()
   {
       return view('frontend.viewCart');
   }


   ///////////////////// Payments ////////////////////////////
    public function payment(Request $request)
    {
        // dd($request->all());
        if(Auth::check())
        {
             $userID = Auth::user()->id;
             $cartCollection = \Cart::session($userID)->getContent();
             $data = $cartCollection->all();
             $totals = \Cart::session($userID)->getTotal();
             $total = \Cart::session($userID)->getTotal();
        }
        else
        {
            $cartCollection = \Cart::getContent();
            $data = $cartCollection->all();
            $totals = \Cart::getTotal();
            $total = \Cart::getTotal();
        }

        // dd($totals);
        if($request->payment == "cash")
        {
            $orderSale =new OrderSale;
            if(Auth::check())
            {
                $orderSale->user_id = $userID;
            }
            $orderSale->grand_total =$totals;
            $orderSale->shipping_id = $request->address_id;
            $orderSale->save();

            foreach ($data as $cart) {

                if ($cart->attributes->category == "phone")
                {
                    // dd($cart);
                    $model = Pmodel::where('id',$cart->associatedModel->model_id)->first();
                    $color = ProductColor::where('product_id',$cart->associatedModel->id)->first();
                    $storage = ProductStorage::where('color_id',$color->id)->first();
                    $total = round($cart->quantity*$cart->price);
                    // dd($cart->attributes->color);
                    $order = new Order;
                    $order->orderSales_id  = $orderSale->id;
                    $order->product_id     = $cart->associatedModel->id;
                    $order->brand_name     = $model->brand->brand_name;
                    $order->model_name     = $model->model_name;
                    $order->color          = $cart->attributes->color;
                    $order->condition      = $cart->attributes->conditition;
                    $order->storage        = $cart->attributes->storage;
                    $order->quantity       = $cart->quantity;
                    $order->price          = $cart->price;
                    $order->grand_price    = $total;
                    $order->type           = "phone";
                    $order->payment_method = "Cash";
                    $order->status         = 0;
                    $order->save();

                    $condition = ProductCondition::where('storage_id',$storage->id)->first();
                    if($cart->quantity <= $condition->quantity)
                    {
                        $condition->decrement('quantity',$cart->quantity);
                    }
                    else
                    {
                        return redirect()->route('view.cart')->with('status' ,'Enough Quantity of:' . $condition->name);
                    }
                }

                else{
                    // dd('asdsad');
                    $model = Pmodel::where('id',$cart->associatedModel->model_id)->first();
                    $total = $cart->quantity*$cart->price;
                    // dd($cart->attributes->color);
                    // dd($total);
                    $order                  = new Order;
                    $order->orderSales_id   = $orderSale->id;
                    $order->accessory_id    = $cart->associatedModel->id;
                    $order->brand_name      = $model->brand->brand_name;
                    $order->model_name      = $model->model_name;
                    $order->access_category = $cart->associatedModel->accessoryCategory->category;
                    $order->access_name     = $cart->associatedModel->name;
                    $order->quantity        = $cart->quantity;
                    $order->price           = $cart->price;
                    $order->grand_price     = $cart->quantity*$cart->price;
                    $order->type            = "accessory";
                    $order->payment_method  = "Cash";


                    $order->save();

                    $accessory = Accessory::find($cart->associatedModel->id);
                    if($cart->quantity <= $accessory->quantity)
                     {
                        $accessory->decrement('quantity',$cart->quantity );
                     }
                     else
                     {
                         return redirect()->route('view.cart')->with('status' ,'Enough Quantity of:' . $cart->associatedModel->name);
                     }
                }



             }
        //  dd($order);


            $details = [
                'title' => 'Mail from CellCity',
                'subject' => 'Dear Customer ,',
                'message' => 'Payment completed Successfully through Cash',
                'Total'  => $total
            ];
             $messgae = "Succesfully Transferred";
             \Mail::to($request->email)->send(new TechMail($details));
            //  return response()->json($messgae);

            $phone = "+1".$request->phoneno;
            //  dd($phone);
             $message =strip_tags(nl2br("Dear Customer, \n You have Successfully Pay  through Cash . \n Total Amount : $". $total));

             $account_sid = "ACeb30af8343f53c1b366517b35ea44dc2";
           $auth_token = "ecc8e9d376d7ef8a19ed22778bb466f8";
           $twilio_number = +4842553085;
            $client = new Client($account_sid, $auth_token);
            $client->messages->create($phone,
                ['from' => $twilio_number, 'body' => $message] );


                 \Cart::clear();
                 return redirect()->route('view.cart')->with('message', Alert::_message('success', 'Payment Successfully.'));;
        }
    elseif($request->payment == "paypal")
    {
        // dd($request->all());
        if(Auth::check())
        {
           $total = \Cart::session($userID)->getTotal();

        }
        else
        {
            $total = \Cart::getTotal();
        }
        $address = $request->address_id;
        $email = $request->email;
        $phone = $request->phoneno;
        $desc = $address.'-'.$email.'-'.$phone;
        // dd($desc);
        $apiContext = new ApiContext(
            new OAuthTokenCredential(
                'AXmw8ONlBiU9H3ISoZY7KJgQszN9Mtto7MXfq4Y9PQOeawovyhUSS19Ob8LYlU-xYQo_ERLBOJckp8sq',
              'EPdWVscuS7k-u-45AKc5khipCBlMYqUBfUmbrE3aUV0FJlF8hFcGKn_5p7T9VA2R5HdsR_JmTj1EiUDr'
                 )
        );
            // dd($apiContext);
                $payer = new Payer();
                $payer->setPaymentMethod("paypal");
                // dd($payer);
                // Set redirect URLs
                $redirectUrls = new RedirectUrls();
                $redirectUrls->setReturnUrl(route('paypal.successProduct'))
                              ->setCancelUrl(route('paypal.cancelProduct'));
                // dd($redirectUrls);
                // Set payment amount
                $amount = new Amount();
                $amount->setCurrency("USD")
                    ->setTotal($total);


                // Set transaction object
                $transaction = new Transaction();
                $transaction->setAmount($amount)
                    ->setDescription($desc);
                //   dd($transaction);
                // Create the full payment object
                $payment = new Payment();
                $payment->setIntent('sale')
                    ->setPayer($payer)
                    ->setRedirectUrls($redirectUrls)
                    ->setTransactions(array($transaction));
                // dd($payment);
                // Create payment with valid API context
                try {

                    $payment->create($apiContext);
                    // dd($payment);
                    // Get PayPal redirect URL and redirect the customer
                    // $approvalUrl =
                    return redirect($payment->getApprovalLink());
                    // dd($approvalUrl);
                    // Redirect the customer to $approvalUrl
                } catch (PayPalConnectionException $ex) {
                    echo $ex->getCode();
                    echo $ex->getData();
                    die($ex);
                } catch (Exception $ex) {
                    die($ex);
                }
  }



        else
        {
            return back();
        }
    }

    public function success(Request $request)
    {
            $apiContext = new ApiContext(
                new OAuthTokenCredential(
                    'AXmw8ONlBiU9H3ISoZY7KJgQszN9Mtto7MXfq4Y9PQOeawovyhUSS19Ob8LYlU-xYQo_ERLBOJckp8sq',
                    'EPdWVscuS7k-u-45AKc5khipCBlMYqUBfUmbrE3aUV0FJlF8hFcGKn_5p7T9VA2R5HdsR_JmTj1EiUDr'
                            )
            );

        // Get payment object by passing paymentId
        $paymentId = $_GET['paymentId'];
        $payment = Payment::get($paymentId, $apiContext);
        $payerId = $_GET['PayerID'];

        // Execute payment with payer ID
        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

    try {
        // Execute payment
        $result = $payment->execute($execution, $apiContext);
        // dd($result->transactions[0]->description);
        $str = $result->transactions[0]->description;
        $split = explode('-',$str);
        $address_id =  $split[0];
        $email       =  $split[1];
        $phoneno =  $split[2];

        if(Auth::check())
        {
            $userID = Auth::user()->id;
            $totals = \Cart::session($userID)->getTotal();
            $cartCollection = \Cart::session($userID)->getContent();

        }
       else {

            $totals = \Cart::getTotal();
            $cartCollection = \Cart::getContent();

        }

        $orderSale       = new OrderSale;
        if(Auth::check())
        {
            $orderSale->user_id  = $userID;
        }
        $orderSale->grand_total  = $totals;
        $orderSale->shipping_id  = $address_id;
        $orderSale->save();

    //    dd($cartCollection);

        foreach ($cartCollection as $cart) {

            if ($cart->attributes->category == "phone")
            {
                $model   = Pmodel::where('id',$cart->associatedModel->model_id)->first();
                $color   = ProductColor::where('product_id',$cart->associatedModel->id)->first();
                $storage = ProductStorage::where('color_id',$color->id)->first();
                $total   = $cart->quantity*$cart->price;
                // dd($cart->attributes->color);
                $order                 = new Order;
                $order->orderSales_id  = $orderSale->id;
                $order->product_id     = $cart->associatedModel->id;
                $order->brand_name     = $model->brand->brand_name;
                $order->model_name     = $model->model_name;
                $order->color          = $cart->attributes->color;
                $order->condition      = $cart->attributes->conditition;
                $order->storage        = $cart->attributes->storage;
                $order->quantity       = $cart->quantity;
                $order->price          = $cart->price;
                $order->grand_price    = $total;
                $order->type           = "phone";
                $order->payment_method = "PayPal";
                $order->status         = 0;
                $order->save();

                $condition = ProductCondition::where('storage_id',$storage->id)->first();
                if($cart->quantity <= $condition->quantity)
                {
                    $condition->increment('quantity',$cart->quantity);
                }
                else
                {
                    return redirect()->route('view.cart')->with('status' ,'Enough Quantity of:' . $condition->name);
                }
            }
            else{
                // dd('asdsad');

                $model = Pmodel::where('id',$cart->associatedModel->model_id)->first();
                $total = $cart->quantity*$cart->price;

                    //dd($cart->attributes->color);
                    $order                  = new Order;
                    $order->orderSales_id   = $orderSale->id;
                    $order->accessory_id    = $cart->associatedModel->id;
                    $order->brand_name      = $model->brand->brand_name;
                    $order->model_name      = $model->model_name;
                    $order->access_category = $cart->associatedModel->accessoryCategory->category;
                    $order->access_name     = $cart->associatedModel->name;
                    $order->quantity        = $cart->quantity;
                    $order->price           = $cart->price;
                    $order->grand_price     = round($cart->quantity*$cart->price);
                    $order->type            = "accessory";
                    $order->payment_method  = "PayPal";
                    $order->status         = 0;
                    $order->save();

                    $accessory = Accessory::find($cart->associatedModel->id);
                    if($cart->quantity <= $accessory->quantity)
                     {
                        $accessory->decrement('quantity',$cart->quantity );
                     }
                     else
                     {
                         return redirect()->route('view.cart')->with('status' ,'Enough Quantity of:' . $cart->associatedModel->name);
                     }
            }



         }
       if(Auth::check())
       {
        $total = \Cart::session($userID)->getTotal();
       }
       else
       {
        $total = \Cart::getTotal();
       }
            $details = [
                'title' => 'Mail from CellCity',
                'subject' => 'Dear Customer ,',
                'message' => 'Payment completed Successfully through PayPal',
                'shippment' => '“Shipment detail will be sent once order is shipped within 24 hours”',
                'Total'  => $total
            ];
             $messgae = "Succesfully Transferred";
             \Mail::to($email)->send(new productMail($details));
            //  return response()->json($messgae);


            $phone = "+1".$phoneno;
            //  dd($phone);
             $message = strip_tags(nl2br("Dear Customer, \n You have Successfully Pay  through PayPal . \n Total Amount : $". $total." \n Shipment detail will be sent once order is shipped within 24 hours."));

             $account_sid = "ACeb30af8343f53c1b366517b35ea44dc2";
           $auth_token = "ecc8e9d376d7ef8a19ed22778bb466f8";
           $twilio_number = +4842553085;
             $client = new Client($account_sid, $auth_token);
             $client->messages->create($phone,
                 ['from' => $twilio_number, 'body' => $message] );

                 \Cart::clear();
                 return redirect()->route('payment.completed');

    } catch (PayPalConnectionException $ex) {
        echo $ex->getCode();
        echo $ex->getData();
        die($ex);
    } catch (Exception $ex) {
        die($ex);
    }
}

  public function cancel()
{
        dd('payment cancel');
}



   /// ------------------Filter-----------------////
   public Function getBrandFilter(Request $request)
    {



         if(isset($request->brand))
         {
            $models = Pmodel::whereIn('brand_Id',explode(',',$request->brand))->get();
            $modelName =  $models->pluck("id");
            $modelID = $modelName->all();
            // dd(implode(",",$modelID));
            $productID = implode(",",$modelID);

            $products = Product::whereIn('model_id',$modelID)->get();


            $getbrands = view('frontend.filterProduct.getBrand',compact('products'))->render();
            $models = view('frontend.filterProduct.getModel',compact('models'))->render();

            return response()->json(['brands' => $getbrands, 'models' => $models]);

         }

         elseif(isset($request->model))
         {
              $model=$request->model;
              $products = Product::whereIn('model_id',explode(',',$model))->get();
            //  dd($model);
            //    response()->json(['product'=>$products,'model'=>$model]);
             return view('frontend.filterProduct.getBrand',compact('products'));
         }

         elseif(isset($request->getCondition))
         {
            //  dd(explode(',',$request->getCondition));

                if(isset($request->selectedModel))
               {
                $model=$request->selectedModel;
                // $model=$request->model;
                $products = Product::whereIn('model_id',explode(',',$model))->get();
                // dd($products);

                $modelName =  $products->pluck("id");
                $modelID = $modelName->all();
                // dd(implode(",",$modelID));
                $producdID = implode(",",$modelID);
                 $products = DB::table('product_conditions')
                            ->join('product_storages','product_storages.id','=','product_conditions.storage_id')
                            ->join('product_colors','product_colors.id','=','product_storages.color_id')
                            ->join('products','products.id','=','product_colors.product_id')
                            ->whereIn('products.id',explode(',',$producdID))
                            ->whereIn('product_conditions.condition',explode(',',$request->input('getCondition')))
                            ->select('*','products.id')
                            ->get();


                //    dd($products);
                  return view('frontend.filterProduct.getCondition',compact('products'));
               }

               $products = DB::table('product_conditions')
               ->join('product_storages','product_storages.id','=','product_conditions.storage_id')
               ->join('product_colors','product_colors.id','=','product_storages.color_id')
               ->join('products','products.id','=','product_colors.product_id')
               ->whereIn('product_conditions.condition',explode(',',$request->input('getCondition')))
               ->select('*','products.id')
               ->get();

               return view('frontend.filterProduct.getCondition',compact('products'));

         }
         elseif(isset($request->gettype))
         {
            //  dd(explode(',',$request->getCondition));

                if(isset($request->selectedModel))
               {
                $model=$request->selectedModel;


                $products = Product::whereIn('model_id',explode(',',$model))
                                    ->whereIn('type',explode(',',$request->gettype))->get();

                  return view('frontend.filterProduct.getBrand',compact('products'));
               }

               $products = Product::whereIn('type',explode(',',$request->gettype))->get();

               return view('frontend.filterProduct.getBrand',compact('products'));

         }
         elseif(isset($request->getStorage))
         {
            if(isset($request->selectedModel))
            {
             $model=$request->selectedModel;

             $products = Product::whereIn('model_id',explode(',',$model))->get();
             $modelName =  $products->pluck("id");
             $modelID = $modelName->all();
             $productID = implode(",",$modelID);

             $products = DB::table('product_storages')
                            ->join('product_colors','product_colors.id','=','product_storages.color_id')
                            ->join('products','products.id','=','product_colors.product_id')
                            ->join('product_conditions','product_conditions.storage_id','=','product_storages.id')
                            ->whereIn('products.id',explode(',',$productID))
                            ->whereIn('product_storages.storage',explode(',',$request->input('getStorage')))
                            ->select('*','products.id')
                            ->get();


             return view('frontend.filterProduct.getCondition',compact('products'));

            }
            else
            {
                $products = DB::table('product_storages')
                ->join('product_colors','product_colors.id','=','product_storages.color_id')
                ->join('products','products.id','=','product_colors.product_id')
                ->join('product_conditions','product_conditions.storage_id','=','product_storages.id')
                ->whereIn('product_storages.storage',explode(',',$request->input('getStorage')))
                ->select('*','products.id')
                ->get();


            return view('frontend.filterProduct.getCondition',compact('products'));
            }
         }
         elseif(isset($request->getLocked))
         {
            //  dd($request->all());
            if(isset($request->selectedModel))
            {
             $model=$request->selectedModel;

             $products = Product::whereIn('model_id',explode(',',$model))->where('locked',explode(',',$request->input('getLocked')))->get();

            //    dd($products);
             return view('frontend.filterProduct.getLocked',compact('products'));

            }
            else
            {
                $products = Product::whereIn('locked',explode(',',$request->input('getLocked')))->get();
                 return view('frontend.filterProduct.getLocked',compact('products'));
            }
         }

         elseif(isset($request->maxPrice) || isset($request->minPrice))
         {
             $start = $request->minPrice;
             $end   =$request->maxPrice;

             if(isset($request->selectedModel))
            {
             $model=$request->selectedModel;

             $products = Product::whereIn('model_id',explode(',',$model))->get();
             $modelName =  $products->pluck("id");
             $modelID = $modelName->all();
             $model = implode(",",$modelID);

             $products = DB::table('product_conditions')
             ->join('product_storages','product_storages.id','=','product_conditions.storage_id')
             ->join('product_colors','product_colors.id','=','product_storages.color_id')
             ->join('products','products.id','=','product_colors.product_id')
             ->whereIn('products.model_id',explode(',',$model))
             ->where('product_conditions.price','>=',$start)
             ->where('product_conditions.price','<=',$end)
             ->select('*','products.id')->groupBy('product_id')
             ->get();

             return view('frontend.filterProduct.getCondition',compact('products'));
            }

            $products = DB::table('product_conditions')
            ->join('product_storages','product_storages.id','=','product_conditions.storage_id')
            ->join('product_colors','product_colors.id','=','product_storages.color_id')
            ->join('products','products.id','=','product_colors.product_id')
            ->where('product_conditions.price','>=',$start)
            ->where('product_conditions.price','<=',$end)
            ->select('*','products.id')->groupBy('product_id')
            ->get();
        //    dd($products);
           return view('frontend.filterProduct.getCondition',compact('products'));
         }

         elseif(isset($request->phoneService))
         {

            if(isset($request->selectedModel))
            {
            $model=$request->selectedModel;
            // $model=$request->model;
            $products = Product::whereIn('model_id',explode(',',$model))->get();
            // dd($products);

            $modelName =  $products->pluck("id");
            $modelID = $modelName->all();
            // dd(implode(",",$modelID));
            $producdID = implode(",",$modelID);

             $products = DB::table('phone_serivce_products')
                        ->join('products','products.id','=','phone_serivce_products.product_id')
                        ->join('phone_services','phone_services.id','=','phone_serivce_products.phone_service_id')
                        ->whereIn('products.id',explode(',',$producdID))
                        ->whereIn('phone_services.id',explode(',',$request->phoneService))
                        ->select('*','products.id')
                        ->get();
            //   dd($products);
            return view('frontend.filterProduct.getService',compact('products'));
            }
            else
            {
            //    $products = Product::where
                $products = DB::table('phone_serivce_products')
                ->join('products','products.id','=','phone_serivce_products.product_id')
                ->join('phone_services','phone_services.id','=','phone_serivce_products.phone_service_id')
                ->whereIn('phone_services.id',explode(',',$request->phoneService))
                ->select('*','products.id')
                ->get();

                return view('frontend.filterProduct.getService',compact('products'));
            }

         }
         else
         {
            if(!isset($request->brand)){

                $models = Pmodel::orderBy('id','asc')->get();
                $modelName =  $models->pluck("id");
                $modelID = $modelName->all();
                // dd(implode(",",$modelID));
                $productID = implode(",",$modelID);

                $products = Product::orderBy('id','desc')->get();


                $getbrands = view('frontend.filterProduct.getBrand',compact('products'))->render();
                $models = view('frontend.filterProduct.getModel',compact('models'))->render();

                return response()->json(['brands' => $getbrands, 'models' => $models]);
         }
            elseif(!isset($request->model))
            {
                 $model=$request->model;
                 $products = Product::orderBy('id','desc')->get();
               //  dd($model);
               //    response()->json(['product'=>$products,'model'=>$model]);
                return view('frontend.filterProduct.getBrand',compact('products'));
            }
            else{

                $models = Pmodel::orderBy('id','asc')->get();
                $modelName =  $models->pluck("id");
                $modelID = $modelName->all();
                // dd(implode(",",$modelID));
                $productID = implode(",",$modelID);

                $products = Product::orderBy('id','desc')->get();


                $getbrands = view('frontend.filterProduct.getBrand',compact('products'))->render();
                $models = view('frontend.filterProduct.getModel',compact('models'))->render();

                return response()->json(['brands' => $getbrands, 'models' => $models]);
         }
         }




    }



}
