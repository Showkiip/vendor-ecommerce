<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use App\Models\AccessoryCategory;
use App\Models\AccessoryImage;
use App\Models\AccessoryOrder;
use App\Models\Alert;
use App\Models\Order;
use App\Models\OrderSale;
use App\Models\Pmodel;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccessoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $accessories = Accessory::orderBy('id','desc')->get();

         return view('admin.accessories.index',compact('accessories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.accessories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $accessory               = new Accessory;
        $accessory->name         = $request->name;
        $accessory->brand_id     = $request->brand_id;
        $accessory->model_id     = $request->model_id;
        $accessory->category_id  = $request->category_id;
        $accessory->discount     = $request->discount;
        $accessory->sell_price   = $request->sell_price;
        $accessory->orig_price   = $request->orig_price;
        $accessory->quantity     = $request->quantity;
        $accessory->description  = $request->description;
        $accessory->save();
        if($request->hasFile('images'))
        {
        foreach($request->file('images') as $img)
        {
                   $imageName   = time().$img->getClientOriginalName();
                   $destination ='storage/accessories/images/';
                   $img->move(public_path($destination), $imageName);

             $accessoryimage = new AccessoryImage;
             $accessoryimage->images = $imageName;
             $accessoryimage->accessory_id = $accessory->id;
             $accessoryimage->save();

        }
    }

        return back()->with('message', Alert::_message('success', 'Accesssory Created Successfully.'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accessory  $accessory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // dd($request->all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accessory  $accessory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $accessory = Accessory::find($id);
        $model     = Pmodel::where('id',$accessory->model_id)->first();
        // dd($model);
        $images  = AccessoryImage::where('accessory_id',$accessory->id)->get();

        return view('admin.accessories.edit',compact('accessory','images','model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accessory  $accessory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $accessory              = Accessory::find($id);
        $accessory->name        = $request->name;
        $accessory->brand_id    = $request->brand_id;
        $accessory->model_id    = $request->model_id;
        $accessory->discount     = $request->discount;
        $accessory->category_id = $request->category_id;
        $accessory->sell_price  = $request->sell_price;
        $accessory->orig_price  = $request->orig_price;
        $accessory->quantity    = $request->quantity;
        $accessory->description = $request->description;
        $accessory->update();




        if($request->hasFile('images'))
        {
            $q = "DELETE pp FROM `accessory_images` pp
        join accessories pd on pp.accessory_id = pd.id
        WHERE pd.id = ?";


        $status = \DB::delete($q, array($id));
        foreach($request->file('images') as $img)
        {
                   $imageName   = time().$img->getClientOriginalName();
                   $destination ='storage/accessories/images/';
                   $img->move(public_path($destination), $imageName);

             $accessoryimage                = new AccessoryImage;
             $accessoryimage->images        = $imageName;
             $accessoryimage->accessory_id  = $accessory->id;
             $accessoryimage->save();

        }
    }

        return back()->with('message', Alert::_message('success', 'Accesssory Updated Successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accessory  $accessory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accessory $accessory)
    {
        //
    }


    public function getModel($id)
    {
        // dd($id);
        $models = Pmodel::where('brand_Id',$id)->get();
        return view('admin.accessories.getModel',compact('models'));
    }

    public function viewAccessory($id)
    {
        // dd($id);
        $accessory = Accessory::find($id);
        $images    = AccessoryImage::where('accessory_id',$accessory->id)->get();

        return view('admin.accessories.viewAccessory',compact('accessory','images'));
    }


    ////////////////////// Front end /////////////////////

    public function singlePage($id)
    {
        $accessory  = Accessory::find($id);
        $images     = AccessoryImage::where('accessory_id',$accessory->id)->get();
        $model      = Pmodel::where('id',$accessory->model_id)->first();
        $related    = Accessory::where('category_id',$accessory->category_id)->limit(4)->get();
        // dd($related);

        return view('frontend.accessorySingle',compact('accessory','images','model','related'));
    }

    public function addToCart(Request $request)
    {
        // dd($request->all());

        $accessory  = Accessory::find($request->id);


        $id = mt_rand(100, 9000);

        if($request->quantity <= $accessory->quantity)
        {
        if(Auth::check())
        {
            $userID = Auth::user()->id;
             $cart= \Cart::session($userID)->add(array(
            'id'              =>  $id,
            'name'            =>  $request->brand_name.' '.$request->model_name,
            'price'           => $request->getprice,
            'quantity'        => $request->quantity,
            'attributes'      => array(
                                'category'=> "accessory",
                                ),
            'associatedModel' => $accessory
        ));
         }
         else
         {
            $cart= \Cart::add(array(
                'id'              =>  $id,
                'name'            =>  $request->brand_name.' '.$request->model_name,
                'price'           => $request->getprice,
                'quantity'        => $request->quantity,
                'attributes'      => array(
                                    'category'=> "accessory",
                                    ),
                'associatedModel' => $accessory
            ));
         }


    // dd($items);
      return response()->json(['status'=>'Successfully Accessory add into your cart!']);
        }
        else
        {
            return response()->json(['status'=>'null']);
        }
    }

    public function accessoryOrder()
    {
        $accessoryOrder  = AccessoryOrder::orderBy('created_at','desc')->get();

        return view('admin.accessoryOrder.list',compact('accessoryOrder'));
    }



    public function getBrand($id)
    {
        // dd($id);

        $models = Pmodel::where('brand_Id',$id)->get();
        return view('frontend.accessoryFilter.getBrand',compact('models'));


    }
    public function getAccessoryModel($id)
    {
        // dd($id);

        $accessories = Accessory::where('model_id',$id)->orderBy('id','desc')->get();
        return view('frontend.accessoryFilter.getModel',compact('accessories'));


    }

    public function searcAccesory(Request $request)
    {
        // dd($request->all());
        $query  =  Accessory::query();
                   if($request->brand_id){
                       $query->where('brand_id',$request->brand_id);
                    }
                    if($request->model_id){
                       $query->where('model_id',$request->model_id);
                    }
                    if($request->category_id){
                       $query->where('category_id',$request->category_id);
                    }

       $accessories=   $query->orderBy('id','desc')->get();
                                   
        return view('frontend.accessoryFilter.getCategory',compact('accessories'));
    }

    public function getCategory(Request $request)
    {
        // dd($request->all());
        if(isset($request->getCategory))
        {
        $accessories = Accessory::whereIn('category_id',explode(',',$request->getCategory))->orderBy('id','desc')->get();
        return view('frontend.accessoryFilter.getCategory',compact('accessories'));
        }
        else
        {
            $accessories = Accessory::orderBy('id','desc')->paginate(9);
            return view('frontend.accessoryFilter.getAll',compact('accessories'));
        }

    }
   public function getPriceFilter(Request $request)
   {
        // dd($request->all());
             $start = $request->minPrice;
             $end   = $request->maxPrice;

             $accessories = Accessory::whereBetween('sell_price',[$start,$end])
                                        // ->where('sell_price','<=',$end)
                                        ->orderBy('id','desc')->get();
            //  dd($accessories);

            return view('frontend.accessoryFilter.getCategory',compact('accessories'));
   }

    public function getSortList(Request $request)
    {
            // dd($request->all());
            if($request->sort == "az")
            {
                $accessories = Accessory::orderBy('name','asc')->get();
                return view('frontend.accessoryFilter.getAccessorySort',compact('accessories'));
            }
            elseif($request->sort == "za")
            {
                $accessories = Accessory::orderBy('name','desc')->get();
                return view('frontend.accessoryFilter.getAccessorySort',compact('accessories'));
            }
            elseif($request->sort == "hl")
            {
                $accessories = Accessory::orderBy('sell_price','desc')->get();
                return view('frontend.accessoryFilter.getAccessorySort',compact('accessories'));
            }
            elseif($request->sort == "lh")
            {
                $accessories = Accessory::orderBy('sell_price','asc')->get();
                return view('frontend.accessoryFilter.getAccessorySort',compact('accessories'));
            }
            elseif($request->sort == "no")
            {
                $accessories = Accessory::orderBy('created_at','asc')->get();
                return view('frontend.accessoryFilter.getAccessorySort',compact('accessories'));
            }
            elseif($request->sort == "on")
            {
                $accessories = Accessory::orderBy('created_at','desc')->get();
                return view('frontend.accessoryFilter.getAccessorySort',compact('accessories'));
            }

    }


    public function rating(Request $request)
    {
            // dd($request->all());
            if(isset($request->accessoryID))
            {
            $order = Order::where('id',$request->accessoryID)->first();
            $accessory = Accessory::find($order->accessory_id);
            // dd($accessory);
            $user = User::where('id',Auth::user()->id)->first();


            $userReview = DB::table('reviews')
                            ->where('reviewrateable_id',$accessory->id)
                            ->where('author_id',$user->id)
                            ->count();

            //  dd($userReview);

             if($userReview > 0)
             {
                return back()->with('message', Alert::_message('success', 'You have Already Review.'));
             }
             else
             {
                $rating = $accessory->rating([
                    'title' => $request->review,
                    'rating' => $request->rating,

                ],$user);

                return back()->with('message', Alert::_message('success', 'Thanks for Review .'));
             }
            }
            elseif(isset($request->productID))
            {
                $order = Order::where('id',$request->productID)->first();
                 $product = Product::where('id',$order->product_id)->first();

                $user = User::where('id',Auth::user()->id)->first();
                // dd($order);

                $userReview = DB::table('reviews')
                                ->where('reviewrateable_id',$product->id)
                                ->where('author_id',$user->id)
                                ->count();

                //  dd($userReview);

                 if($userReview > 0)
                 {
                    return back()->with('message', Alert::_message('success', 'You have Already Review.'));
                 }
                 else
                 {
                    $rating = $product->rating([
                        'title' => $request->review,
                        'rating' => $request->rating,

                    ],$user);

                    return back()->with('message', Alert::_message('success', 'Thanks for Review .'));
                 }
            }


    }
}
