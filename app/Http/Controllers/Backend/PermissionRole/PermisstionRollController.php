<?php

namespace App\Http\Controllers\Backend\PermissionRole;

use App\Http\Controllers\Controller;
use App\PermissionRole;
use Illuminate\Http\Request;
use App\Permission;
use App\RoleUser;
use App\Role;
use DataTables;
use Validator;
use Auth;
use DB;

class PermisstionRollController extends Controller
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
                $data = Role::latest()->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                            $btn ='';
                        if (Auth::user()->can('edit-role') || Auth::guard()->user()->can('delete-role'))
                        {

                            if($row->name =="super_admin")
                            {
                                $btn = "<span class=' p-1 bg-secondary text-white border-radius ' style ='border-radius: 20px;'>Access Denied! </span>";

                            }else{
                                if (Auth::user()->can('edit-role'))
                                {
                                    $btn = '<a href="#" class="edit_icon" data-toggle="modal" data-target="#updateroledetail" onclick="RoleEditFunction('.$row->id.')" title="Edit"><i class="fas fa-edit icon_color"></i></a>';
                                }
                                if (Auth::user()->can('delete-role'))
                                {
                                    $btn = $btn . '<a href="#" class="trash_icon" data-toggle="modal"   data-target="#deletenotification" onclick="roledelete('.$row->id.')" title="Delete"><i class="fas fa-trash-alt icon_color" ></i> </a>';
                                }
                            }
                        }
                            return $btn;
                        })
                        ->addColumn('manage_permistion_action', function($row){
                            $li ='';
                              if (Auth::guard()->user()->can('edit-role'))
                              {
                                if($row->name == 'super_admin')
                                {
                                    $li = "<span class=' p-1 bg-secondary text-white border-radius ' style=' border-radius: 20px;'>Access Denied! </span>";
                                }else{
                                    $li = '<a href="'.url("control-panel/manage-permisstion/".$row->id).'">Manage Permission </a>';
                                }
                              }
                                return $li;
                        })
                        ->rawColumns(['action','manage_permistion_action'])
                        ->make(true);
            }
            return view('backend.roles_and_permission.manage-role');
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
        try{

        } catch (\Exception $e)
        {
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
                'name' => 'required|max:50|min:2||unique:roles,name,'.$request->id.',id,deleted_at,NULL',
                'display_name' => 'required|max:50|min:2',
                'description' => 'required|max:255|min:2'
            ]);

            if ($validator->fails()) {
                return response()->json(['error'=>$validator->errors()->all()]);
            }
            $role = Role::updateOrCreate(['id' => $request->id],
                [
                    'name' => $request->name,
                    'display_name' => $request->display_name,
                    'description'=>$request->description
                ]);
                $message = ($request->id)?"Data update successfully.":"Data stored successfully.";
                $response = array('data' => null,'status' => 1,'responseMessage' => $message );
                return response()->json($response)->setStatusCode(200);
        } catch (\Exception $e)
        {
            $response = array('data' => null,'status' => 0,'responseMessage' => $e->getMessage());
            return response()->json($response)->setStatusCode(400);
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
        try{

            $role = Role::find($id);
            if($role)
            {
                $response = array('data' => $role,'status' => 1,'responseMessage' => "Data fetch successfully.");
                return response()->json($response)->setStatusCode(200);
            }else{
                 $response = array('data' => null,'status' => 0,'responseMessage' => "Data not found!!");
                return response()->json($response)->setStatusCode(200);
            }

        } catch (\Exception $e)
        {
            $response = array('data' => null,'status' => 0,'responseMessage' => $e->getMessage());
            return response()->json($response)->setStatusCode(400);
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
            Role::where('id',$id)->delete();
            $response = array('data' => null,'status' => 1,'responseMessage' => "Data Delete successfully.");
            return response()->json($response)->setStatusCode(200);
        } catch (Exception $e) {
            $response = array('data' => null,'status' => 0,'responseMessage' => $e->getMessage());
            return response()->json($response)->setStatusCode(400);
        }
    }

    public function checkRolehasUser($id)
    {
        try {
            $roleuser = RoleUser::where('role_id',$id)->get();
            if(count($roleuser) > 0)
            {
                 $response = array('data' => null,'status' => 1,'responseMessage' => "can't delete this role!!");
                return response()->json($response)->setStatusCode(200);
            }else{
                $response = array('data' => null,'status' => 0,'responseMessage' => "You can delete this role!");
                return response()->json($response)->setStatusCode(200);
            }

        } catch (Exception $e) {
            $response = array('data' => null,'status' => 0,'responseMessage' => $e->getMessage());
            return response()->json($response)->setStatusCode(400);
        }
    }

    public function managePermisstion($roleId)
    {
        try {
                $role = Role::find($roleId);
                if($role){
                    $allpermissions = Permission::with(['PermissionData.IsActive'
                    => function($query) use($roleId)
                        {
                            $query->where('role_id',$roleId);
                        }
                    ])->groupBy('module_name')->orderBy('module_name','asc')->get();

                    return view('backend.roles_and_permission.manage-permisstion', compact('allpermissions','role'));
                }else{
                    return back()->with(['message.content' =>'Role not found!!', 'message.level' => 'danger']);
                }
        } catch (Exception $e) {
            return back()->with(['message.content' =>$e->getMessage(), 'message.level' => 'danger']);
        }
    }

    public function permisstionStore(Request $request,$roleId)
    {
        try {
            $permisstion_id = array_keys($request->permisstion_);
            foreach( $permisstion_id as $permisstion_ans)
            {
                if($request->permisstion_[$permisstion_ans] == 'yes')
                {
                    if(PermissionRole::where(['permission_id'=>$permisstion_ans,'role_id'=>$roleId])->first())
                    {
                        continue;
                    }else{
                        PermissionRole::insert(['permission_id'=>$permisstion_ans,'role_id'=>$roleId]);
                    }
                } else {
                    PermissionRole::where(['permission_id'=>$permisstion_ans,'role_id'=>$roleId])->delete();
                }
            }
            return redirect()->route('manage-role.index')->with(['message.content' => 'Role Details with Permission Access successfully managed!', 'message.level' => 'success']);
        } catch (Exception $e) {
            return back()->with(['message.content' =>$e->getMessage(), 'message.level' => 'danger']);
        }
    }


}
