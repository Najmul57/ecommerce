<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class CouponController extends Controller
{
    private $coupon;
    public function __construct(Coupon $coupon)
    {
        $this->coupon = $coupon;
        $this->middleware('auth');
    } // end method

    public function index()
    {
        $coupons = $this->coupon->latest()->get();
        return view('backend.coupons.index', compact('coupons'));
    } // end method

    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => ['required', 'unique:coupons,code'],
            'amount' => ['required'],
        ]);

        $this->coupon->create([
            'code' => $request->code,
            'date' => $request->date,
            'amount' => $request->amount,
            'status' => '0',
        ]);

        return back()->with('success', 'Coupon added successfully.');
    } // end method

    public function edit($id)
    {
        $coupon = $this->coupon->find($id);
        return view('backend.coupons.edit', compact('coupon'));
    } // end method

    public function update(Request $request)
    {
        $this->validate($request, [
            'code' => ['required', 'unique:coupons,code,' . $request->id],
            'amount' => ['required'],
        ]);

        $warehouse = Coupon::find($request->id);

        if (!$warehouse) {
            return redirect()->route('coupon.index')->with('error', 'coupon not found');
        }

        $warehouse->update([
            'code' => $request->code,
            'date' => $request->date,
            'amount' => $request->amount,
        ]);

        return back()->with('success', 'Coupon updated successfully.');
    }

    public function destroy($id)
    {
        $coupon = $this->coupon->find($id);
        if ($coupon) {
            $coupon->delete();
            return back()->with('success', 'Coupon deleted successfully.');
        }
        return back()->with('error', 'Coupon not found.');
    } // end method

    public function active($id)
    {
        $coupon = $this->coupon->find($id);
        if ($coupon) {
            $coupon->status = '1';  // Corrected to activate the coupon
            $coupon->save();
            return back()->with('success', 'Coupon activated successfully.');
        }
        return back()->with('error', 'Coupon not found.');
    }

    public function inactive($id)
    {
        $coupon = $this->coupon->find($id);
        if ($coupon) {
            $coupon->status = '0';  // Corrected to deactivate the coupon
            $coupon->save();
            return back()->with('success', 'Coupon deactivated successfully.');
        }
        return back()->with('error', 'Coupon not found.');
    }
}
