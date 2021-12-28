<?php

namespace App\Http\Controllers\Backend\HomepageSlider;

use App\Models\HomepageSlider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
use DB;
use Log;
use App\Helpers;

class HomepageSliderController extends Controller {

    public function index(Request $request)
    {
        try {
           $imgs = HomepageSlider::get();
           return view('backend.homepage_slider.index', compact('imgs'));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function create()
    {
        try {
            return view('backend/homepage_slider/create');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'image'         => 'required|mimes:jpeg,png,jpg|max:1024',
                'heading'       => 'nullable|min:2',
                'small_desc'       => 'nullable|min:10',
                'button_text'       => 'nullable|required_with:button_url',
                'button_url'       => 'nullable|required_with:button_text|url'
            ],[
               'image.max' => 'The image may not be greater than 1 MB.' 
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            DB::beginTransaction();
            $slider = new HomepageSlider();
            $img = Helpers\FileUpload::fileUpload($request->file('image'),null,'/frontend/images/slider/');
            //dd($img);
            if($img) {
                $slider->image = $img;
                $slider->heading = $request->heading;
                $slider->small_desc = $request->small_desc;
                $slider->button_text = $request->button_text;
                $slider->button_url = $request->button_url;
                if($slider->save()) {
                    DB::commit();
                    return redirect()->route('manage-homepage-sliders.index')
                        ->with(['message.content' => 'Homepage Slider Saved Successfully.','message.level' => 'success']);
                } else {
                    DB::rollback();
                    return redirect()->route('manage-homepage-sliders.index')
                        ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
                }
            } else {
                DB::rollback();
                Log::error(['logo' => 'Error saving logo']);
                return redirect()->route('manage-homepage-sliders.index')
                    ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
            }
        } catch (Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $img = HomepageSlider::find($id);
            if(!$img) {
                return redirect()->route('manage-homepage-sliders.index')
                    ->with(['message.content' => 'Sorry, no homepage slider found.','message.level' => 'danger']);
            } else {
                return view('backend/homepage_slider/edit', compact('img'));
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'image'         => 'mimes:jpeg,png,jpg|max:1024',
                'heading'       => 'nullable|min:2',
                'small_desc'       => 'nullable|min:10',
                'button_text'       => 'nullable|required_with:button_url|min:2',
                'button_url'       => 'nullable|required_with:button_text|url'
            ],[
               'image.max' => 'The image may not be greater than 1 MB.' 
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            DB::beginTransaction();
            $slider = HomepageSlider::find($id);
            if(!$slider) {
                return redirect()->route('manage-homepage-sliders.index')
                    ->with(['message.content' => 'Sorry, no homepage slider found.','message.level' => 'danger']);
            }
            if($request->file('image')) {
                $img = Helpers\FileUpload::fileUpload($request->file('image'),null,'frontend/images/slider/');
                if($img) {
                    $slider->image = $img;
                    $slider->heading = $request->heading;
                    $slider->small_desc = $request->small_desc;
                    $slider->button_text = $request->button_text;
                    $slider->button_url = $request->button_url;
                    if($slider->save()) {
                        DB::commit();
                        return redirect()->route('manage-homepage-sliders.index')
                            ->with(['message.content' => 'Homepage Slider Saved Successfully.','message.level' => 'success']);
                    } else {
                        DB::rollback();
                        return redirect()->route('manage-homepage-sliders.index')
                            ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
                    }
                } else {
                    DB::rollback();
                    Log::error(['logo' => 'Error saving logo']);
                    return redirect()->route('manage-homepage-sliders.index')
                        ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
                }
            } else {
                $slider->heading = $request->heading;
                $slider->small_desc = $request->small_desc;
                $slider->button_text = $request->button_text;
                $slider->button_url = $request->button_url;
                if($slider->save()) {
                    DB::commit();
                    return redirect()->route('manage-homepage-sliders.index')
                        ->with(['message.content' => 'Homepage Slider Saved Successfully.','message.level' => 'success']);
                } else {
                    DB::rollback();
                    return redirect()->route('manage-homepage-sliders.index')
                        ->with(['message.content' => 'Something went wrong, please try again.','message.level' => 'danger']);
                }
            }
        } catch (Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }

    public function destroy(Request $request, $id)
    {
        try {
            $img = HomepageSlider::find($request->id);
            if(!$img) {
                return 'Sorry, no image slider found.';
            } else {
                if(HomepageSlider::where('id',$request->id)->delete()) {
                    return 'success';
                } else {
                    return 'Something went wrong, please try again.';
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}