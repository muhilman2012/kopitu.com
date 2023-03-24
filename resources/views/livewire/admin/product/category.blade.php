<div>
    <div class="mb-3">
        <label for="category" class="form-label">Category product</label>
        <select wire:model="category_id" name="category" id="category"
            class="form-select  @error('category') is-invalid @enderror">
            <option value="" selected>Choose category</option>
            @foreach ($ctg as $item)
            <option value="{{ $item->id_categories }}">{{ $item->categories }}</option>
            @endforeach
        </select>
        @error('category')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="category" class="form-label">Sub Category product</label>
        <select wire:model="category_sub_id" name="category_sub" id="category" class="form-select @error('category') is-invalid @enderror"
            @if(!$category_id) disabled @endif>
            <option value="">Choose category</option>
            @foreach ($sub_ctg as $item)
            <option value="{{ $item->id_categories_sub }}" @if($category_id) @if($item->id_categories_sub == $categories_sub_id) selected @endif @endif>{{ $item->categories_sub }}</option>
            @endforeach
        </select>
        @error('category')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="category_child" class="form-label">Sub Category product</label>
        <select name="category_child" id="category_child" class="form-select @error('category_child') is-invalid @enderror"
            @if(!$category_sub_id) disabled @endif>
            <option value="" selected>Choose category</option>
            @foreach ($child_ctg as $item)
            <option value="{{ $item->id_categories_child }}" @if($categories_sub_id) @if($item->id_categories_sub == $categories_sub_id) selected @endif @endif>{{ $item->categories_child }}</option>
            @endforeach
        </select>
        @error('category')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>