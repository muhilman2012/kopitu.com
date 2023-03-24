<div>
    <div class="d-block bg-white rounded shadow" id="address">
        <div class="p-3 border-bottom">
            <h5 class="mb-0 fw-bold">Daftar Alamat</h5>
        </div>
        <div class="d-block p-3">
            <div class="d-flex justify-content-between mb-3">
                <button type="button" class="btn btn-outline-orange btn-sm" wire:click="show">
                    <i class="fas fa-plus fa-sm fa-fw"></i> Tambah
                </button>
                <div class="d-flex">
                    <input type="text" class="form-control" placeholder="Cari Alamat..">
                </div>
            </div>
            @if ($dataAddress->count() != 0)
            @foreach($dataAddress as $item)
            <div class="border rounded-3 p-3 position-relative mb-3" role="alert">
                <p class="fw-bold mb-2">
                    <span class="text-uppercase">{{ $item->label }}</span>
                    @if($item->active == 1)
                    - <small class="badge bg-primary">Utama</small>
                    @endif
                </p>
                <p class="mb-0 fw-bold text-capitalize">{{ $item->username }}</p>
                <p class="mb-1">{{ $item->phone }}</p>
                <p>{{ $item->province }}, {{$item->city_name }}, {{$item->address }}, {{ $item->districts }}, {{
                    $item->postal_code }}</p>
                <div class="dropstart position-absolute top-0 end-0 m-3">
                    <button class="btn btn-outline-secondary btn-sm" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <button class="dropdown-item" wire:click='edit({{ $item->id_address }})'>
                            <i class="fas fa-edit fa-sm fa-fw"></i> Edit
                        </button>
                        <button class="dropdown-item" wire:click='deleteAddress({{ $item->id_address }})'>
                            <i class="fas fa-trash fa-fw fa-sm"></i> Hapus
                        </button>
                        <button class="dropdown-item" wire:click='setAddres({{ $item->id_address }})'>
                            <i class="far fa-check-square"></i> Jadikan Utama
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="border rounded p-4">
                <div class="d-flex align-items-center mb-3">
                    <i class="fas fa-map-marked-alt fa-3x fa-fw me-3 mt-1"></i>
                    <div class="d-block ms-3">
                        <span class="d-block text-secondary fs-3">Oops...</span>
                        <span class="d-block text-secondary fs-5">Alamat anda masih kosong!</span>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="addressModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Alamat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="mb-3 placeholder-glow">
                                <label class="form-label" for="username">Username</label>
                                <input wire:model="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror"
                                    wire:target="store" wire:loading.class="placeholder disabled">
                                <div class="invalid-feedback">
                                    Username tidak boleh kosong
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="label" class="form-label">Label</label>
                                <input type="text" id="label" wire:model="label"
                                    class="form-control @error('label') is-invalid @enderror "
                                    wire:target="store" wire:loading.class="placeholder disabled">
                                <div class="invalid-feedback">
                                    label harus diinputkan
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Telepon</label>
                                <input type="text" id="phone" wire:model="phone"
                                    class="form-control @error('phone') is-invalid @enderror "
                                    wire:target="store" wire:loading.class="placeholder disabled">
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
                                    wire:target="store" wire:loading.class="placeholder disabled">
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
                                    wire:model="city_id" wire:target="store"
                                    wire:loading.class="placeholder disabled" @if(!$province_id) disabled @endif>
                                    <option>Kota Anda</option>
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
                                    wire:target="store" wire:loading.class="placeholder disabled">
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
                                    wire:target="store" wire:loading.class="placeholder disabled">
                                <div class="invalid-feedback">
                                    Data tidak boleh kosong
                                </div>
                            </div>
                            <div class="mb-3 placeholder-glow">
                                <label class="form-label" for="alamat">Alamat</label>
                                <textarea wire:model="address" id="alamat" rows="3"
                                    class="form-control @error('address') is-invalid @enderror"
                                    wire:target="store" wire:loading.class="placeholder disabled"></textarea>
                                <div class="invalid-feedback">
                                    Alamat tidak boleh kosong
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($editMode == false)    
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" wire:click="store"
                        wire:loading.attr="disabled">
                        <span wire:target="store" wire:loading class="spinner-border spinner-border-sm"></span>
                        Simpan Alamat
                    </button>
                </div>
                @else
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-warning" wire:click="update" wire:loading.attr="disabled">
                        <span wire:target="update" wire:loading class="spinner-border spinner-border-sm"></span>
                        Simpan Perubahan
                    </button>
                </div>
                @endif
            </div>
        </div>
    </div>

    <script src="{{ url('/dist/assets/js/jquery.js') }}"></script>
    <script>
        document.addEventListener('deleteConfrimed', function() {
            Swal.fire({
                    title: "Apa anda yakin?",
                    text: "Menghapus produk pesanan anda!!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete!',
                    cancelButtonText: 'Tidak',
                })
                .then((next) => {
                    if (next.isConfirmed) {
                        Livewire.emit('deleteAction');
                    }
                });
        })

        document.addEventListener('addressModalShow', function() {
            var editModal = $('#addressModal');
              editModal.modal('show');
        });
        document.addEventListener('addressModalExpand', function(){
            var editModal = $('#addressModal');
              editModal.modal('hide');
        });
    </script>


    @if(session()->has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Good Jobs!',
            text: '{{ session()->get("success") }}',
            showConfirmButton: false,
            timer: 2500
        })
        location.reload();
    </script>
    @elseif(session()->has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Opps...!',
            text: '{{ session()->get("error") }}',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
    @endif
</div>