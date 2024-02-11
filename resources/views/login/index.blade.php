@extends('layouts.main')

@section('container')
    <div class="row d-flex justify-content-center">
        <div class="col-lg-4">
            <main class="form-signin w-100 m-auto">
                @if (session('status'))
                    <div class="alert alert-danger">
                        {{ session('message') }}
                    </div>
                @endif
                <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
                <form action="/" method="POST">
                    @csrf
                    <div class="form-floating">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Jhon Doe"
                            autofocus required value="{{ old('name') }}">
                        <label for="name">Nama</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password"
                            required>
                        <label for="password">Password</label>
                    </div>

                    <button class="w-100 mt-3 btn btn-lg btn-primary" type="submit">Login</button>
                </form>
            </main>
        </div>
    </div>
@endsection
