<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('coupons')->latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="#" class="btn btn-info btn-sm edit"
                    data-id="' . $row->id . '" data-toggle="modal"
                    data-target="#editModal"><i class="fa fa-edit"></i></a>
                <a href="' . route('delete.coupon', [$row->id]) . '"  class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.offer.coupon.index');
    }

    public function store(Request $request)
    {
        $data = array();
        $data['coupon_code'] = $request->coupon_code;
        $data['valid_date'] = $request->valid_date;
        $data['type'] = $request->type;
        $data['coupon_amount'] = $request->coupon_amount;
        $data['status'] = $request->status;

        DB::table('coupons')->insert($data);
        return redirect()->route('coupon.index');
    }

    public function edit($id)
    {
        $data = DB::table('coupons')->where('id', $id)->first();
        return view('admin.offer.coupon.edit', compact('data'));
    }

    public function update(Request $request){
        $data = array();
        $data['coupon_code'] = $request->coupon_code;
        $data['valid_date'] = $request->valid_date;
        $data['type'] = $request->type;
        $data['coupon_amount'] = $request->coupon_amount;
        $data['status'] = $request->status;

        DB::table('coupons')->where('id',$request->id)->update($data);
        return redirect()->route('coupon.index');
    }

    public function destroy($id)
    {
        DB::table('coupons')->where('id', $id)->delete();
        return redirect()->back();
    }
}
