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

                  <!-- VERIFICATION SUCCESSFULY PAGE -->

                  <div class="row border rounded-3">

                    <!-- success notif -->
                    <div class="col-12 d-flex flex-column align-items-center justify-content-center p-5">
                        
                            <i class="fas fa-check-circle fa-4x text-primary text-center z-2" style="filter: drop-shadow(3px 2px 2px rgba(0,0,0,0.2)); padding-left: .8rem; padding-top: .8rem"></i>
                        
                         
                         <div class="text-center">
                            <h3 class="mt-3 text-dark">Selamat! Dokumen <span class="text-primary">Terverifikasi!</span> </h3>
                            <p>Terus tingkatkan performa penjualan anda!</p>      
                         </div>
                    </div>

                    <!-- Selling History -->
                    <div class="col-12">
                        <table class="table table-striped table-borderless">
                            <tbody>
                                <tr>
                                
                                    <td>Listing ID</td>
                                    <td>{{ $property->id_preview}}</td>
                                </tr>
                                <tr>
                                
                                    <td>Nama</td>
                                    <td>{{ $property->name}}</td>
                                </tr>
                                <tr>
                            
                                    <td>Lokasi</td>
                                    <td>{{ $property->address->street .', '. $property->address->village .', '. $property->address->district .', '. $property->address->city .', '. $property->address->province }}</td>
                            
                                </tr>
                                <tr>
                                    <td>Harga Terjual</td>
                                    <td>Rp 1,925 Miliar</td>
                                </tr>
                                <tr>
                                    <td>Jenis Pembayaran</td>
                                    <td>KPR</td>
                                </tr>
                                <tr>
                                    <td>Mulai Penjualan</td>
                                    <td>{{ $property->created_at->format('d/m/Y') }}</td>
                                </tr>
                                <tr>
                                    <td>Selesai Terjual</td>
                                    {{-- <td>{{ $property->transactions->completed_at->format('d/m/Y') }}</td> --}}
                                    <td> 18/03/2025 pukul 08:53 WIB </td>
                                </tr>
                                <tr>
                                    <td>Lama waktu penjualan</td>
                                    <td>1 Bulan 1 Minggu 6 Hari</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>Lunas</td>
                                </tr>
                            </tbody>
                        </table>
                     </div>

                     <div class="col-12 mt-5 mb-3 p-2">
                        <h5>Dokumen Proses Penjualan</h5>
                        <div class="accordion my-3 p-3" id="sellingHistoryAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Proses Negosiasi
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#sellingHistoryAccordion">
                                    <div class="accordion-body">
                                        <table class="table table-striped table-borderless" style="table-layout: fixed;">
                                            <tbody>
                                                <tr>
                                                    <td>Harga Beli Final</td>
                                                    <td>Rp 1,925 Miliar</td>
                                                </tr>
                                                <tr>
                                                    <td>Uang Booking</td>
                                                    <td>Rp 10 juta</td>
                                                </tr>
                                                <tr>
                                                    <td>Jenis Pembayaran</td>
                                                    <td>Tunai</td>
                                                </tr>
                                                <tr>
                                                    <td>Deskripsi Tambahan</td>
                                                    <td>Buyer melakukan perubahan harga karena non-furnished minta diadakan semi furnished untuk kitchen, ruang keluarga, bedroom</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                        Pembuatan PPJB
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#sellingHistoryAccordion">
                                    <div class="accordion-body">
                                        <table class="table table-striped table-borderless" style="table-layout: fixed;">
                                            <tbody>
                                                <tr>
                                                    <td>Dokumen PPJB Tertandatangan</td>
                                                    <td>
                                                        <button type="button" class="btn btn-secondary me-2 my-2 my-xl-0"><i class="fas fa-eye float-start py-1"></i><small class="d-none d-md-inline">Lihat</small></button>
                                                    
                                                        <button type="button" class="btn btn-primary me-2 my-2 my-xl-0"><i class="fas fa-file-download float-start py-1"></i><small class="d-none d-md-inline">Download</small></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>SP3K Tertandatangan</td>
                                                    <td> 
                                                        <button type="button" class="btn btn-secondary me-2 my-2 my-xl-0"><i class="fas fa-eye float-start py-1"></i><small class="d-none d-md-inline">Lihat</small></button>
                                                        
                                                        <button type="button" class="btn btn-primary me-2 my-2 my-xl-0"><i class="fas fa-file-download float-start py-1"></i><small class="d-none d-md-inline">Download</small></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Deskripsi Tambahan</td>
                                                    <td>Buyer memilih untuk melakukan pembayaran langsung secara tunai dan tidak membuat PPJB</td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                        Pembuatan AJB
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#sellingHistoryAccordion">
                                    <div class="accordion-body">
                                        <table class="table table-striped table-borderless" style="table-layout: fixed;">
                                            <tbody>
                                                <tr>
                                                    <td>Nama Notaris/PPAT</td>
                                                    <td>Dyah Eka Purwanti</td>
                                                </tr>
                                                <tr>
                                                    <td>NIN / NIP</td>
                                                    <td>49128012023231</td>
                                                </tr>
                                                <tr>
                                                    <td>Dokumen AJB Tertandatangan</td>
                                                    <td>
                                                        <button type="button" class="btn btn-secondary me-2 my-2 my-xl-0"><i class="fas fa-eye float-start py-1"></i><small class="d-none d-md-inline">Lihat</small></button>
                                                    
                                                        <button type="button" class="btn btn-primary me-2 my-2 my-xl-0"><i class="fas fa-file-download float-start py-1"></i><small class="d-none d-md-inline">Download</small></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Deskripsi Tambahan</td>
                                                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto excepturi eum explicabo hic! Unde, provident sapiente mollitia fugit praesentium soluta adipisci quibusdam. A possimus quisquam quam fuga autem eaque explicabo!</td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                        Proses Balik Nama
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#sellingHistoryAccordion">
                                    <div class="accordion-body">
                                        <table class="table table-striped table-borderless" style="table-layout: fixed;">
                                            <tbody>
                                                <tr>
                                                    <td> Sertifikat Properti yang telah Balik Nama</td>
                                                    <td>
                                                        <button type="button" class="btn btn-secondary me-2 my-2 my-xl-0"><i class="fas fa-eye float-start py-1"></i><small class="d-none d-md-inline">Lihat</small></button>
                                                    
                                                        <button type="button" class="btn btn-primary me-2 my-2 my-xl-0"><i class="fas fa-file-download float-start py-1"></i><small class="d-none d-md-inline">Download</small></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Surat Hak Tanggungan</td>
                                                    <td>
                                                        <button type="button" class="btn btn-secondary me-2 my-2 my-xl-0"><i class="fas fa-eye float-start py-1"></i><small class="d-none d-md-inline">Lihat</small></button>
                                                    
                                                        <button type="button" class="btn btn-primary me-2 my-2 my-xl-0"><i class="fas fa-file-download float-start py-1"></i><small class="d-none d-md-inline">Download</small></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Deskripsi Tambahan</td>
                                                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto excepturi eum explicabo hic! Unde, provident sapiente mollitia fugit praesentium soluta adipisci quibusdam. A possimus quisquam quam fuga autem eaque explicabo!</td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>

                  <!-- END VERIFICATION SUCCESSFULY PAGE -->

        </main>   
   </main>
    <!-- akhir halaman listing saya-->
</section>  
 @endsection


 @push('styles')
 <style>
    .table td button{
            width: 8rem;
        }
    @media (max-width: 768px) {
        .table td button{
            width: 3rem;
        }

    }

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