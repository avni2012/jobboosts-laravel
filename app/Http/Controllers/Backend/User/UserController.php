<?php

namespace App\Http\Controllers\Backend\User;

use App\User;
use Exception;
use Throwable;
//use App\Models\Country;
use Illuminate\View\View;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Foundation\Application;
use DataTables;
use App\Http\Requests\Backend\User\StoreUserRequest;
use App\Http\Requests\Backend\User\UpdateUserRequest;
use App\Http\Requests\Backend\User\UpdateUserPasswordRequest;
use App\Http\Requests\Backend\User\Address\UpdateUserAddressRequest;
use App\Models\Industry;
use App\Mail\UpdateCustomerPassword;
use Illuminate\Support\Facades\Mail;
use App\Models\PricingSubscription;
use App\Models\CoverLetter\UserCoverLetter;
use App\Models\EmailTemplate\UserEmailTemplate;
use App\Models\UserSession;
use App\Models\Coach;
use App\Models\UserAction;
use Validator;
use App\Helpers;
use App\Models\EmailTemplate;
use App\Models\UserSubscriptionCourse;
use Session;

class UserController extends Controller
{
    /**
     * @var Country[]|Collection
     */
    //private $countries;

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        //$this->countries = Country::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $requesthelpers
     *
     * @return string
     */
    public function index(Request $requesthelpers)
    {
        try {
            return view('backend.users.index');
        }catch (Exception $exception){
            return $exception->getMessage();
        }
    }

