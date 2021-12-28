<?php

namespace App\Http\Controllers\Backend\Coaches;

use App\Helpers;
use DataTables;
use Validator;
use Auth;
use DB;
use App\Models\Coach;
use App\Models\CoachAvailability;
use App\Models\CoachAvailabilityDate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoachController extends Controller
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
                $data = Coach::with('available_days');
                if(isset($request->get('order')[0]['column']) && $request->get('order')[0]['column'] == 1) {
                    $data = $data->orderBy('id','desc');
                }
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('check',function($row){
                        $check = '';
                        if(Auth::guard()->user()->can('delete-coach'))
                        {
                            $check = '<label class="container_chk"> <input type="checkbox" value="'.$row->id.'"><span class="checkmark"></span></label>';
                        }
                        return $check;
                    })
                    ->addColumn('manage_coach_availability',function($row){
                        $check = '';
                        if(Auth::guard()->user()->can('manage-coach-availability'))
                        {
                            $check = '<center><a href="'.url('control-panel/manage-coach-availability/'.$row->id).'" class="check" title="Manage Available Days">
                                <i class="fas fa-calendar icon_color" ></i> </a></center>';
                        }
                        if(count($row->available_days->toArray()) > 0) {
                            $availabilities_dates = CoachAvailabilityDate::select('availability_start_date','availability_end_date')->where('coach', $row->id)->distinct()->first();
                            $start_date = '';
                            $end_date = '';
                            if(!empty($availabilities_dates)){
                                $start_date = date('jS M', strtotime($availabilities_dates->availability_start_date)); 
                                $end_date = date('jS M', strtotime($availabilities_dates->availability_end_date)); 
                            }
                            $availabilities = CoachAvailability::where('coach_id', $row->id)->distinct()->pluck('day')->toArray();
                            $check = $check. '<center><div class="tooltipp"><i class="fa fa-info-circle icon_color"></i> <span class="tooltiptext">'.$start_date.' - '.$end_date.'<br>'.
                                implode(', ', $availabilities).'</span></div></center>';
                        }
                        return $check;
                    })
                    /*->editColumn('display_image',function($row){
                        if($row->display_image) {
                            return '<img src="'.asset('/frontend/images/avatar/'.$row->display_image).'" width="100px" height="100px">';
                        } else {
                            return '-';
                        }
                    })*/
                    ->addColumn('action', function($row){
                        $btn ='';
                        if (Auth::user()->can('edit-coach') || Auth::guard()->user()->can('delete-coach'))
                        {
                            $btn = "<span class=' p-1 bg-secondary text-white border-radius ' style ='border-radius: 20px;'>Access Denied! </span>";
                            if (Auth::user()->can('edit-coach'))
                            {
                                $btn = '<a href="'.url('control-panel/manage-coach/'.$row->id.'/edit').'" class="edit_icon" title="Edit">
                                <i class="fas fa-edit icon_color" ></i> </a>';
                            }
                            if (Auth::user()->can('delete-coach'))
                            {
                                $btn = $btn . '<a onclick=deletesingle("'. $row->id .'","control-panel/manage-coach","coachDatatable")  class="trash_icon"><i class="fas fa-trash-alt icon_color" title="Delete"></i> </a>';
                            }
                        }
                        return $btn;
                    })
                    ->rawColumns(['action','check','manage_coach_availability'])
                    ->make(true);
            }
            return view('backend/coaches/index');
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
            return view('backend/coaches/create');
        } catch (\Exception $e) {
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
            $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
            $validator = Validator::make($request->all(), [
                'name'         => 'required|max:255|min:2|unique:coaches,name,NULL,id,deleted_at,NULL',
                'experience'         => 'required|numeric|min:1',
                'about_me'       => 'required|min:2|max:150',
                'profile'       => 'required|min:10',
                'facebook_link' => 'nullable|min:2|regex:'.$regex,
                'instagram_link' => 'nullable|min:2|regex:'.$regex,
                'twitter_link' => 'nullable|min:2|regex:'.$regex,
                'linkedin_link' => 'required|min:2|regex:'.$regex,
                'display_image'        => 'mimes:jpg,jpeg,png',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            DB::beginTransaction();
            $coach = new Coach();
            $coach->name = $request->name;
            $coach->experience = $request->experience;
            $coach->profile = $request->profile;
            $coach->about_me = $request->about_me;
            $coach->facebook_link = $request->facebook_link;
            $coach->instagram_link = $request->instagram_link;
            $coach->twitter_link = $request->twitter_link;
            $coach->linkedin_link = $request->linkedin_link;
            if($request->file('display_image')) {
                $img = Helpers\FileUpload::fileUpload($request->file('display_image'),null,$path="/frontend/images/avatar/");
                if($img) {
                    $coach->display_image = $img;
                } else {
                    Log::error(['coach-img' => 'Error saving coach image']);
                    DB::rollback();
                    return redirect()->route('manage-coach.index')
                        ->with(['message.content' => 'Error storing coach\'s display image, please try again!','message.level' => 'danger']);
                }
            }
            if($coach->save()) {
                DB::commit();
                return redirect()->route('manage-coach.index')
                    ->with(['message.content' => 'Coach Saved Successfully!!','message.level' => 'success']);
            } else {
                DB::rollback();
                return redirect()->route('manage-coach.index')
                    ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manageCoachAvailability($id)
    {
        try {
            $coach_data = Coach::find($id);
            $coaches = Coach::get();
            $weekdays = Helpers\Common::weekdays();
            $existing_availability_days = CoachAvailability::where('coach_id', $coach_data->id)->pluck('day');
            if(count($coaches) == 0) {
                return redirect()->back()->with(['message.content' => 'No coaches found.','message.level' => 'danger']);
            }
            if(!$coach_data) {
                return redirect()->back()->with(['message.content' => 'No coach data found.','message.level' => 'danger']);
            }
            $coach_availabilities = CoachAvailability::where('coach_id', $id)->get();
            $coach_availabilities_dates = CoachAvailabilityDate::where('coach', $id)->first();
            return view('backend/coaches/availability', compact('coach_availabilities','coach_data', 'coaches','existing_availability_days','weekdays','coach_availabilities_dates'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
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
            $coach = Coach::find($id);
            if(!$coach) {
                return redirect()->back()->with(['message.content' => 'No coach details found.','message.level' => 'danger']);
            } else {
                return view('backend/coaches/edit', compact('coach'));
            }
        } catch (\Exception $e) {
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
            $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
            $validator = Validator::make($request->all(), [
                'name'         => 'required|max:255|min:2|unique:coaches,name,'.$id.',id,deleted_at,NULL',
                'experience'         => 'required|numeric|min:1',
                'about_me'       => 'required|min:2|max:150',
                'profile'       => 'required|min:10',
                'facebook_link' => 'nullable|min:2|regex:'.$regex,
                'instagram_link' => 'nullable|min:2|regex:'.$regex,
                'twitter_link' => 'nullable|min:2|regex:'.$regex,
                'linkedin_link' => 'required|min:2|regex:'.$regex,
                'display_image'        => 'mimes:jpg,jpeg,png',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            DB::beginTransaction();
            $coach = Coach::find($id);
            if(!$coach) {
                return redirect()->route('manage-coach.index')
                    ->with(['message.content' => 'No coach data found.','message.level' => 'danger']);
            }
            $coach->name = $request->name;
            $coach->experience = $request->experience;
            $coach->profile = $request->profile;
            $coach->about_me = $request->about_me;
            $coach->facebook_link = $request->facebook_link;
            $coach->instagram_link = $request->instagram_link;
            $coach->twitter_link = $request->twitter_link;
            $coach->linkedin_link = $request->linkedin_link;
            if($request->file('display_image')) {
                $img = Helpers\FileUpload::fileUpload($request->file('display_image'),$coach,$path="/frontend/images/avatar/");
                if($img) {
                    $coach->display_image = $img;
                } else {
                    Log::error(['coach-img' => 'Error saving coach image']);
                    DB::rollback();
                    return redirect()->route('manage-coach.index')
                        ->with(['message.content' => 'Error storing coach\'s display image, please try again!','message.level' => 'danger']);
                }
            }
            if($coach->save()) {
                DB::commit();
                return redirect()->route('manage-coach.index')
                    ->with(['message.content' => 'Coach Saved Successfully!!','message.level' => 'success']);
            } else {
                DB::rollback();
                return redirect()->route('manage-coach.index')
                    ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
            }
        } catch (\Exception $e) {
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
            $coach = Coach::where('id',$id)->get();
            if(count($coach) > 0)
            {
                Coach::where('id',$id)->delete();
                $response = array('data' => null,'status' => 1,'responseMessage' => "Coach details deleted successfully.");
            }else{
                $response = array('data' => null,'status' => 0,'responseMessage' => "Data not found!!.");
            }
            return response()->json($response)->setStatusCode(200);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function multipleCoachDelete(Request $request)
    {
        try {
            $coach = Coach::whereIn('id',$request->ids)->get();
            if( count($coach) > 0)
            {
                Coach::whereIn('id',$request->ids)->delete();
                $response = array('data' => null,'status' => 1,'responseMessage' => "Coaches list Delete successfully.");
            }else{
                $response = array('data' => null,'status' => 0,'responseMessage' => "Data not found!!.");
            }
            return response()->json($response)->setStatusCode(200);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function addAvailabilityBlock(Request $request) {
        try {
            $selected_days = $request->selected_days;
            //dd($selected_days);
            $existing_availability_days = CoachAvailability::where('coach_id', $request->coach_id)->pluck('day');
            $weekdays = Helpers\Common::weekdays();
            $index = $request->index ?? 1;
            $returnHTML = view('backend/coaches/add-availability-block',compact('index','existing_availability_days','weekdays','selected_days'))->render();
            return response()->json(array('html' => $returnHTML));
            // return view('backend/coaches/add-availability-block', compact('index','existing_availability_days','weekdays','selected_days'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function saveCoachAvailability(Request $request) {
        try {
            $availability_added = 0;
            //dd($request);
            if($request->has('available_days_count') && $request->available_days_count > 1) {
                $existing_availability_days = CoachAvailability::where('coach_id', $request->id)->get();
                if(count($existing_availability_days) > 0) {
                    $delete_existing_availability_days = CoachAvailability::where('coach_id', $request->id)->delete();
                    if(!$delete_existing_availability_days) {
                        return redirect()->route('manage-coach.index')
                            ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
                    }
                }
                for($i = 0; $i <= $request->available_days_count; $i++) {
                    if($request->input('day_'.($i+1))) {
                        $availability = new CoachAvailability();
                        $availability->coach_id = $request->id;
                        $availability->day =  $request->input('day_'.($i+1));
                        $availability->start_time =  $request->input('start_time_'.($i+1));
                        $availability->end_time =  $request->input('end_time_'.($i+1));
                        if($availability->save()) {
                            $availability_added = 1;
                        }
                    }
                }
            } else {
                if($request->has('day_1') && $request->day_1 != null) {
                    $availability = CoachAvailability::where('day', $request->input('day_1'))->where('coach_id', $request->id)->first();
                    if(!$availability) {
                        $availability = new CoachAvailability();
                    }
                    $availability->coach_id = $request->id;
                    $availability->day =  $request->input('day_1');
                    $availability->start_time =  $request->input('start_time_1');
                    $availability->end_time =  $request->input('end_time_1');
                    if($availability->save()) {
                        $availability_added = 1;
                    }
                } else {
                    $availability_added = 1;
                }
            }

            if(($request->availability_start_date != null) || ($request->availability_end_date != null)){
                $get_coach_dates = CoachAvailabilityDate::where('coach',$request->id)->first();
                if(!empty($get_coach_dates)){
                    CoachAvailabilityDate::updateOrCreate([
                        'id' => $get_coach_dates->id
                    ],[
                        'availability_start_date' => $request->availability_start_date,
                        'availability_end_date' => $request->availability_end_date
                    ]);
                }else{
                    $availability_dates = new CoachAvailabilityDate();
                    $availability_dates->coach = $request->id;
                    $availability_dates->availability_start_date = $request->availability_start_date;
                    $availability_dates->availability_end_date =  $request->availability_end_date;
                    $availability_dates->save();
                }
            }
            if($availability_added == 1) {
                return redirect()->route('manage-coach.index')
                    ->with(['message.content' => 'Coach Availability Saved Successfully!!','message.level' => 'success']);
            } else {
                return redirect()->route('manage-coach.index')
                    ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
            }
        } catch (\Exception $e) {
            return $e->getMessage().' '.$e->getLine();
        }
    }
}
