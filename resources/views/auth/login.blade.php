@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row align-items-center justify-content-center" style="min-height: 100vh">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-center gap-1 mb-4">
                        <p class="mb-0 text-dark fw-bold fs-5">Cashier Manajement</p>
                    </div>

                    <h5 class="text-dark fw-bold mb-4">Sign In</h5>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="mb-1">Alamat Email</label>
                            <input type="text" name="email" class="form-control"
                                placeholder="Tulis alamat email kamu">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="mb-1">Password</label>
                            <input type="password" name="password" class="form-control"
                                placeholder="Masukkan password kamu">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button class="btn btn-primary d-block w-100" type="submit">Sign In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
