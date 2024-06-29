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
    }
}
