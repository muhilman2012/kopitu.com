@extends('layouts.panel')

@section('head')
<title>KOPITU E-Store - Checkout</title>
<link rel="stylesheet" href="{{url('/dist/assets/css/checkout.css')}}">
@endsection

@section('pages')
<div class="container py-4">
    <div class="row mb-4">
        @if(session('cart'))
        <div class="col-12">
            <div class="d-block rounded shadow">
                <div class="border-bottom p-3 d-block">
                    <h3 class="mb-0">Checkout Produk</h3>
                </div>
                <div class="d-block p-2 p-lg-3">
                    @foreach(session('cart') as $produk => $row)
                    <div class="d-flex alert alert-light p-0 mb-3">
                        <img src="{{ url('images/product/' . $row['images']) }}" class="img-tables"
                            alt="{{ $row['product_name'] }}">
                        <div class="d-block ms-4">
                            <span class="text-title-cart text-capitalize fw-bold text-dark lh-sm">
                                {{ $row['product_name'] }}
                            </span>
                            <span class="d-block mb-0 mb-md-2 mb-lg-2">Berat Produk {{ $row['weight'] }}Gr</span>
                            <span class="d-block fw-bold text-danger">Rp. {{number_format( $row['price'],0,',','.')
                                }}<small class="text-secondary ms-1"> x {{ $row['qty'] }} Qty.</small></span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
    @livewire('pages.checkout.index-checkout')
</div>
@endsection

@section('script')
<script type="text/javascript">
    livewire.on('addressModalExpand', () => {
        $('#addressModal').modal('hide');
    });

    livewire.on('ongkirModalExpand', () => {
        $('#ongkirModal').modal('hide');
    });

</script>
@endsection