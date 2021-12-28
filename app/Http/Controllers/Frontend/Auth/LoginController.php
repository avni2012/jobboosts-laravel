<?php

namespace App\Http\Controllers\Frontend\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\User;
use Validator;
use App\Models\PricingSubscription;
// use Session;

class LoginController extends Controller
{
    //
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:users')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('users');
    }
    /**
     * Show the application's login form.
     *
     * @return Application|Factory|Response|View
     */
    public function showLoginForm()
    {
        return view('frontend.auth.login');
    }

    public function checkActivePlan()
    {
        try 
        {   
            if(Auth::guard("users")->check())
            {
                $user_id = Auth::guard("users")->user()->id;
                $today_date = date('Y-m-d');

                return $user_plans_active =  PricingSubscription::where('user_id' ,$user_id)
                    ->Where(function ($query) use($today_date,$user_id) {
                        $query->where('user_id' ,$user_id)->where('payment_status', 1)
                        ->where('pricing_expiry_date','>=',$today_date);
                    })
                    ->pluck('pricing_id')->toArray();
                   
            }else{
                return response()->json(['responseMessage' => 'Please Login first.'])->setStatusCode(400);
            }
        } catch (Exception $e) {
            return response()->json(['responseMessage' => $e->getMessage()])->setStatusCode(400);
        }
    }
    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request) {
        try 
        { 
            $credentials = $request->only('email', 'password');
            $validator = Validator::make($request->all(), [
                'email'=> 'required|email|exists:users|max:255',
                'password' => 'required'
            ],['email.exists'=>"Email is not registered with us!"]);
            if ($validator->fails()) {
               return response()->json(array(
                    'responseMessage' => $validator->errors()->first()
                ), 400);
            }else{
                $user = User::where('email',$request->email)->first();
                if($user->is_admin == 1)
                {
                    return response()->json(['responseMessage' => 'The selected email is invalid.'])->setStatusCode(400);
                }
                if (Auth::guard('users')->attempt([
                    'email' => trim($request->email),
                    'password' => $request->password,
                    'status' => 1,
                ], $request->has('remember'))) {
                    $check_active_plan = $this->checkActivePlan();
                    if(count($check_active_plan) > 0){
                        $redirect_url = route('dashboard-candidates');
                    }else{
                        $redirect_url = route('pricing');
                    }
                    return response()->json(['responseMessage' => "User login successfully.",'redirect_url' => $redirect_url])->setStatusCode(200);
               	} else {
                	$message = 'Invalid email or password';
                    return response()->json(['responseMessage' => $message])->setStatusCode(400);
                }
            }
        } catch (Exception $e) {
            return response()->json(['responseMessage' => $e->getMessage()])->setStatusCode(400);
        	// return redirect()->back()->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
        }
    }
    /**
     * Log the user out of the application.
     *
     * @param Request $request
     *
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function logout(Request $request)
    {
        // \Session::flush();
        Auth::guard('users')->logout();
        return $this->loggedOut($request) ?: redirect()->back();
    }

}
