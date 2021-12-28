<?php

namespace App\Http\Controllers\Backend\OnlineCoaching;

use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserSession;
use DataTables;
use Validator;
use Auth;
use App\Models\Resume\UserResume;
use App\Models\CoverLetter\UserCoverLetter;
use App\Models\EmailTemplate\UserEmailTemplate;
use App\Models\Industry;
use Session;
use App\Helpers;
use App\Models\EmailTemplate;
use Illuminate\Support\Facades\Mail;
use App\User;
use DB;
use App\Models\UserAction;

class OnlineCoachingController extends Controller
{
    /**
     * CmsController constructor.
     */
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        try {
            $user_id = Auth::guard('admin')->user()->id;
            $coach_id = User::select('coach_id')->where('id',$user_id)->first();
            $role_name = Auth::guard('admin')->user()->roles->first()->name;
            if($role_name == 'super_admin'){
              $data = UserSession::with('users')->with('coaches')->where(function($query) {
                $query->where('status', '!=', 0)
                ->orWhere('status', '=', 1);
              })->get();
            }elseif($role_name == 'staff' && $coach_id->coach_id != null){
              $data = UserSession::with('users')->with('coaches')->where('coach_id',$coach_id->coach_id)->where(function($query) {
                $query->where('status', '!=', 0)
                ->orWhere('status', '=', 1);
              })->get();
            }elseif($role_name == 'staff' && $coach_id->coach_id == null){
              $data = UserSession::with('users')->with('coaches')->where(function($query) {
                $query->where('status', '!=', 0)
                ->orWhere('status', '=', 1);
              })->get();
            }
            if ($request->ajax()) {
                /*$data = UserSession::with('users')->with('coaches')->where(function ($query) {
                            $query->where('status', '!=', 0)
                                  ->orWhere('status', '=', 1);
                        })->get();*/
                /*$data = UserSession::with('users')->with('coaches')->where(function ($query) {
                            $query->where('status', '!=', null)
                                  ->orWhere('status', '=', 1);
                        })->orderBy('id','asc')->get();*/

                if(!empty($request->get('status'))) {
                    if($request->get('status') == '1'){
                      if($role_name == 'super_admin'){
                        $data = UserSession::where('status', 1)->get();
                      }
                      elseif($role_name == 'staff' && $coach_id->coach_id != null){
                        $data = UserSession::where('coach_id',$coach_id->coach_id)->where('status', 1)->get();
                      }
                      elseif($role_name == 'staff' && $coach_id->coach_id == null){
                        $data = UserSession::where('status', 1)->get();
                      }
                    }
                    if($request->get('status') == '2'){
                      if($role_name == 'super_admin'){
                        $data = UserSession::where('status', 2)->get();
                      }
                      elseif($role_name == 'staff' && $coach_id->coach_id != null){
                        $data = UserSession::where('coach_id',$coach_id->coach_id)->where('status', 2)->get();
                      }
                      elseif($role_name == 'staff' && $coach_id->coach_id == null){
                        $data = UserSession::where('status', 2)->get();
                      }
                    }
                    if($request->get('status') == '3'){
                      if($role_name == 'super_admin'){
                        $data = UserSession::where('status', 3)->get();
                      }
                      elseif($role_name == 'staff' && $coach_id->coach_id != null){
                        $data = UserSession::where('coach_id',$coach_id->coach_id)->where('status', 3)->get();
                      }
                      elseif($role_name == 'staff' && $coach_id->coach_id == null){
                        $data = UserSession::where('status', 3)->get();
                      }
                    }
                    if($request->get('status') == '4'){
                      if($role_name == 'super_admin'){
                        $data = UserSession::where('status', 4)->get();
                      }
                      elseif($role_name == 'staff' && $coach_id->coach_id != null){
                        $data = UserSession::where('coach_id',$coach_id->coach_id)->where('status', 4)->get();
                      }
                      elseif($role_name == 'staff' && $coach_id->coach_id == null){
                        $data = UserSession::where('status', 4)->get();
                      }
                    }
                    if($request->get('status') == ''){
                      if($role_name == 'super_admin'){
                        $data = UserSession::get();
                      }
                      elseif($role_name == 'staff' && $coach_id->coach_id != null){
                        $data = UserSession::where('coach_id',$coach_id->coach_id)->get();
                      }
                      elseif($role_name == 'staff' && $coach_id->coach_id == null){
                        $data = UserSession::get();
                      }
                    }
                }
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('user_id', function($row){
                            $check = '';
                            if($row->users != null){
                                $check = $row->users->name; 
                            }else{
                                $check = '';
                            }
                            return $check;
                        })
                        ->addColumn('coach_id', function($row){
                            $check = '';
                            if($row->coaches != null){
                                $check = $row->coaches->name; 
                            }else{
                                $check = '';
                            }
                            return $check;
                        })
                        ->addColumn('status', function($row){
                            $check = '';
                            if($row->status == 1){
                                $check = '<span class="text-secondary"> Requested </span>';
                            }else if($row->status == 2){
                                $check = '<span class="text-primary"> Accepted </span>';
                            }else if($row->status == 3){
                                $check = '<span class="text-success"> Completed </span>';
                            }else if($row->status == 4){
                                $check = '<span class="text-danger"> Re-scheduled </span>';
                            }else{  
                                $check = '<span class="text-secondary"></span>';
                            }
                            return $check;
                        })
                        ->addColumn('action', function($row){
                        $btn ='';
                        if (Auth::user()->can('view-online-coaching'))
                        {
                            $btn = '<a href="'.url('control-panel/manage-online-coaching/'.$row->id).'" class="eye_icon" title="edit">
                                <i class="fas fa-eye icon_color" ></i> </a>';
                        }
                            return $btn;
                        })
                        ->rawColumns(['user_id','coach_id','status','action'])
                        ->make(true);
            }
            return view('backend/online_coaching/index');
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cms  $cms
     * @return Response
     */
    public function show($id)
    {
        try {
                $get_user_sessions = UserSession::with('users')->withTrashed()->find($id);
                if($get_user_sessions){
                    $user_resumes_count = UserResume::where('user_id',$get_user_sessions['user_id'])->count();
                    $user_cover_letter_count = UserCoverLetter::where('cl_user_id',$get_user_sessions['user_id'])->count();
                    $user_email_templates_count = UserEmailTemplate::where('uet_user_id',$get_user_sessions['user_id'])->count();
                    $industry = Industry::get();
                    $us_session = UserSession::with('coach')->where('user_id',$get_user_sessions['user_id']);
                    $user_session_count = $us_session->count();
                    $get_current_requested_session = $us_session->whereIn('status',[1,2])->first();
                    // dd($get_current_requested_session);
                    $get_past_completed_session = UserSession::with('coach')->where('user_id',$get_user_sessions['user_id'])->where('status',3)->orderBy('coach_completedon','DESC')->get();
                    // dd($get_past_completed_session);
                    return view('backend/online_coaching/view',compact('get_user_sessions','user_resumes_count','user_cover_letter_count','user_email_templates_count','user_session_count','industry','get_current_requested_session','get_past_completed_session'));
                }else{
                    return redirect()->route('manage-online-coaching.index')->with(['message.content' => 'Session not found!!','message.level' => 'danger']);
                }
        }catch (Exception $exception){
            return redirect()->route('manage-online-coaching.index')->with(['message.content' => $exception->getMessage(),'message.level' => 'success']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cms  $cms
     * @return Response
     */
    public function edit(Cms $cms,$id)
    {
        
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cms  $cms
     * @return Response
     */
    public function destroy($id)
    {
    }

    public function approveSession($id)
    {   
        try{
                $user_session = UserSession::where('id',$id)->first();
                if($user_session){
                  DB::beginTransaction();
                  $sessions = UserSession::where('id',$id)->update([
                    'status' => 2,
                    'coach_accpetedon' => date('Y-m-d H:i:s')
                  ]);
                  $message = [
                    'responseMessage' => 'Session approved successfully.'
                  ];
                  Session::put('approve_session',$message);
                  $approve_arr = [
                    'user_id' => $user_session->user_id,
                    'admin_id' => Auth::guard('admin')->user()->id,
                    'session_id' => $id,
                    'action_name' => 'Approve Session',
                    'content' => 'User session approved successfully.'
                  ];
                  UserAction::create($approve_arr);
                  DB::commit();
                  return response()->json(['responseMessage' => 'Session approved successfully.'])->setStatusCode(200);
                }else{
                  return response()->json(['responseMessage' => 'Session not found.'])->setStatusCode(400);
                }
        }catch (Exception $exception){
            DB::rollBack();
            return redirect()->route('manage-online-coaching.index')->with(['message.content' => $exception->getMessage(),'message.level' => 'success']);
        }
    }

    public function completeSession($id)
    {   
        try{
                $user_session = UserSession::where('id',$id)->first();
                if($user_session){
                  DB::beginTransaction();
                  $sessions = UserSession::where('id',$id)->update([
                    'status' => 3,
                    'coach_completedon' => date('Y-m-d H:i:s')
                  ]);
                  $message = [
                    'responseMessage' => 'Session completed successfully.'
                  ];
                  Session::put('complete_session',$message);
                  $complete_arr = [
                    'user_id' => $user_session->user_id,
                    'admin_id' => Auth::guard('admin')->user()->id,
                    'session_id' => $id,
                    'action_name' => 'Complete Session',
                    'content' => 'User session completed successfully.'
                  ];
                  UserAction::create($complete_arr);
                  DB::commit();
                  return response()->json(['responseMessage' => 'Session completed successfully.'])->setStatusCode(200);
                }else{
                  return response()->json(['responseMessage' => 'Session not found.'])->setStatusCode(400);
                }
        }catch (Exception $exception){
            DB::rollBack();
            return redirect()->route('manage-online-coaching.index')->with(['message.content' => $exception->getMessage(),'message.level' => 'success']);
        }
    }

    public function rejectSession(Request $request)
    {   
        try{
                DB::beginTransaction();
                $validator = Validator::make($request->all(), [
                    's_id' => 'exists:user_sessions,id,deleted_at,NULL',
                    'reason_for_reject_session' => 'required|min:5'
                ]);
                if ($validator->fails()) {
                    return response()->json(['data'=>$validator->errors()->all()]);
                }
                $user_session = UserSession::where('id',$request->s_id)->update([
                  'status' => 4, 
                  'reason_for_reject' => $request->reason_for_reject_session,
                  'coach_rejectedon' => date('Y-m-d H:i:s')
                ]);
                // $message = ($request->s_id)?"Data updated successfully.":"Data stored successfully.";
                $message = "Session rejected successfully.";
                $reject_message = [
                    'responseMessage' => 'Session rejected successfully.'
                ];
                Session::put('reject_session',$reject_message);

                $emailtemplate = EmailTemplate::where('keyword', 'SESSION REJECT NOTIFICATION TO USER')->first();
                $user = UserSession::with('users')->with('coach')->where('id',$request->s_id)->withTrashed()->first();
                if($user){
                  $vars = ['{{NAME}}' => $user->users->name, '{{EMAIL}}' => $user->users->email, '{{MESSAGE}}' => $request->reason_for_reject_session, '{{CREATED_AT}}' => date('d/m/Y h:i A'), '{{APP_NAME}}' => env('APP_NAME')];
                  $subject = $user->session_name. ' is rejected by '.$user->coach->name;
                  $emailtemplate->content = Helpers\EmailTemplate::email_template_replace_tags($emailtemplate->content, $vars);
                  $mail = Helpers\EmailTemplate::sendMail($emailtemplate, $user->users->email, $subject);
                  if($mail) {
                      $reject_arr = [
                        'user_id' => $user->user_id,
                        'admin_id' => Auth::guard('admin')->user()->id,
                        'session_id' => $request->s_id,
                        'action_name' => 'Reject Session',
                        'content' => 'User session rejected successfully.'
                      ];
                      UserAction::create($reject_arr);
                      $response = array('data' => '','status' => 1,'responseMessage' => $message);
                      DB::commit();
                      return response()->json($response)->setStatusCode(200);
                  }else{
                      $response = array('data' => '','status' => 0,'responseMessage' => 'Something went wrong, try again later.' );
                      return response()->json($response)->setStatusCode(400);
                  }
                }else{
                  $response = array('data' => '','status' => 0,'responseMessage' => 'Something went wrong, try again later.');
                  return response()->json($response)->setStatusCode(400);
                }
        }catch (Exception $exception){
            DB::rollBack();
            return response()->json(array('data' => '','responseMessage' => $exception->getMessage()))->setStatusCode(400);
        }
    }

    public function getCoachBookedSession($id)
    {   
        try{
                $user_session = UserSession::where('id',$id)->first();
                if($user_session){
                  $coach_id = $user_session->coach_id;
                  $coach_date = $user_session->session_date;
                  $get_coach_booked_sessions = UserSession::with('users')->where('coach_id',$coach_id)->where('session_date',$coach_date)->get();
                  $response = array('data' => $get_coach_booked_sessions, 'responseMessage' => 'Coach availability.' );
                  return response()->json($response)->setStatusCode(200);
                }else{
                  $response = array('data' => '', 'responseMessage' => 'Session not found.');
                  return response()->json($response)->setStatusCode(400);
                }
        }catch (Exception $exception){
            return response()->json(array('data' => '','responseMessage' => $exception->getMessage()))->setStatusCode(400);
        }
    }

    public function getCoachAvailability(Request $request)
    {   
        try{
                if($request->coach_details){
                  $coach_details = $request->coach_details;
                  $returnHTML = view('backend.online_coaching.coach-availability',compact('coach_details'))->render();
                  return response()->json(array('html' => $returnHTML));
                }else{
                  return response()->json(array('responseMessage' => 'Something went wrong, please try again.'), 400); 
                }
        }catch (Exception $exception){
            return response()->json(array('data' => '','responseMessage' => $exception->getMessage()))->setStatusCode(400);
        }
    }
}
