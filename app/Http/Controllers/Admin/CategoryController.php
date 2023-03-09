<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $category = Category::all();
        return view('admin.category.category.index', compact('category'));
    }

    public function store(Request $request)
    {
        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => Str::slug($request->category_name, '-')
        ]);

        return redirect()->back();
    }

    public function edit($id)
    {
        // $data = Category::where('id',$id)->first();
        $data = Category::findOrFail($id);
        return response()->json($data);
    }

    public function update(Request $request){
        $category=Category::where('id',$request->id)->first();

        $category->update([
            'category_name' => $request->category_name,
            'category_slug' => Str::slug($request->category_name, '-')
        ]);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $destroy = Category::find($id);
        $destroy->delete();
        return redirect()->back();
    }
}
