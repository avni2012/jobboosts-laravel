<?php

namespace App\Http\Controllers\Backend\Industry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use Validator;
use App\Models\Industry;
use Auth;

class IndustryController extends Controller
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
                $industry = Industry::latest()->get();
                return Datatables::of($industry)
                        ->addIndexColumn()
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
                        if (Auth::user()->can('edit-industry'))
                        {
                            $btn = "<span class=' p-1 bg-secondary text-white border-radius ' style ='border-radius: 20px;'>Access Denied! </span>";

                            if (Auth::user()->can('edit-industry'))
                            {
                                 $btn = '<a href="'.url('control-panel/manage-industry/'.$row->id.'/edit').'" class="edit_icon" title="Edit">
                                <i class="fas fa-edit icon_color" ></i> </a>';
                            }
                        }
                            return $btn;
                        })
                        ->rawColumns(['action','status'])
                        ->make(true);
            }
            return view('backend.industry.index');
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
                return view('backend.industry.create');
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
                    'name'    => 'required|max:255|min:2|unique:industry,name,NULL,id,deleted_at,NULL',
                    'status'  => 'required'
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $industry = Industry::create([
                    'name'    => $request->name,
                    'status'  =>$request->status
                ]);
                return redirect()->route('manage-industry.index')
                                 ->with(['message.content' => 'Industry Saved Successfully!!','message.level' => 'success']);
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
                $industry = Industry::find($id);
                   if(empty($industry))
                   {
                    return back()->with(['message.content' => 'Industry not found!!','message.level' => 'danger']);
                   }
                return view('backend/industry/edit',compact('industry'));
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
                    'name'  => 'required|string|max:255|min:2|unique:industry,name,'.$id.',id,deleted_at,NULL',
                    'status'    => 'required'
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $industry = Industry::where('id', $id)->update(
                [
                    'name'   => $request->name,
                    'status' =>$request->status
                ]);
                return redirect()->route('manage-industry.index')
                                 ->with(['message.content' => 'Industry updated Successfully!!','message.level' => 'success']);
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
                
            } catch (Exception $e) {
                return $e->getMessage();
            }
    }

}
