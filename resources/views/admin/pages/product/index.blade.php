@extends('admin.layouts.panel')

@section('head')
<title>KOPITU E-Store - Halaman Produk</title>
@endsection

@section('pages')
<div class="container-fluid">
    <div class="row gy-3">
        <div class="col-12">
            <div class="d-block bg-white rounded shadow p-3">
                <h2>Halaman Produk</h2>
            </div>
        </div>
        <div class="col-12">
            @livewire('admin.product.data')
        </div>
    </div>
</div>
@endsection

@section('script')
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
@endsection