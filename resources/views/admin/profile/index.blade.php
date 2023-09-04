@extends('layouts.admin.app')

@section('content')
    <div class="row">
        <div class="col-6">
            <div class="card h-45">
                <div class="card-header">
                    User Profile
                </div>
                <div class="container">
                    @if (session('success'))
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="harga" class="form-label">Username</label>
                            <input type="text" disabled class="form-control @error('name') is-invalid @enderror"
                                id="name" value="{{ $user->name }}" name="name" />
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Email</label>
                            <input type="email" disabled class="form-control @error('email') is-invalid @enderror"
                                id="email" value="{{ $user->email }}" name="email" />
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Password Lama</label>
                            <input type="password" class="form-control @error('old_password') is-invalid @enderror"
                                id="password" name="old_password" />
                            @error('old_password')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" />
                            @error('password')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                id="password_confirmation" name="password_confirmation" />
                            @error('password_confirmation')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
