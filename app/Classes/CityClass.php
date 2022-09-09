<?php
namespace App\Classes;

use App\Models\Accessory;
use App\Models\AccessoryCategory;
use DB;
use Session;

use App\Models\User;
use App\Models\Tech;
use App\Models\ShippingAddr;
use App\Models\Brand;
use App\Models\Pmodel;
use App\Models\RepairType;
use App\Models\ZipCode;
use App\Models\RepairOrder;
use App\Models\RepairOrderType;
use App\Models\Admin;
use App\Models\Alert;
use App\Models\Blog;
use App\Models\City;
use App\Models\Faq;
use App\Models\Order;
use App\Models\OrderSale;
use App\Models\OrderTime;
use App\Models\PhoneService;
use App\Models\ProductCondition;
use App\Models\State;
use App\Models\Wishlist;
use App\Models\Storage;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class CityClass {

	function brands(){
	 return Brand::orderBy('brand_name','asc')->get();
	}

	function brandName($id){
	 return Brand::whereId($id)->first()->brand_name;
	}

	function allModels(){
	    return Pmodel::orderBy('id','asc')->get();
	}

	function modelName($id){
	 return Pmodel::whereId($id)->first()->model_name;
	}

	function allAdmin(){

		return User::whereRole('admin')->get();
	}
	function allTech(){

		// return User::whereRole('tech')->where('jobStatus','available')->get();
        return User::whereRole('tech')->get();
	}
    function ZipCode()
    {
      return ZipCode::orderBy('id','desc')->get();
    }
    function Storages()
    {
      return Storage::orderBy('id','desc')->get();
    }
    function allUser()
    {
      return User::whereRole('user')->get();
    }

    function allBlog()
    {
        return Blog::orderBy('id','desc')->get();
    }
	function orderTimes()
    {
        return OrderTime::orderBy('id','asc')->get();
    }
    function orderTimeDetail($id)
    {
        return OrderTime::where('id',$id)->first();
    }
    function shippingAddress()
    {
        return ShippingAddr::where('userId',Auth::user()->id)->get();
    }


    function checkWishlist($id)
    {

        $check=Wishlist::where('user_id',Auth::user()->id)->where('product_id',$id)->first();
        if($check)
        {
            return "1";
        }
        else
        {
            return "0";
        }

    }
    function accessWishlist($id)
    {

        $check=Wishlist::where('user_id',Auth::user()->id)->where('accessory_id',$id)->first();
        if($check)
        {
            return "1";
        }
        else
        {
            return "0";
        }

    }

    function orderlist($id)
    {
        return OrderSale::where('user_id',$id)->get();
    }

    function role()
    {
        return Role::all();
    }

    function accessory()
    {
        return Accessory::orderBy('id','desc')->paginate(9);
    }
    function phoneServices()
    {
        return PhoneService::orderBy('created_at','asc')->get();
    }

    function faqs()
    {
        return Faq::orderBy('created_at','asc')->get();
    }
    function accessCategory()
    {
        return AccessoryCategory::orderBy('created_at','asc')->get();
    }
    function states()
    {
        return State::orderBy('name','asc')->get();
    }
    function city($id)
    {
        return City::where('id',$id)->get();
    }
}

?>
