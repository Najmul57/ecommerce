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
                    <form method="POST" action="{{ route('seo.update',$data->id) }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" class="form-control" name="meta_title"
                                    value="{{ $data->meta_title }}" placeholder="Meta Title">
                            </div>
                            <div class="form-group">
                                <label for="meta_author">Meta Author</label>
                                <input type="text" class="form-control" name="meta_author"
                                    value="{{ $data->meta_author }}" placeholder="Meta Author">
                            </div>
                            <div class="form-group">
                                <label for="meta_tag">Meta Tag</label>
                                <input type="text" class="form-control" name="meta_tag"
                                    value="{{ $data->meta_tag }}" placeholder="Meta Tag">
                            </div>
                            <div class="form-group">
                                <label for="meta_description">Meta Description</label>
                                <input type="text" class="form-control" name="meta_description"
                                    value="{{ $data->meta_description }}" placeholder="Meta Description">
                            </div>
                            <div class="form-group">
                                <label for="meta_keyword">Meta Keyword</label>
                               <textarea name="meta_keyword" class="form-control" placeholder="Meta Keyword">{{ $data->meta_description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="google_verification">Google Verification</label>
                                <input type="text" class="form-control" name="google_verification"
                                    value="{{ $data->google_verification }}" placeholder="Google Verification">
                            </div>
                            <div class="form-group">
                                <label for="google_analytics">Google Analytics</label>
                                <input type="text" class="form-control" name="google_analytics"
                                    value="{{ $data->google_analytics }}" placeholder="Google Analytics">
                            </div>
                            <div class="form-group">
                                <label for="alexa_verification">Alexa Verification</label>
                                <input type="text" class="form-control" name="alexa_verification"
                                    value="{{ $data->alexa_verification }}" placeholder="Alexa Verification">
                            </div>
                            <div class="form-group">
                                <label for="google_adsense">Google Adsense</label>
                                <input type="text" class="form-control" name="google_adsense"
                                    value="{{ $data->google_adsense }}" placeholder="Google Adsense">
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
