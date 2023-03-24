<div>
    <div class="row gy-4">
        <div class="col-12 col-lg-8">
            <div class="d-block rounded bg-white shadow p-3">
                <?php $subtotal = 0; ?>
                @foreach(session('cart') as $produk => $item)
                <?php $subtotal += $item['price'] * $item['qty'] ?>
                <div class="d-flex mb-3">
                    <div class="d-block" style="width: 100px;">
                        <img src="{{ url('/images/product/' . $item['images'] ) }}" alt="" class="img-fluid">
                    </div>
                    <div class="d-block w-100 ms-3">
                        <p class="text-capitalize fw-bold fs-5 mb-1 text-ellipsis">{{ $item['product_name'] }}</p>
                        <p class="fw-bold text-danger mb-0">
                            Rp. {{number_format( $item['price'],0,',','.') }}
                            <small class="text-secondary">x {{ $item['qty'] }}</small>
                        </p>
                        <small class="d-block mb-3">
                            Rp. {{number_format( $item['price'] * $item['qty'] ,0,',','.') }}
                        </small>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div class="d-flex">
                                <button wire:click="minus({{ $item['id_product'] }})"
                                    class="btn btn-outline-secondary rounded-0 rounded-start btn-sm" type="button"
                                    id="button-addon1">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <div class="form-contol fw-bold border text-center form-control-sm rounded-0 px-3">{{
                                    $item['qty'] }}</div>
                                <button wire:click="plus({{ $item['id_product'] }})"
                                    class="btn btn-outline-secondary rounded-0 rounded-end btn-sm" type="button"
                                    id="button-addon2">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <div class="d-block text-center">
                                <a class="btn text-secondary border border-secondary btn-sm">
                                    <i class="fas fa-heart"></i>
                                </a>
                                <a wire:click="deleteCartConfrim({{ $item['id_product'] }})"
                                    class="btn text-danger border border-danger btn-sm">
                                    <i class="fas fa-trash" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="d-block rounded bg-white shadow p-3">
                <p class="fs-5 fw-bold">Ringkasan Harga</p>
                <div class="d-flex mb-4">
                    <p>Subtotal</p>
                    <p class="ms-auto fw-bold">Rp. {{ number_format($subtotal,0,',','.') }}</p>
                </div>
                <div class="d-grid gap-2">
                    <a href="{{ route('checkout') }}" class="btn btn-orange">CHECKOUT</a>
                    <a href="{{ route('product') }}" class="btn btn-light btn-outline-orange">LANJUT BELANJA</a>
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

    <script>
        document.addEventListener('show-delete-Confrim', function() {
            Swal.fire({
                    title: "Apa anda yakin?",
                    text: "Menghapus produk pesanan anda!!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, hapus!'
                })
                .then((willDelete) => {
                    if (willDelete.isConfirmed) {
                        Livewire.emit('goDeleteCart');
                        Swal.fire("Delete","Pesanan anda telah terhapus!", "success");
                    } else {
                        Swal.fire("Pesanan anda tetap aman!");
                    }
                });
        })
    </script>
</div>