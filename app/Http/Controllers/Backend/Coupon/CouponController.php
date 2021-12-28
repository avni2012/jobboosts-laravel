<?php

namespace App\Http\Controllers\Backend\Coupon;

use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use DataTables;
use Validator;
use Auth;

class CouponController extends Controller
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
                $data = Coupon::select('id','coupon_code','type','start_date','end_date');
                if(isset($request->get('order')[0]['column']) && $request->get('order')[0]['column'] == 1) {
                    $data = $data->orderBy('id','desc');
                }
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('check',function($row){ 
                            $check = '';
                            if(Auth::guard()->user()->can('delete-coupon'))
                            {
                                $check = '<label class="container_chk"> <input type="checkbox" value="'.$row->id.'"><span class="checkmark"></span></label>';
                            }
                            return $check;
                        })
                        ->addColumn('action', function($row){
                        $btn ='';
                        if (Auth::user()->can('edit-coupon') || Auth::guard()->user()->can('delete-coupon'))
                        {
                            $btn = "<span class=' p-1 bg-secondary text-white border-radius ' style ='border-radius: 20px;'>Access Denied! </span>";
                            if (Auth::user()->can('edit-coupon'))
                            {
                                $btn = '<a href="'.url('control-panel/manage-coupon/'.$row->id.'/edit').'" class="edit_icon" title="edit">
                                <i class="fas fa-edit icon_color" ></i> </a>';
                            }
                            if (Auth::user()->can('delete-course'))
                            {
                                $btn = $btn . '<a onclick=deletesingle("'. $row->id .'","control-panel/manage-coupon","couponDatatable") title="Delete" class="trash_icon"><i class="fas fa-trash-alt icon_color" ></i> </a>';
                            }
                        }
                            return $btn;
                        })
                        ->rawColumns(['action','check'])
                        ->make(true);
            }
            return view('backend/coupon/index');
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
                return view('backend/coupon/create');
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
                    'type' => 'required',
					'coupon_code' => 'required|min:3|max:25|regex:/^[a-zA-Z0-9]+$/u|unique:coupons,coupon_code,NULL,id,deleted_at,NULL',
					'discount_type' => 'required|in:1,2',
					'discount_value' => 'required|numeric|not_in:0',
					'start_date' => 'required|date|after_or_equal:today',
					'end_date' => 'required|date|after_or_equal:start_date',
					'one_time_use' => 'required|in:1,0'
					// 'currency' => 'required|in:1,0'
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                if($request->discount_type == 2){
					if($request->discount_value > 99){
						return redirect()->back()->withErrors(array('discount_value' => 'The discount value must be less than 100'))->withInput();    
					}   
				}
				$start_date = date('Y-m-d H:i:s', strtotime($request->start_date));
        		$end_date = date('Y-m-d H:i:s', strtotime($request->end_date));
				$coupon = Coupon::insert([
					'type' => $request->type,
					'coupon_code' => strtoupper($request->coupon_code),
					'discount_type' =>$request->discount_type,
					'discount_value' => $request->discount_value,
					'start_date' => $start_date,
					'end_date' => $end_date,
					'one_time_use' => $request->one_time_use,
					'currency' => $request->currency,
					'created_by' => Auth::guard('admin')->user()->id,
					'updated_by' => Auth::guard('admin')->user()->id
				]);
                return redirect()->route('manage-coupon.index')
                                 ->with(['message.content' => 'Coupon Saved Successfully!!','message.level' => 'success']);

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
    public function edit(Coupon $coupon,$id)
    {
        try {
                $coupon = Coupon::find($id);
                if(empty($coupon))
                {
                    return back()->with(['message.content' => 'Coupon not found!!','message.level' => 'danger']);
                }
               return view('backend/coupon/edit',compact('coupon'));
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
					'type' => 'required',
					'coupon_code' => 'required|min:3|max:25|regex:/^[a-zA-Z0-9]+$/u|unique:coupons,coupon_code,'.$id.',id,deleted_at,NULL',
					'discount_type' => 'required|in:1,2',
					'discount_value' => 'required|numeric|not_in:0',
					'start_date' => 'required|date',
					'end_date' => 'required|date|after_or_equal:start_date',
					'one_time_use' => 'required|in:1,0'
					// 'currency' => 'required|in:1,0'
				]);
				if ($validator->fails()) {
					return redirect()->back()->withErrors($validator)->withInput();
				}
				if($request->discount_type == 2){
					if($request->discount_value > 99){
						return redirect()->back()->withErrors(array('discount_value' => 'The discount value must be less than 100'))->withInput();    
					}   
				}

                $coupon = Coupon::find($id);
				$start_date = date('Y-m-d H:i:s', strtotime($request->start_date));
        		$end_date = date('Y-m-d H:i:s', strtotime($request->end_date));
				if($coupon){
					$coupon = $coupon->where('id', $id)->update([
						'type' => $request->type,
						'coupon_code' => strtoupper($request->coupon_code),
						'discount_type' =>$request->discount_type,
						'discount_value' => $request->discount_value,
						'start_date' => $start_date,
						'end_date' =>$end_date,
						'one_time_use' => $request->one_time_use,
						'currency' => $request->currency,
						'updated_by' => Auth::user()->id
					]);
					return redirect()->route('manage-coupon.index')
                                 ->with(['message.content' => 'Coupon updated Successfully!!','message.level' => 'success']);
				}else{
					return redirect()->route('manage-coupon.index')
                                 ->with(['message.content' => 'Coupon updated Successfully!!','message.level' => 'success']);
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
                $coupon = Coupon::where('id',$id)->get();
                if(count($coupon) > 0)
                    {
                        Coupon::where('id',$id)->delete();
                        $response = array('data' => null,'status' => 1,'responseMessage' => "Coupon Delete successfully.");
                    }else{
                        $response = array('data' => null,'status' => 0,'responseMessage' => "Coupon Not found!!.");
                    }
                    return response()->json($response)->setStatusCode(200);
            } catch (Exception $e) {
                return $e->getMessage();
            }
    }

    public function multipleCouponDelete(Request $request)
        {
            try {
                    $coupon = Coupon::whereIn('id',$request->ids)->get();
                    if(count($coupon) > 0)
                    {
                        Coupon::whereIn('id',$request->ids)->delete();
                        $response = array('data' => null,'status' => 1,'responseMessage' => "Coupon list Deleted successfully.");
                    }else{
                        $response = array('data' => null,'status' => 0,'responseMessage' => "Coupon Not found!!.");
                    }
                    return response()->json($response)->setStatusCode(200);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
}
