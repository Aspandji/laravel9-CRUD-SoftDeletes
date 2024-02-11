@extends('dashboard.layouts.main')

@section('container')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Registrasi Customer</h1>
    </div>

    <div class="col-lg-8">
        <form action="/dashboard/sales" method="POST" enctype="multipart/form-data" class="mb-5">
            @csrf
            <input type="text" value="{{ $user->id }}" name="user_id" hidden>
            <div class="mb-3">
                <label for="name" class="form-label">Nama Customer</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    placeholder="Nama Customer" required autofocus value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">No Telepon</label>
                <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone"
                    name="phone" placeholder="0812345678" required autofocus value="{{ old('phone') }}">
                @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <textarea class="form-control rounded-top @error('address') is-invalid @enderror" name="address" id="address"
                    placeholder="Jl. Semoga Berkah" style="height: 100px" required value="{{ old('address') }}"></textarea>
                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="packet_id" class="form-label">Pilih Paket</label>
                <select class="form-control inputbox @error('packet_id') is-invalid @enderror" name="packet_id" required>
                    <option value="">-- Pilih Paket --</option>
                    @foreach ($packets as $packet)
                        @if (old('packet_id') == $packet->id)
                            <option value="{{ $packet->id }}" selected>{{ $packet->name }} - Rp.
                                {{ number_format($packet->price) }}</option>
                        @else
                            <option value="{{ $packet->id }}">{{ $packet->name }} - Rp.
                                {{ number_format($packet->price) }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="my-3">
                <label for="image" class="form-label">Foto KTP</label>
                <img src="" class="img-preview img-fluid mb-3 col-sm-5" id="frame"
                    style="max-height: 500px; overflow:hidden">
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                    name="image" onchange="preview()" required>
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.inputbox').select2();
        });
    </script>
    <script>
        function preview() {
            const frame = document.querySelector('#frame');
            frame.style.display = 'block';
            frame.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
