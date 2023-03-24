@extends('admin.layouts.panel')


@section('head')
    <title>KOPITU E-Store - Dashboard Admin</title>
@endsection


@section('pages')
    <div class="container-fluid">
        <div class="row g-2 mb-3">
            <div class="col-12">
                <div class="d-block bg-white rounded shadow p-3">
                    <h2>Welcome in dashboard</h2>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <div class="d-flex bg-white shadow rounded p-3 align-items-center justify-content-between">
                    <p class="fw-bold fs-5 text-secondary mb-0 text-capitalize">Transaction Income</p>
                    <div class="lh-sm">
                        <p class="fw-bold fs-5 mb-0">Rp. {{ number_format($income, 0, ',', '.') }}</p>
                        <small class="text-warning d-block text-end">+ Rp.
                            {{ number_format($pendingIncome, 0, ',', '.') }}</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <div class="card p-2 shadow">
                    <div class="d-flex align-items-center px-2">
                        <i class="fas fa-boxes float-start fa-3x py-auto "></i>
                        <div class="card-body text-end">
                            <p class="card-title fs-2 mb-0">{{ $product }}</p>
                        </div>
                    </div>
                    <div class="card-footer bg-white px-1">
                        <small class="text-start fw-bold">Product</small>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <div class="card p-2 shadow">
                    <div class="d-flex align-items-center px-2">
                        <i class="fas fa-truck fa-3x fa-fw"></i>
                        <div class="card-body text-end">
                            <p class="card-title fs-2 mb-0">{{ $soldOut }}</p>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <small class="text-start fw-bold">Product sent</small>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <div class="card p-2 shadow">
                    <div class="d-flex align-items-center px-2">
                        <i class="fas fa-money-check-alt fa-3x"></i>
                        <div class="card-body text-end">
                            <p class="card-title fs-2 mb-0">{{ $transaction }}</p>
                        </div>
                    </div>
                    <div class="card-footer bg-white px-1">
                        <small class="text-start fw-bold">Transaction</small>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <div class="card p-2 shadow">
                    <div class="d-flex align-items-center px-2">
                        <i class="fa fa-users float-start fa-3x py-auto" aria-hidden="true"></i>
                        <div class="card-body text-end">
                            <p class="card-title fs-2 mb-0">{{ $user }}</p>
                        </div>
                    </div>
                    <div class="card-footer bg-white px-1">
                        <small class="text-start fw-bold">Your Customer</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-2">
            <div class="col-12 col-lg-6">
                <div class="d-block rounded shadow bg-white p-3">
                    <canvas id="myChartOne"></canvas>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="d-block rounded shadow bg-white p-3">
                    <canvas id="myChartTwo"></canvas>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
@endsection
