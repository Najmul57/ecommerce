<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Exists;
use File;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('brands')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="#" class="btn btn-info btn-sm edit"
                    data-id="' . $row->id . '" data-toggle="modal"
                    data-target="#editModal"><i class="fa fa-edit"></i></a>
                <a href="' . route('delete.brand', [$row->id]) . '"  class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.brand.index');
    }
    public function store(Request $request)
    {
        $slug = Str::slug($request->brand_name, '-');

        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_slug'] = Str::slug($request->brand_name, '-');

        $photo = $request->brand_logo;
        $photoname = $slug . '.' . $photo->getClientOriginalExtension();
        $photo->move('uploads/brands/', $photoname);
        $data['brand_logo'] = 'uploads/brands/' . $photoname;
        DB::table('brands')->insert($data);

        return redirect()->back();
    }

    public function edit($id)
    {
        $data = DB::table('brands')->where('id', $id)->first();
        return view('admin.brand.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $slug = Str::slug($request->brand_name, '-');

        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_slug'] = Str::slug($request->brand_name, '-');

        if ($request->brand_logo) {
            if (File::exists($request->old_logo)) {
                unlink($request->old_logo);
            }
            $photo = $request->brand_logo;
            $photoname = $slug . '.' . $photo->getClientOriginalExtension();
            $photo->move('uploads/brands/', $photoname);
            $data['brand_logo'] = 'uploads/brands/' . $photoname;
            DB::table('brands')->where('id', $request->id)->update($data);
            return redirect()->back();
        } else {
            $data['brand_logo'] = $request->old_logo;
            DB::table('brands')->where('id', $request->id)->update($data);
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $data = DB::table('brands')->where('id', $id)->first();
        $image = $data->brand_logo;

        if (File::exists($image)) {
            unlink($image);
        }
        DB::table('brands')->where('id', $id)->delete();
        return redirect()->back();
    }
}
