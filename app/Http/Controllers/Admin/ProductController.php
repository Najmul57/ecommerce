<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Pickup_point;
use App\Models\Warehouse;
use Illuminate\Support\Str;
use App\Models\Product;
use Image;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $category = Category::all();
        $brand = Brand::all();
        $pickup_point  = Pickup_point::all();
        $warehosue = Warehouse::all();

        return view('admin.product.create', compact('category', 'brand', 'pickup_point', 'warehosue'));
    }

    public function store(Request $request)
    { {
            $validated = $request->validate([
                'name' => 'required',
                'code' => 'required|unique:products|max:55',
                'subcategory_id' => 'required',
                'brand_id' => 'required',
                'unit' => 'required',
                'selling_price' => 'required',
                'color' => 'required',
                'description' => 'required',
            ]);

            //subcategory call for category id
            $subcategory = DB::table('subcategories')->where('id', $request->subcategory_id)->first();
            $slug = Str::slug($request->name, '-');


            $data = array();
            $data['name'] = $request->name;
            $data['slug'] = Str::slug($request->name, '-');
            $data['code'] = $request->code;
            $data['category_id'] = $subcategory->category_id;
            $data['subcategory_id'] = $request->subcategory_id;
            $data['childcategory_id'] = $request->childcategory_id;
            $data['brand_id'] = $request->brand_id;
            $data['pickuppoint_id'] = $request->pickuppoint_id;
            $data['unit'] = $request->unit;
            $data['tags'] = $request->tags;
            $data['purchase_price'] = $request->purchase_price;
            $data['selling_price'] = $request->selling_price;
            $data['discount_price'] = $request->discount_price;
            $data['warehouse'] = $request->warehouse;
            $data['stock_quantity'] = $request->stock_quantity;
            $data['color'] = $request->color;
            $data['size'] = $request->size;
            $data['description'] = $request->description;
            $data['video'] = $request->video;
            $data['featured'] = $request->featured;
            $data['today_deal'] = $request->today_deal;
            // $data['product_slider']=$request->product_slider;
            $data['status'] = $request->status;
            $data['trendy'] = $request->trendy;
            $data['admin_id'] = Auth::id();
            // $data['date']=date('d-m-Y');
            // $data['month']=date('F');
            //single thumbnail
            if ($request->thumbnail) {
                $thumbnail = $request->thumbnail;
                $photoname = $slug . '.' . $thumbnail->getClientOriginalExtension();
                Image::make($thumbnail)->resize(600, 600)->save('uploads/products/' . $photoname);
                $data['thumbnail'] = $photoname;   // public/files/product/plus-point.jpg
            }
            //multiple images
            $images = array();
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $key => $image) {
                    $imageName = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                    Image::make($image)->resize(600, 600)->save('uploads/products/' . $imageName);
                    array_push($images, $imageName);
                }
                $data['images'] = json_encode($images);
            }
            DB::table('products')->insert($data);

            return redirect()->back();
        }
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $imgurl = 'uploads/products';
            $data = Product::latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('thumbnail', function ($row) use ($imgurl) {
                    return '<img src="' . $imgurl . '/' . $row->thumbnail . '" height="30" width="30">';
                })
                ->editColumn('category_name', function ($row) {
                    return $row->category->category_name;
                })
                ->editColumn('subcategory_name', function ($row) {
                    return $row->subcategory->subcategory_name;
                })
                ->editColumn('brand_name', function ($row) {
                    return $row->brand->brand_name;
                })
                ->editColumn('featured', function ($row) {
                    if ($row->featured == 1) {
                        return 'active';
                    } else {
                        return 'deactive';
                    }
                })
                ->editColumn('today_deal', function ($row) {
                    if ($row->today_deal) {
                        return 'Active';
                    } else {
                        return 'Inactive';
                    }
                })
                ->editColumn('status', function ($row) {
                    if ($row->status) {
                        return 'Active';
                    } else {
                        return 'Inactive';
                    }
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '
                <a href="#" class="btn btn-info btn-sm edit"><i class="fa fa-edit"></i></a>
                <a href="#" class="btn btn-primary btn-sm edit"><i class="fa fa-eye"></i></a>
                <a href="' . route('delete.product', [$row->id]) . '"  class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'thumbnail', 'category_name', 'subcategory_name', 'brand_name'])
                ->make(true);
        }
        $category = Category::all();
        $brand = Brand::all();
        return view('admin.product.index', compact('category', 'brand'));
    }

    public function destroy($id)
    {
        DB::table('products')->where('id', $id)->delete();
        return redirect()->back();
    }
}
