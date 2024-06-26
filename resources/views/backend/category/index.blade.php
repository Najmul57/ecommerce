@extends('admin.layouts.admin')

@section('admin_content')
    <section class="content-header">
        <h1>
            Category
        </h1>
        <ol class="breadcrumb">
            <li><a href="javascript:void(0)" class="btn btn-success text-white" data-toggle="modal"
                    data-target="#addCategory"><i class="fa fa-dashboard"></i> Add
                    Category</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Category List</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ ucfirst($item->name) }}</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-success edit" data-toggle="modal"
                                                data-target="#editCategory" data-id="{{ $item->id }}"><i
                                                    class="fa
                                                fa-edit"></i></a>
                                            <a href="{{ route('category.destroy', $item->id) }}"
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
    <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Category</h4>
                </div>
                <form action="{{ route('category.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="enter category" required>
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
    <div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Update Category</h4>
                </div>
                <form action="{{ route('category.update') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" name="name" id="e_category_name" class="form-control" required>
                            <input type="hidden" name="id" id="e_category_id" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="{{ asset('backend') }}/plugins/jQuery/jQuery-2.1.4.min.js"></script>

    <script>
        $('body').on('click', '.edit', function() {
            var id = $(this).data('id');
            $.get('category/edit/' + id, function(data) {
                $('#e_category_name').val(data.name);
                $('#e_category_id').val(data.id);
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
