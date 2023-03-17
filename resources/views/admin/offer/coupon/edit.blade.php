<form action="{{ route('update.coupon') }}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{ $data->id }}">
    <div class="modal-body">
        <div class="form-group">
            <input type="text" name="coupon_code" class="form-control" value="{{ $data->coupon_code }}">
        </div>
        <div class="form-group">
            <select name="type" class="form-control">
                <option value="1" {{ $data->type == 1 ? 'selected' : '' }} >Fixed</option>
                <option value="2" {{ $data->type == 2 ? 'selected' : '' }} >Percentage</option>
            </select>
        </div>
        <div class="form-group">
            <input type="text" name="coupon_amount" class="form-control" value="{{ $data->coupon_amount }}">
        </div>
        <div class="form-group">
            <input type="date" name="valid_date" class="form-control" value="{{ $data->valid_date }}">
        </div>
        <div class="form-group">
            <select name="status" class="form-control">
                <option value="1" {{ $data->type == 1 ? 'selected' : '' }}>Active</option>
                <option value="2" {{ $data->type == 2 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><span class="d-none">Loading...</span>Submit</button>
    </div>
</form>
