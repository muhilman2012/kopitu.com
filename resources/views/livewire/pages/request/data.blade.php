<div>
    <div class="py-3">
        <div class="container">
            <div class="d-flex">
                <div class="me-auto">
                    <input wire:model='search' type="text" class="form-control" placeholder="cari permintaan">
                </div>
                <div class="d-flex align-items-center">
                    <label for="" class="form-label me-2 m-1 d-none d-md-block">Urutkan</label>
                    <select name="" id="" class="form-select">
                        <option value="">terbaru</option>
                        <option value="">judul</option>
                        <option value="">masa penawaran</option>
                        <option value="">jumlah pesanan</option>
                        <option value="">jumlah penawaran</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="py-3">
        <div class="container mb-5">
            @if($data->count() != 0)
            @foreach($data as $items)
            <div class="d-block rounded overflow-hidden mb-3">
                <div class="row g-0 border p-3 p-md-0">
                    <div class="col-4 col-md-3 col-lg-2">
                        @livewire('pages.request.images', ['post' => $items->id_rfq])
                    </div>
                    <div class="col-8 col-lg-10">
                        <div class="row g-0">
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="px-3 py-0 py-md-3">
                                    <p class="fw-bold mb-0">{{ $items->product_name }}</p>
                                    <small class="d-none d-md-block">{{ $items->description }}</small>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 overflow-hidden pb-4">
                                <div class="px-3 py-0 py-md-3">
                                    <small class="d-block fw-bold mb-0">Jumlah pemesanan</small>
                                    <small class="d-block fw-bold mb-0 text-orange">{{ $items->qty }} {{ $items->units
                                        }}</small>
                                    <small class="d-block fw-bold mb-0">Masa penawaran</small>
                                    <small class="d-block fw-bold mb-0 text-orange">Berakhir pada {{ date('d F Y',
                                        strtotime($items->created_at)) }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-inline d-md-none">
                        <div class="d-block">
                            <small>{{ $items->description }}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="d-block rounded bg-white shadow mb-3">
                <div class="text-center p-5">
                    <i class="fas fa-comment-alt-edit fa-4x fa-fw mb-4"></i>
                    <p class="fs-5 mb-2">Oops, belum ada permintaan</p>
                    <p class="text-secondary">yuk penuhi kebutuhan bisniskamu dengan membuat permintaan</p>
                    @auth ('user')
                    <a href="{{ route('rfq') }}" class="btn btn-outline-orange px-5"><small>Buat Permintaan</small></a>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-outline-orange px-5"><small>Buat
                            Permintaan</small></a>
                    @endauth
                </div>
            </div>
            @endif
        </div>
        <div class="container">
            <div class="d-flex flex-column flex-sm-row justify-content-center justify-content-md-between">
                <div class="text-center">
                    @auth ('user')
                    <a href="{{ route('rfq') }}" class="btn btn-outline-orange px-5"><small>Buat Permintaan</small></a>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-outline-orange px-5"><small>Buat
                            Permintaan</small></a>
                    @endauth
                </div>
                @if ($data->hasPages())
                <div class="d-flex align-items-center justify-content-center order-sm-1">
                    {{ $data->links('livewire.pages.request.data-paginations') }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>