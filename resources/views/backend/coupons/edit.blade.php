<form action="{{ route('coupon.update') }}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{ $coupon->id }}">
    <div class="modal-body">
        <div class="form-group">
            <input type="text" name="code" class="form-control" value="{{ $coupon->code }}" required>
        </div>
        <div class="form-group">
            <input type="number" name="amount" class="form-control" value="{{ $coupon->amount }}" required>
        </div>
        <div class="form-group">
            <input type="date" name="date" class="form-control" value="{{ $coupon->date }}" required>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
