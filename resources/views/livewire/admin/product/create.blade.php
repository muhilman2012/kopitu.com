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
        <select name="category" id="category"
            class="form-select @error('category') is-invalid @enderror" @if(!$category_id) disabled @endif>
            <option value="" selected>Choose category</option>
            @foreach ($sub_ctg as $item)
            <option value="{{ $item->id_categories_sub }}">{{ $item->categories_sub }}</option>
            @endforeach
        </select>
        @error('category')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>