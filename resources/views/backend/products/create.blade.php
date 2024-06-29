@extends('admin.layouts.admin')

@section('admin_content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.6.0/bootstrap-tagsinput.css" />
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">

    <style type="text/css">
        .bootstrap-tagsinput .tag {
            background: #428bca;
            ;
            border: 1px solid white;
            padding: 1 6px;
            padding-left: 2px;
            margin-right: 2px;
            color: white;
            border-radius: 4px;
        }
    </style>
    <section class="content-header">
        <h1>
            Add New Product
        </h1>
        <ol class="breadcrumb">
            <li><a href="javascript:void(0)" class="btn btn-success text-white"><i class="fa fa-dashboard"></i> Add
                    Product</a>
            </li>
        </ol>
    </section>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-8">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="exampleInputEmail1">Product Name <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name') }}" required="">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="exampleInputPassword1">Product Code <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" value="{{ old('code') }}"
                                            name="code" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="exampleInputEmail1">Category/Subcategory <span
                                                class="text-danger">*</span> </label>
                                        <select class="form-control" name="subcategory_id" id="subcategory_id">
                                            <option disabled="" selected="">==choose category==</option>
                                            @foreach ($category as $row)
                                                @php
                                                    $subcategory = App\Models\SubCategory::where(
                                                        'category_id',
                                                        $row->id,
                                                    )->get();
                                                @endphp
                                                <option value="{{ $row->id }}">{{ ucfirst($row->name) }}</option>
                                                @foreach ($subcategory as $item)
                                                    <option value="{{ $item->id }}">--{{ ucfirst($item->name) }}
                                                    </option>
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="exampleInputEmail1">Brand <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control" name="brand_id">
                                            @foreach ($brands as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="exampleInputPassword1">Pickup Point</label>
                                        <select class="form-control" name="pickup_point_id">
                                            @foreach ($pickuppoints as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="exampleInputEmail1">Unit <span class="text-danger">*</span> </label>
                                        <input type="text" class=form-control name="unit" value="{{ old('unit') }}"
                                            required="">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="exampleInputPassword1">Tags</label><br>
                                        <input type="text" name="tags" class="form-control w-100" style="width:100%"
                                            value="{{ old('tags') }}" name="tags" data-role="tagsinput">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label for="exampleInput">Purchase Price </label>
                                        <input type="text" class="form-control" {{ old('purchase_price') }}
                                            name="purchase_price">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="exampleInput">Selling Price <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="selling_price" value="{{ old('selling_price') }}"
                                            class="form-control" required="">
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="exampleInput">Discount Price </label>
                                        <input type="text" name="discount_price" value="{{ old('discount_price') }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="exampleInputEmail1">Warehouse <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control" name="warehouse">
                                            @foreach ($warehouses as $row)
                                                <option value="{{ $row->name }}">{{ $row->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="exampleInputPassword1">Stock</label>
                                        <input type="text" name="stock_quantity" value="{{ old('stock_quantity') }}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="exampleInputEmail1">Color</label><br>
                                        <input type="text" class="form-control" value="{{ old('color') }}"
                                            data-role="tagsinput" name="color" />
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="exampleInputPassword1">Size</label><br>
                                        <input type="text" class="form-control" value="{{ old('size') }}"
                                            data-role="tagsinput" name="size" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="exampleInputPassword1">Product Details</label>
                                        <textarea class="form-control textarea" name="description">{{ old('description') }}</textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="exampleInputPassword1">Video Embed Code</label>
                                        <input class="form-control" name="video" value="{{ old('video') }}"
                                            placeholder="Only code after embed word">
                                        <small class="text-danger">Only code after embed word</small>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.card -->
                    <!-- right column -->
                    <div class="col-md-4">
                        <!-- Form Element sizes -->
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Main Thumbnail <span class="text-danger">*</span>
                                    </label><br>
                                    <input type="file" name="thumbnail" required="" accept="image/*"
                                        class="dropify">
                                </div><br>
                                <div class="">
                                    <table class="table table-bordered" id="dynamic_field">
                                        <div class="card-header">
                                            <h3 class="card-title">More Images (Click Add For More Image)</h3>
                                        </div>
                                        <tr>
                                            <td><input type="file" accept="image/*" name="images[]"
                                                    class="form-control name_list" /></td>
                                            <td><button type="button" name="add" id="add"
                                                    class="btn btn-success">Add</button></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="card p-4 d-flex">
                                    <h6>Featured Product</h6>
                                    <input type="checkbox" name="featured" value="1" data-off-color="danger"
                                        data-on-color="success">
                                </div>
                                <div class="card p-4">
                                    <h6>Today Deal</h6>
                                    <input type="checkbox" name="today_deal" value="1" data-off-color="danger"
                                        data-on-color="success">
                                </div>
                                <div class="card p-4">
                                    <h6>Slider Product</h6>
                                    <input type="checkbox" name="product_slider" value="1" data-off-color="danger"
                                        data-on-color="success">
                                </div>
                                <div class="card p-4">
                                    <h6>Trendy Product</h6>
                                    <input type="checkbox" name="trendy" value="1" data-off-color="danger"
                                        data-on-color="success">
                                </div>
                                <div class="card p-4">
                                    <h6>Status</h6>
                                    <input type="checkbox" name="status" value="1" data-off-color="danger"
                                        data-on-color="success">
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <button class="btn btn-info ml-2" type="submit">Submit</button>
                </div>
            </form>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    <script type="text/javascript"
        src="http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script type="text/javascript">
        $('.dropify').dropify(); //dropify image

        $(document).ready(function() {
            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });
        });
    </script>
@endsection
