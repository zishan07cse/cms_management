<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $bloglist = Blog::all();
        $categorylist = Category::all();
        return view('blogs/index')->with('bloglist',$bloglist)->with('categorylist',$categorylist);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request)
    {
        //
        $request->validate([
            'id' => 'required',
            'content' => 'required',
            'slug' => 'required',
            'author' => 'required',
            'category_id' => 'required',
        ]);
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->category_id = $request->category_id;
        $blog->slug = $request->slug;
        $blog->content = $request->content;
        $blog->author = $request->author;
        $blog->save();
        return redirect()->back()->with('status', 'Blog added sucessfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $request->validate([
            'id' => 'required',
            'content' => 'required',
            'slug' => 'required',
            'author' => 'required',
            'category_id' => 'required',
        ]);
        
        $blog =Blog::find($request->get('id'));
        $blog->update($request->all());
        return redirect()->back()->with('status', 'Blog updated sucessfully');
    }

    public function ajaxRequestPost(Request $request){
        $article = Blog::where('id', $request['id'])->get();
        return response()->json(array('article' => $article), 200);
    }
    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Blog $blog)
    // {
    //     dd('in delete');
    //     $blog->delete();
    //     return redirect()->back()->with('status', 'Blog deleted successfully');
    // }
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->back()->with('status', 'Blog deleted successfully');
    }

}
