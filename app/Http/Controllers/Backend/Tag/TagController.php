<?php

namespace App\Http\Controllers\Backend\Tag;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use DataTables;
use Validator;
use Auth;

class TagController extends Controller
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
                $data = Tag::latest()->get();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('check',function($row){
                            $check = '';
                            if(Auth::guard()->user()->can('delete-tag'))
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
                               $li = '<span class="text-danger">  Inactive </span>';
                            }
                            return $li;
                        })
                        ->addColumn('action', function($row){
                        $btn ='';
                        if (Auth::user()->can('edit-tag') || Auth::guard()->user()->can('delete-tag'))
                        {
                            /*$btn = "<span class=' p-1 bg-secondary text-white border-radius ' style ='border-radius: 20px;'>Access Denied! </span>";

                            if (Auth::user()->can('edit-tag'))
                            {
                                $btn = '<a href="#" class="edit_icon" data-toggle="modal" data-target="#updateTag" onclick="TagFunction('.$row->id.')"><i class="fas fa-edit icon_color"></i></a>';
                            }*/
                            if (Auth::user()->can('delete-tag'))
                            {
                                $btn = $btn . '<a onclick=deletesingle("'. $row->id .'","control-panel/manage-tag","tagDatatable")  class="trash_icon"><i class="fas fa-trash-alt icon_color" ></i> </a>';
                            }
                        }
                            return $btn;
                        })
                        ->rawColumns(['action','check','status'])
                        ->make(true);
                    }
                                return view('backend.tag.index');
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
            return view('backend.tag.create');
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
                $validator = Validator::make($request->all(), [
                    'name'  => 'required|min:2|unique:tags,name,NULL,id,deleted_at,NULL',
                ]);
                if ($validator->fails()) {
                    return response()->json(['error'=>$validator->errors()->all()]);
                }
                /*$tags = new Tag;
                $tags->name = $request->name;
                $tags->status = $request->status;
                if($tags->save()){
                    $response = array('data' => $tags, 'status' => 1,'responseMessage' => "Tag saved successfully.");
                    return response()->json($response)->setStatusCode(200);*/
                $tag = Tag::updateOrCreate([
                    'id' => $request->id
                    ],
                    [
                        'name' =>  $request->name, 
                        'status'=> $request->status
                    ]);

                    $message = ($request->id)?"Data updated successfully.":"Data stored successfully.";
                    $response = array('data' => null,'status' => 1,'responseMessage' => $message );
                    return response()->json($response)->setStatusCode(200);
        } catch (Exception $e) {
            return response()->json(array('responseMessage' => $e->getMessage()))->setStatusCode(400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
                $tag = Tag::find($id);
                if($tag)
                {
                    $response = array('data' => $tag,'status' => 1,'responseMessage' => "Tag fetch successfully.");
                    return response()->json($response)->setStatusCode(200);
                }else{
                     $response = array('data' => null,'status' => 0,'responseMessage' => "Tag not found!!");
                    return response()->json($response)->setStatusCode(200);
                }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name'  => 'required|string|max:255|min:2|unique:tag,name,'.$id.',id,deleted_at,NULL',
                'slug'  => 'required|alpha_dash|max:255|min:2|unique:tag,slug,'.$id.',id,deleted_at,NULL',
                'description' => 'required|min:10',
                'status'    => 'required',
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $tag = Tag::find($id);
                if($tag)
                {
                    $tag->name          = $request->name;
                    $tag->slug          = $request->slug;
                    $tag->description   = $request->description;
                    $tag->status        = $request->status;

                    $tag->save();
                }else{
                    return redirect()->back()
                                 ->with(['message.content' => 'Tag not found!!','message.level' => 'danger']);
                }
                return redirect()->route('manage-tag.index')
                                 ->with(['message.content' => 'Tag update Successfully!!','message.level' => 'success']);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
                $tag = Tag::where('id',$id)->get();
                if(count($tag) > 0)
                    {
                        Tag::where('id',$id)->delete();
                        $response = array('data' => null,'status' => 1,'responseMessage' => "Tag Delete successfully.");
                    }else{
                        $response = array('data' => null,'status' => 0,'responseMessage' => "Tag Not found!!.");
                    }
                    return response()->json($response)->setStatusCode(200);
            } catch (Exception $e) {
                return $e->getMessage();
            }
    }

    public function multipleTagDelete(Request $request)
    {
      try {
            $tag = Tag::whereIn('id',$request->ids)->get();
            if( count($tag) > 0)
            {
                Tag::whereIn('id',$request->ids)->delete();
                $response = array('data' => null,'status' => 1,'responseMessage' => "Tag list Delete successfully.");
            }else{
                $response = array('data' => null,'status' => 0,'responseMessage' => "Tag Not found!!.");
            }
            return response()->json($response)->setStatusCode(200);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
