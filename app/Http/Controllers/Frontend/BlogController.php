<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Validator;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Tag;
use DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        try {
                $blog_categories = $this->blog_categories();
                $tags = $this->tags();
                $recent_posts = $this->recent_posts();
                $data = $request->all();
                $blogs = Blog::with('coaches')->where('publish_date','<=',date('Y-m-d'))->where('status',1)->orderBy('publish_date','desc')->latest()->paginate(10);
                if($request->has('category')){
                    $check_category_exists = BlogCategory::where('id',$request->get('category'))->first();
                    if($check_category_exists){
                        $blogs = Blog::with('coaches')->where('category',$request->get('category'))->where('publish_date','<=',date('Y-m-d'))->orderBy('publish_date','desc')->latest()->paginate(10);
                    }else{
                        return redirect()->route('blog');
                    }
                }
                if($request->has('tag')){
                    $check_tag_exists = Tag::where('id',$request->get('tag'))->first();
                    if($check_tag_exists){
                        $blogs = Blog::with('coaches')->whereRaw("find_in_set('".$request->get('tag')."',blogs.tag)")->where('publish_date','<=',date('Y-m-d'))->orderBy('publish_date','desc')->latest()->paginate(10);
                    }else{
                        return redirect()->route('blog');
                    }
                }
                return view('frontend.blog',compact('blogs','blog_categories','tags','recent_posts','data'));
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function blogDetails($id)
    {
        try {
                $blog_detail = Blog::with('coaches')->where('slug',$id)->first();
                if(!empty($blog_detail->id)){
                    $tag_array = explode(',',$blog_detail->tag);
                    $get_tags = Tag::select('name')->whereIn('id',$tag_array)->get();
                }
                if(!$blog_detail){
                    return redirect()->route('blog');
                }
                $blog_categories = $this->blog_categories();
                $tags = $this->tags();
                $recent_posts = $this->recent_posts();
                $previous_blog = Blog::where('id','<',$blog_detail->id)->max('id');
                if($previous_blog > 0){
                    $previous_blog_detail = Blog::where('id',$previous_blog)->first();
                }else{
                    $previous_blog_detail = null;
                }
                $next_blog = Blog::where('id','>',$blog_detail->id)->min('id');
                if($next_blog > 0){
                    $next_blog_detail = Blog::where('id',$next_blog)->first();
                }else{
                    $next_blog_detail = null;
                }
                return view('frontend.blog-detail',compact('blog_detail','blog_categories','tags','recent_posts','get_tags','previous_blog_detail','next_blog_detail'));
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function searchBlogs(Request $request)
    {
        try {
                if(!empty($request->search_blog)){
                    $content = htmlspecialchars($request->search_blog);
                    $blogs = Blog::with('coaches')->where('title', 'LIKE', "%$request->search_blog%")->orWhere('content', 'LIKE', "%$content%")->where('publish_date','<=',date('Y-m-d'))->orderBy('publish_date','desc')->latest()->paginate(2);
                }else{
                    $blogs = Blog::with('coaches')->where('publish_date','<=',date('Y-m-d'))->orderBy('publish_date','desc')->latest()->paginate(2);
                }
                $blog_categories = $this->blog_categories();
                $tags = $this->tags();
                $recent_posts = $this->recent_posts();
                return view('frontend.blog',compact('blogs','blog_categories','tags','recent_posts'));
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function blog_categories()
    {
        try {
                $blog_categories = BlogCategory::withCount('blogs')->get();
                return $blog_categories;
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function tags()
    {
        try {
                $tags = Tag::withCount('tags')->orderBy('tags_count','desc')->get();
                return $tags;
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

    public function recent_posts()
    {
        try {
                $recent_posts = Blog::where('publish_date','<=',date('Y-m-d'))->orderBy('publish_date','desc')->take(3)->latest()->get();
                return $recent_posts;
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()), 400);
        }
    }

}
