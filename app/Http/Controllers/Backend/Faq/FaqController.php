<?php

namespace App\Http\Controllers\Backend\Faq;

use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use Auth;

class FaqController extends Controller
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
                $data = Faq::with('category');
                if(isset($request->get('order')[0]['column']) && $request->get('order')[0]['column'] == 1) {
                    $data = $data->orderBy('id','desc');
                }
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('category', function ($row) {
                            return $row->category ? $row->category->category : '-';
                        })
                        ->addColumn('check',function($row){
                            $check = '';
                            if(Auth::guard()->user()->can('delete-faq'))
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
                        if (Auth::user()->can('edit-faq') || Auth::guard()->user()->can('delete-faq'))
                        {
                            $btn = "<span class=' p-1 bg-secondary text-white border-radius ' style ='border-radius: 20px;'>Access Denied! </span>";


                            if (Auth::user()->can('edit-faq'))
                            {
                                 $btn = '<a href="'.url('control-panel/manage-faq/'.$row->id.'/edit').'" class="edit_icon" title="Edit">
                                <i class="fas fa-edit icon_color" ></i> </a>';
                            }
                            if (Auth::user()->can('delete-faq'))
                            {
                                $btn = $btn . '<a onclick=deletesingle("'. $row->id .'","control-panel/manage-faq","faqDatatable") title="Delete" class="trash_icon"><i class="fas fa-trash-alt icon_color" ></i> </a>';
                            }
                        }
                            return $btn;
                        })
                        ->rawColumns(['action','check','status'])
                        ->make(true);
            }

            return view('backend.faq.index');
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
            $categories = FaqCategory::get();
            if(count($categories) == 0) {
                return redirect()->back()
                    ->with(['message.content' => 'Faq categories not found!','message.level' => 'danger']);
            }
            return view('backend.faq.create', compact('categories'));
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
            //dd($request);
                $validator = Validator::make($request->all(), [
                'title'         => 'required|max:255|min:2|unique:faqs,title,NULL,id,deleted_at,NULL',
                'category_id'       => 'required|not_in:0',
                'description'       => 'required|min:10',
                'status'            => 'required',
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                $faq = Faq::create([
                    'title'     => $request->title,
                    'description'   =>$request->description,
                    'category_id'   =>$request->category_id,
                    'status'        =>$request->status
                ]);
                return redirect()->route('manage-faq.index')
                                 ->with(['message.content' => 'Faq Saved Successfully!!','message.level' => 'success']);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        try {

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $categories = FaqCategory::get();
            if(count($categories) == 0) {
                return redirect()->back()
                    ->with(['message.content' => 'Faq categories not found!','message.level' => 'danger']);
            }
            $faq = Faq::find($id);
               if(empty($faq))
               {
                return back()->with(['message.content' => 'Faq not found!!','message.level' => 'danger']);
               }
               return view('backend/faq/edit',compact('faq','categories'));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title'  => 'required|string|max:255|min:2|unique:faqs,title,'.$id.',id,deleted_at,NULL',
                'description' => 'required|min:10',
                'category_id' => 'required|not_in:0',
                'status'    => 'required',
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $faq = Faq::where('id', $id)->update(
                [
                    'title'     => $request->title,
                    'description'   =>$request->description,
                    'category_id'   =>$request->category_id,
                    'status'        =>$request->status
                ]);
                return redirect()->route('manage-faq.index')
                                 ->with(['message.content' => 'Faq updated Successfully!!','message.level' => 'success']);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
                $faq = Faq::where('id',$id)->get();
                if(count($faq) > 0)
                    {
                        Faq::where('id',$id)->delete();
                        $response = array('data' => null,'status' => 1,'responseMessage' => "Faq Delete successfully.");
                    }else{
                        $response = array('data' => null,'status' => 0,'responseMessage' => "Faq Not found!!.");
                    }
                    return response()->json($response)->setStatusCode(200);
            } catch (Exception $e) {
                return $e->getMessage();
            }
    }
    public function multipleFaqDelete(Request $request)
    {
        try {
                $faq = Faq::whereIn('id',$request->ids)->get();
                if( count($faq) > 0)
                {
                    Faq::whereIn('id',$request->ids)->delete();
                    $response = array('data' => null,'status' => 1,'responseMessage' => "Faq list Delete successfully.");
                }else{
                    $response = array('data' => null,'status' => 0,'responseMessage' => "Faq Not found!!.");
                }
                return response()->json($response)->setStatusCode(200);
            } catch (Exception $e) {
                return $e->getMessage();
            }
    }
}
