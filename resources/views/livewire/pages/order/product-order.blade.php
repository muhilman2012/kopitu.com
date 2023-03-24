<div>
    <div class="d-block">
        <div class="alert alert-warning py-1" role="alert">
            <p class="mb-0">Atur Jumlah pesanan</p>
        </div>
        <div class="mb-3">
            <div class="input-group">
                <button class="btn btn-outline-orange" type="button" wire:click="kurang">
                    <i class="fas fa-minus fa-fw"></i>
                </button>
                <input type="number" id="jumlah" class="text-center form-control px-5" min="1" max="999" minlength="1"
                    maxlength="999" value="{{ $qty }}" disabled>
                <button class="btn btn-outline-orange" type="button" wire:click="tambah">
                    <i class="fas fa-plus fa-fw"></i>
                </button>
            </div>
        </div>
        <div class="mb-3">
            <button id="order" wire:click="order" class="btn btn-orange form-control">Tambah Keranjang</button>
        </div>
        <nav class="nav nav-pills nav-fill">
            <a class="nav-link link-dark py-2 border" href="#">
                <i class="fas fa-comment-dots"></i> Chat
            </a>
            <a wire:click="wishlist" class="nav-link link-dark py-2 border" type="button">
                <i class="fas fa-heart @if($wishlist == true) text-danger @else text-dark @endif"></i> Wishlist
            </a>
            <a class="nav-link link-dark py-2 border" href="#">
                <i class="fas fa-share"></i> Share
            </a>
        </nav>
    </div>


    @if(session()->has('popup'))
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="{{ url('/images/logo/kopitu-estore.png') }}" class="rounded me-2" alt="logo"
                    width="64px">
                <strong class="me-auto">Kopitu</strong>
                <small>Pesan</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session()->get("popup") }}
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('showPopup', function() {
              var myToastEl = document.getElementById('liveToast');
              myToastEl.show();
          });
        function copyLink() {
          var copyText = window.location.href;
          navigator.clipboard.writeText(copyText);
          alert("Tautan telah berhasil disalin ke papan klip!");
        }
    </script>
    @endif

    @if(session()->has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Good Jobs!',
            text: '{{ session()->get("success") }}',
            showConfirmButton: false,
            timer: 2000
        })
    </script>
    @elseif(session()->has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Opps...!',
            text: '{{ session()->get("error") }}',
            showConfirmButton: false,
            timer: 2000
        })
    </script>
    @endif
</div>