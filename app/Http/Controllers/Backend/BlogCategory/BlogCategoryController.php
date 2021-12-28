<?php

namespace App\Http\Controllers\Backend\BlogCategory;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use Auth;

class BlogCategoryController extends Controller
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
                $data = BlogCategory::latest()->get();
                /*if(isset($request->get('order')[0]['column']) && $request->get('order')[0]['column'] == 1) {
                    $data = $data->orderBy('id','desc');
                }*/
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('category', function ($row) {
                            return $row->category ? $row->blog_categories->name : '-';
                        })
                        ->addColumn('check',function($row){
                            $check = '';
                            if(Auth::guard()->user()->can('delete-blog-category'))
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
                        if (Auth::user()->can('edit-blog-category') || Auth::guard()->user()->can('delete-blog-category'))
                        {
                            /*$btn = "<span class=' p-1 bg-secondary text-white border-radius ' style ='border-radius: 20px;'>Access Denied! </span>";*/
                            /*if (Auth::user()->can('edit-blog-category'))
                            {
                                $btn = '<a href="#" class="edit_icon" data-toggle="modal" data-target="#updateBlogCategory" onclick="BlogCategoryFunction('.$row->id.')"><i class="fas fa-edit icon_color"></i></a>';
                            }*/
                            if (Auth::user()->can('delete-blog-category'))
                            {
                                $btn = $btn . '<form method="POST"><a onclick=deletesingleBlogCategory("'. $row->id .'","control-panel/manage-blog-category","blogCategoryDatatable")  class="trash_icon"><i class="fas fa-trash-alt icon_color" ></i> </a></form>';
                            }
                        }
                            return $btn;
                        })
                        ->rawColumns(['action','check','status'])
                        ->make(true);
            }

            return view('backend.blog_category.index');
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
            return view('backend.blogs.create');
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
                    'name'  => 'required|min:2|unique:blog_categories,name,NULL,id,deleted_at,NULL',
                ]);
                if ($validator->fails()) {
                    return response()->json(['error'=>$validator->errors()->all()]);
                }
                /*$blogCategory = new BlogCategory;
                $blogCategory->name = $request->name;
                $blogCategory->status = $request->status;
                if($blogCategory->save()){
                    $response = array('data' => $blogCategory, 'status' => 1,'responseMessage' => "Blog category saved successfully.");
                    return response()->json($response)->setStatusCode(200);*/
                $blogCategory = BlogCategory::updateOrCreate([
                    'id' => $request->id
                    ],
                    [
                        'name' =>  $request->name, 
                        'status'=> $request->status
                    ]);

                    $message = ($request->id)?"Data updated successfully.":"Data stored successfully.";
                    $response = array('data' => null,'status' => 1,'responseMessage' => $message );
                    return response()->json($response)->setStatusCode(200);
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()))->setStatusCode(400);
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
                $blog_category = BlogCategory::find($id);
                if($blog_category)
                {
                    $response = array('data' => $blog_category,'status' => 1,'responseMessage' => "Blog Categroy fetch successfully.");
                    return response()->json($response)->setStatusCode(200);
                }else{
                     $response = array('data' => null,'status' => 0,'responseMessage' => "Blog Categroy not found!!");
                    return response()->json($response)->setStatusCode(200);
                }
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
                $blog_category = BlogCategory::where('id',$id)->get();
                if(count($blog_category) > 0)
                    {
                        $blog_count = Blog::where('category',$id)->count();
                        if($blog_count > 0){
                            $blog = array(
                                'category_id' => $id,
                                'count' => $blog_count 
                            );
                            $response = array('data' => $blog, 'responseMessage' => "This category contains blogs Once deleted You won't be able to get this data!");
                            return response()->json($response)->setStatusCode(200);
                        }else{
                            BlogCategory::where('id',$id)->delete();
                            $response = array('data' => null,'status' => 1,'responseMessage' => "Blog Categroy Delete successfully.");
                            return response()->json($response)->setStatusCode(200);
                        }
                    }else{
                        $response = array('data' => null,'status' => 0,'responseMessage' => "Blog Categroy Not found!!.");
                        return response()->json($response)->setStatusCode(200);
                    }
            } catch (Exception $e) {
                // return $e->getMessage();
                return response()->json(array('responseMessage' => $e->getMessage()))->setStatusCode(400);
            }
    }

    public function deleteBlogCategoryWithBlogs(Request $request)
    {
        try {
                $blog_category = BlogCategory::where('id',$request->id)->get();
                if(count($blog_category) > 0)
                    {
                        BlogCategory::where('id',$request->id)->delete();
                        $response = array('data' => null,'status' => 1,'responseMessage' => "Blog Categroy Delete successfully.");
                    }else{
                        $response = array('data' => null,'status' => 0,'responseMessage' => "Blog Categroy Not found!!.");
                    }
                    return response()->json($response)->setStatusCode(200);
            } catch (Exception $e) {
                return response()->json(array('responseMessage' => $e->getMessage()))->setStatusCode(400);
            }
    }

    public function multipleBlogCategoryDelete(Request $request)
    {
        try {
                $blog_category = BlogCategory::whereIn('id',$request->ids)->get();
                if(count($blog_category) > 0)
                {
                    BlogCategory::whereIn('id',$request->ids)->delete();
                    $response = array('data' => null,'status' => 1,'responseMessage' => "Blog Categroy list Delete successfully.");
                }else{
                    $response = array('data' => null,'status' => 0,'responseMessage' => "Blog Category Not found!!.");
                }
                return response()->json($response)->setStatusCode(200);
            } catch (Exception $e) {
                return response()->json(array('responseMessage' => $e->getMessage()))->setStatusCode(400);
            }
    }

}
