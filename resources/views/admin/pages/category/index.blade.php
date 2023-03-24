@extends('admin.layouts.panel')

@section('head')
<title>estore - product pages</title>
@endsection

@section('pages')
<div class="container-fluid">
    <div class="row gy-3">
        <div class="col-12">
            <div class="d-block bg-white rounded shadow p-3">
                <p class="fs-4 fw-bold mb-0">Main Category Product</p>
            </div>
        </div>
        <div class="col-12">
            @livewire('admin.category.category-main')
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    window.livewire.on('isModals', () => {
        $('#ctgModal').modal('hide');
    });
    livewire.on('showSubCategoryModal', () => {
            $('#subCtgModal').modal('show');
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
@endsection