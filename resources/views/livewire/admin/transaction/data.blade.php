<div>
    <div class="d-flex mb-3">
        <div>
            <input type="text" class="form-control" placeholder="Cari Transaksi...">
        </div>
    </div>
    <div class="d-block">
        <table class="table table-borderless">
            <thead class="alert-secondary">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $index => $item)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $item->username }}</td>
                    <td>Rp. {{ number_format($item->price, 0, ',','.') }}</td>
                    <td>
                        @if ($item->status == 'pending')
                        <span class="badge bg-primary">{{ $item->status }}</span>
                        @elseif($item->status == 'sudah-bayar')
                        <span class="badge bg-warning">{{ $item->status }}</span>
                        @elseif($item->status == 'proses')
                        <span class="badge bg-info">{{ $item->status }}</span>
                        @elseif($item->status == 'selesai')
                        <span class="badge bg-success">{{ $item->status }}</span>
                        @else
                        <span class="badge bg-secondary">{{ $item->status }}</span>
                        @endif
                    </td>
                    <td>
                        {{ date("d F Y", strtotime($item->date)) }}
                    </td>
                    <td>
                        <a href="{{ route('admin.transaction.detail', ['id' => $item->id_transaction]) }}" class="btn btn-outline-secondary">
                            <i class="fas fa-pencil-alt fa-fw"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>