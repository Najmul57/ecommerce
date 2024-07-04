@extends('admin.layouts.admin')

@section('admin_content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Product List</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Thumbnail</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <img src="{{ asset('storage/thumbnails/' . $item->thumbnail) }}" alt="Thumbnail">
                                        </td>
                                        <td>{{ ucfirst($item->name) }}</td>
                                        <td>{{ ucfirst($item->category->name) }}</td>
                                        <td>
                                            @if ($item->status == 1)
                                                <a href="{{ route('product.inactive', $item->id) }}"
                                                    class="btn btn-sm btn-success">Active</a>
                                            @else
                                                <a href="{{ route('product.active', $item->id) }}"
                                                    class="btn btn-sm btn-danger">Inactive</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-success"><i
                                                    class="fa
                                                fa-edit"></i></a>
                                            <a href="{{ route('product.show', $item->id) }}"
                                                class="btn btn-sm btn-primary"><i
                                                    class="fa
                                                fa-eye"></i></a>
                                            <a href="{{ route('product.destroy', $item->id) }}"
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
@endsection
