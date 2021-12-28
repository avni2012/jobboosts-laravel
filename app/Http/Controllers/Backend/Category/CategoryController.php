<?php

namespace App\Http\Controllers\Backend\Category;

use Exception;
use Illuminate\View\View;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Validator;
use DataTables;
use Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        try {
                if ($request->ajax()) {
                $data = Category::with('categoryName')->latest()->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('parentcategory',function($row){
                            $parentcat = '';
                            if($row->categoryName){
                                $parentcat = $row->categoryName->name;
                            }else{
                               $parentcat = "<span class='text-secondary'>NULL</span>";
                            }
                            return $parentcat;
                        })
                        ->addColumn('check',function($row){
                            $check = '';
                            if(Auth::guard()->user()->can('delete-category'))
                            {
                                $check = '<label class="container_chk"> <input type="checkbox" value="'.$row->id.'"><span class="checkmark"></span></label>';
                            }
                            return $check;
                        })
                        ->addColumn('image',function($row){
                            $image = '';
                            if($row->image){
                                $image = ' <image src="'.url('/images/'.$row->image).'" hight="50px" width="50px" />';
                            }else{
                              $image = '<span class="text-secondary">  NULL </span>';

                            }
                            return $image;
                        })
                        ->addColumn('status', function($row){
                            if($row->status == 1)
                            {
                               $li = '<span class="text-success">  Active </span>';
                            }else{
                               $li = '<span class="text-secondary">  InActive </span>';
                            }
                            return $li;
                        })
                        ->addColumn('action', function($row){
                        $btn ='';
                        if (Auth::user()->can('edit-category') || Auth::guard()->user()->can('delete-category'))
                        {
                            $btn = "<span class=' p-1 bg-secondary text-white border-radius ' style ='border-radius: 20px;'>Access Denied! </span>";

                            if (Auth::user()->can('edit-category'))
                            {
                                 $btn = '<a href="'.url('control-panel/manage-category/'.$row->id.'/edit').'" class="edit_icon">
                                <i class="fas fa-edit icon_color" ></i> </a>';
                            }
                            if (Auth::user()->can('delete-category'))
                            {
                                $btn = $btn . '<a onclick=deletesingle("'. $row->id .'","control-panel/manage-category","categoryDatatable")  class="trash_icon"><i class="fas fa-trash-alt icon_color" ></i> </a>';
                            }
                        }
                            return $btn;
                        })
                        ->rawColumns(['action','check','image','status','parentcategory'])
                        ->make(true);
            }

            return view('backend.category.index');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return string
     */
    public function create()
    {
        try {
            $parent_category_list = Category::where('parent_category',null)->get();
            return view('backend.category.create',compact('parent_category_list'));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return string
     */
    public function store(Request $request)
    {
        try {
             $validator = Validator::make($request->all(), [
                'name'  => 'required|max:255|min:2|unique:category,name,NULL,id,deleted_at,NULL',
                'slug'  => 'required|max:255|alpha_dash|min:2|unique:category,slug,NULL,id,deleted_at,NULL',
                'image' => 'mimes:jpeg,jpg,png,gif|max:10000', // max 10000kb'
                'seo_title' => 'max:255',
                'description'   => 'required|min:10',
                'status'        => 'required',
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $category = new Category;
                $category->name          = $request->name;
                $category->slug          = $request->slug;
                $category->parent_category = $request->parent_category;
                $category->description   = $request->description;
                $category->seo_title     = $request->seo_title;
                $category->seo_description = $request->seo_description;
                $category->status        = $request->status;

                if($request->file('image'))
                {
                    $imageName = time().'.'.request()->image->getClientOriginalExtension();
                    request()->image->move(public_path().'/images/category', $imageName);
                    $category->image    = 'category/'.$imageName;
                }
                $category->save();
                return redirect()->route('manage-category.index')
                                 ->with(['message.content' => 'Category Save Successfully!!','message.level' => 'success']);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Category  $category
     * @return Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Category  $category
     * @return Response
     */
    public function edit($id)
    {
        try {
            $parent_category_list = Category::where('parent_category',null)->get();
            $category = Category::find($id);
               if(empty($category))
               {
                return back()->with(['message.content' => 'category not found!!','message.level' => 'danger']);
               }
               return view('backend/category/edit',compact('category','parent_category_list'));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Model\Category  $category
     *
     * @return Response
     */
    public function update(Request $request,$id)
    {
          try {
            $validator = Validator::make($request->all(), [
                'name'  => 'required|string|max:255|min:2|unique:category,name,'.$id.',id,deleted_at,NULL',
                'slug'  => 'required|alpha_dash|max:255|min:2|unique:category,slug,'.$id.',id,deleted_at,NULL',
                'image' => 'mimes:jpeg,jpg,png,gif|max:10000', // max 10000kb'
                'seo_title' => 'max:255',
                'description' => 'required|min:10',
                'status'    => 'required',
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $category = Category::find($id);
                if($category)
                {
                    $category->name          = $request->name;
                    $category->slug          = $request->slug;
                    $category->description   = $request->description;
                    $category->seo_title     = $request->seo_title;
                    $category->seo_description = $request->seo_description;
                    $category->status        = $request->status;
                    $category->parent_category = $request->parent_category;
                    if($request->file('image'))
                    {
                        if($category->image){
                            $file = public_path('images/').$category->image;
                            if (file_exists($file)) {
                                unlink($file);
                            }
                        }
                        $imageName   = time().'.'.request()->image->getClientOriginalExtension();
                        request()->image->move(public_path('images/category'), $imageName);
                        $category->image     = 'category/'.$imageName;
                    }
                    $category->save();
                }else{
                    return redirect()->back()
                                 ->with(['message.content' => 'Category not found!!','message.level' => 'danger']);
                }
                return redirect()->route('manage-category.index')
                                 ->with(['message.content' => 'Category update Successfully!!','message.level' => 'success']);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Category  $category
     * @return Response
     */
    public function destroy($id)
    {
        try {
                $category = Category::where('id',$id)->get();
                if(count($category) > 0)
                    {
                        Category::where('id',$id)->delete();
                        $response = array('data' => null,'status' => 1,'responseMessage' => "Category Delete successfully.");
                    }else{
                        $response = array('data' => null,'status' => 0,'responseMessage' => "Category Not found!!.");
                    }
                    return response()->json($response)->setStatusCode(200);
            } catch (Exception $e) {
                return $e->getMessage();
            }
    }
    public function multipleCategoryDelete(Request $request)
    {
        try {
                $category = Category::whereIn('id',$request->ids)->get();
                if( count($category) > 0)
                {
                    Category::whereIn('id',$request->ids)->delete();
                    $response = array('data' => null,'status' => 1,'responseMessage' => "Caq list Delete successfully.");
                }else{
                    $response = array('data' => null,'status' => 0,'responseMessage' => "Caq Not found!!.");
                }
                return response()->json($response)->setStatusCode(200);
            } catch (Exception $e) {
                return $e->getMessage();
            }
    }
}
