<form action="{{ route('update.subcategory') }}" method="post">
    @csrf
    <div class="modal-body">
        <div class="form-group">
            <select name="category_id" id="category_id" class="form-control">
                @foreach ($category as $item)
                <option value="{{  $item->id }}" @if($item->id==$data->category_id) selected  @endif>{{  $item->category_name }}</option>
                @endforeach
            </select>
            <input type="hidden" name="id" value="{{ $data->id }}">
        </div>
        <div class="form-group">
            <input type="text" name="subcategory_name"  class="form-control" value="{{ $data->subcategory_name }}">
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
