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
}
