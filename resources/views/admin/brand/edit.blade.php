<form action="{{ route('update.brand') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <div class="form-group">
            <input type="text" name="brand_name" class="form-control" value="{{ $data->brand_name }}">
        </div>
        <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="form-group">
            <input type="file" name="brand_logo" class="form-control dropify">
            <input type="hidden" name="old_logo" value="{{ $data->brand_logo }}">
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
