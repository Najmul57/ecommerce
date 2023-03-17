@extends('layouts.admin')

@section('admin_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Website Setting</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Website Setting</li>
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
                    <form method="POST" action="{{ route('website.update', $setting->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="currency">Currency</label>
                                <select name="currency" class="form-control" id="currency">
                                    <option value="৳" {{ $setting->currency == '৳' ? 'selected' : '' }}>Taka</option>
                                    <option value="$" {{ $setting->currency == '$' ? 'selected' : '' }}>USD</option>
                                    <option value="₹" {{ $setting->currency == '₹' ? 'selected' : '' }}>Rupy</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="phone_one">Phone One</label>
                                <input type="text" class="form-control" name="phone_one"
                                    value="{{ $setting->phone_one }}" placeholder="Phone One">
                            </div>
                            <div class="form-group">
                                <label for="phone_two">Phone Two</label>
                                <input type="text" class="form-control" name="phone_two"
                                    value="{{ $setting->phone_two }}" placeholder="Phone Two">
                            </div>
                            <div class="form-group">
                                <label for="main_mail">Mail Email</label>
                                <input type="text" class="form-control" name="main_mail"
                                    value="{{ $setting->main_mail }}" placeholder="Mail Email">
                            </div>
                            <div class="form-group">
                                <label for="support_mail">Support Email</label>
                                <input type="text" class="form-control" name="support_mail"
                                    value="{{ $setting->support_mail }}" placeholder="Support Email">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" value="{{ $setting->address }}"
                                    placeholder="Address">
                            </div>
                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input type="text" class="form-control" name="facebook" value="{{ $setting->facebook }}"
                                    placeholder="Facebook">
                            </div>
                            <div class="form-group">
                                <label for="twitter">Twitter</label>
                                <input type="text" class="form-control" name="twitter" value="{{ $setting->twitter }}"
                                    placeholder="Twitter">
                            </div>
                            <div class="form-group">
                                <label for="instagram">Instagram</label>
                                <input type="text" class="form-control" name="instagram"
                                    value="{{ $setting->instagram }}" placeholder="Instagram">
                            </div>
                            <div class="form-group">
                                <label for="linkedin">Linkedin</label>
                                <input type="text" class="form-control" name="linkedin" value="{{ $setting->linkedin }}"
                                    placeholder="Linkedin">
                            </div>
                            <div class="form-group">
                                <label for="youtube">Youtube</label>
                                <input type="text" class="form-control" name="youtube" value="{{ $setting->youtube }}"
                                    placeholder="Youtube">
                            </div>
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <input type="file" class="form-control" name="logo" id="logo">
                                <input type="hidden" name="old_logo" value={{ $setting->logo }}>
                            </div>
                            <div class="form-group">
                                <label for="favicon">Favicon</label>
                                <input type="file" class="form-control" name="favicon" id="favicon">
                                <input type="hidden" name="old_favicon" value={{ $setting->favicon }}>
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
