<?php

namespace App\Http\Controllers\Backend\Notification;

use App\Helpers\FileUpload;
use DataTables;
use Validator;
use Auth;
use App\Models\Notification;
use App\Models\NotificationImage;
use App\User;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
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
                $data = Notification::latest()->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('description',function($row){
                        return strip_tags($row->description);
                    })
                    ->editColumn('image',function($row){
                        if($row->image) {
                            return '<img class="ml-3" src="'.asset('assets/backend/developer/notifications/'. $row->image).'" width="30px" height="30px">';
                        } else {
                            return '-';
                        }
                    })
                    ->editColumn('send_to',function($row){
                        $id_arr = explode(',',$row->customer_ids);
                        return count($id_arr).' Users';
                    })
                    ->editColumn('created_at',function($row){
                        return date('d/m/Y', strtotime($row->created_at));
                    })
                    ->addColumn('action', function($row){
                        $btn ='';
                        if (Auth::user()->can('view-notification'))
                        {
                            $btn = "<span class=' p-1 bg-secondary text-white border-radius ' style ='border-radius: 20px;'>Access Denied! </span>";
                            if (Auth::user()->can('view-notification'))
                            {
                                $btn = '<a href="'.url('control-panel/manage-notification/'.$row->id).'" class="view_icon">
                                <i class="fas fa-eye icon_color" ></i> </a>';
                            }
                        }
                        return $btn;
                    })
                    ->rawColumns(['action','image'])
                    ->make(true);
            }
            return view('backend/notification/index');
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
            $users = User::doesntHave('roles')->get();
            return view('backend/notification/create', compact('users'));
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
            //dd($request->image );
            $validator = Validator::make($request->all(), [
                'title'         => 'required|min:2|max:255',
                'description'       => 'required|min:10',
                'customer_ids'       => 'required|not_in:0'
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $notification = new Notification();
            $notification->title = $request->title;
            $notification->description = $request->description;
            $notification->customer_ids = implode(',', $request->customer_ids);

            if($request->has('image') && $request->image != '') {
                $img = FileUpload::fileUpload($request->image,null,$flag="notification");
                if($img) {
                    $notification->image = $img;
                }
            }

            if($notification->save()) {
                return redirect()->route('manage-notification.index')
                    ->with(['message.content' => 'Notification Saved Successfully!!','message.level' => 'success']);
            } else {
                return redirect()->back()
                    ->with(['message.content' => 'Something Went Wrong, Try Again!!','message.level' => 'error']);
            }

        } catch (Exception $e) {
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
        try {
            $notification = Notification::find($id);
            if(empty($notification))
            {
                return back()->with(['message.content' => 'Notification Detail not found!!','message.level' => 'danger']);
            }
            $customer_ids = explode(',', $notification->customer_ids);
            $customers = User::whereIn('id', $customer_ids)->get();
            $customer_names = [];
            foreach ($customers as $customer) {
                array_push($customer_names, $customer->getfullNameAttribute());
            }
            $customer_names = implode(', ',$customer_names);
            //dd($customer_names);
            return view('backend/notification/show',compact('notification','customer_names'));
        } catch (Exception $e) {
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
