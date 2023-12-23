<?php

namespace App\Http\Controllers\api;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class ApiController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }
    //
    public function all_articles(){
        $articles = Blog::all();

        return response()->json(['success' => true,"article"=>$articles], 201);
    }

    public function get_article_by_category($category_id){
        $article_list = Blog::where('category_id', $category_id)->get();
        return response()->json(['success' => true,"article_list"=>$article_list], 201);
    }

    public function get_article_by_slug(Blog $slug){
        return response()->json(['success' => true,"article"=>$slug], 201);
    }

    public function all_articles_by_author($author_name){
        $article_list = Blog::where('author', ucfirst($author_name))->get();
        return response()->json(['success' => true,"article_list"=>$article_list], 201);
    }
    

    public function create_article(Request $request){
          $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'slug'=>'required',
            'category_id' => 'required',
            'author' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }else{
            $blog = new Blog();
            $blog ->title = $request->get('title');
            $blog ->content  = $request->get('content');
            $blog ->slug  = $request->get('slug');
            $blog ->author  = $request->get('author');
            $blog->category_id = $request->get('category_id');
            $blog->save();
            return response()->json(['success' => true,"message"=>"Article is created succesfully"], 201);

        }
         
          
    }

    public function update_article($id,Request $request){

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'slug'=>'required',
            'category_id' => 'required',
            'author' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }else{
       
         $blog =Blog::find($id);
         $blog->update($request->all());
         return $blog;
        }   
        
    }

    public function delete_article($id){
        
        $article = Blog::findOrFail($id);
        if($article){
            $article->delete();
            $status= "true";
            $message = "Article deleted successfully";
        }else{
            $status= "false";
            $message = "Article is not deleted";

        }
        return response()->json(['success' =>$status ,"message"=>$message], 201);

    }
}
