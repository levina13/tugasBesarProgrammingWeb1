@extends('layouts.auth')
@section('layout_title', 'Daftar')
@section('layout_content')
    <div class="row justify-content-center form-bg-image" data-background-lg="/assets/img/svg/signin.svg">
        <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                <div class="row">
                    <div class="col-2">
                        <a href="{{ route('index') }}" class="navbar-brand">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" />
                        </a>
                    </div>
                    <div class="col-10">
                        <div class="ml-2 mb-4 mt-md-0 pr-2">
                            <h1 class="mb-0 h3">Pariwisata Malang Raya</h1>
                            <h5 class="mb-0 h5 text-center text-danger">Registrasi Member Baru</h5>
                        </div>
                    </div>
                </div>
                <form action="{{ route('simpan') }}" method="POST" class="mt-4">
                    @csrf
                    <div class="form-group">
                        <!-- Form -->
                        {{-- @if (session('alert'))
                            <div class="form-group mb-4">
                                <x-alert type="{{ session('alert.type') }}" :dismissible="'true'">
                                    {{ session('alert.message') }}
                                </x-alert>
                            </div>
                        @endif --}}
                        <div class="form-group mb-4">
                            <div class="input-group">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama" id="name" value="{{ old('name') }}" autofocus required>
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div> 
                            @error('name')
                                <p class="text text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <div class="input-group">
                                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Nama Pengguna" id="username" value="{{ old('username') }}" required>
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                            </div> 
                            @error('username')
                                <p class="text text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <div class="input-group">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" id="email" value="{{ old('email') }}" required>
                                <span class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </span>
                            </div> 
                            @error('email')
                                <p class="text text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <div class="input-group">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Kata Sandi" id="password" required>
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                            </div> 
                            @error('password')
                                <p class="text text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <div class="input-group">
                                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Ulangi Kata Sandi" id="password_confirmation" required>
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                            </div> 
                            @error('password_confirmation')
                                <p class="text text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-info">Daftar</button>
                    </div>
                </form>
                <div class="d-flex justify-content-right align-items-right mt-4">
                    <span class="fw-normal">
                        <a href="{{ route('login') }}" class="fw-bold">Sudah Punya Akun?</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
@endsection