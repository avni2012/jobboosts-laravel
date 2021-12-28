<?php

namespace App\Http\Controllers\Backend\CMS;

use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cms;
use DataTables;
use Validator;
use Auth;

class CmsController extends Controller
{
    /**
     * CmsController constructor.
     */
//    public function __construct()
//    {
//        $this->middleware('can:list-cms');
//    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = Cms::select('id','page_slug','page_name','description','page_title','status','seo_keyword');
                if(isset($request->get('order')[0]['column']) && $request->get('order')[0]['column'] == 1) {
                    $data = $data->orderBy('id','desc');
                }
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('check',function($row){
                            $check = '';
                            if(Auth::guard()->user()->can('delete-cms'))
                            {
                                $check = '<label class="container_chk"> <input type="checkbox" value="'.$row->id.'"><span class="checkmark"></span></label>';
                            }
                            return $check;
                        })
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
                        if (Auth::user()->can('edit-cms') || Auth::guard()->user()->can('delete-cms'))
                        {
                            $btn = "<span class=' p-1 bg-secondary text-white border-radius ' style ='border-radius: 20px;'>Access Denied! </span>";
                            if (Auth::user()->can('edit-cms'))
                            {
                                $btn = '<a href="'.url('control-panel/manage-cms/'.$row->id.'/edit').'" class="edit_icon" title="edit">
                                <i class="fas fa-edit icon_color" ></i> </a>';
                            }
                            if (Auth::user()->can('delete-cms'))
                            {
                                $btn = $btn . '<a onclick=deletesingle("'. $row->id .'","control-panel/manage-cms","cmsDatatable") title="Delete" class="trash_icon"><i class="fas fa-trash-alt icon_color" ></i> </a>';
                            }
                        }
                            return $btn;
                        })
                        ->rawColumns(['action','check','status'])
                        ->make(true);
            }
            return view('backend/cms/index');
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
            return view('backend/cms/create');
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
                'page_slug'         => 'required|max:255|min:2|alpha_dash|unique:cms,page_slug,NULL,id,deleted_at,NULL',
                'page_name'         => 'required|min:2|max:255',
                'description'       => 'required|min:10',
                'page_title'        => 'required|min:2|max:255',
                'seo_keyword'       => 'max:255',
                'status'            => 'required',
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                /*$cms = Cms::insert([
                    'page_slug'     => $request->page_slug,
                    'page_name'     => $request->page_name,
                    'description'   =>$request->description,
                    'page_title'    => $request->page_title,
                    'seo_keyword'   => $request->seo_keyword,
                    'seo_description' =>$request->seo_description,
                    'status'        =>$request->status
                ]);*/
                $cms = new Cms();
                $cms->page_slug = $request->page_slug;
                $cms->page_name = $request->page_name;
                $cms->description = $request->description;
                $cms->page_title = $request->page_title;
                $cms->seo_keyword = $request->seo_keyword;
                $cms->seo_description = $request->seo_description;
                $cms->status = $request->status;

                if($request->file('image'))
                {
                    $imageName = time().'.'.request()->image->getClientOriginalExtension();
                    request()->image->move(public_path().'/backend/images/cms', $imageName);
                    $cms->image = $imageName;
                }
                $cms->save();
                return redirect()->route('manage-cms.index')
                                 ->with(['message.content' => 'Cms Save Successfully!!','message.level' => 'success']);

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
    public function edit(Cms $cms,$id)
    {
        try {
               $cms = Cms::find($id);
               if(empty($cms))
               {
                    return back()->with(['message.content' => 'Cms not found!!','message.level' => 'danger']);
               }
               return view('backend/cms/edit',compact('cms'));
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
                'page_slug'         => 'required|string|max:255|min:2|alpha_dash|unique:cms,page_slug,'.$id.',id,deleted_at,NULL',
                'page_name'         => 'required|min:2|max:255',
                'description'       => 'required|min:10',
                'page_title'        => 'required|min:2|max:255',
                'seo_keyword'       => 'max:255',
                'status'            => 'required',
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                /*$cms = Cms::where('id', $id)->update(
                [
                    'page_slug'     => $request->page_slug,
                    'page_name'     => $request->page_name,
                    'description'   =>$request->description,
                    'page_title'    => $request->page_title,
                    'seo_keyword'   => $request->seo_keyword,
                    'seo_description' =>$request->seo_description,
                    'status'        =>$request->status
                ]);*/
                $cms = Cms::find($id);
                if(!empty($cms))
                {
                    $cms->page_slug = $request->page_slug;
                    $cms->page_name = $request->page_name;
                    $cms->description = $request->description;
                    $cms->page_title = $request->page_title;
                    $cms->seo_keyword = $request->seo_keyword;
                    $cms->seo_description = $request->seo_description;
                    $cms->status = $request->status;

                    if($request->file('image'))
                    {
                        if($cms->image){
                            $file = public_path('/backend/images/cms/').$cms->image;
                            if (file_exists($file)) {
                                unlink($file);
                            }
                        }
                        $imageName = time().'.'.request()->image->getClientOriginalExtension();
                        request()->image->move(public_path('/backend/images/cms/'), $imageName);
                        $cms->image = $imageName;
                    } 
                    $cms->save();
                    return redirect()->route('manage-cms.index')
                                 ->with(['message.content' => 'Cms update Successfully!!','message.level' => 'success']);
                }else{
                    return redirect()->route('manage-cms.index')
                                 ->with(['message.content' => 'Cms not found!!','message.level' => 'error']);
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
                $cms = Cms::where('id',$id)->get();
                if(count($cms) > 0)
                    {
                        Cms::where('id',$id)->delete();
                        $response = array('data' => null,'status' => 1,'responseMessage' => "cms Delete successfully.");
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
                    $cms = Cms::whereIn('id',$request->ids)->get();
                    if( count($cms) > 0)
                    {
                        Cms::whereIn('id',$request->ids)->delete();
                        $response = array('data' => null,'status' => 1,'responseMessage' => "cms list Delete successfully.");
                    }else{
                        $response = array('data' => null,'status' => 0,'responseMessage' => "Data Not found!!.");
                    }
                    return response()->json($response)->setStatusCode(200);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
}
