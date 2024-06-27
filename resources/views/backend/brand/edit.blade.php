<form action="{{ route('brand.update') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $brand->id }}">
    <div class="modal-body">
        <div class="form-group">
            <input type="text" name="name" class="form-control" value="{{ $brand->name }}">
        </div>
        <div class="form-group">
            <input type="file" name="logo" class="form-control">
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
