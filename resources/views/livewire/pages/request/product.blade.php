<div>
    <div class="container">
        <div class="d-block bg-white rounded shadow p-3 p-md-5 mb-4">
            <div class="row mb-3">
                <label for="ket-1" class="col-12 col-md-4 col-form-label">Nama Barang/Jasa <span class="text-danger">*</span></label>
                <div class="col-12 col-sm-8">
                    <input wire:model="product_name" type="text" class="form-control @error('product_name') is-invalid @enderror" id="ket-1">
                    @error('product_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="ket-2" class="col-12 col-md-4 col-form-label">Kategori <span class="text-danger">*</span></label>
                <div class="col-12 col-sm-8">
                    <div class="dropdown">
                        <button class="d-flex align-items-center btn form-control border dropdown-toggle @error('pillCtg') is-invalid @enderror" type="button"
                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            @if($pillCtg)
                            <span class="badge bg-secondary me-2">{{ $pillCtg }}</span>
                            @endif
                            @if($pillCtgSub)
                            <span class="badge bg-secondary me-2">{{ $pillCtgSub }}</span>
                            @endif
                            @if($pillCtgChild)
                            <span class="badge bg-secondary me-2">{{ $pillCtgChild }}</span>
                            @endif
                            <span class="ms-auto me-1">
                                Pilih Kategori
                            </span>
                        </button>
                        <div class="dropdown-menu w-100 p-0" aria-labelledby="dropdownMenuButton1">
                            <div class="row g-0">
                                <div class="col-4">
                                    <select wire:model="categories_id" class="form-select rounded-0" size="8"
                                        aria-label="size 3 select example">
                                        @foreach ($ctgMain as $item)
                                        <option value="{{ $item->id_categories }}">{{ $item->categories }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <select wire:model='categories_sub_id' class="form-select rounded-0" size="8" aria-label="size 3 select example">
                                        @foreach ($ctgSub as $itemb)
                                        <option value="{{ $itemb->id_categories_sub }}">{{ $itemb->categories_sub }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <select wire:model='categories_child_id' class="form-select rounded-0" size="8" aria-label="size 3 select example">
                                        @foreach ($ctgChild as $itemc)
                                        <option value="{{ $itemc->id_categories_child }}">{{ $itemc->categories_child }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    @error('pillCtg')
                    <div class="d-block invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="ket-3" class="col-12 col-md-4 col-form-label">Jumlah <span class="text-danger">*</span></label>
                <div class="col-7 col-sm-5">
                    <input wire:model='qty' type="text" class="form-control @error('qty') is-invalid @enderror" id="ket-3">
                    @error('qty')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                <div class="col-5 col-sm-3">
                    <select wire:model='unit' class="form-select @error('unit') is-invalid @enderror" aria-label="Default select example">
                        <option value="" selected>Satuan</option>
                        <option value="unit">Unit</option>
                        <option value="liter">Liter</option>
                        <option value="box">Box</option>
                        <option value="meter">Meter</option>
                        <option value="roll">Roll</option>
                        <option value="lusin">Lusin</option>
                        <option value="set">Set</option>
                    </select>
                    @error('unit')
                    <div class="d-block invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label wire:model='description' for="desk" class="col-12 col-md-4 col-form-label">Deskripsi <span class="text-danger">*</span></label>
                <div class="col-12 col-sm-8">
                    <textarea wire:model='description' name="" id="desk" rows="5" class="form-control @error('description') is-invalid @enderror"
                        placeholder="butuh 200 buah plastik persegi, 20cm x 20cm x 20cm, untuk akhir bulan ini"></textarea>
                        @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="d-block bg-white rounded shadow overflow-hidden mb-4">
            <button class="btn btn-outline-orange w-100 p-3 text-start border-0 border-bottom rounded-0" type="button"
                data-bs-toggle="collapse" data-bs-target="#collapseExample">
                <div class="d-flex align-items-center">
                    <div>
                        <p class=" fw-bold mb-0">Klik untuk menambahkan kelengkapan permintaan Anda</p>
                        <small>File pendukung, harga pengiriman</small>
                    </div>
                    <i class="fas fa-plus fa-2x fa-fw ms-auto"></i>
                </div>
            </button>
        </div>

        <div class="collapse bg-white shadow p-3 p-md-5 show" id="collapseExample">
            <div class="row mb-3">
                <label for="attr-1" class="col-12 col-md-4 col-form-label">Kadaluarsa permintaan</label>
                <div  wire:model='exp' class="col-12 col-sm-8">
                    <input type="date" class="form-control" id="attr-1">
                </div>
            </div>
            <div class="row mb-3">
                <label for="attr-2" class="col-12 col-md-4 col-form-label">Budget Anda per</label>
                <div class="col-12 col-sm-8">
                    <div class="d-flex aling-items-center">
                        <input wire:model='min_price' type="number" class="form-control" id="attr-2" placeholder="0">
                        <span  class="mx-2 mt-1">
                            <i class="fas fa-minus"></i>
                        </span>
                        <input wire:model='max_price' type="number" class="form-control" id="attr-2" placeholder="0">
                        <select wire:model='type_price' class="form-select ms-2">
                            <option value="idr">IDR</option>
                            <option value="usd">USD</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="attr-3" class="col-12 col-md-4 col-form-label">Lokasi</label>
                <div class="col-12 col-md-8">
                    <input wire:model='locations' type="text" id="attr-3" class="form-control">
                </div>
            </div>
            <?php $ext = array("doc", "docx", "ppt", "pptx", "xls", "xlsx", "pdf");?>
            <div class="row mb-3">
                <label class="col-12 col-md-4 col-form-label">File Pedukung</label>
                <div class="col-12 col-md-8">
                    <div class="row g-1">
                        <div class="col-3">
                            <div class="d-block position-relative rounded border text-center border-2"
                                style="border-style: dashed!important;">
                                @if ($images1)
                                @if (in_array($images1->getClientOriginalExtension(), $ext))
                                <img src="{{ url('/images/icons/uploads/'.  $images1->getClientOriginalExtension() . '.png') }}"
                                    class="img-fluid">
                                @else
                                <img src="{{ $images1->temporaryUrl() }}" class="img-fluid">
                                @endif
                                <button wire:click='deleteFile(1)'
                                    class="btn btn-orange position-absolute top-0 end-0 m-2 rounded-circle p-0 d-flex align-items-center justify-content-center"
                                    style="width: 24px; height: 24px;">
                                    <i class="fas fa-times fa-sm fa-fw"></i> </button>
                                @else
                                <label for="images-1">
                                    <i class="fas fa-plus fa-fw my-3"></i>
                                    <p class="lh-sm mb-0 text-center text-secondary mb-3" style="font-size: 12px">
                                        Upload file <br>
                                        gambar atau document
                                    </p>
                                </label>
                                @endif
                                <input wire:model="images1" type="file" name="images-1" id="images-1" hidden>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="d-block position-relative rounded border text-center border-2"
                                style="border-style: dashed!important;">
                                @if ($images2)
                                @if (in_array($images2->getClientOriginalExtension(), $ext))
                                <img src="{{ url('/images/icons/uploads/'.  $images2->getClientOriginalExtension() . '.png') }}"
                                    class="img-fluid">
                                @else
                                <img src="{{ $images2->temporaryUrl() }}" class="img-fluid">
                                @endif
                                <button wire:click='deleteFile(2)'
                                    class="btn btn-orange position-absolute top-0 end-0 m-2 rounded-circle p-0 d-flex align-items-center justify-content-center"
                                    style="width: 24px; height: 24px;">
                                    <i class="fas fa-times fa-sm fa-fw"></i> </button>
                                @else
                                <label for="images-2">
                                    <i class="fas fa-plus fa-fw my-3"></i>
                                    <p class="lh-sm mb-0 text-center text-secondary mb-3" style="font-size: 12px">
                                        Upload file <br>
                                        gambar atau document
                                    </p>
                                </label>
                                @endif
                                <input wire:model="images2" type="file" name="images-2" id="images-2" hidden>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="d-block position-relative rounded border text-center border-2"
                                style="border-style: dashed!important;">
                                @if ($images3)
                                @if (in_array($images3->getClientOriginalExtension(), $ext))
                                <img src="{{ url('/images/icons/uploads/'.  $images3->getClientOriginalExtension() . '.png') }}"
                                    class="img-fluid">
                                @else
                                <img src="{{ $images3->temporaryUrl() }}" class="img-fluid">
                                @endif
                                <button wire:click='deleteFile(3)'
                                    class="btn btn-orange position-absolute top-0 end-0 m-2 rounded-circle p-0 d-flex align-items-center justify-content-center"
                                    style="width: 24px; height: 24px;">
                                    <i class="fas fa-times fa-sm fa-fw"></i> </button>
                                @else
                                <label for="images-3">
                                    <i class="fas fa-plus fa-fw my-3"></i>
                                    <p class="lh-sm mb-0 text-center text-secondary mb-3" style="font-size: 12px">
                                        Upload file <br>
                                        gambar atau document
                                    </p>
                                </label>
                                @endif
                                <input wire:model="images3" type="file" name="images-3" id="images-3" hidden>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="d-block position-relative rounded border text-center border-2"
                                style="border-style: dashed!important;">
                                @if ($images4)
                                @if (in_array($images4->getClientOriginalExtension(), $ext))
                                <img src="{{ url('/images/icons/uploads/'.  $images4->getClientOriginalExtension() . '.png') }}"
                                    class="img-fluid">
                                @else
                                <img src="{{ $images4->temporaryUrl() }}" class="img-fluid">
                                @endif
                                <button wire:click='deleteFile(4)'
                                    class="btn btn-orange position-absolute top-0 end-0 m-2 rounded-circle p-0 d-flex align-items-center justify-content-center"
                                    style="width: 24px; height: 24px;">
                                    <i class="fas fa-times fa-sm fa-fw"></i> </button>
                                @else
                                <label for="images-4">
                                    <i class="fas fa-plus fa-fw my-3"></i>
                                    <p class="lh-sm mb-0 text-center text-secondary mb-3" style="font-size: 12px">
                                        Upload file <br>
                                        gambar atau document
                                    </p>
                                </label>
                                @endif
                                <input wire:model="images4" type="file" name="images-4" id="images-4" hidden>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="attr-5" class="col-12 col-md-4 col-form-label">Cara Harga Pengiriman</label>
                <div class="col-12 col-md-8">
                    <select wire:model='method_payment' id="attr-5" class="form-select">
                        <option value="negosiasi">Negosiasi</option>
                        <option value="dibayar-penjual">Dibayar oleh Penjual</option>
                        <option value="dibayar-pembeli">Dibayar oleh Pembeli</option>
                    </select>
                </div>
            </div>
        </div>

        <div>
            <hr class="soft">
            <div class="d-flex">
                <button wire:click='store()' type="button" class="btn btn-orange btn-lg px-3 ms-auto">Berikan Saya Penawaran</button>
            </div>
        </div>
    </div>

    @if(session()->has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Good Jobs!',
            text: '{{ session()->get("success") }}',
            showConfirmButton: true,
        })
    </script>
    @elseif(session()->has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Opps...!',
            text: '{{ session()->get("error") }}',
            showConfirmButton: true,
        })
    </script>
    @endif
</div>