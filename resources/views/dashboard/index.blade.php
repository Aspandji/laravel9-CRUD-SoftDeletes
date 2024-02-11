@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome, {{ auth()->user()->name }}</h1>
    </div>
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="/dashboard/marketing" class="text-decoration-none">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">List Marketing
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-dark">{{ $user_count }} Marketing</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="/dashboard/paket" class="text-decoration-none">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">List Paket Penjualan
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-dark">{{ $paket_count }} Paket Penjualan</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="/dashboard/sales" class="text-decoration-none">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-2">Data Penjualan
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-dark">{{ $sales_count }} Data Penjualan</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
