<form action="{{ route('pickuppoint.update') }}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{ $pickup_point->id }}">
    <div class="modal-body">
        <div class="form-group">
            <input type="text" name="name" class="form-control" value="{{ $pickup_point->name }}" required>
        </div>
        <div class="form-group">
            <input type="number" name="phone" class="form-control" value="{{ $pickup_point->phone }}" required>
        </div>
        <div class="form-group">
            <input type="text" name="address" class="form-control" value="{{ $pickup_point->address }}" required>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
