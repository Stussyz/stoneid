@extends('stone.layouts.app')

@section('title', 'Pulihkan Akun anda | Stone.id')

{{-- IMAGE NYA BELOM DIGANTI! --}}

@section('content')
<main class="container-fluid header bg-white p-0 ">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-6 animated fadeIn">
            <img class="img-fluid h-100" src="{{ asset('images/banners/banner-2.png') }}" alt="">
        </div>  
        
        
        <!-- forgot password start -->
        <div class="col-md-6 p-5 pb-0" style="margin-top:5em;">
            <div class="row">
                <h5 class="animated fadeIn mb-4">Halaman Reset Password</h5>
            </div>

            @if(session('status'))
                <small class="text-primary">{{ session('status') }}</small>
            @endif

            <form action="{{ Route('password.email') }}" method="POST">
                @csrf
                <p>Silahkan Masukan Nomor telpon atau Email yang terdaftar. Kami akan mengirimkan kode verifikasi untuk mengatur ulang Password</p>
                <div class="py-3">
                    <label for="forgotInput" class="animated fadeIn pb-1">Email/No. telfon</label>
                    <div id="forgotInputGroup">
                        <input type="text" name="email" id="forgotInput" class="form-control" placeholder="Email atau Nomor HP">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary py-2 px-5 w-100 animated fadeIn">Lanjutkan</button>
            </form>

            <div class="d-flex pt-3">
                <a href="{{ route('user.login') }}"><i class="fas fa-chevron-left me-2"></i>Balik ke halaman Login</a>
            </div>
        </div>
        <!-- forgot password end -->
    </div>
</main>

@endsection

@push('stone-scripts')
<script>
    // input button utility: can read the phone number/email.
    const forgotInputGroup = document.getElementById('forgotInputGroup');
    let currentInputType = 'email'; // track current type

    function isNumeric(str) {
        return /^\d+$/.test(str);
    }

    function renderPhoneInput(value) {
        if (currentInputType === 'phone') return;
        currentInputType = 'phone';

        forgotInputGroup.innerHTML = `
            <div class="input-group">
                <span class="input-group-text">+62</span>
                <input type="tel" id="forgotInput" name="phone" class="form-control" placeholder="Nomor HP" maxlength="13">
            </div>
        `;
        attachListener();
        focusInput(value);
    }
    function renderEmailInput(value = '') {
        if (currentInputType === 'email') return;
        currentInputType = 'email';

        forgotInputGroup.innerHTML = `
            <input type="text" id="forgotInput" name="email" class="form-control" placeholder="Email atau Nomor HP">
        `;
        attachListener();
        focusInput(value);
    }

    
    function focusInput(value) {
        const input = document.getElementById('forgotInput');
        input.value = value;
        input.focus();
        input.setSelectionRange(value.length, value.length);
    }
    function handleInputChange(e) {
        const value = e.target.value;

        if (isNumeric(value) && value.length > 5) {
            renderPhoneInput(value);
        } else if (!isNumeric(value) || value.length <= 3) {
            renderEmailInput(value);
        }
    }

    function attachListener() {
        const input = document.getElementById('forgotInput');
        input.addEventListener('input', handleInputChange);
    }

    attachListener(); // initial call
</script>
@endpush