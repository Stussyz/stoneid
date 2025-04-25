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
            <img class="img-fluid h-100" src="{{ asset('images/banners/banner-1.png') }}" alt="">
        </div>  
        <!-- otp start -->
        <div class="col-md-6 otp p-5 pb-0" style="margin-top:5em;">
            <div class="otp-wrapper border rounded-3 p-2 m-2 d-flex flex-column justify-content-center align-items-center text-center">
                <div class="mb-3 mt-5 ">
                    <h3>Verifikasi OTP</h3>
                    <p>Ketikkan 6 digit kode OTP yang dikirim ke email (email)</p>
                </div> 
                <form action="{{ route('otp.verify') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                    
                            <div class="otp-input-field">
                                <input type="number" name="number1">
                                <input type="number" name="number2" disabled>
                                <input type="number" name="number3" disabled>
                                <input type="number" name="number4" disabled>
                                <input type="number" name="number5" disabled>
                                <input type="number" name="number6" disabled>
                            </div>
                    </div>
                    <div class="pb-3">
                        @error('otp')
                        <div class="my-3 text-center">
                            <small class="text-danger">{{ $message }}</small>
                        </div>
                        @enderror
                        <a href="{{ Route('user.login') }}" class="otp-back-btn btn py-2 px-4 btn-light text-primary btn-outline-primary">Kembali</a>
                        <button type="submit" class="otp-btn btn btn-primary py-2 px-4">Verifikasi</button>
                    </div>
                </form>
                    <div class="pb-3 mb-5">
                        Tidak menerima kode OTP?
                        <div id="countdown" class="mt-2 text-muted">Kirim ulang kode OTP dalam <span id="timer">60</span> detik</div>

                        <form method="POST" action="{{ route('otp.resend') }}" id="resend-form" style="display:none;">
                            @csrf
                            <button type="submit" class="btn btn-link">Kirim Ulang Kode OTP</button>
                        </form>
                    </div> 
            </div>
        </div>
        <!-- OTP verification end -->
    </div>
</main>


<script>
   
    // input button utility: can read the phone number/email
        // Server time and expiry (passed from backend)
    const expiresAt = new Date("{{ \Carbon\Carbon::parse($expiresAt)->toIso8601String() }}").getTime();
    const now = new Date().getTime();
    let seconds = Math.floor((expiresAt - now) / 1000);


    const timer = document.getElementById('timer');
    const countdown = document.getElementById('countdown');
    const resendForm = document.getElementById('resend-form');

    if (seconds <= 0) {
        timer.innerText = 0;
        countdown.classList.add('d-none');
        resendForm.style.display = 'block';
    } else {
        timer.innerText = seconds;
        const interval = setInterval(() => {
            seconds--;
            timer.innerText = seconds;
            if (seconds <= 0) {
                clearInterval(interval);
                countdown.classList.add('d-none');
                resendForm.style.display = 'block';
            }
        }, 1000);
    }



        const inputs = document.querySelectorAll(".otp-input-field input"),
        button = document.querySelector(".otp-btn");
        inputs[0].focus();
        inputs.forEach((input, index1) => {
        input.addEventListener("keyup", (e)=> {
            const currInput = input,
            nextInput = input.nextElementSibling,
            prevInput = input.previousElementSibling

            if(currInput.value.length > 1){
                currInput.value = "";
                return;
            }
            if (nextInput && nextInput.hasAttribute("disabled") && currInput.value !== "") {
                nextInput.removeAttribute("disabled");
                nextInput.focus();
            }
            if(e.key === "Backspace"){
                inputs.forEach((input, index2) => {
                    if (index1 <= index2 && prevInput) {
                        input.setAttribute("disabled", true);
                        input.value = "";
                        prevInput.focus();
                    }
                });
            }

            if (!inputs[5].disabled && inputs[5].value !== "") {
            button.classList.add("active");
            return;
            }

            button.classList.remove("active");
            })
        
    });

</script>

@endsection