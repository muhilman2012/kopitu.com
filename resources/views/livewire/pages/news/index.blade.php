<div>
    <div class="d-flex align-items-center w-100 border-bottom py-3 mb-4">
        <div class="dropend">
            <button class="btn btn-outline-orange rounded-0 dropdown-toggle" type="button" id="dropdownMenuButton1"
                data-bs-toggle="dropdown" aria-expanded="false">
                Semua Halaman
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">12 Halaman</a></li>
                <li><a class="dropdown-item" href="#">25 Halaman</a></li>
                <li><a class="dropdown-item" href="#">50 Halaman</a></li>
            </ul>
        </div>
        <div class="d-block position-relative ms-auto">
            <input wire:model="search" type="text" name="search" class="form-control border border-orange rounded-0"
                placeholder="Cari berita terbaru" style="padding-right: 90px;">
            <button class="btn btn-outline-orange rounded-0 position-absolute top-0 end-0 px-4" type="button"
                id="button-addon2">
                <i class="fas fa-search fa-fw"></i>
            </button>
        </div>

    </div>
    @if ($data->count() != 0)    
    @foreach ($data as $item)
    <div class="card border-0 mb-4">
        <div class="row g-0">
            <div class="col-12 col-sm-4">
                <img src="{{ url('/images/news/' . $item->images) }}" class="img-fluid rounded" alt="...">
            </div>
            <div class="col-12 col-sm-8">
                <div class="card-body px-0 px-sm-2 px-md-3 py-sm-0 py-md-0">
                    <a href="{{ route('index.berita.detail', ['slug' => $item->slug, 'id' => $item->id_news ]) }}"
                        class="card-title fs-5 link-orange text-decoration-none mb-0">{{ $item->title }}</a>
                    <p class="card-text mb-2 mb-sm-1"><small class="text-muted">Last updated {{ date('d F Y', strtotime($item->created_at)) }}</small></p>
                    <p class="card-text card-content-text">{{ $item->description }}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @else
    <div class="card border-0 mb-4">
        <div class="row g-0">
            <div class="col-12">
                <div class="d-block rounded bg-white shadow p-3">
                    <div class="text-center p-3">
                        <i class="fas fa-list fa-2x fa-fw mb-4"></i>
                        <p class="mb-2 fs-5 text-secondary">Oops belum ada berita saat ini</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <nav class="d-block pt-4">
        @if ($data->hasPages())
        <nav class="d-block pt-4">
            {{ $data->links('livewire.pages.news.paginations') }}
        </nav>
        @endif
    </nav>
</div>