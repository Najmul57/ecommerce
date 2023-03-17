@extends('layouts.admin')

@section('admin_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Coupon List</h1>
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
                                <h3 class="card-title">Coupon List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped table-sm ytable">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Coupon Code</th>
                                            <th>Coupon Amount</th>
                                            <th>Coupon Date</th>
                                            <th>Coupon Status</th>
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


    <!-- category Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="exampleModalLabel">Add Coupon</h2>
                </div>

                <form action="{{ route('store.coupon') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" name="coupon_code" class="form-control" placeholder="Coupon Code">
                        </div>
                        <div class="form-group">
                            <select name="type" class="form-control">
                                <option value="1">Fixed</option>
                                <option value="2">Percentage</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="coupon_amount" class="form-control" placeholder="Coupon Amount">
                        </div>
                        <div class="form-group">
                            <input type="date" name="valid_date" class="form-control" placeholder="Coupon Amount">
                        </div>
                        <div class="form-group">
                            <select name="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="2">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><span class="d-none">Loading...</span>Submit</button>
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
                    <h2 class="modal-title fs-5" id="exampleModalLabel">Edit Coupon</h2>
                </div>
                <div id="modal_body">

                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

    <script type="text/javascript">
        $(function coupon() {
            var table = $('.ytable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('coupon.index') }}",
                columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                }, {
                    data: 'coupon_code',
                    name: 'coupon_code'
                }, {
                    data: 'coupon_amount',
                    name: 'coupon_amount'
                }, {
                    data: 'valid_date',
                    name: 'valid_date'
                }, {
                    data: 'status',
                    name: 'status'
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
            let coupon_id = $(this).data('id');
            $.get("coupon/edit/" + coupon_id, function(data) {
                $('#modal_body').html(data);
            });
        })
    </script>
@endsection
