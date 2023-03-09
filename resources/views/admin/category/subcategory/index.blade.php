@extends('layouts.admin')

@section('admin_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Sub Category</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#subcategory_add"> <i
                                    class="fa fa-plus"></i> Add New</button>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">DataTable with default features</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Sub Category Name</th>
                                            <th>Sub Category Slug</th>
                                            <th>Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subcategory as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ ucfirst($item->subcategory_name) }}</td>
                                                <td>{{ $item->subcategory_slug }}</td>
                                                <td>{{ $item->category_name }}</td>
                                                <td>
                                                    <a href="" class="btn btn-info btn-sm edit"
                                                        data-id="{{ $item->id }}" data-toggle="modal"
                                                        data-target="#category_edit"><i class="fa fa-edit"></i></a>
                                                    <a href="{{ route('delete.subcategory', $item->id) }}"
                                                        class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <!-- category Modal -->
    <div class="modal fade" id="subcategory_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="exampleModalLabel">Add New SubCategory</h2>
                </div>

                <form action="{{ route('store.subcategory') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Select Category</option>
                                @foreach ($category as $item)
                                <option value="{{  $item->id }}">{{  $item->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="subcategory_name"  class="form-control" placeholder="SubCategory Name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- edit Modal -->
    <div class="modal fade" id="category_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="exampleModalLabel">Edit SubCategory</h2>
                </div>
                <div id="modal_body">

                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

    <script type="text/javascript">
        $('body').on('click', '.edit', function() {
            let subcat_id = $(this).data('id');
            $.get("subcategory/edit/" + subcat_id, function(data) {
            $('#modal_body').html(data);
            });
        })
    </script>
@endsection
