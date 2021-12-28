<?php

namespace App\Http\Controllers\Backend\EditCoachProfile;

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
use App\User;

class EditCoachProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
                $user_id = Auth::guard('admin')->user()->id;
                $coach_id = User::select('coach_id')->where('id',$user_id)->first();
                $coach = Coach::find($coach_id->coach_id);
                if(!$coach) {
                    return redirect()->back()->with(['message.content' => 'No coach details found.','message.level' => 'danger']);
                } else {
                    return view('backend/coaches/edit-coach-profile', compact('coach'));
                }
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
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
                'display_image' => 'mimes:jpg,jpeg,png',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            DB::beginTransaction();
            $coach = Coach::find($id);
            if(!$coach) {
                return redirect()->route('manage-coach-profile.index')
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
                    return redirect()->route('manage-coach-profile.index')
                        ->with(['message.content' => 'Error storing coach\'s display image, please try again!','message.level' => 'danger']);
                }
            }
            if($coach->save()) {
                DB::commit();
                return redirect()->route('manage-coach-profile.index')
                    ->with(['message.content' => 'Coach Saved Successfully!!','message.level' => 'success']);
            } else {
                DB::rollback();
                return redirect()->route('manage-coach-profile.index')
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
        
    }


    public function manageAvailability(Request $request)
    {
        try {
                $user_id = Auth::guard('admin')->user()->id;
                $coach_id = User::select('coach_id')->where('id',$user_id)->first();
                $coach_data = Coach::find($coach_id->coach_id);
                $coaches = Coach::get();
                $weekdays = Helpers\Common::weekdays();
                $existing_availability_days = CoachAvailability::where('coach_id', $coach_data->id)->pluck('day');
                if(count($coaches) == 0) {
                    return redirect()->back()->with(['message.content' => 'No coaches found.','message.level' => 'danger']);
                }
                if(!$coach_data) {
                    return redirect()->back()->with(['message.content' => 'No coach data found.','message.level' => 'danger']);
                }
                $coach_availabilities = CoachAvailability::where('coach_id', $coach_id->coach_id)->get();
                $coach_availabilities_dates = CoachAvailabilityDate::where('coach', $coach_id->coach_id)->first();
                return view('backend/coaches/edit-coach-availability', compact('coach_availabilities','coach_data', 'coaches','existing_availability_days','weekdays','coach_availabilities_dates'));
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
                        return redirect()->route('admin.manage-coach-availability')
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
                return redirect()->route('admin.manage-coach-availability')
                    ->with(['message.content' => 'Coach Availability Saved Successfully!!','message.level' => 'success']);
            } else {
                return redirect()->route('admin.manage-coach-availability')
                    ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
            }
        } catch (\Exception $e) {
            return $e->getMessage().' '.$e->getLine();
        }
    }
}
