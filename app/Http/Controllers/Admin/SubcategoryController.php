<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $subcategory = DB::table('subcategories')->join('categories', 'subcategories.category_id', 'categories.id')->select('subcategories.*', 'categories.category_name')->get();
        $category = Category::all();
        return view('admin.category.subcategory.index', compact('subcategory', 'category'));
    }

    public function store(Request $request)
    {
        Subcategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => Str::slug($request->subcategory_name, '-'),
        ]);
        return redirect()->back();
    }

    public function edit($id)
    {
        $data = Subcategory::find($id);
        $category = Category::all();
        return view('admin.category.subcategory.edit', compact('data', 'category'));
    }

    public function update(Request $request){
        $subcategory=Subcategory::where('id',$request->id)->first();
        $subcategory->update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => Str::slug($request->subcategory_name, '-'),
        ]);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $destroy = Subcategory::find($id);
        $destroy->delete();
        return redirect()->back();
    }
}
