<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    private $warehouse;
    public function __construct(Warehouse $warehouse)
    {
        $this->warehouse = $warehouse;
        $this->middleware('auth');
    } // end method

    public function index()
    {
        $warehouses = $this->warehouse->latest()->get();
        return view('backend.warehouse.index', compact('warehouses'));
    } // end method

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'unique:warehouses,name'],
            'address' => ['required'],
            'phone' => ['required'],
        ]);

        $this->warehouse->create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect()->back();
    } // end method

    public function edit($id)
    {
        $warehouse = $this->warehouse->find($id);
        return view('backend.warehouse.edit', compact('warehouse'));
    } // end method

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'unique:warehouses,name,' . $request->id],
            'address' => ['required'],
            'phone' => ['required'],
        ]);

        $warehouse = Warehouse::find($request->id);

        if (!$warehouse) {
            return redirect()->route('warehouse.index')->with('error', 'Warehouse not found');
        }

        $warehouse->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect()->route('warehouse.index')->with('success', 'Warehouse updated successfully');
    }


    public function destroy($id)
    {
        $warehouse = $this->warehouse->find($id);

        $warehouse->delete();

        return redirect()->route('warehouse.index')->with('success', 'Warehouse deleted successfully');
    }
}
