<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // seo
    public function seo()
    {
        $data = DB::table('s_e_o_s')->first();
        return view('admin.setting.seo', compact('data'));
    }
    public function seoupdate(Request $request, $id)
    {
        $data = array();
        $data['meta_title'] = $request->meta_title;
        $data['meta_author'] = $request->meta_author;
        $data['meta_tag'] = $request->meta_tag;
        $data['meta_description'] = $request->meta_description;
        $data['meta_keyword'] = $request->meta_keyword;
        $data['google_verification'] = $request->google_verification;
        $data['google_analytics'] = $request->google_analytics;
        $data['alexa_verification'] = $request->alexa_verification;
        $data['google_adsense'] = $request->google_adsense;

        DB::table('s_e_o_s')->where('id', $id)->update($data);
        return redirect()->back();
    }

    // smtp
    public function smtp()
    {
        $data = DB::table('smtps')->first();
        return view('admin.setting.smtp', compact('data'));
    }

    public function smtpupdate(Request $request, $id)
    {
        $data = array();
        $data['mailer'] = $request->mailer;
        $data['host'] = $request->host;
        $data['port'] = $request->port;
        $data['user_name'] = $request->user_name;
        $data['password'] = $request->password;

        DB::table('smtps')->where('id', $id)->update($data);
        return redirect()->back();
    }

    // website
    public function website()
    {
        $setting = DB::table('settings')->first();
        return view('admin.setting.website_setting', compact('setting'));
    }

    public function websiteupdate(Request $request, $id)
    {
        $data = array();
        $data['currency'] = $request->currency;
        $data['phone_one'] = $request->phone_one;
        $data['phone_two'] = $request->phone_two;
        $data['main_mail'] = $request->main_mail;
        $data['support_mail'] = $request->support_mail;
        $data['address'] = $request->address;
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['instagram'] = $request->instagram;
        $data['linkedin'] = $request->linkedin;
        $data['youtube'] = $request->youtube;

        if ($request->logo) {
            $photo = $request->logo;
            $photoname = uniqid() . '.' . $photo->getClientOriginalExtension();
            $photo->move('uploads/settings/', $photoname);
            $data['logo'] = 'uploads/settings/' . $photoname;
        } else {
            $data['logo'] = $request->old_logo;
        }
        if ($request->favicon) {
            $photo = $request->favicon;
            $photoname = uniqid() . '.' . $photo->getClientOriginalExtension();
            $photo->move('uploads/settings/', $photoname);
            $data['favicon'] = 'uploads/settings/' . $photoname;
        } else {
            $data['favicon'] = $request->favicon;
        }

        DB::table('settings')->where('id', $id)->update($data);
        return redirect()->back();
    }
}
