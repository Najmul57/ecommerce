<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class ChildcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('child_categories')->leftJoin('categories', 'child_categories.category_id', 'categories.id')->leftJoin('subcategories', 'child_categories.subcategory_id', 'subcategories.id')->select('categories.category_name', 'subcategories.subcategory_name', 'child_categories.*')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="#" class="btn btn-info btn-sm edit"
                    data-id="' . $row->id . '" data-toggle="modal"
                    data-target="#editModal"><i class="fa fa-edit"></i></a>
                <a href="' . route('delete.childcategory', [$row->id]) . '"  class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $category = Category::all();
        return view('admin.category.childcategory.index', compact('category'));
    }

    public function store(Request $request)
    {
        $cat_id = DB::table('subcategories')->where('id', $request->subcategory_id)->first();

        ChildCategory::insert([
            'category_id' => $cat_id->category_id,
            'subcategory_id' => $request->subcategory_id,
            'childcategory_name' => $request->childcategory_name,
            'childcategory_slug' => Str::slug($request->childcategory_name, '-'),
        ]);
        return redirect()->back();
    }

    public function edit($id)
    {
        $category = DB::table('categories')->get();
        $data = DB::table('child_categories')->where('id', $id)->first();
        return view('admin.category.childcategory.edit', compact('category', 'data'));
    }

    public function update(Request $request)
    {
        $cat_id = DB::table('subcategories')->where('id', $request->subcategory_id)->first();

        $data = array();
        $data['category_id'] = $cat_id->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['childcategory_name'] = $request->childcategory_name;
        $data['childcategory_slug'] = Str::slug($request->childcategory_name, '-');
        DB::table('child_categories')->where('id', $request->id)->update($data);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $destroy = ChildCategory::find($id);
        $destroy->delete();
        return redirect()->back();
    }
}
