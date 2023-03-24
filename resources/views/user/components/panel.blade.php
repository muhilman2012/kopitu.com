<div class="d-block overflow-hidden rounded shadow">
    <div class="d-profile py-4">
        <div class="d-flex d-md-block align-items-center px-3">
            @if (auth('user')->user()->avatar == 'sample-avatar.png')
            <img src="{{ url('/images/avatar/' . auth('user')->user()->avatar) }}" alt="user_photos"
                class="rounded-circle mb-md-3" width="64px" height="64px">
            @else
            <img src="{{ url('/images/avatar/user/' . auth('user')->user()->avatar) }}" alt="user_photos"
                class="rounded-circle mb-md-3" width="64px" height="64px">
            @endif
            <div class="d-block ms-2 ms-md-0">
                <p class="fw-bold text-capitalize lh-sm mb-0">{{ auth('user')->user()->username }}</p>
                <small class="m-0 text-secondary text-truncate">{{ auth('user')->user()->email }}</small>
            </div>
        </div>
    </div>
    <div class="accordion accordion-flush rounded-0" id="myAccordion">
        <div class="accordion-item">
            <button class="accordion-button px-3" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseOne">
                Profile Saya
            </button>
            <div id="flush-collapseOne" class="accordion-collapse collapse show" data-bs-parent="#myAccordion">
                <div class="nav flex-column nav-pills">
                    <a href="{{ route('user.index') }}"
                        class="nav-link link-orange text-start px-4 rounded-0">Biodata</a>
                    <a href="{{ route('user.wishlist') }}"
                        class="nav-link link-orange text-start px-4 rounded-0">Wishlist</a>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <button class="accordion-button px-3 collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseTwo">
                Pembelian
            </button>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#myAccordion">
                <div class="nav flex-column nav-pills">
                    <a href="{{ route('user.transaction.payment') }}"
                        class="nav-link link-orange text-start px-4 rounded-0">Menunggu Pembayaran</a>
                    <a href="#"
                        class="nav-link link-orange text-start px-4 rounded-0">Pengiriman</a>
                    <a href="{{ route('user.transaction') }}"
                        class="nav-link link-orange text-start px-4 rounded-0">Daftar Transaksi</a>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <button class="accordion-button px-3 collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseThree">
                Kotak Masuk
            </button>
            <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#myAccordion">
                <div class="nav flex-column nav-pills">
                    <a href="#" class="nav-link link-orange text-start px-4 rounded-0">Chat</a>
                    <a href="#" class="nav-link link-orange text-start px-4 rounded-0">Diskusi Produk</a>
                    <a href="#" class="nav-link link-orange text-start px-4 rounded-0">Ulasan</a>
                    <a href="#" class="nav-link link-orange text-start px-4 rounded-0">Pesan dikomplain</a>
                </div>
            </div>
        </div>
    </div>
    <button class="btnLogout btn rounded-0 text-start p-3 w-100 border-top" type="button">Logout</button>
</div>