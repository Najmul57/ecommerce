<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    private $subcategory;
    private $category;

    public function __construct(SubCategory $subCategory, Category $category)
    {
        $this->subcategory = $subCategory;
        $this->category = $category;
        $this->middleware('auth');
    } // end method

    public function index()
    {
        $sub_categories = $this->subcategory->latest()->get();
        $categories = $this->category->all();
        return view('backend.subcategory.index', compact('sub_categories', 'categories'));
    } // end method

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:sub_categories,name',
            'category_id' => 'required',
        ]);
        // return $request->all();

        $this->subcategory->create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('subcategory.index')->with('success', 'Subcategory created successfully');
    } // end method

    public function edit($id)
    {
        $subcategory = $this->subcategory->find($id);
        $categories = $this->category->all();
        return view('backend.subcategory.edit', compact('subcategory', 'categories'));
    } // end method

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:sub_categories,name,' . $request->id,
            'category_id' => 'required',
        ]);

        $subcategory = Subcategory::find($request->id); // Retrieve the subcategory from the database

        if (!$subcategory) { // Check if the subcategory exists
            return redirect()->route('subcategory.index')->with('error', 'Subcategory not found');
        }

        $subcategory->update([ // Update the subcategory
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('subcategory.index')->with('success', 'Subcategory updated successfully');
    }

    public function destroy($id)
    {
        $this->subcategory->find($id)->delete();
        return redirect()->back();
    }
}
