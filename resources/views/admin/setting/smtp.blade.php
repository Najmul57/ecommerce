@extends('layouts.admin')

@section('admin_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">SEO Setting</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">SEO Setting</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="col-sm-6">
                    <form method="POST" action="{{ route('smtp.update',$data->id) }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="mailer">Mailer</label>
                                <input type="text" class="form-control" name="mailer"
                                    value="{{ $data->mailer }}" placeholder="Mailer">
                            </div>
                            <div class="form-group">
                                <label for="host">Meta Author</label>
                                <input type="text" class="form-control" name="host"
                                    value="{{ $data->host }}" placeholder="Host">
                            </div>
                            <div class="form-group">
                                <label for="port">Port</label>
                                <input type="text" class="form-control" name="port"
                                    value="{{ $data->port }}" placeholder="Port">
                            </div>
                            <div class="form-group">
                                <label for="user_name">User name</label>
                                <input type="text" class="form-control" name="user_name"
                                    value="{{ $data->user_name }}" placeholder="User name">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" name="password"
                                    value="{{ $data->password }}" placeholder="Password">
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
