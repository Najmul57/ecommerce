@extends('layouts.admin')

@section('admin_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Warehouse</h1>
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
                                <h3 class="card-title">Warehouse List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped table-sm ytable">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Warehouse Name</th>
                                            <th>Warehouse Address</th>
                                            <th>Warehouse Phone</th>
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
                    <h2 class="modal-title fs-5" id="exampleModalLabel">Add New Warehouse</h2>
                </div>

                <form action="{{ route('store.warehouse') }}" method="post" id="add-form">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" name="warehouse_name" class="form-control" placeholder="Warehouse Name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="warehouse_address" class="form-control"
                                placeholder="Warehouse Address">
                        </div>
                        <div class="form-group">
                            <input type="text" name="warehouse_phone" class="form-control" placeholder="Warehouse Phone">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"> <span class="d-none loader"> <i
                                    class="fas fa-spinner"></i> Loading...</span> <span
                                class="submit_btn">Submit</span></button>
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
                    <h4 class="modal-title" id="exampleModalLabel">Edit Warehouse</h4>
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
                ajax: "{{ route('warehouse.index') }}",
                columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                }, {
                    data: 'warehouse_name',
                    name: 'warehouse_name'
                }, {
                    data: 'warehouse_address',
                    name: 'warehouse_address'
                }, {
                    data: 'warehouse_phone',
                    name: 'warehouse_phone'
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
        $('#add-form').on('submit', function() {
            $('.loader').removeClass('d-none');
            $('.submit_btn').addClass('d-none');
        })
    </script>

    <script type="text/javascript">
        $('body').on('click', '.edit', function() {
            let warehouse_id = $(this).data('id');
            $.get("warehouse/edit/" + warehouse_id, function(data) {
                $('#modal_body').html(data);
            });
        })
    </script>
@endsection
