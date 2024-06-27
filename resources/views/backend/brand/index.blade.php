@extends('admin.layouts.admin')

@section('admin_content')
    <section class="content-header">
        <h1>
            Brand
        </h1>
        <ol class="breadcrumb">
            <li><a href="javascript:void(0)" class="btn btn-success text-white" data-toggle="modal" data-target="#addBrand"><i
                        class="fa fa-dashboard"></i> Add Brand</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Brand List</h3>
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
                                @foreach ($brands as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><img src="{{ asset('storage/' . $item->logo) }}" width="60px"
                                                alt="Brand Logo"></td>
                                        <td>{{ ucfirst($item->name) }}</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-success edit" data-toggle="modal"
                                                data-target="#editbrand" data-id="{{ $item->id }}"><i
                                                    class="fa
                                                fa-edit"></i></a>
                                            <a href="{{ route('brand.destroy', $item->id) }}"
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
    <div class="modal fade" id="addBrand" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Brand</h4>
                </div>
                <form action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="enter brand" required>
                        </div>
                    </div>
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="file" name="logo" class="form-control">
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
    <div class="modal fade" id="editbrand" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Update Brand</h4>
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
            $.get('brand/edit/' + id, function(data) {
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
