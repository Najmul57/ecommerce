<?php

namespace App\Http\Controllers\Backend;

use Storage;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    private $brand;

    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
        $this->middleware('auth');
    } // end method

    public function index()
    {
        $brands = $this->brand->latest()->get();
        return view('backend.brand.index', compact('brands'));
    } // end method

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:brands,name',
            'logo' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate file type and size
        ]);
        // return $request->all();
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('logo', $filename, 'public'); // Save to 'storage/app/public/logos'
        }
        $this->brand->create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'logo' => $path,
        ]);

        return redirect()->route('brand.index')->with('success', 'Brand created successfully');
    } // end method

    public function edit($id)
    {
        $brand = $this->brand->find($id);
        return view('backend.brand.edit', compact('brand'));
    } // end method

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:brands,name,' . $request->id,
            'logo' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $brand = Brand::find($request->id); // Retrieve the brand from the database

        if (!$brand) {
            return redirect()->back()->with('error', 'Brand not found');
        }

        if ($request->hasFile('logo')) {
            if ($brand->logo && Storage::exists('public/' . $brand->logo)) {
                Storage::delete('public/' . $brand->logo); // Delete existing logo
            }
            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('logo', $filename, 'public'); // Save to 'storage/app/public/logos'
        } else {
            $path = $brand->logo;
        }

        $brand->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'logo' => $path,
        ]);

        return redirect()->route('brand.index')->with('success', 'Brand updated successfully');
    } // end method

    public function destroy($id)
    {
        $brand = Brand::find($id); // Retrieve the brand from the database

        if (!$brand) {
            return redirect()->back()->with('error', 'Brand not found');
        }

        if ($brand->logo && Storage::exists('public/' . $brand->logo)) {
            Storage::delete('public/' . $brand->logo); // Delete the brand's logo
        }

        $brand->delete();

        return redirect()->route('brand.index')->with('success', 'Brand deleted successfully');
    }
}
