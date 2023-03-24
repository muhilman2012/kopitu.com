<div>
    <div class="row">
        <div class="col-12 col-md-7 col-lg-8 col-xl-8">
            <div class="d-block rounded shadow mb-3">
                <div class="border-bottom p-3">
                    <h5 class="mb-0 fw-bold">Alamat Pengiriman</h5>
                </div>
                @if($addressBooks->count() != 0)
                @foreach ($addressBooks as $adrs)
                <div class="p-3">
                    <div class="alert alert-light p-0 mb-0" role="alert">
                        <div class="d-flex mb-3">
                            <i class="fas fa-map-marker-alt fa-2x fa-fw"></i>
                            <div class="d-block ms-2">
                                <p class="fw-bold text-capitalize m-0">{{ $adrs->username }} - <span
                                        class="badge bg-secondary text-capitalize">{{ $adrs->label }}</span></p>
                                <p class="text-capitalize m-0">{{ $adrs->phone }}</p>
                                <p class="mb-0 pe-lg-5 me-lg-5">{{ $adrs->province }}, {{
                                    $adrs->city_name }}, {{ $adrs->districts }}, {{
                                    $adrs->address }}, {{ $adrs->postal_code }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-end">
                            <a href="/user#address" class="link-orange-dark px-1 mx-2">Ganti Alamat</a>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="p-4">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-map-marked-alt fa-3x fa-fw me-3 mt-1"></i>
                        <div class="d-block ms-3">
                            <span class="d-block text-secondary fs-3">Oops...</span>
                            <span class="d-block text-secondary fs-5">Alamat anda masih kosong!</span>
                        </div>
                    </div>
                    <a href="/user#address" class="btn btn-primary">Tambahkan Alamat</a>
                </div>
                @endif
            </div>


            <div class="d-block rounded shadow mb-3">
                <div class="border-bottom p-3">
                    <h5 class="mb-0 fw-bold">Layanan Pengiriman</h5>
                </div>
                <div class="p-3 overflow-hidden">
                    @if($ongkir)
                    <div
                        class="animate__animated @if($ongkir) d-block animate__fadeIn @else animate__fadeOut @endif animate__slow">
                        <div class="alert alert-light border border-secondary">
                            <p class="mb-1 fw-bold"><span class="text-uppercase">{{ $ongkir['code'] }}</span> {{
                                $ongkir['service'] }} - {{ $ongkir['description'] }}</p>
                            <div>
                                <small class="d-block d-md-inline d-lg-inline">Estimasi tiba {{ $ongkir['estimasi'] }}
                                    hari </small>
                                <div class="mx-1 d-none d-md-inline d-lg-inline">-</div>
                                <small class="d-block d-md-inline d-lg-inline">Biaya Rp. {{
                                    number_format($ongkir['biaya'],'0',',','.') }}</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-end">
                            <a wire:click="resetOngkir" type="button"
                                class="text-decoration-none text-primary px-1 mx-2">Ubah layanan</a>
                        </div>
                    </div>
                    @else
                    <button type="button" class="btn btn-outline-orange w-100 py-3 px-4 text-start"
                        data-bs-toggle="modal" data-bs-target="#ongkirModal">
                        <i class="fas fa-truck fa-fw"></i> <span class="ms-2 fw-bold">Pilih pengiriman</span>
                    </button>
                    @endif
                </div>
            </div>

        </div>


        <div class="col-12 col-md-5 col-lg-4 col-xl-4">
            <div class="d-block shadow overflow-hidden">
                <div class="border-bottom p-3">
                    <h5 class="mb-0 fw-bold">Estimasi Harga</h5>
                </div>
                <div class="d-block p-3">
                    <span class="d-flex mb-2">
                        Subtotal <p class="mb-0 ms-auto">Rp. {{ number_format($subtotal,0,',','.') }}</p>
                    </span>
                    <span class="d-flex mb-2">
                        Ongkos Kirim <p class="mb-0 ms-auto">Rp. @if($hargaOngkir) {{
                            number_format($hargaOngkir,0,',','.') }} @else - @endif </p>
                    </span>
                    <span class="d-flex mb-2 fw-bold">
                        Total Harga <p class="mb-0 ms-auto">Rp. @if($grandTotal) {{ number_format($grandTotal,0,',','.')
                            }} @else - @endif</p>
                    </span>
                </div>
                <div class="d-block p-3">
                    @if ($addressBooks->count() != 0 and $ongkir)
                    <button wire:click="process" type="button" class="btn btn-orange form-control">BAYAR</button>
                    @else
                    <button id="pay-button" type="button" class="btn btn-orange form-control disabled">BAYAR</button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="ongkirModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Pilih Pingiriman
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    @if ($result)
                    <div class="list-group list-group-flush">
                        @foreach($result as $row)
                        <button type="button" class="list-group-item list-group-item-action"
                            wire:click="ongkir({{ $row['id_ongkir'] }})">
                            <p class="mb-1"><span class="text-uppercase">{{ $row['code'] }}</span> {{
                                $row['service'] }} - {{ $row['description'] }}</p>
                            <div>
                                <small class="d-block d-md-inline d-lg-inline">Estimasi tiba {{
                                    $row['estimasi'] }} hari </small>
                                <div class="mx-1 d-none d-md-inline d-lg-inline">-</div>
                                <small class="d-block d-md-inline d-lg-inline">biaya Rp. {{
                                    number_format($row['biaya'],'0',',','.') }}</small>
                            </div>
                        </button>
                        @endforeach
                    </div>
                    @else
                    <div class="list-group list-group-flush position-relative">
                        <button type="button" class="list-group-item list-group-item-action py-3"
                            wire:click='getOngkir("jne")'>
                            JNE - Jalur Nugraha Ekakurir
                        </button>
                        <button type="button" class="list-group-item list-group-item-action py-3"
                            wire:click='getOngkir("tiki")'>
                            TIKI - Titipan Kilat
                        </button>
                        <button type="button" class="list-group-item list-group-item-action py-3"
                            wire:click='getOngkir("pos")'>
                            POS - Pos Indonesia
                        </button>
                        <div class="justify-content-center align-items-center position-absolute top-50 start-50 translate-middle w-100 h-100" style="background-color: #0002" wire:loading.flex wire:target="getOngkir">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


    @if(session()->has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Good Jobs!',
            text: '{{ session()->get("success") }}',
            showConfirmButton: false,
            timer: 2500
        })
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