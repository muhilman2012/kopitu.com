<div>
    <div class="d-block bg-white rounded shadow p-3">
        <div class="d-flex mb-3">
            <a wire:click="create" type="button" class="btn btn-primary">Tambah</a>
            <div class="d-block position-relative ms-auto">
                <input type="text" class="form-control" placeholder="Search..." style="padding-right: 46px">
                <button class="btn position-absolute top-0 end-0">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>

        <div class="d-block">
            @foreach ($data as $index => $item)
            <div class="border border-secondary rounded mb-2">
                <div class="d-flex p-2 border-bottom">
                    <p class="fw-bold text-capitalize mb-1 fs-5 ms-2">{{ $item->categories_sub }}</p>
                    <div class="d-flex align-items-center ms-auto">
                        <a class="btn btn-outline-secondary btn-sm me-2"
                            wire:click="addChild({{ $item->id_categories_sub }})" type="button">
                            <i class="fas fa-plus fa-sm fa-fw"></i> <span
                                class="d-none d-sm-inline d-md-none d-lg-inline">Add</span>
                        </a>
                        <a class="btn btn-outline-secondary btn-sm me-2"
                            wire:click="edit({{ $item->id_categories_sub }})" type="button">
                            <i class="fas fa-pencil-alt fa-sm fa-fw"></i> <span
                                class="d-none d-sm-inline d-md-none d-lg-inline">Edit</span>
                        </a>
                        <a class="btn btn-outline-secondary btn-sm me-2"
                            wire:click="prepareDelete({{ $item->id_categories_sub }})" type="button">
                            <i class="fas fa-trash fa-sm fa-fw"></i> <span
                                class="d-none d-sm-inline d-md-none d-lg-inline">Delete</span>
                        </a>
                    </div>
                </div>
                @if(count($childData) != 0)
                    <ul class="list-group list-group-flush">
                        @foreach ($childData[$item->id_categories_sub] as $items)
                        <li class="list-group-item d-flex align-items-center">
                            <p class="mb-0 d-inline">{{ $items['categories_child'] }}</p>
                            <button wire:click="deleteChild({{ $items['id_categories_child'] }})"
                                class="btn btn-outline-secondary btn-sm p-1 py-0 ms-auto">
                                <i class="fas fa-times fa-sm fa-fw"></i>
                            </button>
                        </li>
                        @endforeach
                    </ul>
                @else
                <div class="d-block bg-white text-center p-3">
                    <i class="fas fa-box-open fa-2x fa-fw mb-3"></i>
                    <p class="fs-5 fw-bold mb-0">Oops</p>
                    <p class="mb-0">belum ada data sub category</p>
                </div>
                @endif
            </div>
            @endforeach
        </div>

    </div>

    <div wire:ignore.self class="modal fade" id="ctgModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Sub Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="label" class="form-label">Sub Category</label>
                            <input wire:model="label" type="text" name="label" id="label"
                                class="form-control @error('label') is-invalid @enderror">
                            @error('label')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click.prevent="store()">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="ctgEditModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Sub Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="label" class="form-label">Category</label>
                            <input wire:model="label" type="text" name="label" id="label"
                                class="form-control @error('label') is-invalid @enderror">
                            @error('label')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-warning" wire:click.prevent="update()">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="childCateoryModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Child Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="label" class="form-label">Child Category Product</label>
                            <input wire:model="label" type="text" name="label" id="label"
                                class="form-control @error('label') is-invalid @enderror">
                            @error('label')
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click.prevent="storeChildCtg()">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('/dist/assets/js/jquery.js') }}"></script>
    <script>
        document.addEventListener('deleteConfrim', function() {
            Swal.fire({
                    title: "Delete!",
                    text: "Are you sure to delete category product!!!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete!',
                    cancelButtonText: 'Tidak',
                })
                .then((next) => {
                    if (next.isConfirmed) {
                        Livewire.emit('deleteAction');
                    }
                });
        })
        document.addEventListener('ctgModalShow', function() {
            $('#ctgModal').modal('show');
        })
        document.addEventListener('deleteChildCtg', function() {
            Swal.fire({
                    title: "Delete!",
                    text: "Are you sure to delete sub category product!!!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete!',
                    cancelButtonText: 'Tidak',
                })
                .then((next) => {
                    if (next.isConfirmed) {
                        Livewire.emit('deleteChildAction');
                    }
                });
        })
        document.addEventListener('showEdit', function() {
            var myModal = new bootstrap.Modal(document.getElementById('ctgEditModal'));
            myModal.show();
        })
        document.addEventListener('childCateoryModal', () => {
            // var subCtgModal = new bootstrap.Modal(document.getElementById('subCtgModal'))
            $('#childCateoryModal').modal('show');
        });
        document.addEventListener('childCategoryModalExpand', () => {
            // var subCtgModal = new bootstrap.Modal(document.getElementById('subCtgModal'))
            $('#childCateoryModal').modal('hide');
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