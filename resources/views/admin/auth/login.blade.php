@extends('layouts.auth')

@section('content')
    <div class="card">
        <div class="card-body">

            <img src="{{ asset('logo-sekolah.png') }}" width="300" class="img-fluid mx-auto d-block" alt="Logo Sekolah"/>

            <h4 class="mb-4 text-center fw-bolder" style="letter-spacing: 3px">Aplikasi Penerimaan Siswa Baru</h4>

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif


            <form id="formAuthentication" class="mb-3" action="{{route('login')}}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" name="email" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                  </div>
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" name="password" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                  </div>
                <div class="mb-3">
                    <button class="btn btn-primary btn-lg d-grid w-100" type="submit">Sign in</button>
                </div>
            </form>

        </div>
    </div>
@endsection
