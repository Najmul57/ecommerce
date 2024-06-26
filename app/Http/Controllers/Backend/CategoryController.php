<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
        $this->middleware('auth');
    } // end method

    public function index()
    {
        $categories = $this->category->latest()->get();
        return view('backend.category.index', compact('categories'));
    } // end method

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name',
        ]);

        $this->category->create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('category.index')->with('success', 'Category created successfully');
    } // end method

    public function edit($id)
    {
        $category = $this->category->find($id);
        return response()->json($category);
    } // end method

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name,' . $request->id,
        ]);

        $this->category->find($request->id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('category.index')->with('success', 'Category updated successfully');
    }

    public function destroy($id)
    {
        $this->category->find($id)->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully');
    }
}