    /**
     * Get User data for listing
     */
    public function getData(Request $request)
    {
        $users = User::with('roleUser.role')->whereHas('roles', function ($query) {
                        $query->where('name', '!=', 'super_admin')->where('name', '=', 'user');
                        })->doesntHave('roleUser.role','or')->where('is_admin','!=',1);
        // $users = User::doesntHave('roleUser.role');
        if(isset($request->get('order')[0]['column']) && $request->get('order')[0]['column'] == 1) {
            $users = $users->orderBy('id','desc');
        }
        return Datatables::of($users)
            ->addColumn('check',function($row){
                $check = '';
                if(Auth::user()->can('delete-user'))
                {
                    $check = '<label class="container_chk"> <input type="checkbox" value="'.$row->id.'"><span class="checkmark"></span></label>';
                }
                return $check;
            })
            ->addColumn('action', function($row){
                $btn = '';
                $editUrl = route('manage-users.edit',['id'=> $row->id]);
                $deleteUrl = route('manage-users.destroy',['id'=> $row->id]);
                $showUrl = route('manage-users.show',['id'=> $row->id]);
                $tableName = 'usersDatatable';

                if (Auth::guard()->user()->can('edit-user') || Auth::guard()->user()->can('delete-user'))
                {
                    if(Auth::guard()->user()->can('edit-user'))
                    {
                        $btn .= '<a href="'.$editUrl.'" class="edit_icon mr-2">
                                <i class="fas fa-edit icon_color" title="Edit"></i> </a>';
                    }
                    if(Auth::guard()->user()->can('delete-user'))
                    {
                        $btn .= '<a href="#" onClick="deleteTableRow(\'' . $deleteUrl . '\',)"  class="trash_icon mr-2">
                                <i class="fas fa-trash-alt icon_color" title="Delete"></i> </a>';
                    }
                }
                return $btn;
            })
            ->addColumn('status', function($row){
                return ($row->status == 1) ? '<span class="text-success">  Active </span>' : '<span class="text-secondary">  InActive </span>';
            })
            ->addColumn('email_verified_at',function($row){
                return $row->email_verified_at ? '<span class="text-secondary"> Verified </span>' : '<span class="text-success"> Pending  </span>' ;
            })
            ->addIndexColumn()
            ->rawColumns(['action','status','email_verified_at','check'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return string
     */
    public function create()
    {
        try {
            //$countries = $this->countries;
            $countries = [];
            return view('backend.users.create',compact('countries'));
        }catch (Exception $exception){
            return $exception->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserRequest $request
     *
     * @return RedirectResponse
     */
    public function store(StoreUserRequest $request)
    {
        try {
            //dd($request);
            return DB::transaction(function () use ($request){
                $user = User::create([
                    "name" =>$request->input('name'),
                    //"last_name" =>$request->input('last_name'),
                    "mobile_no" => $request->input('mobile_no'),
                    "email" => $request->input('email'),
                    //"date_of_birth" => $request->input('dob'),
                    //"remarks" => $request->input('remarks'),
                    "password" =>Hash::make($request->input('password')),
                    "status" =>$request->input('status'),
                ]);
                /*$user->addresses()->create([
                    "address_line_1" => $request->input('address_line_1'),
                    "address_line_2" => $request->input('address_line_2'),
                    "address_line_3" => $request->input('address_line_3'),
                    "state_id" => $request->input('state_id'),
                    "city_id" => $request->input('city_id'),
                    "country_id" => $request->input('country_id'),
                    "post_code" => $request->input('post_code'),
                    "is_primary" => $request->input('is_primary',1)
                ]);*/
                if($user){
                    return redirect()->route('manage-users.index')
                        ->with(['message.content' => 'User has been successfully created!','message.level' => 'success']);
                }
                return redirect()->route('manage-users.index')
                    ->with(['message.content' => 'Something went wrong. Please try again later','message.level' => 'error']);
            });
        }catch (Exception $exception){
            return redirect()->route('manage-users.index')
                ->with(['message.content' => $exception->getMessage(),'message.level' => 'error']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return string
     */
    public function show($id)
    {
        $user = User::findOrfail($id);
        try {
            return view('backend.users.show',compact('user'));
        }catch (Exception $exception){
            return $exception->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $manage_user
     *
     * @return string
     */
    public function edit($manage_user)
    {
        try {
            $user = User::with('user_resumes')->findOrFail($manage_user);
            $user_resumes_count = $user->user_resumes->count();
            $user_cover_letter_count = UserCoverLetter::where('cl_user_id',$user->id)->count();
            $user_email_templates_count = UserEmailTemplate::where('uet_user_id',$user->id)->count();
            $us_session = UserSession::with('coach')->where('user_id',$user->id);
            $user_session_count = $us_session->count();
            $user_sessions = $us_session->where('status','!=',0)->orderBy('created_at','DESC')->get();
            $user_course_count = UserSubscriptionCourse::where('user_id',$user->id)->count();
            // dd($user_sessions);
            $industry = Industry::get();
            $today_date = date('Y-m-d');
            $user_id = $manage_user;
            $user_plans_active =  PricingSubscription::with('pricing')->where('user_id' ,$user_id)
                ->Where(function ($query) use($today_date,$user_id) {
                    $query->where('user_id' ,$user_id)->where('payment_status', 1)
                          ->where('pricing_expiry_date','>=',$today_date);
                })->first();
            $get_plan_history = PricingSubscription::with('pricing')->where('user_id' ,$user_id)
                ->Where(function ($query) use($today_date,$user_id) {
                    $query->where('user_id' ,$user_id)->where('payment_status', 1);
                })->withTrashed()->latest()->get();
            return view('backend.users.edit',compact('user','user_resumes_count','user_cover_letter_count','user_email_templates_count','industry','user_plans_active','get_plan_history','user_session_count','user_sessions','user_course_count'));
        }catch (Exception $exception){
            return redirect()->route('manage-users.index')->with(['message.content' => $exception->getMessage(),'message.level' => 'success']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param $manage_user
     *
     * @return string
     */
    public function update(UpdateUserRequest $request, $manage_user)
    {
        $user = User::findorfail($manage_user);
        try {
            return DB::transaction(function () use ($request,$user){
                $user->update([
                    "email" => $request->input('email'),
                    "date_of_birth" => $request->input('date_of_birth'),
                    "mobile_no" => $request->input('mobile_no'),
                    "gender" => $request->input('gender'),
                    "industry" => $request->input('industry'),
                    "work_experience" => $request->input('work_experience'),
                    "education_level" => $request->input('education_level'),
                    "address" => $request->get('address'),
                    "status" => $request->input('status')
                ]);
                if($user){
                    return redirect()->route('manage-users.index')
                        ->with(['message.content' => 'User has been successfully updated!','message.level' => 'success']);
                }
                return redirect()->route('manage-users.index')
                    ->with(['message.content' => 'Something went wrong. Please try again later','message.level' => 'success']);
            });
        }catch (Exception $exception){
            return $exception->getMessage();
        }

    }

    public function changeUserPassword(UpdateUserPasswordRequest $request, $manage_user)
    {
        $user = User::findorfail($manage_user);
        try {
            return DB::transaction(function () use ($request,$user){
                $user->update([
                    "password" => Hash::make($request->input('new_password'))
                ]);
                $mail_array = [
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => $request->input('new_password')
                ];
                Mail::to($user->email)->send(new UpdateCustomerPassword($mail_array));
                if($user){
                    return redirect()->route('manage-users.index')
                        ->with(['message.content' => 'User password has been successfully updated!','message.level' => 'success']);
                }
                return redirect()->route('manage-users.index')
                    ->with(['message.content' => 'Something went wrong. Please try again later','message.level' => 'success']);
            });
        }catch (Exception $exception){
            return redirect()->route('manage-users.index')
                    ->with(['message.content' => $exception->getMessage(),'message.level' => 'success']);
        }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param $manage_user
     *
     * @return JsonResponse
     */
    /*public function destroy($manage_user)
    {
        try {
            $user = User::find(300);
            return DB::transaction(function () use($user){
                if(!$user){
                    return responseError('User not found or invalid user id');
                }
                $user->addresses()->delete();
                $user->delete();
                return responseSuccess('User has been successfully deleted !');
            });
        }catch (Exception $exception){
            return responseError('Something weent wrong please try again later');
        }
    }*/
    public function destroy($id)
    {
        try {
                $user = User::where('id',$id)->get();
                if(count($user) > 0)
                    {
                        User::where('id',$id)->delete();
                        $response = array('data' => null,'status' => 1,'responseMessage' => "User Delete successfully.");
                    }else{
                        $response = array('data' => null,'status' => 0,'responseMessage' => "User Not found!!.");
                    }
                    return response()->json($response)->setStatusCode(200);
            } catch (Exception $e) {
                return $e->getMessage();
            }
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    /*public function multipleUserDelete(Request $request)
    {
        try {
            if(User::whereIn('id',$request->input('ids'))->delete()){
                return responseSuccess('Users has been successfully deleted !');
            }
            return responseError('Something weent wrong please try again later');
        }catch (Exception $exception){
            return responseError('Something weent wrong please try again later');
        }
    }*/
    public function multipleUserDelete(Request $request)
    {
        try {
                $user = User::whereIn('id',$request->ids)->get();
                if(count($user) > 0)
                {
                    User::whereIn('id',$request->ids)->delete();
                    $response = array('data' => null,'status' => 1,'responseMessage' => "User list Delete successfully.");
                }else{
                    $response = array('data' => null,'status' => 0,'responseMessage' => "User Not found!!.");
                }
                return response()->json($response)->setStatusCode(200);
            } catch (Exception $e) {
                return $e->getMessage();
            }
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     * @throws Throwable
     */
    public function editAddress(Request $request)
    {
        try {
            $address = UserAddress::where('user_id',$request->input('userId'))
                ->where('id',$request->input('addressId'))
                ->first();
            //$countries = $this->countries;
            $countries = [];

            if(!$address){
                return responseError('invalid address id or user id',['form'=>''],Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            $html = view('backend.users.common.edit-address-form',compact('address','countries'))->render();
            return responseSuccess('form generated',['form' => $html]);
        }catch (Exception $exception){
            return responseError($exception->getMessage(),['form'=>'']);
        }
    }

    /**
     * Update user address
     *
     * @param UpdateUserAddressRequest $request
     *
     * @return JsonResponse
     */
    public function updateAddress(UpdateUserAddressRequest $request)
    {
        try {
            $address = UserAddress::where('id',$request->input('addressId'))->first();
            if(!$address){
                return responseError('invalid address id or address data not found',['form'=>''],Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            $address->update([
                "address_line_1" => $request->input('address_line_1'),
                "address_line_2" => $request->input('address_line_2'),
                "address_line_3" => $request->input('address_line_3'),
                "state_id" => $request->input('state_id'),
                "city_id" => $request->input('city_id'),
                "country_id" => $request->input('country_id'),
                "post_code" => $request->input('post_code'),
            ]);
            return responseSuccess('Address has been successfully updated');

        }catch (Exception $exception ){
            return responseError($exception->getMessage(),['form'=>'']);
        }
    }

    /**
     * Delete user address
     *
     * @param Request $request
     *
     * @return JsonResponse|mixed
     */
    public function deleteAddress(Request $request)
    {
        try {
            $userAddress = UserAddress::where('id',$request->input('addressId'))->where('user_id',$request->input('userId'));
            if(!$userAddress){
                return responseError('User address not found or invalid address id');
            }
            $userAddress->delete();
            return responseSuccess('User address has been successfully deleted !');
        }catch (Exception $exception){
            return responseError('Something weent wrong please try again later');
        }
    }

    public function changeAndGetCoach($id)
    {
        try {
                $user = User::where('id',$id)->first();
                if($user){
                    $get_coach = UserSession::select('coach_id')->where('user_id',$id)->groupBy('coach_id')->get();
                    $coach_id = $get_coach->first()->coach_id;
                    $coaches = Coach::where('id','!=',$coach_id)->get();
                    $coaches['coach_id'] = $coach_id;
                    return response()->json(array('data' => $coaches,'responseMessage' => 'Coaches found.'))->setStatusCode(200);
                }else{
                    return response()->json(array('data' => '','responseMessage' => 'User not found.'))->setStatusCode(400);
                }
        }catch (Exception $exception){
            return response()->json(array('data' => '','responseMessage' => $exception->getMessage()))->setStatusCode(400);
        }
    }

    public function changeUserSessionCoach(Request $request)
    {
        try {
                $validator = Validator::make($request->all(), [
                    'u_id' => 'exists:users,id,deleted_at,NULL',
                    'old_c_id' => 'exists:coaches,id,deleted_at,NULL',
                    'coach_name' => 'required',
                    'reason_for_change_coach' => 'required|min:5'
                ]);
                if ($validator->fails()) {
                    return response()->json(['error'=>$validator->errors()->all()]);
                }
                $update_user_session_coach = UserSession::where('user_id',$request->u_id)->whereIn('status',[0,1,4])->update([
                    'coach_id' => $request->coach_name,
                    'session_date' => null,
                    'session_time' => null,
                    'status' => 0,
                    'requested_on' => null,
                    'coach_accpetedon' => null,
                    'coach_completedon' => null,
                    'reason_for_reject' => null,
                    'coach_rejectedon' => null
                ]);
                if($update_user_session_coach){
                    $user_action_arr = [
                        'user_id' => $request->u_id,
                        'admin_id' => Auth::guard('admin')->user()->id,
                        'action_name' => 'Change coach',
                        'content' => $request->reason_for_change_coach
                    ];
                    $user_action = UserAction::insert($user_action_arr);
                    if($user_action == true){
                        $coach_change_message = [
                            'responseMessage' => 'Coach for session updated successfully.'
                        ];
                        Session::put('coach_change_message',$coach_change_message);
                        $emailtemplate = EmailTemplate::where('keyword', 'COACH CHANGE FOR USER SESSION')->first();
                        $user = User::where('id',$request->u_id)->first();
                        // $user = UserSession::with('users')->with('coach')->where('id',$request->s_id)->withTrashed()->first();
                        if($user){
                          $vars = ['{{NAME}}' => $user->name, '{{EMAIL}}' => $user->email, '{{MESSAGE}}' => $request->reason_for_change_coach, '{{CREATED_AT}}' => date('d/m/Y h:i A'), '{{APP_NAME}}' => env('APP_NAME')];

                          $get_old_coach_name = Coach::where('id',$request->old_c_id)->first();
                          $get_new_coach_name = Coach::where('id',$request->coach_name)->first();
                          $subject = 'Coach is changed from ' .$get_old_coach_name['name']. ' to '.$get_new_coach_name['name'];

                          $emailtemplate->content = Helpers\EmailTemplate::email_template_replace_tags($emailtemplate->content, $vars);
                          $mail = Helpers\EmailTemplate::sendMail($emailtemplate, $user->email, $subject);
                          if($mail) {
                              $response = array('status' => 1,'responseMessage' => 'Coach updated mail sent successfully.' );
                              return response()->json($response)->setStatusCode(200);
                          }else{
                              $response = array('data' => '','status' => 0,'responseMessage' => 'Something went wrong, try again later.' );
                              return response()->json($response)->setStatusCode(400);
                          }
                        }else{
                          $response = array('data' => '','status' => 0,'responseMessage' => 'Something went wrong, try again later.');
                          return response()->json($response)->setStatusCode(400);
                        }
                    }else{
                        $response = array('data' => '','status' => 0,'responseMessage' => 'Something went wrong, try again later.');
                        return response()->json($response)->setStatusCode(400);
                    }
                    return response()->json(array('responseMessage' => 'Coach for session updated successfully'))->setStatusCode(200);
                }else{
                    $response = array('data' => '','status' => 0,'responseMessage' => 'Something went wrong, try again later.');
                        return response()->json($response)->setStatusCode(400);
                }
        }catch (Exception $exception){
            return response()->json(array('data' => '','responseMessage' => $exception->getMessage()))->setStatusCode(400);
        }
    }
}
