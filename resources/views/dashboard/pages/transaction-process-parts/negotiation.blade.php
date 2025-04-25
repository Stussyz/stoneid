@extends('dashboard.layouts.app')

@section('title', 'Proses Penjualan - Review Iklan | Stone.id')

@section('dashboard_content')

<!-- TAB CONTAINER -->
<section class="container-xxl outer-main">

    <!-- halaman listing saya -->
   <main class="container main-content pt-3">
       <header class="row px-2 pb-3">
           <nav class="py-3 px-3" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
               <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="{{ route('dashboard-agent.my-listing') }}">Listing Saya</a></li>
                 <li class="breadcrumb-item active" aria-current="page">Property User {{ $property->id_preview }}</li>
               </ol>
           </nav>

           <h3>Progress Penjualan</h3>
           <p>Saat ini anda berada di <span class="fw-bold text-dark">"Proses Menjual"</span></p>
       </header> 
       <main class="container box-wrapper">
            <div class="row px-3">
                
                {{-- main process bar --}}
                @include('dashboard.layouts.partials.main-transaction-process-bar')
            
                <hr class="w-100">

                @include('dashboard.layouts.partials.selling-process-bar')

            <div class="row border rounded-3">
                <div class="mt-3 p-3" id="nego">
                    <h5 class="text-center mb-5">Proses Negosiasi</h5>
                    <form action="{{ route('dashboard-agent.transaction.process.save', [$property->id_preview, $step]) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="inputHarga" class="form-label">Harga Beli Final <sup class="text-danger">*</sup></label>
                                    <div class="input-group"> 
                                        <span class="input-group-text" id="inputFinalPrice">Rp</span>
                                        <input type="hidden" name="final_price" class="price-value" value="{{ old('final_price', isset($property) ? $property->price : '') }}">
                                        <input required
                                        type="text"
                                        id="inputFinalPrice"
                                        class="form-control price-format"
                                        placeholder="Contoh: 500.000.000"
                                        value="{{ number_format(old('price', isset($property) ? $property->price : ''), 0, ',', '.') }}"
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="inputHarga" class="form-label">Masukan Uang Booking<sup class="text-danger">*</sup></label>
                                    <div class="input-group"> 
                                        <span class="input-group-text" id="inputBookingPayment">Rp</span>
                                        <input type="hidden" name="booking_payment" class="price-value" value="{{ old('booking_payment', isset($property) ? $property->price : '') }}">
                                        <input 
                                        type="text"
                                        id="inputBookingPayment "
                                        class="form-control price-format"
                                        placeholder="Masukkan uang booking tanda jadi"
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="inputTipePembayaran" class="form-label">Jenis Pembayaran <sup class="text-danger">*</sup> </label>
                            <select class="form-select" name="payment_type" aria-label="Default select example" id="inputTipePembayaran">
                                <option value="Tunai">Tunai</option>
                                <option value="In House">In House</option>
                                <option value="KPR">KPR</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi Tambahan (Jika ada) <sup class="text-danger">*</sup> </label>
                            <textarea class="form-control" name="description" id="deskripsi" rows="5" resize="none">   
                            </textarea>
                        </div>
                        
                    
                        <div class="row gx-0 my-3">
                            <div class="col">
                                <!-- <a class="btn btn-primary w-25 selling-process-prev-button">Previous</a> -->
                            </div>
                            <div class="col d-flex justify-content-end text-end ">
                                <button type="submit" class="btn btn-primary selling-process-next-button">Next</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>   
   </main>
    <!-- akhir halaman listing saya-->
</section>  
 @endsection


 @push('styles')
 <style>
    .selling-process{
            color: #bababa;
            .number{
                background-color:  #e1e1e1;
            }
            h6{
                color: #bababa;
            }
        }

        .selling-process.active {
            color: white;
            .number{
                background-color:  var(--primary);
            }
            h6, small{
                color: var(--primary);
            }
        }
 </style>
     
 @endpush

 @push('scripts')
 <script>
    document.addEventListener("DOMContentLoaded", function () {
        const formatInputs = document.querySelectorAll(".price-format");
        const valueInputs = document.querySelectorAll(".price-value");
    
        formatInputs.forEach((formatInput, index) => {
        const hiddenInput = valueInputs[index];

            formatInput.addEventListener("input", function () {
                let raw = formatInput.value.replace(/\D/g, ''); // Remove all non-digits
                hiddenInput.value = raw || '';

                // Format and update displayed value
                formatInput.value = raw.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            });
        });
    });
    </script>
 @endpush
