<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Arr;

class WarehouseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('warehouses')->latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="#" class="btn btn-info btn-sm edit"
                    data-id="' . $row->id . '" data-toggle="modal"
                    data-target="#editModal"><i class="fa fa-edit"></i></a>
                <a href="' . route('delete.warehouse', [$row->id]) . '"  class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.category.warehouse.index');
    }

    public function store(Request $request)
    {
        $data = array();
        $data['warehouse_name'] = $request->warehouse_name;
        $data['warehouse_address'] = $request->warehouse_address;
        $data['warehouse_phone'] = $request->warehouse_phone;

        DB::table('warehouses')->insert($data);

        return redirect()->route('warehouse.index');
    }

    public function  edit($id)
    {
        $data = DB::table('warehouses')->where('id', $id)->first();
        return view('admin.category.warehouse.edit', compact('data'));
    }
    public function update(Request $request)
    {
        $data = array();
        $data['warehouse_name'] = $request->warehouse_name;
        $data['warehouse_address'] = $request->warehouse_address;
        $data['warehouse_phone'] = $request->warehouse_phone;
        DB::table('warehouses')->where('id',$request->id)->update($data);
        // return $data;
        return redirect()->route('warehouse.index');
    }

    public function destroy($id)
    {
        DB::table('warehouses')->where('id', $id)->delete();
        return redirect()->back();
    }
}
