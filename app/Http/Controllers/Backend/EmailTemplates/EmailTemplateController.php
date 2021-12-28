<?php

namespace App\Http\Controllers\Backend\EmailTemplates;

use Illuminate\Http\Request;
use App\Models\EmailTemplate;
use DataTables;
use Auth;
use Validator;
use App\Http\Controllers\Controller;

class EmailTemplateController extends Controller
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
                $data = EmailTemplate::get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn ='';
                        if (Auth::user()->can('edit-emailtemplate'))
                        {
                            $btn = "<span class=' p-1 bg-secondary text-white border-radius ' style ='border-radius: 20px;'>Access Denied! </span>";


                            if (Auth::user()->can('edit-emailtemplate'))
                            {
                                $btn = '<a href="'.url('control-panel/manage-email-templates/'.$row->id.'/edit').'" class="edit_icon">
                                <i class="fas fa-edit icon_color" ></i> </a>';
                            }
                        }
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }

            return view('backend.email-templates.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['message.level' => 'danger', 'message.content' => $e->getMessage()]);
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
            return view('backend.email-templates.create');
        } catch (Exception $e) {
            return redirect()->back()->with(['message.level' => 'danger', 'message.content' => $e->getMessage()]);
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
                'keyword'         => 'required|max:255|min:2|unique:email_templates,keyword,NULL,id,deleted_at,NULL',
                'subject'         => 'required|max:255|min:2|unique:email_templates,subject,NULL,id,deleted_at,NULL',
                'content'       => 'required|min:10',
                'status'            => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $template = EmailTemplate::insert([
                'keyword'     => $request->keyword,
                'subject'     => $request->subject,
                'content'   =>$request->content,
                'status'        =>$request->status
            ]);
            return redirect()->route('manage-email-templates.index')
                ->with(['message.content' => 'Email Template Saved Successfully!!','message.level' => 'success']);
        } catch (Exception $e) {
            return redirect()->back()->with(['message.level' => 'danger', 'message.content' => $e->getMessage()]);
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
            $email_template = EmailTemplate::find($id);
            if(empty($email_template))
            {
                return back()->with(['message.content' => 'Email Template not found!!','message.level' => 'danger']);
            }
            return view('backend/email-templates/edit',compact('email_template'));
        } catch (Exception $e) {
            return redirect()->back()->with(['message.level' => 'danger', 'message.content' => $e->getMessage()]);
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
                'keyword'         => 'required|max:255|min:2|unique:email_templates,keyword,'.$id.',id',
                'subject'         => 'required|max:255|min:2|unique:email_templates,subject,'.$id.',id',
                'content'       => 'required|min:10',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $email_template = EmailTemplate::find($id);
            if($email_template) {
                $email_template->keyword = $request->keyword;
                $email_template->subject = $request->subject;
                $email_template->content = $request->content;
                if($email_template->save()) {
                    return redirect()->route('manage-email-templates.index')
                        ->with(['message.content' => 'Email template updated successfully!!','message.level' => 'success']);
                } else {
                    return redirect()->route('manage-email-templates.index')
                        ->with(['message.content' => 'Something went wrong, please try again!!','message.level' => 'error']);
                }
            } else {
                return redirect()->route('manage-email-templates.index')
                    ->with(['message.content' => 'Email template not found!!','message.level' => 'error']);
            }

        } catch (Exception $e) {
            return redirect()->back()->with(['message.level' => 'danger', 'message.content' => $e->getMessage()]);
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
            $email_template = EmailTemplate::where('id',$id)->get();
            if(count($email_template) > 0)
            {
                EmailTemplate::where('id',$id)->delete();
                $response = array('data' => null,'status' => 1,'responseMessage' => "Email Template Deleted Successfully.");
            }else{
                $response = array('data' => null,'status' => 0,'responseMessage' => "Email Template Not Found!!.");
            }
            return response()->json($response)->setStatusCode(200);
        } catch (Exception $e) {
            return redirect()->back()->with(['message.level' => 'danger', 'message.content' => $e->getMessage()]);
        }
    }

    public function multipleEmailTemplateDelete(Request $request)
    {
        try {
            $email_template = EmailTemplate::whereIn('id',$request->ids)->get();
            if( count($email_template) > 0)
            {
                EmailTemplate::whereIn('id',$request->ids)->delete();
                $response = array('data' => null,'status' => 1,'responseMessage' => "Email Template list Deleted Successfully.");
            }else{
                $response = array('data' => null,'status' => 0,'responseMessage' => "Email Template Not Found!!.");
            }
            return response()->json($response)->setStatusCode(200);
        } catch (Exception $e) {
            return redirect()->back()->with(['message.level' => 'danger', 'message.content' => $e->getMessage()]);
        }
    }
}
