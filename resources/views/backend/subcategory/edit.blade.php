<form action="{{ route('subcategory.update') }}" method="post">
    @csrf
    <div class="modal-body">
        <div class="form-group">
            <select name="category_id" class="form-control">
                <option hidden>Select Category</option>
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}" @if ($item->id == $subcategory->category_id) selected @endif>
                        {{ ucfirst($item->name) }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <input type="text" name="name" id="e_subcategory_name" class="form-control"
                value="{{ $subcategory->name }}">
            <input type="hidden" name="id" id="e_subcategory_id" class="form-control"
                value="{{ $subcategory->id }}">
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
