@extends('stone.layouts.app')

@section('title', 'Halaman Reset Password | Stone.id')

{{-- IMAGE NYA BELOM DIGANTI! --}}

@section('content')

<main class="container-fluid header bg-white p-0 ">
    <div class="row g-0 align-items-center w-100 justify-content-center" style="height:80vh;">

        <!-- reset password start -->
        <div class="col-lg-6 col-10 p-5 border shadow-sm" style="margin-top:10em; border-radius:1rem;">
            <div class="row my-3">
                <h5 class="animated fadeIn mb-3 text-center">Halaman Reset Password</h5>
                <small class="text-danger text-center">Masukkan password baru anda. Ingat! password hanya anda yang tahu untuk menghindari penyalahgunaan akun</small>
            </div>
            @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                    </div>
                @endif

            <form action="{{ route('password.update') }}" method="post">
                @csrf

                
                <div class="mb-3">
                    <label for="inputPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control text-muted" id="inputPassword" placeholder="Masukkan password baru anda...">
                </div>
                <div class="mb-3">
                    <label for="retypePassword" class="animated fadeIn pb-1">Ketik Ulang Password</label>
                    <input type="password" name="password_confirmation" class="form-control text-muted" placeholder="Ketik ulang password..." id="retypePassword">
                </div>
                <input type="hidden" name="token" value="{{ request('token') }}">
                <input type="hidden" name="email" value="{{ request('email') }}">
                <button class="btn btn-primary py-2 px-5 w-100 animated fadeIn">Ubah Password</button>
            </form>
        </div>
        <!-- reset password end -->

    </div>
</main>



@endsection