@extends('stone.layouts.app')

@section('title', 'Daftar Akunmu sekarang | Stone.id')

{{-- IMAGE NYA BELOM DIGANTI! --}}

@section('content')

<main class="container-fluid header bg-white p-0 ">
    <div class="row g-0 align-items-center w-100 justify-content-center" style="height:auto;">

        <!-- forgot password start -->
        <div class="col-lg-6 col-10 p-5 border shadow-sm" style="margin-top:10em; border-radius:1rem;">
            <div class="row my-3">
                <h5 class="animated fadeIn mb-3 text-center">Registrasi Akun</h5>
            </div>

            
            <form action="{{ Route('register') }}" method="post">
                @csrf
    
                <div class="mb-3">
                    <label for="inputPassword" class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control text-muted" id="" placeholder="Masukkan nama anda...">
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputPassword" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control text-muted" id="" autocomplete="off" placeholder="Masukkan email anda...">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control text-muted" autocomplete="new-password" id="inputPassword" placeholder="Masukkan password anda...">
                </div>
                <div class="mb-3">
                    <label for="retypePassword" class="animated fadeIn pb-1">Ketik Ulang Password</label>
                    <input type="password" name="password_confirmation" class="form-control text-muted" placeholder="Ketik ulang password..." id="retypePassword">
                    @error('password')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary py-2 px-5 w-100 animated fadeIn">Daftar Akun</button>
            </form>
            <div class="pt-3">
                <a href="{{ route('user.login') }}" >Kembali ke halaman Login</a>
            </div>
            
        </div>
        <!-- forgot password end -->

        <!-- otp start -->
       
        <!-- OTP verification end -->
    </div>
</main>


@endsection