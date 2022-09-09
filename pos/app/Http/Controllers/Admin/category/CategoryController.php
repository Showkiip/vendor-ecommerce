<?php

namespace App\Http\Controllers\Admin\category;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.create', compact('categories'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.category.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);
        $category =  new Category;
        $created_at = Carbon::now();
        $request->merge(['active' => 0, 'created_at' => $created_at]);
        $category->insert($request->only($category->getFillable()));
        $categories = Category::all();
        return view('admin.category.create', compact('categories'))->with('status', 'Category Created!');
    }
    public function editing(Request $request)
    {
        $user = Category::where('id', $request->user_id)->first();
        return response()->json($user);
    }
    public function updated(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);
        $category =  new Category;
        $updated_at = Carbon::now();
        $request->merge(['updated_at' => $updated_at]);
        $category->where('id', $request->id)->update($request->only($category->getFillable()));
        return back()->with('status', 'Product Updated!');
    }
    public function destroy($id)
    {   
        Product::where('category_id',$id)->delete();
        Category::find($id)->delete();
        return redirect()->back()->with('status', 'Delete Successfull!');
    }


}
