@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">List Penjualan</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-6" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive my-4">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Sales</th>
                    <th scope="col">Nama Customer</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Foto KTP</th>
                    <th scope="col">Paket</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                    <tr class="{{ $sale->status == 'not-approved' ? '' : 'bg-success text-dark bg-opacity-25' }}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $sale->user->name }}</td>
                        <td>{{ $sale->name }}</td>
                        <td>{{ $sale->phone }}</td>
                        <td><img src="{{ asset('storage/' . $sale->image) }}" class="img-fluid" style="max-height: 100px;">
                        </td>
                        <td>{{ $sale->packet->name }}</td>
                        <td>{{ $sale->status }}</td>
                        <td>
                            <a href="/dashboard/sales/{{ $sale->slug }}/edit" class="badge bg-warning"><span
                                    data-feather="edit"></span></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
