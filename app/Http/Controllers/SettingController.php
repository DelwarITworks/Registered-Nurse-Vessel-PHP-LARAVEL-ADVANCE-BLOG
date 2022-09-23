<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::first();
        return view('admin.setting.index',compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $setting = Setting::create($this->validateData());
        $this->storeImage($setting);
        if ($setting) {
            $notification = array(
                'messege' => 'Information Upload Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        return view('admin.setting.index',compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $setting = Setting::first();
        $setting->update($this->validateData());

        if (request()->has('favicon')) {
            if (request()->old_favicon) {
                unlink('storage/app/public/'.request()->old_favicon);
            }
            $this->storeImage($setting);
        }

        if (request()->has('logo')) {
            if (request()->old_logo) {
                unlink('storage/app/public/'.request()->old_logo);
            }
            $this->storeImage($setting);
        }

        if (request()->has('header_logo')) {
            if (request()->old_header_logo) {
                unlink('storage/app/public/'.request()->old_header_logo);
            }
            $this->storeImage($setting);
        }

        if ($setting) {
            $notification = array(
                'messege' => 'Information Updated Successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }

    private function validateData()
    {
        return request()->validate([
            'website_title' => '',
            'header_title' => '',
            'description' => '',
            'email' => '',
            'phone' => '',
            'fb_link' => '',
            'instagram_link' => '',
            'twitter_link' => '',
            'address' => '',
            'header_logo' => '',
            'logo' => '',
            'favicon' => '',
        ]);
    }
    private function storeImage($setting)
    {
        if(request()->has('header_logo')){
            $setting->update([
                'header_logo' => request()->header_logo->store('image/setting/headerImage','public'),
            ]);
        }

        if(request()->has('logo')){
            $setting->update([
                'logo' => request()->logo->store('image/setting/logo','public'),
            ]);
        }

        if(request()->has('favicon')){
            $setting->update([
                'favicon' => request()->favicon->store('image/setting/favicon','public'),
            ]);
        }

    }
}
