<?php

namespace App\Http\Controllers\Backend\ContactUs;

use App\Models\Cms;
use App\Models\ContactUs;
use DataTables;
use Validator;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactUsController extends Controller
{
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = ContactUs::with('category');
                if(isset($request->get('order')[0]['column']) && $request->get('order')[0]['column'] == 1) {
                    $data = $data->orderBy('id','desc');
                }
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('check',function($row){
                        $check = '';
                        if(Auth::guard()->user()->can('delete-contactus'))
                        {
                            $check = '<label class="container_chk"> <input type="checkbox" value="'.$row->id.'"><span class="checkmark"></span></label>';
                        }
                        return $check;
                    })
                    ->editColumn('created_at', function($row) {
                        return date('d-m-Y h:i A', strtotime($row->created_at));
                    })
                    ->addColumn('action', function($row){
                        if (Auth::user()->can('delete-contactus')) {
                            $btn = '<a onclick=deletesingle("'. $row->id .'","control-panel/manage-contact-us","contactUsDatatable") title="Delete" class="trash_icon"><i class="fas fa-trash-alt icon_color" ></i> </a>';
                        } else {
                            $btn = "<span class=' p-1 bg-secondary text-white border-radius ' style ='border-radius: 20px;'>Access Denied! </span>";
                        }
                        return $btn;
                    })
                    ->rawColumns(['action','check'])
                    ->make(true);
            }
            return view('backend/contact-us/index');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            $cont = ContactUs::where('id',$id)->get();
            if(count($cont) > 0) {
                ContactUs::where('id',$id)->delete();
                $response = array('data' => null,'status' => 1,'responseMessage' => "Contact Us Deleted successfully.");
            }else{
                $response = array('data' => null,'status' => 0,'responseMessage' => "Data Not found!!.");
            }
            return response()->json($response)->setStatusCode(200);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function multipleCmsDelete(Request $request)
    {
        try {
            $cont = ContactUs::whereIn('id',$request->ids)->get();
            if( count($cont) > 0) {
                ContactUs::whereIn('id',$request->ids)->delete();
                $response = array('data' => null,'status' => 1,'responseMessage' => "Contact Us list Deleted successfully.");
            }else{
                $response = array('data' => null,'status' => 0,'responseMessage' => "Data Not found!!.");
            }
            return response()->json($response)->setStatusCode(200);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
