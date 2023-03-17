<form action="{{ route('page.update') }}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{ $data->id }}">
    <div class="modal-body">
        <div class="form-group">
            <input type="text" name="pickup_point_name" class="form-control" value="{{ $data->pickup_point_name }}">
        </div>
        <div class="form-group">
            <input type="text" name="pickup_point_address" class="form-control"
                value="{{ $data->pickup_point_address }}">
        </div>
        <div class="form-group">
            <input type="text" name="pickup_point_phone" class="form-control"
                value="{{ $data->pickup_point_phone }}">
        </div>
        <div class="form-group">
            <input type="text" name="pickup_point_phone_two" class="form-control"
                value="{{ $data->pickup_point_phone_two }}">
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
