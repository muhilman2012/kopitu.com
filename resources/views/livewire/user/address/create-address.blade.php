<div>
    <div class="d-block">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="mb-3 placeholder-glow">
                    <label class="form-label" for="username">Username</label>
                    <input wire:model="username" type="text"
                        class="form-control @error('username') is-invalid @enderror"
                        wire:target="createdAddress" wire:loading.class="placeholder disabled">
                    <div class="invalid-feedback">
                        Username tidak boleh kosong
                    </div>
                </div>
                <div class="mb-3">
                    <label for="label" class="form-label">Label</label>
                    <input type="text" id="label" wire:model="label"
                        class="form-control @error('label') is-invalid @enderror "
                        wire:target="createdAddress" wire:loading.class="placeholder disabled">
                    <div class="invalid-feedback">
                        label harus diinputkan
                    </div>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Telepon</label>
                    <input type="text" id="phone" wire:model="phone"
                        class="form-control @error('phone') is-invalid @enderror "
                        wire:target="createdAddress" wire:loading.class="placeholder disabled">
                    <div class="invalid-feedback">
                        nomor telepon harus diinputkan
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="mb-3 placeholder-glow">
                    <label class="form-label" for="provinsi">Pilih provinsi</label>
                    <select wire:model="province_id"
                        class="form-select @error('province_id') is-invalid @enderror"
                        wire:target="createdAddress" wire:loading.class="placeholder disabled">
                        <option selected>Provinsi Anda</option>
                        @foreach($getprovince as $prov)
                        <option value="{{ $prov['province_id'] }}">{{ $prov['province'] }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Provinsi tidak boleh kosong
                    </div>
                </div>
                <div class="mb-3 placeholder-glow">
                    <label class="form-label" for="kota">Pilih Kota</label>
                    <select id="kota" class="form-select @error('city_id') is-invalid @enderror"
                        wire:model="city_id" wire:target="createdAddress"
                        wire:loading.class="placeholder disabled" @if(!$province_id) disabled @endif>
                        <option selected>Kota Anda</option>
                        @if($province_id)
                        @foreach($getcity as $kota)
                        <option value="{{ $kota['city_id'] }}">{{ $kota['city_name'] }}</option>
                        @endforeach
                        @endif
                    </select>
                    <div class="invalid-feedback">
                        Kota tidak boleh kosong
                    </div>
                </div>
                <div class="mb-3 placeholder-glow">
                    <label class="form-label" for="username">Kode Pos</label>
                    <input wire:model="postal_code" type="text" id="username"
                        class="form-control @error('postal_code') is-invalid @enderror"
                        wire:target="createdAddress" wire:loading.class="placeholder disabled">
                    <div class="invalid-feedback">
                        Kode pos tidak boleh kosong
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3 placeholder-glow">
                    <label class="form-label" for="kecamatan">Kecamatan atau kelurahan</label>
                    <input wire:model="districts" type="text"
                        class="form-control @error('districts') is-invalid @enderror"
                        wire:target="createdAddress" wire:loading.class="placeholder disabled">
                    <div class="invalid-feedback">
                        Data tidak boleh kosong
                    </div>
                </div>
                <div class="mb-3 placeholder-glow">
                    <label class="form-label" for="alamat">Alamat</label>
                    <textarea wire:model="address" id="alamat" rows="3"
                        class="form-control @error('address') is-invalid @enderror"
                        wire:target="createdAddress" wire:loading.class="placeholder disabled"></textarea>
                    <div class="invalid-feedback">
                        Alamat tidak boleh kosong
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
