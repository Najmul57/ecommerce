
    <form action="{{ route('update.warehouse') }}" method="post" id="add-form">
        @csrf
        <input type="hidden" name='id' value="{{ $data->id }}">
        <div class="modal-body">
            <div class="form-group">
                <input type="text" name="warehouse_name" class="form-control" value="{{ $data->warehouse_name }}">
            </div>
            <div class="form-group">
                <input type="text" name="warehouse_address" class="form-control"
                    value="{{ $data->warehouse_address }}">
            </div>
            <div class="form-group">
                <input type="text" name="warehouse_phone" class="form-control" value="{{ $data->warehouse_phone }}">
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary"> <span class="d-none loader"> <i
                        class="fas fa-spinner"></i> Loading...</span> <span
                    class="submit_btn">Submit</span></button>
        </div>
    </form>
