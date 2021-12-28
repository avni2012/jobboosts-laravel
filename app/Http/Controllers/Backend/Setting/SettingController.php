<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Models\AppUser;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Helpers;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $setting = GeneralSetting::first()->toArray();
            //dd($setting['logo']);
            return view('backend.settings.index', compact('setting'));
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
    public function update(Request $request)
    {
        try {
            $setting = GeneralSetting::first();
            $setting->update($request->all());
            if ($request->file('logo') != null) {
                $img = Helpers\FileUpload::fileUpload($request->logo,null,$path="frontend/images/");
                if($img) {
                    $setting->logo = $img;
                } else {
                    Log::error(['logo' => 'Error saving logo']);
                }
            }
            if($setting->save()) {
                return redirect()->route('manage-settings.index')
                    ->with(['message.content' => 'Settings Saved Successfully!!','message.level' => 'success']);
            } else {
                return redirect()->back()
                    ->with(['message.content' => 'Something went wrong, please try again!!','message.level' => 'success']);
            }
        } catch (Exception $e) {
            return redirect()->back()->with(['message.level' => 'danger', 'message.content' => $e->getMessage()]);
        }
    }
}
