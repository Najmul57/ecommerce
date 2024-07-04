@extends('admin.layouts.admin')

@section('admin_content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-bordered table-hover table-striped">
                    <tr>
                        <th>Product: </th>
                        <td>{{ $product->name }}</td>
                    </tr>
                    <tr>
                        <th>Category: </th>
                        <td>{{ $product->category->name }}</td>
                    </tr>
                    <tr>
                        <th>SubCategory: </th>
                        <td>{{ $product->subcategory->name }}</td>
                    </tr>
                    <tr>
                        <th>Brand: </th>
                        <td>{{ $product->brand->name }}</td>
                    </tr>
                    <tr>
                        <th>Pickup Pont: </th>
                        <td>{{ $product->pickuppoint->name ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Warehouse: </th>
                        <td>{{ $product->warehouse->name ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Unit: </th>
                        <td>{{ $product->unit ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Tag: </th>
                        <td>{{ $product->tag ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Color: </th>
                        <td>{{ $product->color ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Size: </th>
                        <td>{{ $product->size ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Video: </th>
                        <td>{{ $product->video ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Purchage Price: </th>
                        <td>{{ $product->purchage_price ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Selling Price: </th>
                        <td>{{ $product->selling_price ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Discount Price: </th>
                        <td>{{ $product->discount_price ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Stock Quantity: </th>
                        <td>{{ $product->stock_quantity ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Description: </th>
                        <td>{!! $product->description ?? '' !!}</td>
                    </tr>
                    <tr>
                        <th>Featured: </th>
                        <td>
                            @if ($product->featured == 1)
                                <strong>yes</strong>
                            @else
                                <strong>no</strong>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Today Deal: </th>
                        <td>
                            @if ($product->today_deal == 1)
                                <strong>yes</strong>
                            @else
                                <strong>no</strong>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Status: </th>
                        <td>
                            @if ($product->status == 1)
                                <strong>yes</strong>
                            @else
                                <strong>no</strong>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Flash Deal: </th>
                        <td>
                            @if ($product->flash_deal_id == 1)
                                <strong>yes</strong>
                            @else
                                <strong>no</strong>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Cash on Delivery: </th>
                        <td>
                            @if ($product->cash_on_delivery == 1)
                                <strong>yes</strong>
                            @else
                                <strong>no</strong>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Upload Date</td>
                        <td>{{ $product->created_at }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </section>
@endsection
