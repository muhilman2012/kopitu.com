<div>
    <div class="d-block py-3">
        <div class="container">
            <div class="py-2 mb-3">
                <h4 class="text-capitalize text-orange fw-light mb-0">Kebutuhan Bisnis</h4>
            </div>
            <div class="row gy-3">
                <div class="col-12 col-md-6">
                    <div class="position-relative">
                        <img src="{{ url('/images/banner/request.png') }}" alt="request" class="img-fluid rounded">
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="position-relative">
                        <div class="d-flex py-2">
                            <p class="fs-5 fw-bold text-orange">Permintaan Terbaru</p>
                        </div>
                        <div class="d-block h-100 mb-3">
                            @foreach($data as $items)
                            <div class="d-flex mb-2">
                                <div class="col-2">
                                    @livewire('pages.request.images', ['post' => $items->id_rfq])
                                </div>
                                <div class="flex-grow-1 ms-3 overflow-hidden">
                                    <p class="fw-bold mb-0"> {{ $items->qty }} {{ $items->units }}  | {{ $items->product_name }}</p>
                                    <small class="d-block text-truncate">{{ $items->description }}</small>
                                    <small class="text-secondary fw-light">Berakhir pada {{ date('d F Y',
                                        strtotime($items->created_at)) }}</small>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="d-flex align-items-center pt-3">
                            <a href="{{ route('rfq.data') }}" class="link-orange">Lihat Semua Permintaan</a>
                            @auth ('user')
                            <a href="{{ route('rfq') }}" class="btn btn-outline-orange ms-auto"><small>Buat Permintaan</small></a>
                            @else
                            <a href="{{ route('login') }}" class="btn btn-outline-orange ms-auto"><small>Buat Permintaan</small></a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
