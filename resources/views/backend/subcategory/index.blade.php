@extends('admin.layouts.admin')

@section('admin_content')
    <section class="content-header">
        <h1>
            SubCategory
        </h1>
        <ol class="breadcrumb">
            <li><a href="javascript:void(0)" class="btn btn-success text-white" data-toggle="modal"
                    data-target="#addSubCategory"><i class="fa fa-dashboard"></i> Add
                    Sub Category</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All SubCategory List</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sub_categories as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ ucfirst($item->name) }}</td>
                                        <td>{{ ucfirst($item->category->name) }}</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-success edit" data-toggle="modal"
                                                data-target="#editSubCategory" data-id="{{ $item->id }}"><i
                                                    class="fa
                                                fa-edit"></i></a>
                                            <a href="{{ route('subcategory.destroy', $item->id) }}"
                                                class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->

    {{-- //add modal --}}
    <div class="modal fade" id="addSubCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add SubCategory</h4>
                </div>
                <form action="{{ route('subcategory.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <select name="category_id" class="form-control">
                                <option hidden>Select Category</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ ucfirst($item->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="enter subcategory"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- //edit modal --}}
    <div class="modal fade" id="editSubCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Update SubCategory</h4>
                </div>
                <div id="modal_body">

                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('backend') }}/plugins/jQuery/jQuery-2.1.4.min.js"></script>

    <script>
        $('body').on('click', '.edit', function() {
            var id = $(this).data('id');
            $.get('subcategory/edit/' + id, function(data) {
                $('#modal_body').html(data);
            });
        });
    </script>

    <script>
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
@endsection
