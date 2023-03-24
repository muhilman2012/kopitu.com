<div>
    <div class="py-3 py-md-4">
        <div class="container">
            <div class="d-flex mb-3 py-2">
                <div class="col">
                    <h4 class="text-capitalize text-orange fw-light mb-0">Berita seputar bisnis</h4>
                    <p class="text-secondary mb-0">Cari berita seputar bisnis.</p>
                </div>
                <a href="{{ route('index.berita') }}" class="btn btn-outline-orange btn-sm px-3 align-self-center rounded-pill">
                    Semua <i class="fal fa-arrow-right ms-2"></i>
                </a>
            </div>
            <div class="row g-4">
                @foreach ($data as $item)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card border-0 shadow">
                        <img src="{{ url('/images/news/'. $item->images) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="fw-bold text-ellipsis lh-base mb-1">{{ $item->title }}</p>
                            <small class="d-block text-orange mb-2">Tanggal, {{ date('d F Y', strtotime($item->created_at)) }}</small>
                            <p class="text-ellipsis-4">{{ $item->description }}</p>
                            <a href="{{ route('index.berita.detail', ['slug' => $item->slug, 'id' => $item->id_news]) }}" class="link-orange stretched-link">Selengkapnya <i class="fas fa-arrow-right fa-sm fa-fw"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
