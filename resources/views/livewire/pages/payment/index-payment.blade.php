<div>

    @if ($payment)
        <div class="container mb-4">
            <div class="d-block rouned shadow">
                <div class="d-block border-bottom p-3 w-100">
                    <p class="mb-0 fs-5 fw-bold">Pembayaran</p>
                </div>
                <div class="d-block p-3">
                    <div class="d-flex justify-content-between mb-2">
                        <p class="mb-0">Metode Pembayaran</p>
                        <p class="mb-0 text-uppercase">{{ $payment->bank }}</p>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <p class="mb-0">Virtual Account</p>
                        <p class="mb-0">{{ $payment->va_number }}</p>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <p class="mb-0">Batas Waktu Pembayaran</p>
                        <p class="mb-0 fw-bold">{{ date('d F Y', strtotime($payment->deathline)) }},
                            {{ date('H:i', strtotime($payment->time)) }} WIB</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="container mb-4">
        <div class="d-block rounded shadow bg-white">
            <div class="d-block border-bottom p-3 w-100">
                <p class="mb-0 fs-5 fw-bold">Detail Transaksi</p>
            </div>
            <div class="p-3">
                <div class="row mb-2">
                    <p class="col-12 col-md-3 col-lg-2 fw-bold mb-1 text-secondary">invoice</p>
                    <p class="col-12 col-md-9 col-lg-8 mb-0">{{ $purchases->invoice }}</p>
                </div>
                <div class="row mb-2">
                    <p class="col-12 col-md-3 col-lg-2 fw-bold mb-1 text-secondary">Tanggal</p>
                    <p class="col-12 col-md-9 col-lg-8 mb-0">{{ date('d F Y', strtotime($purchases->date)) }},
                        {{ date('H:i', strtotime($purchases->time)) }}WIB</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-4">
        <div class="row">
            <div class="col-12">
                <div class="d-block rounded shadow">
                    <div class="border-bottom p-3 d-block">
                        <p class="mb-0 fs-5 fw-bold">Detail Produk</p>
                    </div>
                    <div class="d-border-bottom p-3">
                        @foreach ($product as $row)
                            <?php $totalHarga += $row->total_price; ?>
                            <?php $weight += $row->qty * $row->weight; ?>
                            <div class="d-flex alert alert-light p-0 mb-3">
                                <img src="{{ url('images/product/' . $row->images) }}" class="rounded"
                                    alt="{{ $row->product_name }}" width="100px">
                                <div class="d-block ms-4">
                                    <span class="text-title-cart text-capitalize fw-bold text-dark lh-sm">
                                        {{ $row->product_name }}
                                    </span>
                                    <span class="d-block mb-0 mb-md-2 mb-lg-2">Berat Produk
                                        {{ $row->weight }}Gr</span>
                                    <span class="d-block fw-bold text-danger">Rp.
                                        {{ number_format($row->price, 0, ',', '.') }}<small
                                            class="text-secondary ms-1">
                                            x {{ $row->qty }} Qty.</small></span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-4">
        <div class="d-block rounded shadow">
            <div class="d-flex border-bottom p-3 w-100 align-items-center">
                <p class="mb-0 fs-5 fw-bold">Info Pengiriman</p>
            </div>
            <div class="d-block p-3">
                <div class="row mb-3">
                    <p class="col-12 col-md-3 col-lg-2 fw-bold mb-1 text-secondary">Kurir</p>
                    <p class="col-12 col-md-9 col-lg-8 mb-0"><span
                            class="text-uppercase">{{ $shipping->expedition }}</span> - {{ $shipping->service }}</p>
                </div>
                <div class="row mb-3">
                    <p class="col-12 col-md-3 col-lg-2 fw-bold text-secondary mb-1">Alamat Pengiriman</p>
                    <div class="col-12 col-md-9 col-lg-8">
                        <p class="mb-0 text-capitalize">{{ $shipping->username }}</p>
                        <p class="mb-0">{{ $shipping->phone }}</p>
                        <p class="mb-0">{{ $shipping->province }}, {{ $shipping->city }}, {{ $shipping->address }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-4">
        <div class="d-block rouned shadow">
            <div class="d-block border-bottom p-3 w-100">
                <p class="mb-0 fs-5 fw-bold">Rincian Pembayaran</p>
            </div>
            <div class="d-block p-3">
                <div class="d-flex justify-content-between mb-2">
                    <p class="mb-0">Total Harga ({{ $product->count() }} produk)</p>
                    <p class="mb-0">Rp. {{ number_format($totalHarga, 0, ',', '.') }}</p>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <p class="mb-0">Total Ongkos Kirim ({{ $weight }} Gr)</p>
                    <p class="mb-0">Rp. {{ number_format($shipping->price, 0, ',', '.') }}</p>
                </div>
                <hr class="soft my-4">
                <div class="d-flex justify-content-between mb-2">
                    <p class="mb-0">Total Belanja</p>
                    <p class="mb-0 fw-bold">Rp. {{ number_format($purchases->price, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </div>

    @if ($payment == null)
        <div class="container">
            <a wire:click='buys' href="#" class="btn btn-orange py-2 d-block">BAYAR</a>
        </div>
    @endif

    <script src="https://app.midtrans.com/snap/snap.js" data-client-key="Mid-client-HF34HQiHZ_8hDrl5"></script>
    <script type="text/javascript">
        document.addEventListener('showToken', (event) => {
            // var token = '<?php echo $snapToken; ?>';
            // console.log(event.detail.token);
            // SnapToken acquired from previous step
            snap.pay(event.detail.token, {
                // Optional
                onSuccess: function(result) {
                    Livewire.emit('toPayment', result);
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                // Optional
                onPending: function(result) {
                    Livewire.emit('toPayment', result);
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                // Optional
                onError: function(result) {
                    Livewire.emit('toPayment', result);
                    /* You may add your own js here, this is just example */
                    // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                }
            });
        });
    </script>
</div>
