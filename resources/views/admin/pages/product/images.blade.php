@extends('admin.layouts.panel')

@section('head')
<title>estore - upload multiple images</title>
<link rel="stylesheet" href="{{ url('/dist/assets/css/admin/product.css') }}">
@endsection

@section('pages')
<div class="container-fluid">
    <div class="d-block rounded bg-white shadow p-3 mb-3">
        <h2>Upload images product</h2>
    </div>
    <div class="d-block bg-white rounded shadow p-3 mb-3">
        <form class="bg-success-secondary d-flex justify-content-between align-items-center p-3"
            action="{{ route('admin.product.images.store', ['id' => $data->id_product]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <span class="fw-bold">Tambahkan Image</span>
            <label for="newImages" class="btn btn-success p-1">
                <i class="fas fa-plus fa-fw"></i>
            </label>
            <input type="file" name="images[]" class="d-none gallery-photo-add" multiple id="newImages"
                onchange="uploadMultipleImg()">
            <input type="submit" id="prosesuploadfoto" class="d-none">
        </form>
    </div>

    @if($images->count() != 0)
    <div class="d-block bg-white rounded shadow p-3 mb-3">
        <div class="row g-0 gallery-product">
            @foreach($images as $img)
            <div class="col-6 col-md-4 col-lg-3 p-2" id="data-image">
                <img src="{{ url('/images/product/multiple/'. $img->locations) }}" alt="product" class="image-fields">
                <button class="removeImages btn-image-fields btn" type="button" key="{{ $img->id_product_images }}">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <div class="d-block bg-white rounded shadow p-3 mb-3">
        <a href="{{ route('admin.product') }}" class="btn btn-outline-primary">
            <i class="fas fa-caret-left"></i> Go To Product
        </a>
    </div>
</div>
@endsection

@section('script')
<script src="{{ url('/dist/assets/js/admin/product.js') }}"></script>
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