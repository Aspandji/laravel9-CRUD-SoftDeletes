@extends('dashboard.layouts.main')

@section('container')
    <div
        class="col-lg-8 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Marketing</h1>
    </div>

    <div class="col-lg-8">
        <form action="#" method="" class="mb-5">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Name</label>
                <input type="text" class="form-control" readonly value="{{ $user->name }}" />
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">NIP</label>
                <input type="text" class="form-control" readonly value="{{ $user->nip }}" />
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <textarea class="form-control" style="height: 100px" readonly>{{ $user->address }}</textarea>
            </div>
        </form>
    </div>
@endsection
