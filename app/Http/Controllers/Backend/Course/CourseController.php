<?php

namespace App\Http\Controllers\Backend\Course;

use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseCategory;
use DataTables;
use Validator;
use Auth;

class CourseController extends Controller
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
                $data = Course::with('course_category')->select('id','category_id','title','image');
                if(isset($request->get('order')[0]['column']) && $request->get('order')[0]['column'] == 1) {
                    $data = $data->orderBy('id','desc');
                }
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('check',function($row){ 
                            $check = '';
                            if(Auth::guard()->user()->can('delete-course'))
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
                               $li = '<span class="text-secondary">  InActive </span>';
                            }
                            return $li;
                        })
                        ->addColumn('category_id', function($row){
                            $li = ($row->course_category != null) ? $row->course_category->name : null;
                            return $li;
                        })
                        ->addColumn('action', function($row){
                        $btn ='';
                        if (Auth::user()->can('edit-course') || Auth::guard()->user()->can('delete-course'))
                        {
                            $btn = "<span class=' p-1 bg-secondary text-white border-radius ' style ='border-radius: 20px;'>Access Denied! </span>";
                            if (Auth::user()->can('edit-course'))
                            {
                                $btn = '<a href="'.url('control-panel/manage-course/'.$row->id.'/edit').'" class="edit_icon" title="edit">
                                <i class="fas fa-edit icon_color" ></i> </a>';
                            }
                            if (Auth::user()->can('delete-course'))
                            {
                                $btn = $btn . '<a onclick=deletesingle("'. $row->id .'","control-panel/manage-course","courseDatatable") title="Delete" class="trash_icon"><i class="fas fa-trash-alt icon_color" ></i> </a>';
                            }
                        }
                            return $btn;
                        })
                        ->rawColumns(['action','check','status'])
                        ->make(true);
            }
            return view('backend/course/index');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        try {
                $course_category = CourseCategory::get(); 
                return view('backend/course/create',compact('course_category'));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        try {
                $validator = Validator::make($request->all(), [
                    'title'=> 'required|max:255|min:2|unique:courses,title,NULL,id,deleted_at,NULL',
                    'category_id' => 'required|not_in:0',
                    'description' => 'required|min:10',
                    'instructions' => 'required|min:10',
                    'what_you_learn' => 'required|min:10',
                    'outcomes' => 'required|min:10',
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $course = new course();
                $course->title = $request->title;
                $course->category_id = $request->category_id;
                $course->description = $request->description;
                $course->instructions = $request->instructions;
                $course->what_you_learn = $request->what_you_learn;
                $course->outcomes = $request->outcomes;

                if($request->file('image'))
                {
                    $imageName = time().'.'.request()->image->getClientOriginalExtension();
                    request()->image->move(public_path().'/backend/images/course', $imageName);
                    $course->image = $imageName;
                }
                $course->save();
                return redirect()->route('manage-course.index')
                                 ->with(['message.content' => 'Course Save Successfully!!','message.level' => 'success']);

            } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cms  $cms
     * @return Response
     */
    public function show(Cms $cms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cms  $cms
     * @return Response
     */
    public function edit(Course $course,$id)
    {
        try {
                $course_category = CourseCategory::get(); 
                $course = Course::find($id);
                if(empty($course))
                {
                    return back()->with(['message.content' => 'Course not found!!','message.level' => 'danger']);
                }
               return view('backend/course/edit',compact('course','course_category'));
           } catch (Exception $e) {
            return $e->getMessage();
           }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cms  $cms
     * @return Response
     */
    public function update(Request $request,$id)
    {
        try {
                $validator = Validator::make($request->all(), [
                    'title'=> 'required|max:255|min:2|unique:courses,title,'.$id.',id,deleted_at,NULL',
                    'category_id' => 'required|not_in:0',
                    'description' => 'required|min:10',
                    'instructions' => 'required|min:10',
                    'what_you_learn' => 'required|min:10',
                    'outcomes' => 'required|min:10',
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $course = Course::find($id);
                if(!empty($course))
                {
                    $course->title = $request->title;
                    $course->category_id = $request->category_id;
                    $course->description = $request->description;
                    $course->instructions = $request->instructions;
                    $course->what_you_learn = $request->what_you_learn;
                    $course->outcomes = $request->outcomes;

                    if($request->file('image'))
                    {
                        if($course->image){
                            $file = public_path('/backend/images/course/').$course->image;
                            if (file_exists($file)) {
                                unlink($file);
                            }
                        }
                        $imageName = time().'.'.request()->image->getClientOriginalExtension();
                        request()->image->move(public_path('/backend/images/course/'), $imageName);
                        $course->image = $imageName;
                    } 
                    $course->save();
                    return redirect()->route('manage-course.index')
                                 ->with(['message.content' => 'Course update Successfully!!','message.level' => 'success']);
                }else{
                    return redirect()->route('manage-course.index')
                                 ->with(['message.content' => 'Course not found!!','message.level' => 'error']);
                }
            } catch (Exception $e) {
                return $e->getMessage();
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cms  $cms
     * @return Response
     */
    public function destroy($id)
    {
        try {
                $course = Course::where('id',$id)->get();
                if(count($course) > 0)
                    {
                        Course::where('id',$id)->delete();
                        $response = array('data' => null,'status' => 1,'responseMessage' => "Course Delete successfully.");
                    }else{
                        $response = array('data' => null,'status' => 0,'responseMessage' => "Data Not found!!.");
                    }
                    return response()->json($response)->setStatusCode(200);
            } catch (Exception $e) {
                return $e->getMessage();
            }
    }

    public function multipleCourseDelete(Request $request)
        {
            try {
                    $course = Course::whereIn('id',$request->ids)->get();
                    if(count($course) > 0)
                    {
                        Course::whereIn('id',$request->ids)->delete();
                        $response = array('data' => null,'status' => 1,'responseMessage' => "Course list Deleted successfully.");
                    }else{
                        $response = array('data' => null,'status' => 0,'responseMessage' => "Data Not found!!.");
                    }
                    return response()->json($response)->setStatusCode(200);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
}
