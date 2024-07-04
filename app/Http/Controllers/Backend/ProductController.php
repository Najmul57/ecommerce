<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PickupPoint;
use App\Models\Warehouse;

class ProductController extends Controller
{
    private $product;
    private $brand;
    private $category;
    private $subcategory;
    private $pickuppoint;
    private $warehouse;

    public function __construct(Product $product, Brand $brand, Category $category, SubCategory $subcategory, PickupPoint $pickuppoint, Warehouse $warehouse)
    {
        $this->product = $product;
        $this->brand = $brand;
        $this->category = $category;
        $this->subcategory = $subcategory;
        $this->pickuppoint = $pickuppoint;
        $this->warehouse = $warehouse;
        $this->middleware('auth');
    }  // end method

    public function index()
    {
        $products = $this->product->latest()->paginate(10);
        return view('backend.products.index', compact('products'));
    } // end method

    public function create()
    {
        $brands = $this->brand->all();
        $category = $this->category->all();
        $subcategories = $this->subcategory->all();
        $pickuppoints = $this->pickuppoint->all();
        $warehouses = $this->warehouse->all();

        return view('backend.products.create', compact('brands', 'category', 'subcategories', 'pickuppoints', 'warehouses'));
    } // end method

    public function store(Request $request)
    {

        $data = $request->except('thumbnail', 'images');

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailPath = $thumbnail->store('thumbnails', 'public');
            $data['thumbnail'] = $thumbnailPath;
        }

        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('images', 'public');
                $images[] = $imagePath;
            }
            $data['images'] = json_encode($images); // Save images as JSON string
        }

        $this->product->create($data);

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    } // end method

    public function destroy($id)
    {
        $product = $this->product->find($id);
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    } // end method

    public function active($id)
    {
        $coupon = $this->product->find($id);
        if ($coupon) {
            $coupon->status = '1';  // Corrected to activate the coupon
            $coupon->save();
            return back()->with('success', 'Coupon activated successfully.');
        }
        return back()->with('error', 'Coupon not found.');
    } // end method

    public function inactive($id)
    {
        $coupon = $this->product->find($id);
        if ($coupon) {
            $coupon->status = '0';  // Corrected to deactivate the coupon
            $coupon->save();
            return back()->with('success', 'Coupon deactivated successfully.');
        }
        return back()->with('error', 'Coupon not found.');
    } // end method

    public function show($id)
    {
        $product = $this->product->find($id);
        return view('backend.products.show', compact('product'));
    }
}
