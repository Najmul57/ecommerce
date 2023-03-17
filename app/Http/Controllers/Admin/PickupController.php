<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class PickupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function page(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('pickup_points')->latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="#" class="btn btn-info btn-sm edit"
                    data-id="' . $row->id . '" data-toggle="modal"
                    data-target="#editModal"><i class="fa fa-edit"></i></a>
                <a href="' . route('page.delete', [$row->id]) . '"  class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.pickup_point.index');
    }

    public function store(Request $request){
        $data=array();
        $data['pickup_point_name']=$request->pickup_point_name;
        $data['pickup_point_address']=$request->pickup_point_address;
        $data['pickup_point_phone']=$request->pickup_point_phone;
        $data['pickup_point_phone_two']=$request->pickup_point_phone_two;

        DB::table('pickup_points')->insert($data);
        return redirect()->back();
    }

    public function edit($id){
        $data=DB::table('pickup_points')->where('id',$id)->first();
        return view('admin.pickup_point.edit',compact('data'));
    }

    public function update(Request $request){
        $data = array();
        $data['pickup_point_name']=$request->pickup_point_name;
        $data['pickup_point_address']=$request->pickup_point_address;
        $data['pickup_point_phone']=$request->pickup_point_phone;
        $data['pickup_point_phone_two']=$request->pickup_point_phone_two;

        DB::table('pickup_points')->where('id',$request->id)->update($data);
        return redirect()->route('pickuppoint.index');
    }

    public function destroy($id){
        DB::table('pickup_points')->where('id',$id)->delete();
        return redirect()->back();
    }
}
