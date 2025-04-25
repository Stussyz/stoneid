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
                
            <form action="{{ route('dashboard-agent.transaction.process.save', [$property->id_preview, $step]) }}" method="post">
                @csrf
                <div class="row border rounded-3">
                    <div class="mt-3 p-3" id="titleTransfer">
                        <h5 class="text-center mb-5">Proses Balik Nama / SHM</h5>
                        
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Upload Sertifikat Properti yang telah Balik Nama <small class="text-danger"><sup class="text-danger">*</sup>Wajib</small></label>
                                <input class="form-control bg-white" type="file" id="formFile" accept="application/pdf">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Upload Surat Hak Tanggungan  <small class="text-danger"><sup class="text-danger">*</sup>Jika dengan Kredit</small></label>
                                <input class="form-control bg-white" type="file" id="formFile" accept="application/pdf">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi Tambahan (Jika ada) <sup class="text-danger">*</sup> </label>
                                <textarea class="form-control" name="" id="deskripsi" rows="5" resize="none">   
                                </textarea>
                            </div>
                            
                       
                        <div class="row gx-0 my-3">
                            <div class="col-6">
                                {{-- <a class="btn btn-primary w-auto selling-process-prev-button">Previous</a> --}}
                            </div>
                            <div class="col-6 d-flex justify-content-end text-end ">
                                
                                    
                                    <button type="submit" class="btn btn-primary selling-process-next-button">Selesai</button>
                            
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
