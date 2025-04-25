@extends('stone.layouts.app')

@section('title', 'Daftar Akunmu sekarang | Stone.id')

{{-- IMAGE NYA BELOM DIGANTI! --}}

@section('content')

<main class="container-fluid header bg-white p-0 ">
    <div class="row g-0 align-items-center w-100 justify-content-center" style="height:auto;">

        <!-- forgot password start -->
        <div class="col-lg-6 col-10 p-5 border shadow-sm" style="margin-top:10em; border-radius:1rem;">
            <div class="row my-3">
                <h5 class="animated fadeIn mb-3 text-center">Agen Registrasi Akun</h5>
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
                {{-- addresses --}}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat <sup class="text-danger">*</sup> </label>
                            <input 
                            type="text" 
                            value="{{ old('address[street]', $property->address->street ?? '') }}" name="address[street]" class="form-control" 
                            id="alamat" 
                            placeholder="Masukkan Alamat anda">
                            @error('address[street]')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div> 
                        <div class="mb-3">
                            <label for="city" class="form-label">Kota / Kabupaten <sup class="text-danger">*</sup> </label>
                            <select 
                            id="kota" 
                            class="form-select" 
                            value="{{ old('address[city]', $property->address->city ?? '') }}" 
                            name="address[city]" 
                            aria-label="Default select example"
                            placeholder="Kota/Kabupaten" 
                            disabled>
                                <option selected value="Kota">Kota</option>
                            </select>
                            @error('address[city]')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            
                        </div>
                        <div class="mb-3">
                            <label for="kelurahan" class="form-label">Kelurahan <sup class="text-danger">*</sup> </label>
                            <select 
                            class="form-select" 
                            value="{{ old('address[village]', 
                            $property->address->village ?? '') }}" 
                            name="address[village]" 
                            id="kelurahan" 
                            aria-label="Default select example"
                            placeholder="Keurahan" 
                            disabled >
                                <option selected value="Kelurahan">Kelurahan</option>
                            </select>
                            @error('address[village]')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="provinsi" class="form-label">Provinsi <sup class="text-danger">*</sup> </label>
                            <select 
                            class="form-select" 
                            value="{{ old('address[province]', $property->address->province ?? '') }}" 
                            name="address[province]" 
                            id="provinsi"
                            placeholder="Provinsi" 
                            aria-label="Default select example" >
                                <option selected value="Provinsi">Provinsi</option>
                            </select>
                            @error('address[province]')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="kecamatan" class="form-label">Kecamatan <sup class="text-danger">*</sup> </label>
                            <select 
                            class="form-select" 
                            value="{{ old('address[district]', $property->address->district ?? '') }}" 
                            name="address[district]" 
                            id="kecamatan" 
                            placeholder="Kecamatan"
                            aria-label="Default select example" 
                            disabled>
                                <option selected value="Kecamatan">Kecamatan</option>
                            </select>
                            @error('address[district]')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="inputPostalCode" class="form-label">Kode Pos</label>
                            <input 
                            type="number" 
                            value="{{ old('address[postal_code]', $property->address->postal_code ?? '') }}" 
                            name="address[postal_code]" 
                            class="form-control" 
                            maxlength="6" 
                            id="inputPostalCode" 
                            placeholder="Isikan Kode pos properti">
                            @error('address[postal_code]')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
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