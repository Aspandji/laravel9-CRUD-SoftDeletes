@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">List Paket</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-6" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive col-lg-8">
        <a href="/dashboard/paket/create" class="btn btn-primary btn-sm mb-3">Tambah Paket</a>
        <a href="/dashboard/paket/trashed" class="btn btn-secondary btn-sm mb-3">View Trashed Data</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($packets as $packet)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $packet->name }}</td>
                        <td>Rp. {{ number_format($packet->price) }}</td>
                        <td>
                            {{-- <a href="/dashboard/marketing/{{ $packet->slug }}" class="badge bg-info"><span
                                    data-feather="eye"></span></a> --}}
                            <a href="/dashboard/paket/{{ $packet->slug }}/edit" class="badge bg-warning"><span
                                    data-feather="edit"></span></a>
                            <form action="/dashboard/paket/{{ $packet->slug }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are You Sure?')"><span
                                        data-feather="x-circle"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
