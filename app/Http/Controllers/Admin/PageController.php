<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function page()
    {
        $page = DB::table('pages')->latest()->get();
        return view('admin.setting.page.index', compact('page'));
    }

    public function create()
    {
        return view('admin.setting.page.page_create');
    }

    public function store(Request $request)
    {

        $data = array();
        $data['page_position'] = $request->page_position;
        $data['page_name'] = $request->page_name;
        $data['page_slug'] = Str::slug($request->page_name, '-');
        $data['page_title'] = $request->page_title;
        $data['page_description'] = $request->page_description;
        DB::table('pages')->insert($data);

        return redirect()->back();
    }

    public function edit($id)
    {
        $page = DB::table('pages')->where('id', $id)->first();
        return view('admin.setting.page.edit', compact('page'));
    }
    public function update(Request $request, $id)
    {
        $data = array();
        $data['page_position'] = $request->page_position;
        $data['page_name'] = $request->page_name;
        $data['page_slug'] = Str::slug($request->page_name, '-');
        $data['page_title'] = $request->page_title;
        $data['page_description'] = $request->page_description;
        DB::table('pages')->where('id', $id)->update($data);

        return redirect()->route('page.index');
    }
    public function destroy($id)
    {
        DB::table('pages')->where('id', $id)->delete();

        return redirect()->back();
    }
}
