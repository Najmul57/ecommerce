@extends('layouts.admin')

@section('admin_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Category</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#category_add"> <i
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
                                            <th>Category Name</th>
                                            <th>Category Slug(s)</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($category as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ ucfirst($item->category_name) }}</td>
                                                <td>{{ $item->category_slug }}</td>
                                                <td>
                                                    <a href="" class="btn btn-info btn-sm edit"
                                                        data-id="{{ $item->id }}" data-toggle="modal"
                                                        data-target="#category_edit"><i class="fa fa-edit"></i></a>
                                                    <a href="{{ route('delete.category', $item->id) }}"
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
    <div class="modal fade" id="category_add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="exampleModalLabel">Add New Category</h2>
                </div>

                <form action="{{ route('store.category') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" name="category_name" class="form-control" placeholder="Category Name">
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
                    <h2 class="modal-title fs-5" id="exampleModalLabel">Edit Category</h2>
                </div>

                <form action="{{ route('update.category') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" id="e_category_name" name="category_name" class="form-control" placeholder="Category Name">
                            <input type="hidden" id="e_category_id" name="id">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

    <script type="text/javascript">
        $('body').on('click', '.edit', function() {
            let cat_id = $(this).data('id');
            $.get("category/edit/" + cat_id, function(data) {
                $('#e_category_name').val(data.category_name);
                $('#e_category_id').val(data.id);
            });
        })
    </script>
@endsection
