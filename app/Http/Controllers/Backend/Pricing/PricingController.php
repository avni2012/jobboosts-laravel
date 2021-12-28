<?php

namespace App\Http\Controllers\Backend\Pricing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use Validator;
use App\User;
use App\Models\Pricing;
use App\Helpers\PricingIncludes;
use Auth;
use App\Models\CourseCategory;

class PricingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{
            if ($request->ajax()) {
                $pricing = Pricing::latest()->get();
                return Datatables::of($pricing)
                        ->addIndexColumn()
                        ->addColumn('check',function($row){
                            $check = '';
                            if(Auth::guard()->user()->can('delete-pricing'))
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
                        ->addColumn('action', function($row){
                        $btn ='';
                        if (Auth::user()->can('edit-pricing') || Auth::guard()->user()->can('delete-pricing'))
                        {
                            $btn = "<span class=' p-1 bg-secondary text-white border-radius ' style ='border-radius: 20px;'>Access Denied! </span>";


                            if (Auth::user()->can('edit-pricing'))
                            {
                                 $btn = '<a href="'.url('control-panel/manage-pricing/'.$row->id.'/edit').'" class="edit_icon" title="Edit">
                                <i class="fas fa-edit icon_color" ></i> </a>';
                            }
                            if (Auth::user()->can('delete-pricing'))
                            {
                                $btn = $btn . '<a onclick=deletesingle("'. $row->id .'","control-panel/manage-pricing","pricingDatatable") title="Delete" class="trash_icon"><i class="fas fa-trash-alt icon_color" ></i> </a>';
                            }
                        }
                            return $btn;
                        })
                        ->rawColumns(['action','check','status'])
                        ->make(true);
            }
            return view('backend.pricing.index');
        } catch (\Exception $e) {
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
                $pricing = PricingIncludes::plans();
                $jobsearch_plans = PricingIncludes::JobSearchplans();
                if(count($pricing) == 0) {
                    return redirect()->back()
                        ->with(['message.content' => 'pricing plans are not found!','message.level' => 'danger']);
                }
                $courses_category = CourseCategory::get();
                /*if(count($jobsearch_plans) == 0) {
                    return redirect()->back()
                        ->with(['message.content' => 'Job Search plans are not found!','message.level' => 'danger']);
                }*/
                return view('backend.pricing.create', compact('pricing','jobsearch_plans','courses_category'));
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
        try{
            $validator = Validator::make($request->all(), [
                'plan_name'         => 'required|max:255|min:2|unique:pricing,plan_name,NULL,id,deleted_at,NULL',
                'plan_slug'         => 'required|min:2|max:255|alpha_dash|unique:pricing,plan_slug,NULL,id,deleted_at,NULL',
                'plan_description'  => 'required|min:10',
                'status'            => 'required|in:0,1',
                'plan_include'      => 'required', 
                'plan_image'        => 'nullable|dimensions:max_width=94,max_height=94',
                'price'             => 'required',
                'validity'          => 'required'
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $common_plan_includes = array();
            if(!empty($request->job_search_plan)){
                $common_plan_includes['Job_Search_Plan']['Job_Search_Plan_Detail'] = $request->job_search_plan;
            }
            if(!empty($request->job_search_coaching_session)){
                $common_plan_includes['Job_Search_Coaching']['Job_Search_Coaching_Session'] = $request->job_search_coaching_session;
            }
            if(!empty($request->job_search_coaching_time)){
                $common_plan_includes['Job_Search_Coaching']['Job_Search_Coaching_Time'] = $request->job_search_coaching_time;
            }
            if(!empty($request->job_search_training_course)){
                $common_plan_includes['Job_Search_Training']['Job_Search_Training_Course'] = $request->job_search_training_course;
            }
            if(!empty($request->job_search_training_text)){
                // $common_plan_includes['Job_Search_Training']['Job_Search_Training_Text'] = $request->job_search_training_text;
                $common_plan_includes['Job_Search_Training']['Job_Search_Training_Text'] = implode(",", $request->job_search_training_text);
            }
            if(!empty($request->plan_include)){
                $common_plan_includes['plan_include'] = json_encode($request->plan_include);
            }
            $days = 30;
            $validity_days = ($request->validity * $days);
            $pricing = Pricing::insert([
                'plan_name' => $request->plan_name,
                'plan_slug' => $request->plan_slug,
                'plan_description' => json_encode(explode("\n", $request->plan_description)),
                'price' => $request->price,
                'validity' => $request->validity,
                'validity_in_days' => $validity_days,
                'status' => $request->status,
                'plan_include' => json_encode($common_plan_includes),
                'discount_type' => $request->discount_type,
                'discount_value' => $request->discount_value,
                'discounted_price' => $request->discounted_price
            ]);
            
            return redirect()->route('manage-pricing.index')
                                 ->with(['message.content' => 'Pricing Saved Successfully!!','message.level' => 'success']);
        }catch(Exception $e){
            return $e->getMessage();
        }
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
        try {
                $pricing = PricingIncludes::plans();
                if(count($pricing) == 0) {
                    return redirect()->back()
                        ->with(['message.content' => 'pricing plans are not found!','message.level' => 'danger']);
                }
                $plan_includes_course = '';
                $plan_includes_array = array();
                $courses_category = CourseCategory::get();
                $pricing_plan = Pricing::find($id);
                   if(empty($pricing_plan))
                   {
                    return back()->with(['message.content' => 'Pricing not found!!','message.level' => 'danger']);
                   }
                    $json_decode = json_decode($pricing_plan->plan_include,true);
                    $plan_includes_arr = array();
                    foreach($json_decode as $key=>$val){
                            $plan_includes_arr['plan_include'] = $json_decode['plan_include'];
                            if(array_key_exists('Job_Search_Plan', $json_decode) != false){
                                $plan_includes_arr['Job_Search_Plan'] = $json_decode['Job_Search_Plan'];
                            }
                            if(array_key_exists('Job_Search_Coaching', $json_decode) != false){
                                $plan_includes_arr['Job_Search_Coaching'] = $json_decode['Job_Search_Coaching'];
                            }
                            if(array_key_exists('Job_Search_Training', $json_decode) != false){
                                $plan_includes_arr['Job_Search_Training'] = $json_decode['Job_Search_Training'];
                            }
                    }
                    if(array_key_exists('Job_Search_Training', $plan_includes_arr)){
                        if(array_key_exists('Job_Search_Training_Text', $plan_includes_arr['Job_Search_Training']) == true){
                            $plan_includes_array = explode(",", $plan_includes_arr['Job_Search_Training']['Job_Search_Training_Text']);
                        }
                        if(array_key_exists('Job_Search_Training_Course', $plan_includes_arr['Job_Search_Training']) == true){
                            $plan_includes_course = $plan_includes_arr['Job_Search_Training']['Job_Search_Training_Course'];
                        }
                    }
                   return view('backend/pricing/edit',compact('pricing_plan','pricing','courses_category','plan_includes_course'))->with('plan_includes',$plan_includes_arr)->with('plan_incl',json_encode($plan_includes_array));
        } catch (Exception $e) {
            return $e->getMessage();
        }
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
        try {
            $validator = Validator::make($request->all(), [
                'plan_name'         => 'required|max:255|min:2|unique:pricing,plan_name,'.$id.',id,deleted_at,NULL',
                'plan_slug'         => 'required|min:2|max:255|alpha_dash|unique:pricing,plan_slug,'.$id.',id,deleted_at,NULL',
                'plan_description'  => 'required|min:10',
                'status'            => 'required|in:0,1',
                'plan_include'      => 'required', 
                'plan_image'        => 'nullable|dimensions:max_width=94,max_height=94',
                'price'             => 'required',
                'validity'          => 'required'
            ]);
            if($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $common_plan_includes = array();
            if(!empty($request->job_search_plan)){
                $common_plan_includes['Job_Search_Plan']['Job_Search_Plan_Detail'] = $request->job_search_plan;
            }
            if(!empty($request->job_search_coaching_session)){
                $common_plan_includes['Job_Search_Coaching']['Job_Search_Coaching_Session'] = $request->job_search_coaching_session;
            }
            if(!empty($request->job_search_coaching_time)){
                $common_plan_includes['Job_Search_Coaching']['Job_Search_Coaching_Time'] = $request->job_search_coaching_time;
            }
            if(!empty($request->job_search_training_course)){
                $common_plan_includes['Job_Search_Training']['Job_Search_Training_Course'] = $request->job_search_training_course;
            }
            if(!empty($request->job_search_training_text)){
                // $common_plan_includes['Job_Search_Training']['Job_Search_Training_Text'] = $request->job_search_training_text;
                $common_plan_includes['Job_Search_Training']['Job_Search_Training_Text'] = implode(",", $request->job_search_training_text);
            }
            if(!empty($request->plan_include)){
                $common_plan_includes['plan_include'] = json_encode($request->plan_include);
            }

            if($id){
                if($id == 1){
                    $days = 2;
                }else{
                    $days = 30;
                }
                $validity_days = ($request->validity * $days);
                $pricing = Pricing::where('id', $id)->update(
                [
                    'plan_name' => $request->plan_name,
                    'plan_slug' => $request->plan_slug,
                    'plan_description' => json_encode(explode("\n", $request->plan_description)),
                    'price' => $request->price,
                    'validity' => $request->validity,
                    'validity_in_days' => $validity_days,
                    'status' => $request->status,
                    'plan_include' => json_encode($common_plan_includes),
                    'discount_type' => $request->discount_type,
                    'discount_value' => $request->discount_value,
                    'discounted_price' => $request->discounted_price
                ]);
                return redirect()->route('manage-pricing.index')
                                 ->with(['message.content' => 'Pricing updated Successfully!!','message.level' => 'success']);
            }else{
                return redirect()->route('manage-pricing.index')
                                 ->with(['message.content' => 'Something went wrong, try again later.','message.level' => 'error']);   
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
                $pricing = Pricing::where('id',$id)->get();
                if(count($pricing) > 0)
                    {
                        Pricing::where('id',$id)->delete();
                        $response = array('data' => null,'status' => 1,'responseMessage' => "Pricing plan Deleted successfully.");
                    }else{
                        $response = array('data' => null,'status' => 0,'responseMessage' => "Pricing plan Not found!!.");
                    }
                    return response()->json($response)->setStatusCode(200);
            } catch (Exception $e) {
                return $e->getMessage();
            }
    }

    public function multiplePricingDelete(Request $request)
    {
        try {
                $pricing = Pricing::whereIn('id',$request->ids)->get();
                if(count($pricing) > 0)
                {
                    Pricing::whereIn('id',$request->ids)->delete();
                    $response = array('data' => null,'status' => 1,'responseMessage' => "Pricing list Delete successfully.");
                }else{
                    $response = array('data' => null,'status' => 0,'responseMessage' => "Pricing plan Not found!!.");
                }
                return response()->json($response)->setStatusCode(200);
            } catch (Exception $e) {
                return $e->getMessage();
            }
    }
}
