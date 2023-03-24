<div>
    <div class="d-block bg-white shadow">
        <div class="p-3 border-bottom">
            <p class="fs-5 fw-bold mb-0">Daftar Transaksi</p>
        </div>
        <div class="p-3">
            <div class="d-flex flex-column flex-lg-row mb-4 py-1">
                <nav class="nav nav-pills">
                    <a wire:click="sort('all')" class="nav-link @if($nav == 'all') active @endif"
                        href="#semua">semua</a>
                    <a wire:click="sort('progress')" class="nav-link @if($nav == 'progress') active @endif"
                        href="#berlangsung">berlangsung</a>
                    <a wire:click="sort('success')" class="nav-link @if($nav == 'success') active @endif"
                        href="#berhasil">berhasil</a>
                    <a wire:click="sort('failed')" class="nav-link @if($nav == 'failed') active @endif"
                        href="#tidak-berhasil">tidak berhasil</a>
                </nav>
                <div class="position-relative ms-auto">
                    <input type="text" class="form-control" placeholder="Cari Transaksi..." style="padding-right: 64px">
                    <a href="#" class="btn position-absolute top-0 end-0">
                        <i class="fas fa-search"></i>
                    </a>
                </div>
            </div>
            <div>
                @foreach ($data as $index => $item)
                <div class="d-block border rounded mb-3">
                    <div class="d-flex align-items-center border-bottom px-3 py-2">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-shopping-bag fa-2x fa-fw text-success"></i>
                            <div class="d-block ms-2 lh-sm">
                                <small class="d-block mb-0 fw-bold">Belanja</small>
                                <small class="d-block mb-0 text-secondary">{{ date('d F Y', strtotime($item->date)) }}</small>
                            </div>
                        </div>
                        <p class="mb-0 pb-2 badge bg-primary fw-bold ms-auto">{{ $item->status }}</p>
                    </div>
                    <div class="d-block p-3">
                        @foreach($dataProduct[$index] as $product)
                        <div class="d-flex position-relative mb-2">
                            <img src="{{ url('/images/product/' . $product->images) }}" alt="product_name" class="rounded" width="64px">
                            <div class="d-block ms-3 lh-sm pt-1">
                                <p class="fw-bold mb-1 text-elipsis">{{ $product->product_name }}</p>
                                <small class="text-secondary">{{ $product->qty }} Barang x Rp {{ number_format($product->price,'0',',','.') }}</small>
                            </div>
                            <a href="{{ route('product.detail', ['slug' => $product->slug ])  }}" class="stretched-link"></a>
                        </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-between align-items-center px-3 py-2 border-top">
                        <div class="d-block lh-sm">
                            <small class="d-block text-secondary">Total Belanja</small>
                            <p class="m-0 fw-bold">Rp. {{ number_format($item->price,'0',',','.') }}</p>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="{{ route('user.transaction.detail', ['id' => $item->id_transaction]) }}" class="link-secondary text-decoration-none me-2">Lihat Transaksi</a>
                            <div class="dropstart">
                                <button class="btn btn-outline-orange btn-sm" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-h fa-lg"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                  <li><a class="dropdown-item" href="#">Beli Lagi</a></li>
                                  <li><a class="dropdown-item" href="#">Tanya Penjualan</a></li>
                                  @if($item->status == 'menunggu-konfirmasi')
                                  <li><a class="dropdown-item" href="#">Batalkan Pesanan</a></li>
                                  @endif
                                </ul>
                              </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>