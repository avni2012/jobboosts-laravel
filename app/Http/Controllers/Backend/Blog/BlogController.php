<?php

namespace App\Http\Controllers\Backend\Blog;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Coach;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use Auth;

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
            if ($request->ajax()) {
                $data = Blog::with('blog_categories');
                if(isset($request->get('order')[0]['column']) && $request->get('order')[0]['column'] == 1) {
                    $data = $data->orderBy('id','desc');
                }
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('category', function ($row) {
                            return $row->blog_categories ? $row->blog_categories->name : '-';
                        })
                        ->addColumn('check',function($row){
                            $check = '';
                            if(Auth::guard()->user()->can('delete-blog'))
                            {
                                $check = '<label class="container_chk"> <input type="checkbox" value="'.$row->id.'"><span class="checkmark"></span></label>';
                            }
                            return $check;
                        })
                        ->addColumn('status', function($row){
                            if($row->status == 1)
                            {
                               $li = '<span class="text-success">  Active </span>';
                            }else{
                               $li = '<span class="text-danger">  InActive </span>';
                            }
                            return $li;
                        })
                        ->addColumn('action', function($row){
                        $btn ='';
                        if (Auth::user()->can('edit-blog') || Auth::guard()->user()->can('delete-blog'))
                        {
                            $btn = "<span class=' p-1 bg-secondary text-white border-radius ' style ='border-radius: 20px;'>Access Denied! </span>";


                            if (Auth::user()->can('edit-blog'))
                            {
                                 $btn = '<a href="'.url('control-panel/manage-blog/'.$row->id.'/edit').'" class="edit_icon" title="Edit">
                                <i class="fas fa-edit icon_color" ></i> </a>';
                            }
                            if (Auth::user()->can('delete-blog'))
                            {
                                $btn = $btn . '<a onclick=deletesingle("'. $row->id .'","control-panel/manage-blog","blogDatatable") title="Delete" class="trash_icon"><i class="fas fa-trash-alt icon_color" ></i> </a>';
                            }
                        }
                            return $btn;
                        })
                        ->rawColumns(['action','check','status'])
                        ->make(true);
            }

            return view('backend.blogs.index');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $categories = BlogCategory::where('status',1)->get();
            $coaches = Coach::get();
            $tags = Tag::where('status',1)->get();
            /*if(count($categories) == 0) {
                return redirect()->back()
                    ->with(['message.content' => 'Faq categories not found!','message.level' => 'danger']);
            }*/
            return view('backend.blogs.create', compact('categories','coaches','tags'));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
                $validator = Validator::make($request->all(), [
                    'title'  => 'required|max:255|min:2',
                    'slug' => 'required|max:255|min:2|alpha_dash|unique:blogs,slug,NULL,id,deleted_at,NULL',
                    'category' => 'required',
                    'content'   => 'required|min:15',
                    'author' => 'nullable',
                    'tag' => 'required',
                    'publish_date' => 'required|date|date_format:Y-m-d',
                    'blog_image' => 'mimes:jpg,jpeg,png', //|mimes:jpeg,jpg,png,gif|max:10000', // max 10000kb'
                    'youtube_video_link' => 'nullable'
                ],
                [
                    'category.required' => 'The blog category field is required.'
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();           
                }
                $tags = $request->tag;
                $get_tags = implode(',', $tags);

                // $blog_slug = str_slug($request->title);
                $blog = new Blog;
                $blog->title = $request->title;
                $blog->slug = $request->slug;
                // $blog->slug = $blog_slug;
                $blog->content = $request->content;
                $blog->category = $request->category;
                $blog->author = $request->author;
                $blog->tag = $get_tags;
                $blog->publish_date = date('Y-m-d', strtotime($request->publish_date));
                $blog->status = $request->status;
                $blog->youtube_video_link = $request->youtube_video_link;

                if($request->file('blog_image'))
                {
                    $imageName = time().'.'.request()->blog_image->getClientOriginalExtension();
                    request()->blog_image->move(public_path().'/backend/images/blogs/', $imageName);
                    $blog->blog_image = 'blogs/'.$imageName;
                }
                $blog->save();
                return redirect()->route('manage-blog.index')
                                ->with(['message.content' => 'Blog Saved Successfully!!','message.level' => 'success']);                   
        } catch (Exception $e) {
            return redirect()->route('manage-blog.index')
                                ->with(['message.content' => $e->getMessage(),'message.level' => 'error']);           
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        try {

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $categories = BlogCategory::get();
            $coaches = Coach::get();
            $tags = Tag::where('status',1)->get();
            $blog = Blog::find($id);
            if(!empty($blog->id)){
                $blog_array = explode(',',$blog->tag);
            }
               if(empty($blog))
               {
                return back()->with(['message.content' => 'Blog not found!!','message.level' => 'danger']);
               }
               return view('backend/blogs/edit',compact('blog','categories','coaches','tags','blog_array'));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
                $validator = Validator::make($request->all(), [
                    'title'  => 'required|max:255|min:2',
                    'slug' => 'required|string|max:255|min:2|alpha_dash|unique:blogs,slug,'.$id.',id,deleted_at,NULL',
                    'category' => 'required',
                    'content'   => 'required|min:15',
                    'author' => 'nullable',
                    'tag' => 'required',
                    'publish_date' => 'required|date|date_format:Y-m-d',
                    'blog_image' => 'mimes:jpg,jpeg,png', //|mimes:jpeg,jpg,png,gif|max:10000', // max 10000kb'
                    'youtube_video_link' => 'nullable'
                ],
                [
                    'category.required' => 'The blog category field is required.'
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();           
                }
                $tags = $request->tag;
                $get_tags = implode(',', $tags);

                // $blog_slug = str_slug($request->title);
                $blog = Blog::with('blog_categories')->find($id);
                if(!empty($blog))
                {
                    $blog->title       = $request->title;
                    $blog->slug = $request->slug;
                    // $blog->slug = $blog_slug;
                    $blog->content = $request->content;
                    $blog->category = $request->category;
                    $blog->author = $request->author;
                    $blog->tag = $get_tags;
                    $blog->publish_date = date('Y-m-d', strtotime($request->publish_date));
                    $blog->status = $request->status;
                    $blog->youtube_video_link = $request->youtube_video_link;

                    if($request->file('blog_image'))
                    {
                        if($blog->blog_image){
                            $file = public_path('/backend/images/blogs/').$blog->blog_image;
                            if (file_exists($file)) {
                                unlink($file);
                            }
                        }
                        $imageName = time().'.'.request()->blog_image->getClientOriginalExtension();
                        request()->blog_image->move(public_path('/backend/images/blogs/'), $imageName);
                        $blog->blog_image = 'blogs/'.$imageName;
                    } /*else {
                        $blog->blog_image = $request->blog_image;
                    }*/
                    $blog->save();
                    return redirect()->route('manage-blog.index')
                                    ->with(['message.content' => 'Blog updated Successfully!!','message.level' => 'success']);
                }else{
                    return redirect()->back()
                        ->with(['message.content' => 'Blog not found!!','message.level' => 'danger']);
                }   
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
                $blog = Blog::where('id',$id)->get();
                if(count($blog) > 0)
                    {
                        Blog::where('id',$id)->delete();
                        $response = array('data' => null,'status' => 1,'responseMessage' => "Blog Delete successfully.");
                    }else{
                        $response = array('data' => null,'status' => 0,'responseMessage' => "Blog Not found!!.");
                    }
                    return response()->json($response)->setStatusCode(200);
            } catch (Exception $e) {
                return $e->getMessage();
            }
    }
    public function multipleBlogDelete(Request $request)
    {
        try {
                $blog = Blog::whereIn('id',$request->ids)->get();
                if(count($blog) > 0)
                {
                    Blog::whereIn('id',$request->ids)->delete();
                    $response = array('data' => null,'status' => 1,'responseMessage' => "Blog list Delete successfully.");
                }else{
                    $response = array('data' => null,'status' => 0,'responseMessage' => "Blog Not found!!.");
                }
                return response()->json($response)->setStatusCode(200);
            } catch (Exception $e) {
                return $e->getMessage();
            }
    }

    public function addCategory(Request $request)
    {
        try {
                $validator = Validator::make($request->all(), [
                    'name'  => 'required|min:2|unique:blog_categories,name,NULL,id,deleted_at,NULL',
                ],[
                    'name.required' => 'The blog category name field is required.'
                ]);
                if ($validator->fails()) {
                    return response()->json(['error'=>$validator->errors()->all()]);
                }
                $blogCategory = new BlogCategory;
                $blogCategory->name = $request->name;
                $blogCategory->status = $request->status;
                if($blogCategory->save()){
                    $response = array('data' => $blogCategory, 'status' => 1,'responseMessage' => "Blog category saved successfully.");
                    return response()->json($response)->setStatusCode(200);
                }else{
                    $response = array('data' => null, 'status' => 0,'responseMessage' => "Something went wrong!!!!");
                    return response()->json($response)->setStatusCode(200);
                }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function addTag(Request $request)
    {
        try {
                $validator = Validator::make($request->all(), [
                    'name'  => 'required|min:2|unique:tags,name,NULL,id,deleted_at,NULL',
                ],[
                    'name.required' => 'The tag name field is required.'
                ]);
                if ($validator->fails()) {
                    return response()->json(['error'=>$validator->errors()->all()]);
                }
                $tags = new Tag;
                $tags->name = $request->name;
                $tags->status = $request->status;
                if($tags->save()){
                    $response = array('data' => $tags, 'status' => 1,'responseMessage' => "Tag saved successfully.");
                    return response()->json($response)->setStatusCode(200);
                }else{
                    $response = array('data' => null, 'status' => 0,'responseMessage' => "Something went wrong!!!!");
                    return response()->json($response)->setStatusCode(200);
                }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}
