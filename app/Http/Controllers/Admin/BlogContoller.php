<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Alert;
class BlogContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
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

        if($request->hasFile('image'))
        {
            $image=$request->file('image');
            $image_new = time().$image->getClientOriginalName();
            $image->move('storage/image/blog/',$image_new);

        }

        $blog = new Blog;
        $blog->title = $request->title;
        $blog->desc = $request->desc;
        $blog->image = 'storage/image/blog/'.$image_new;
        $blog->save();

        return back()->with('message', Alert::_message('success','Blog Successfully Created'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $blog = Blog::find($id);
       return view('admin.blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->hasFile('image'))
        {
            $image=$request->file('image');
            $image_new = time().$image->getClientOriginalName();
            $image->move('storage/image/blog/',$image_new);

        }

        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->desc = $request->desc;
        $blog->image = 'storage/image/blog/'.$image_new;
        $blog->save();

        return back()->with('message', Alert::_message('success','Blog Successfully Updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $image = Blog::find($id);

        // unlink(asset($image->image));

        Blog::where("id", $id)->delete();

        return back()->with('message', Alert::_message('success','Blog Successfully Deleted'));

    }

    public function single($id)
    {
        $blog = Blog::find($id);
        return view('frontend.blog',compact('blog'));
    }
}
