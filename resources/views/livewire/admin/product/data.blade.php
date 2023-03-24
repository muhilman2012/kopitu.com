<div>
    <div class="d-block bg-white rounded shadow p-3">

        <div class="d-flex mb-3">
            <a href="{{ route('admin.product.create') }}" class="btn btn-primary">
                <i class="fas fa-plus fa-lg fa-fw d-block d-md-none mt-1"></i>
                <span class="d-none d-md-block">Tambah</span>
            </a>
            <div class="position-relative ms-auto">
                <input wire:model="search" type="text" class="form-control" style="padding-right: 58px"
                    placeholder="Search...">
                <button class="btn position-absolute top-0 end-0" wire:click="searching()">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>

        <div class="d-block mb-3 table-responsive">
            <table class="table table-borderless mb-4">
                <thead class="alert-secondary">
                    <tr>
                        <th scope="col">#</th>
                        <th>Images</th>
                        <th scope="col">
                            <div class="d-flex">
                                <span>Product Name</span>
                                @if ($shortName === true)
                                <button wire:click='productName' class="btn py-0 ms-auto"><i
                                        class="fas fa-sort-alpha-up"></i></button>
                                @else
                                <button wire:click='productName' class="btn py-0 ms-auto"><i
                                        class="fas fa-sort-alpha-down"></i></button>
                                @endif
                            </div>
                        </th>
                        <th scope="col">
                            <div class="d-flex">
                                <span>Stock</span>
                                <button class="btn py-0 ms-auto"><i class="fas fa-sort-alpha-up"></i></button>
                            </div>
                        </th>
                        <th scope="col">
                            <div class="d-flex">
                                <span>Price</span>
                                <button class="btn py-0 ms-auto"><i class="fas fa-sort-alpha-up"></i></button>
                            </div>
                        </th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $item)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>
                            <img src="{{ url('/images/product/' . $item->images ) }}" alt="" width="64px" class="rounded">
                        </td>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->stock }}</td>
                        <td>Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('admin.product.edit', ['id' => $item->id_product]) }}"
                                class="btn text-warning p-0">
                                <i class="fas fa-edit fa-lg fa-fw"></i>
                            </a>
                            <a href="#" class="btn text-primary p-0 mx-2">
                                <i class="fas fa-eye fa-lg fa-fw"></i>
                            </a>
                            <button wire:click="removed({{ $item->id_product }})" type="button"
                                class="btn text-danger p-0">
                                <i class="fas fa-trash fa-lg fa-fw"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex align-items-center">
                <p class="mb-0 border py-1 px-2">
                    <span class="fw-bold">{{ $data->count() }}</span>
                </p>
                @if ($data->hasPages())
                <nav class="ms-auto">
                    {{ $data->links('livewire.admin.product.paginate') }}
                </nav>
                @endif
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('deleteConfrimed', function() {
            Swal.fire({
                    title: "Delete?",
                    text: "Are you sure to delete this product?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete!',
                    cancelButtonText: 'Tidak',
                })
                .then((next) => {
                    if (next.isConfirmed) {
                        Livewire.emit('deleteAction');
                    } else {
                        Swal.fire("Your product is save!");
                    }
                });
        })
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