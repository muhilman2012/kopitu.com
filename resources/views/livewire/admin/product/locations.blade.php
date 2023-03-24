<div>
    <div class="d-block">
        <label for="#" class="form-label">Shipping Product</label>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 placeholder-glow">
            <label class="form-label" for="provinsi">Pilih provinsi</label>
            <select name="province_id" id="provinsi" wire:model="province_id" class="form-select @error('province_id') is-invalid @enderror"
                wire:target="createdAddress" wire:loading.class="placeholder disabled">
                <option value="" selected>Provinsi Anda</option>
                @foreach($getprovince as $prov)
                <option value="{{ $prov['province_id'] }}">{{ $prov['province'] }}</option>
                @endforeach
            </select>
            @error('province_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="col-12 col-md-6">
            <label class="form-label" for="kota">Pilih Kota</label>
            <select name="city_id" id="kota" class="form-select @error('city_id') is-invalid @enderror" wire:model="city_id"
                wire:target="createdAddress" wire:loading.class="placeholder disabled" @if(!$province_id) disabled @endif>
                <option value="" selected>Kota Anda</option>
                @if($province_id)
                @foreach($getcity as $kota)
                <option value="{{ $kota['city_id'] }}">{{ $kota['city_name'] }}</option>
                @endforeach
                @endif
            </select>
            @error('city_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</div>