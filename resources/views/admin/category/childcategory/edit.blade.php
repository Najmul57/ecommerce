<form action="{{ route('update.childcategory') }}" method="post" id="add-form">
    @csrf
    <div class="modal-body">
        <div class="form-group">
            <select name="subcategory_id" id="subcategory_id" class="form-control">
                <option value="">Select Category</option>
                @foreach ($category as $item)
                    @php
                        $subcategory = DB::table('subcategories')
                            ->where('category_id', $item->id)
                            ->get();
                    @endphp
                    <option disabled>--{{ $item->category_name }}--</option>
                    @foreach ($subcategory as $item)
                        <option value="{{ $item->id }}" @if($item->id==$data->subcategory_id) selected  @endif >{{ $item->subcategory_name }}</option>
                    @endforeach

                    <option value="{{ $item->id }}">{{ $item->subcategory_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <input type="text" name="childcategory_name" class="form-control"
                value="{{ $data->childcategory_name }}">
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
