<form action="{{ route('warehouse.update') }}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{ $warehouse->id }}">
    <div class="modal-body">
        <div class="form-group">
            <input type="text" name="name" class="form-control" value="{{ $warehouse->name }}" required>
        </div>
        <div class="form-group">
            <input type="number" name="phone" class="form-control" value="{{ $warehouse->phone }}" required>
        </div>
        <div class="form-group">
            <input type="text" name="address" class="form-control" value="{{ $warehouse->address }}" required>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
