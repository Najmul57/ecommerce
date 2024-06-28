<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PickupPoint;
use Illuminate\Http\Request;

class PickupPointController extends Controller
{
    private $pickuppoint;
    public function __construct(PickupPoint $pickupPoint)
    {
        $this->pickuppoint = $pickupPoint;
        $this->middleware('auth');
    } // end method

    public function index()
    {
        $pickup_points = $this->pickuppoint->latest()->get();
        return view('backend.pickup_point.index', compact('pickup_points'));
    } // end method

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'unique:pickup_points,name'],
            'address' => ['required'],
            'phone' => ['required'],
        ]);

        $this->pickuppoint->create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return back()->with('success', 'Pickup Point added successfully');
    } // end method


    public function edit($id)
    {
        $pickup_point = $this->pickuppoint->find($id);

        if (!$pickup_point) {
            return back()->with('error', 'Pickup Point not found');
        }

        return view('backend.pickup_point.edit', compact('pickup_point'));
    } // end method

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'unique:pickup_points,name,' . $request->id],
            'address' => ['required'],
            'phone' => ['required'],
        ]);

        $pickup_point = $this->pickuppoint->find($request->id);

        if (!$pickup_point) {
            return back()->with('error', 'Pickup Point not found');
        }

        $pickup_point->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return back()->with('success', 'Pickup Point updated successfully');
    }

    public function destroy($id)
    {
        $pickup_point = $this->pickuppoint->find($id);

        if (!$pickup_point) {
            return back()->with('error', 'Pickup Point not found');
        }

        $pickup_point->delete();
        return back()->with('success', 'Pickup Point deleted successfully');
    }
}
