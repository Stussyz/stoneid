@extends('stone.layouts.app')

@section('title', 'Login | Stone.id')

{{-- IMAGE NYA BELOM DIGANTI! --}}

@section('content')

<style>
    .otp-input-field input{
        text-align: center;
        height: 50px;
        width: 50px;
        margin-left: 0.2rem;
        margin-right: 0.2rem;
        border-radius: 10px;
        outline: none;
        border: 1px solid rgb(181, 181, 181);
        font-size: larger;
    }
    
    .otp-btn{
        background-color: rgb(200, 200, 200);
        color: rgb(151, 151, 151);;
        pointer-events: none;
        border: none;
    }
    
    .otp-btn.active{
        background-color: var(--primary);
        color: white;
        pointer-events: auto;
    }
    
    
    .otp-input-field input::-webkit-inner-spin-button,
    .otp-input-field input::-webkit-outer-spin-button{
        display: none;
    }
    
    .btn-outline-primary:hover{
        color: white !important;
    }
    </style>

<main class="container-fluid header bg-white p-0 ">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-6 animated fadeIn">
            <img class="img-fluid d-none d-md-block h-100" src="{{ asset('images/banners/banner-1.png') }}" alt="">
        </div>  
        
        
        <!-- login start -->
        <div class="col-md-6 login p-5 pb-0" style="margin-top:5em;">
            <form action="{{ Route('otp.send') }}" method="POST">
                @csrf
                <div class="row">
                    <h5 class="animated fadeIn mb-4">Login/Register</h5>
                    <hr class="w-100 text-center">
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
                <div class="py-3">
                    <p class="animated fadeIn pb-1">Email/No. telfon</p>
                    <div id="loginInputGroup">
                        <input type="text" name="login" id="loginInput" class="form-control" placeholder="Email atau Nomor HP">
                    </div>
                </div>
                <button class="btn btn-primary login-btn py-2 px-5 w-100 animated fadeIn" type="submit">Login</button>
            </form>
            <div class="d-flex justify-content-between pt-3">
                <a href="{{ route('user.register') }}">Belum punya akun?</a>
                <a href="{{ route('user.forgot-password') }}">Lupa Password?</a>
            </div>
            <div class="d-flex pt-2">
                <hr class="w-25 mx-3"> <p class="mt-1 text-black-50">atau gunakan dengan akun</p> <hr class="w-25 mx-3">
            </div>
            <div class="text-muted" >
                <a href="" class="btn border btn-light my-2 px-5 w-100 animated fadeIn"><img style="height: 25px; width: 25px; float:left;" src="{{ asset('images/icons/whatsapp-icon.png') }}" alt="">Masuk dengan Whatsapp</a>
                <a href="" class="btn border btn-light my-2 px-5 w-100 animated fadeIn"><img style="height: 25px; width: 25px; float:left;" src="{{ asset('images/icons/google-icon.png') }}" alt="">Masuk dengan Google</a>
                <a href="" class="btn border btn-light my-2 px-5 w-100 animated fadeIn"><img style="height: 25px; width: 25px; float:left;" src="{{ asset('images/icons/facebook-icon.png') }}" alt="">Masuk dengan facebook</a>
            </div>
        </div>
        <!-- login end -->
    </div>
</main>


<script>
   
    // input button utility: can read the phone number/email.
    const loginInputGroup = document.getElementById('loginInputGroup');
    let currentInputType = 'email'; // track current type

    function isNumeric(str) {
        return /^\d+$/.test(str);
    }

    function renderPhoneInput(value) {
        if (currentInputType === 'phone') return;
        currentInputType = 'phone';

        loginInputGroup.innerHTML = `
            <div class="input-group">
                <span class="input-group-text">+62</span>
                <input type="tel" id="loginInput" name="login" class="form-control" placeholder="Nomor HP" maxlength="13">
            </div>
        `;
        attachListener();
        focusInput(value);
    }
    function renderEmailInput(value = '') {
        if (currentInputType === 'email') return;
        currentInputType = 'email';

        loginInputGroup.innerHTML = `
            <input type="text" id="loginInput" name="login" class="form-control" placeholder="Email atau Nomor HP">
        `;
        attachListener();
        focusInput(value);
    }

    function focusInput(value) {
        const input = document.getElementById('loginInput');
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
        const input = document.getElementById('loginInput');
        input.addEventListener('input', handleInputChange);
    }

    attachListener(); // initial call


</script>

@endsection