<?php

namespace App\Http\Controllers;

use App\Models\AccessoryCategory;
use App\Models\Alert;
use Illuminate\Http\Request;
use Square\Models\CatalogCategory;

class AccessoryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = AccessoryCategory::all();
        return view('admin.accessoryCategory.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.accessoryCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new AccessoryCategory;
        $category->insert($request->only($category->getFillable()));
        return back()->with('message', Alert::_message('success', 'Accesssory Category Created Successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccessoryCategory  $accessoryCategory
     * @return \Illuminate\Http\Response
     */
    public function show(AccessoryCategory $accessoryCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccessoryCategory  $accessoryCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = AccessoryCategory::find($id);
        return view('admin.accessoryCategory.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccessoryCategory  $accessoryCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $category = AccessoryCategory::find($id);
        $category->update($request->only($category->getFillable()));
        return back()->with('message', Alert::_message('success', 'Accesssory Category Update Successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccessoryCategory  $accessoryCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         AccessoryCategory::find($id)->delete();
        return back()->with('message', Alert::_message('danger', 'Accesssory Category Deleted Successfully.'));
    }
}
