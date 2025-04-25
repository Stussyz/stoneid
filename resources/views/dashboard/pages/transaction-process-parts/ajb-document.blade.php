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

        <form action="{{ route('dashboard-agent.transaction.process.save', [$property->id_preview, $step]) }}" method="post">

            <div class="row px-3">
                
                {{-- main process bar --}}
                @include('dashboard.layouts.partials.main-transaction-process-bar')
            
                <hr class="w-100">

                @include('dashboard.layouts.partials.selling-process-bar')

            <div class="row border rounded-3">
                <div class="mt-3 p-3" id="ajb">
                    <h5 class="text-center mb-5">Pembuatan AJB</h5>
                    <form class="" action="">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Notaris/PPAT<sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nama notaris / PPAT" required>
                                  </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">NIN/NIP<sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan ID notaris / PPAT" required>
                                  
                                  </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload Bukti AJB Tertandatangan <small class="text-danger"><sup class="text-danger">*</sup>Wajib</small></label>
                            <input class="form-control bg-white" type="file" id="formFile" accept="application/pdf" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi Tambahan (Jika ada)</label>
                            <textarea class="form-control" name="" id="deskripsi" rows="5" resize="none">   
                            </textarea>
                        </div>
                        <div class="mb-2 form-check">
                            <input type="checkbox" class="form-check-input" id="paymentCheck">
                            <label class="form-check-label" for="TnCCheck">Dengan ini, seluruh dana pembelian properti telah masuk dan diterima oleh pihak Stone.id</label>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="BPHTBCheck">
                            <label class="form-check-label" for="TnCCheck">Dengan ini, pembeli telah melunasi Bea Perolehan Hak atas Tanah dan Bangunan (BPHTB)</label>
                        </div>
                        
                    </form>
                    <div class="row gx-0 my-3">
                        <div class="col">
                            
                        </div>
                        <div class="col  d-flex justify-content-end text-end ">
                           
                                @csrf
                                <button type="submit" class="btn btn-primary selling-process-next-button">Next</button>
                            
                        </div>
                    </div>
                </div>
            </div>

        </form> 

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

 @push('script')
<script>

</script>
     
 @endpush