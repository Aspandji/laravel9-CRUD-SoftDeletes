@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Account</h1>
    </div>

    <div class="col-lg-6">
        <form action="/dashboard/marketing/{{ $user->slug }}" method="POST" class="mb-5">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    placeholder="Jhon Doe" required autofocus value="{{ old('name', $user->name) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip"
                    placeholder="0723876567" required autofocus value="{{ old('nip', $user->nip) }}">
                @error('nip')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control rounded-top @error('password') is-invalid @enderror"
                    name="password" id="password" placeholder="Password" value="{{ old('password', $user->password) }}"
                    required>
                <label for="password">Password</label>
                @error('password')
                    <div id="password" class="invalid-tooltip">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <textarea class="form-control rounded-top @error('address') is-invalid @enderror" name="address" id="address"
                    placeholder="Jl. Semoga Berkah" style="height: 100px" required value="{{ old('address') }}">{{ $user->address }}</textarea>
                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Edit Account</button>
        </form>
    </div>
@endsection
