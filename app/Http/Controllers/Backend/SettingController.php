<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function general()
    {

        return view('backend.setting.general');
    }


    public function general_update(Request $request,)
    {
        $this->validate($request, [
            // 'logo' =>'required|mimes:jpg,jpeg,png,svg|max:2048',
            // 'email' => 'required',
            // 'phone' => 'required',
            // 'address' => 'required',
            // 'fb_link'=> 'required',
            // 'youtube_link'=>'required',
            // 'linkedin_link'=> 'required',
            // 'instagram_link'=> 'required',
            // 'twitter_link'=> 'required',
            // 'desc' => 'required',

            'site_title' =>'required',
            'site_description' =>'required',
            'site_address' =>'required',
            'site_phone' =>'required',
            'site_email' =>'required|email',
            'website' =>'required',
            'est_year' =>'required',

        ]);
        Setting::updateOrCreate(['name' => 'site_title'], ['value' => $request->get('site_title')]);
        Setting::updateOrCreate(['name' => 'site_description'], ['value' => $request->get('site_description')]);
        Setting::updateOrCreate(['name' => 'site_address'], ['value' => $request->get('site_address')]);
        Setting::updateOrCreate(['name' => 'site_phone'], ['value' => $request->get('site_phone')]);
        Setting::updateOrCreate(['name' => 'site_email'], ['value' => $request->get('site_email')]);
        Setting::updateOrCreate(['name' => 'website'], ['value' => $request->get('website')]);
        Setting::updateOrCreate(['name' => 'est_year'], ['value' => $request->get('est_year')]);

        return redirect()->back();
    }

    public function appearance(Request $request)
    {
        return view('backend.setting.appearance');
    }

    public function appearance_update(Request $request)
    {
        $this->validate($request,[
            'site_logo' => 'required|image',
            'site_favicon' => 'required|image',
        ]);
        //Update logo
        if ($request->hasFile('site_logo')){

            $file = $request->file('site_logo');
            $file_name = time().rand(0000,9999).'.'.$file->getClientoriginalExtension();
            if(setting('site_logo')){
                unlink(setting('site_logo'));
            }
            $file->move('uploads/logo/',$file_name);

            Setting::updateOrCreate(
                ['name' => 'site_logo'],
                ['value'=>'uploads/logo/' . $file_name]
            );
        }

        //Update favicon
        if ($request->hasFile('site_favicon')){
            $file = $request->file('site_favicon');
            $file_name = time().rand(0000,9999).'.'.$file->getClientoriginalExtension();
            if(setting('site_favicon')){
                unlink(setting('site_favicon'));
            }
            $file->move('uploads/logo/',$file_name);

            Setting::updateOrCreate(
                ['name' => 'site_favicon'],
                ['value'=>'uploads/logo/' . $file_name]
            );
        }

        return redirect()->back();
    }

    public function privacy(Request $request)
    {
        return view('backend.setting.privacy');
    }

    public function privacy_update(Request $request)
    {
        $this->validate($request,[
            'site_privacy' => 'required',
        ]);
        Setting::updateOrCreate(['name'=>'site_privacy'],['value'=>$request->get('site_privacy')]);

        return redirect()->back();
    }

    public function term(Request $request)
    {
        return view('backend.setting.term');
    }

    public function term_update(Request $request)
    {
        $this->validate($request,[
            'site_term' => 'required',
        ]);
        Setting::updateOrCreate(['name'=>'site_term'],['value'=>$request->get('site_term')]);

        return redirect()->back();
    }

    public function social(Request $request)
    {
        return view('backend.setting.social');
    }

    public function social_update(Request $request)
    {
        $this->validate($request,[
            'facebook' =>'required|url',
            'twitter' =>'required|url',
            'linkedin' =>'required|url',
            'youtube' =>'required|url',
            'instragram' =>'required|url',
        ]);
        Setting::updateOrCreate(['name'=>'facebook'],['value'=>$request->get('facebook')]);
        Setting::updateOrCreate(['name'=>'twitter'],['value'=>$request->get('twitter')]);
        Setting::updateOrCreate(['name'=>'linkedin'],['value'=>$request->get('linkedin')]);
        Setting::updateOrCreate(['name'=>'youtube'],['value'=>$request->get('youtube')]);
         Setting::updateOrCreate(['name'=>'instragram'],['value'=>$request->get('instragram')]);

        return redirect()->back();
    }


}
