<div>
    <div class="d-flex flex-column flex-lg-row bg-white rounded-3 shadow p-3 mb-4">
        <div class="text-center text-lg-start mb-3">
            @if (auth('user')->user()->avatar == 'sample-avatar.png')
            <img src="{{ url('/images/avatar/' . auth('user')->user()->avatar) }}" alt="user_photos" class="img-profile-upload"
            width="100px" height="100px">
            @else
            <img src="{{ url('/images/avatar/user/' . auth('user')->user()->avatar) }}" alt="user_photos"
            class="img-profile-upload" width="100px" height="100px">
            @endif
        </div>
        <div class="ms-lg-4 mb-3 flex-fill text-center text-lg-start">
            <p class="fw-bold fs-4 mb-0 text-capitalize">{{ auth('user')->user()->username }}</p>
            <p class="mb-2">{{ auth('user')->user()->email }}</p>
            <button class="btn btn-outline-orange btn-sm" wire:click='showImagesModals'>Ubah Foto</button>
        </div>
    </div>

    <div class="d-block bg-white rounded-3 shadow mb-4">
        <div class="d-flex p-3 border-bottom align-items-center">
            <p class="fw-bold mb-0 fs-5">BIODATA</p>
            <a wire:click="edit" type="button" class="btn btn-outline-orange btn-sm ms-auto">
                <i class="fas fa-pencil-alt fa-sm fa-fw"></i>
            </a>
        </div>
        <div class="d-block mb-4 p-3">
            <div class="d-flex mb-3 p-1">
                <small class="text-bio">NAMA</small>
                <small class="text-capitalize">{{ auth('user')->user()->username }}</small>
            </div>
            <div class="d-flex mb-3 p-1">
                <small class="text-bio">TANGGAL LAHIR</small>
                <small>@if(auth('user')->user()->born == null) --/--/---- @else{{ date('d F Y',
                    strtotime(auth('user')->user()->born)) }}@endif</small>
            </div>
            <div class="d-flex mb-3 p-1">
                <small class="text-bio">JENIS KELAMIN</small>
                <small class="text-uppercase">@if(auth('user')->user()->gender == null) - @else{{ auth('user')->user()->gender
                    }}@endif</small>
            </div>
        </div>
    </div>

    <div class="d-block bg-white rounded-3 shadow mb-4">
        <div class="d-flex p-3 border-bottom align-items-center">
            <p class="fw-bold mb-0 fs-5">KONTAK</p>
            <a wire:click="editContact" type="button" class="btn btn-outline-orange btn-sm ms-auto">
                <i class="fas fa-pencil-alt fa-sm fa-fw"></i>
            </a>
        </div>
        <div class="d-block p-3">
            <div class="d-flex mb-3 p-1">
                <small class="text-bio">EMAIL</small>
                <small>{{ auth('user')->user()->email }}</small>
            </div>
            <div class="d-flex mb-3 p-1">
                <small class="text-bio">TELEPON</small>
                <small>@if(auth('user')->user()->phone == null) - @else{{ auth('user')->user()->phone
                    }}@endif</small>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="imagesModals" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Images Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body placeholder-glow">
                    @if($images)
                    <div class="d-flex mb-3">
                        <img src="{{ $images->temporaryUrl() }}" width="80%" class="mx-auto">
                    </div>
                    @endif
                    <div class="mb-3">
                        <label for="images" class="form-label">Input Gambar</label>
                        <input type="file" name="images" id="uploadImages" wire:model='images' class="form-control @error('username') is-invalid @enderror"
                            wire:loading.class='placeholder' wire:target='images'>
                        @error('images')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:loading.attr="disabled"
                        wire:target='images'>Close</button>
                    <button wire:click='storeImages' type="button" class="btn btn-primary" wire:loading.attr="disabled"
                        wire:target='images'>Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="editModals" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body placeholder-glow">
                    <div class="mb-3">
                        <label for="username" class="form-label">Nama Lengkap</label>
                        <input wire:model='username' type="text" name="username" id="username"
                            class="form-control @error('username') is-invalid @enderror"
                            wire:loading.class='placeholder' wire:target='store'>
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="born" class="form-label">Tanggal Lahir</label>
                        <input wire:model='born' type="date" name="born" id="born" class="form-control"
                            wire:loading.class='placeholder' wire:target='store'>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select wire:model='gender' name="gender" id="gender" class="form-select"
                            wire:loading.class='placeholder' wire:target='store'>
                            <option value="">Pilih jenis kelamin</option>
                            <option value="pria">Pria</option>
                            <option value="wanita">Wanita</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:loading.attr="disabled"
                        wire:target='store'>Close</button>
                    <button wire:click='store' type="button" class="btn btn-primary" wire:loading.attr="disabled"
                        wire:target='store'>Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="contactModals" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body placeholder-glow">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Kamu</label>
                        <input wire:model='email' type="text" name="email" id="email" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Nomor Telepon</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">+62</span>
                            <input wire:model='phone' type="text" name="phone" id="phone"
                            class="form-control @error('phone') is-invalid @enderror" wire:loading.class='placeholder'
                            wire:target='store'>
                          </div>
                        @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:loading.attr="disabled"
                        wire:target='store'>Close</button>
                    <button wire:click='storeContact' type="button" class="btn btn-primary" wire:loading.attr="disabled"
                        wire:target='store'>Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('/dist/assets/js/jquery.js') }}"></script>
    <script>
        document.addEventListener('showModals', function() {
              var editModal = $('#editModals');
              editModal.modal('show');
          });
          document.addEventListener('expandModals', function() {
            var editModal = $('#editModals');
            editModal.modal('hide');
          });
          document.addEventListener('showContactModals', function() {
            var editModal = $('#contactModals');
            editModal.modal('show');
          });
          document.addEventListener('expandContactModals', function() {
            var editModal = $('#contactModals');
            editModal.modal('hide');
          });
          document.addEventListener('imagesModalsShow', function() {
            var editModal = $('#imagesModals');
            editModal.modal('show');
          });
          document.addEventListener('imagesModalsExpand', function() {
            var editModal = $('#imagesModals');
            editModal.modal('hide');
          });
    </script>
    @if(session()->has('success'))
    <script>
        Swal.fire({
              icon: 'success',
              title: 'Good Jobs!',
              text: '{{ session()->get("success") }}',
              showConfirmButton: false,
              timer: 2500
          })
          location.reload();
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