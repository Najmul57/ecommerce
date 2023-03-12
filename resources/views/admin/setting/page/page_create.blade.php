@extends('layouts.admin')

@section('admin_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Page Create</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Page Create</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container">
                <!-- Info boxes -->
                <div class="col-sm-12">
                    <form method="POST" action="{{ route('store.page') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="page_position">Page Position</label>
                                <select name="page_position" class="form-control" id="page_position">
                                    <option value="1">Line One</option>
                                    <option value="2">Line Two</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="page_name">Page Name</label>
                                <input type="text" class="form-control" name="page_name"
                                    placeholder="Page Name">
                            </div>
                            <div class="form-group">
                                <label for="page_title">Page Title</label>
                                <input type="text" class="form-control"
                                    name="page_title" placeholder="Page Title">
                            </div>
                            <div class="form-group">
                                <label for="page_description">Page Description</label>
                                <textarea name="page_description" id="summernote" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
