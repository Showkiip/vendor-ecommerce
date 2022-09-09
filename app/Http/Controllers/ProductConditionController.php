<?php

namespace App\Http\Controllers;

use App\Models\ProductCondition;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Alert;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\ProductStorage;
use DB;
class ProductConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $colors = Product::find($id)->color;

        return view('admin.condition.index',compact('colors'));
    }

    public function storeCondition(Request $request)
    {

    //    dd($request->all());
         $condition = $request->condition_id;
        //  dd($condition);
        if(isset($condition))
         {

          foreach ($condition as $key =>$condit){
            // dd($condit);
            foreach ($condit as $key2 => $value) {

                $conditions = ProductCondition::find($value);
                $conditions->condition =$request->condition[$key][$key2];
                $conditions->price = $request->price[$key][$key2];
                $conditions->quantity = $request->quantity[$key][$key2];
                // dd($productCondit);
                $conditions->save();


            }

         }
         return back()->with('message', Alert::_message('success', 'Product Condition updated Successfully.'));
        }

        $storage2  =$request->storage2_id;
        if (isset($storage2)) {
            foreach($storage2 as $key6=>$storg2)
            {
                foreach($storg2 as $key7=>$condit2)
                {
                   foreach($condit2 as $key8=>$storag2)
                   {

                   $productCondit = new ProductCondition;

                   $productCondit->condition =$request->condition2[$key6][$key7][$key8];
                   $productCondit->price = $request->price2[$key6][$key7][$key8];
                   $productCondit->quantity = $request->quantity2[$key6][$key7][$key8];
                   $productCondit->storage_id =$storag2;


                   $productCondit->save();
                //    dd($storage_id);
            }
                }

            }
            return back()->with('message', Alert::_message('success', 'New Product Condition Store Successfully.'));
            }





        // return view('admin.condition.index',compact('colors'));
    }

    public function deleteCondition($id)
    {
        ProductCondition::find($id)->delete();
        return back()->with('message', Alert::_message('success', 'Product Condition Deleted Successfully.'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storage($id)
    {
        $colors = Product::find($id)->color;

        return view('admin.storage.index',compact('colors'));
    }
    public function storeStorage($request)
    {
        dd($request);
    }
    public function deleteStorage($id)
    {
        $productCondit = ProductCondition::all();
        $productCondit->whereIn('storage_id',$id)->each->delete();
        ProductStorage::where('id',$id)->delete();

        return back()->with('message', Alert::_message('success', 'Product Condition Deleted Successfully.'));
    }


    public function color($id)// Color Update and Delete
    {   $product = Product::find($id);
        $colors = Product::find($id)->color;
        //  dd($colors);


        return view('admin.color.index',compact('colors','product'));
    }
    public function storeColor(Request $request)// Color Update and Delete
    {
        // dd($request->all()); 
        // $colors = Product::find($id)->color;


        //dd($request->conditionID[1][0][0]);

        foreach($request->color_name as $key=> $colors)
        {
                    //    dd($colors);

                    if($request->color_ids[$key] != 'null')
                    {
                        $color = ProductColor::find($request->color_ids[$key]);
                        $color->color_name = $colors;
                        $color->product_id = $request->product_id;
                        $color->update();

                    }
                    else
                    {

                        $color = new ProductColor;
                        $color->color_name = $colors;
                        $color->product_id = $request->product_id;
                        $color->save();
                    }
// dd($request->storageID[1]);
                    foreach($request->storageID[$key] as $key2=>$value)
                    {

// dd($value);
                        if($value != 'null')
                        {

                            $storg = ProductStorage::find($value);

                            $storg->storage = $request->storage[$key][$key2];
                            $storg->color_id = $color->id;
                            $storg->update();
                        }
                        else
                        {

                            $storg = new ProductStorage;
                            $storg->storage =  $request->storage[$key][$key2];
                            $storg->color_id = $color->id;
                            // dd($storgs);
                            $storg->save();
                        }

                        //  dd($request->conditionID[$key][$key2]);
                        foreach($request->conditionID[$key][$key2] as $key3=>$valCond)
                        {
                                    // dd($valCond);
                            // foreach($valCond as $key4=> $val){
                                // dd($val);

                            if($valCond != 'null')
                            {
                                // dd($request->conditionID[$key][$key2][$key3]);

                                $condit = ProductCondition::find($valCond);
                                // dd($request->condition);       
                                if($request->condition != null){
                                    $condit->condition = $request->condition[$key][$key2][$key3];
                                  }
                                  
                                
                                $condit->price = $request->price[$key][$key2][$key3];
                                $condit->orig_price = $request->orig_price[$key][$key2][$key3];
                                $condit->quantity = $request->quantity[$key][$key2][$key3];
                                $condit->storage_id = $storg->id;
                                $condit->update();
                                // dd('asds');
                            }
                            else
                            {
                                // dd($storg->id);
                                // dd($request->condition[$key][$key2][$key3]);
                                $condit = new ProductCondition;
                                if($request->condition != null){
                                    $condit->condition = $request->condition[$key][$key2][$key3];
                                  }
                                $condit->price      = $request->price[$key][$key2][$key3];
                                $condit->orig_price = $request->orig_price[$key][$key2][$key3];
                                $condit->quantity   = $request->quantity[$key][$key2][$key3];
                                $condit->storage_id = $storg->id;
                                $condit->save();
                            }
                          
                        }


                    }
                    // dd($request->file('image')[$key]);
                    if($request->hasFile('image'))
                    {
                        $img = "DELETE pp FROM `product_images` pp
                        join products pd on pp.product_id = pd.id
                        WHERE pd.id = ?";
                        $status = \DB::delete($img, array($request->product_id));
                    foreach($request->file('image')[$key] as $image)
                        {


                        $imageName = time().$image->getClientOriginalName();
                        $destination ='storage/images/products';
                        $image->move(public_path($destination), $imageName);

                        $imagefile = new ProductImage;
                        $imagefile->image = $imageName;
                        $imagefile->product_id = $request->product_id;
                        $imagefile->color_id = $color->id;
                        $imagefile->save();

                        }
                    }
                }
                 return back();
    }

    public function deleteColor($id)// Color Update and Delete
    {
        ProductColor::find($id)->delete();
        return back()->with('message', Alert::_message('success', 'Product Color Deleted Successfully.'));
    }


    public function image()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCondition  $productCondition
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCondition $productCondition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCondition  $productCondition
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCondition $productCondition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCondition  $productCondition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCondition $productCondition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCondition  $productCondition
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCondition $productCondition)
    {
        //
    }
}
