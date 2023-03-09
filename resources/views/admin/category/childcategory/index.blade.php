@extends('layouts.admin')

@section('admin_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Child Category</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#addModal"> <i
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
                                <table class="table table-bordered table-striped table-sm ytable">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Child Category Name</th>
                                            <th>Sub Category Name</th>
                                            <th>Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

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

    {{-- add model --}}
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="exampleModalLabel">Add New ChildCategory</h2>
                </div>

                <form action="{{ route('store.childcategory') }}" method="post" id="add-form">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <select name="subcategory_id" id="subcategory_id" class="form-control">
                                <option value="">Select Category</option>
                                @foreach ($category as $item)
                                    @php
                                        $subcategory = DB::table('subcategories')
                                            ->where('category_id', $item->id)
                                            ->get();
                                    @endphp
                                    <option disabled>--{{ $item->category_name }}--</option>
                                    @foreach ($subcategory as $item)
                                        <option value="{{ $item->id }}">{{ $item->subcategory_name }}</option>
                                    @endforeach

                                    <option value="{{ $item->id }}">{{ $item->subcategory_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="childcategory_name" class="form-control"
                                placeholder="ChildCategory Name">
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
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Edit ChildCategory</h4>
                </div>
                <div id="modal_body">

                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

    <script type="text/javascript">
        $(function childcategory() {
            var table = $('.ytable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('childcategory.index') }}",
                columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                }, {
                    data: 'childcategory_name',
                    name: 'childcategory_name'
                }, {
                    data: 'subcategory_name',
                    name: 'subcategory_name'
                }, {
                    data: 'category_name',
                    name: 'category_name'
                }, {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                }, ]
            });
        });
    </script>

    <script type="text/javascript">
        $('body').on('click', '.edit', function() {
            let childcat_id = $(this).data('id');
            $.get("childcategory/edit/" + childcat_id, function(data) {
                $('#modal_body').html(data);
            });
        })
    </script>
@endsection
