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

                  <!-- VERIFICATION SUCCESSFULY PAGE -->

                <div class="container border rounded-3 px-5 pb-3 pt-3">
                    <div class="row mb-5 lh-base">
                        <h3 class="mt-3 text-dark mb-3">Ringkasan Transaksi <br> & Konfirmasi Akhir</h3>
                        <small>Silakan tinjau kembali semua data yang telah Anda isi. <br> Pastikan informasi dan dokumen sudah lengkap sebelum menyelesaikan transaksi.</small>      
                    </div>

                   

                    <!-- Selling History -->
                    <div class="row mb-3">
                        <div class="wrapper p-5 m-3 rounded-3 shadow w-100">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h5 class="pe-5">Proses Negosiasi</h5>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#negoModal" class="text-primary text-decoration-underline">Edit</a>
                                </div>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row mb-3">
                                                <small class="text-muted mb-2">Harga Beli</small>
                                                <h6 class="">25,6 Miliar</h6>
                                            </div>
                                            <div class="row">
                                                <small class="text-muted mb-2">Uang Booking</small>
                                                <h6 class="">10 Miliar</h6>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                             <div class="row mb-3">
                                                <small class="text-muted mb-2">Jenis Pembayaran</small>
                                                <h6 class="">KPR</h6>
                                            </div>
                                            <div class="row">
                                                <small class="text-muted mb-2">Penyedia KPR</small>
                                                <h6 class="">Bank BRI</h6>
                                            </div>   
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <h6 class="">Deskripsi Tambahan</h6>
                                        <small class="mb-2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt reprehenderit ducimus beatae tempore suscipit. Hic corrupti sed nemo sequi dolorem dolor molestiae, aliquam voluptatum debitis fugit perspiciatis assumenda earum eius.</small>
                                    </div>
                                </div> 
                            </div>
                        </div>

                        <div class="wrapper p-5 m-3 rounded-3 shadow w-100">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h5 class="pe-5">Pembuatan Dokumen PPJB</h5>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#ppjbModal" class="text-primary text-decoration-underline">Edit</a>
                                </div>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row mb-3">
                                                <small class="text-muted mb-2">Dokumen PPJB</small>
                                                <h6 class="">lihat dokumen</h6>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                             <div class="row mb-3">
                                                <small class="text-muted mb-2">Bukti SP3K</small>
                                                <h6 class="">lihat dokumen</h6>
                                            </div>   
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <h6 class="">Deskripsi Tambahan</h6>
                                        <small class="mb-2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt reprehenderit ducimus beatae tempore suscipit. Hic corrupti sed nemo sequi dolorem dolor molestiae, aliquam voluptatum debitis fugit perspiciatis assumenda earum eius.</small>
                                    </div>
                                </div> 
                            </div>
                        </div>

                        <div class="wrapper p-5 m-3 rounded-3 shadow w-100">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h5 class="pe-5">Pembuatan Dokumen AJB</h5>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#ajbModal" class="text-primary text-decoration-underline">Edit</a>
                                </div>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row mb-3">
                                                <small class="text-muted mb-2">Nama Notaris</small>
                                                <h6 class="">Sugeng Pramudya S.SH</h6>
                                            </div>
                                            <div class="row">
                                                <small class="text-muted mb-2">NIB</small>
                                                <h6 class="">2783218091230821</h6>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                             <div class="row mb-3">
                                                <small class="text-muted mb-2">Bukti SP3K</small>
                                                <h6 class="">lihat dokumen</h6>
                                            </div>   
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <h6 class="">Deskripsi Tambahan</h6>
                                        <small class="mb-2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt reprehenderit ducimus beatae tempore suscipit. Hic corrupti sed nemo sequi dolorem dolor molestiae, aliquam voluptatum debitis fugit perspiciatis assumenda earum eius.</small>
                                    </div>
                                </div> 
                            </div>
                        </div>

                        <div class="wrapper p-5 m-3 rounded-3 shadow w-100">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h5 class="pe-5">Proses Balik Nama</h5>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#tfModal" class="text-primary text-decoration-underline">Edit</a>
                                </div>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row mb-3">
                                                <small class="text-muted mb-2">Sertifikat Balik Nama</small>
                                                <h6 class="">lihat dokumen</h6>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                             <div class="row mb-3">
                                                <small class="text-muted mb-2">Surat Hak Tanggungan</small>
                                                <h6 class="">lihat dokumen</h6>
                                            </div>   
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <h6 class="">Deskripsi Tambahan</h6>
                                        <small class="mb-2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt reprehenderit ducimus beatae tempore suscipit. Hic corrupti sed nemo sequi dolorem dolor molestiae, aliquam voluptatum debitis fugit perspiciatis assumenda earum eius.</small>
                                    </div>
                                </div> 
                            </div>
                        </div>       
                    </div>

                    <div class="row termsandcondition pb-2 px-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="condition">
                            <label class="form-check-label" for="condition">Data yang telah diinputkan diatas semua adalah benar. Apabila terdapat pemalsuan dan kecurangan data, dapat diproses sesuai hukum yang berlaku di kemudian hari </label>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col text-end">
                            <form action="{{ route('dashboard-agent.transaction.process.save', [$property->id_preview, $step]) }}" method="post">
                                @csrf
                                <button class="btn btn-primary" type="submit">Transaksi Selesai</button>
                            </form>
                        </div>
                        
                    </div>
                </div>
                  <!-- END VERIFICATION PAGE -->

                {{-- modal nego --}}
                <div class="modal fade" tabindex="-1" id="negoModal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Ubah Data Proses Negosiasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body m-3">
                                <div class="mb-3">
                                    <label for="namaLengkap" class="form-label">Harga Jual</label>
                                    <div class="input-group"> 
                                        <span class="input-group-text">Rp</span>
                                        <input type="text" value="" class="form-control" id="price_display" disabled>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="namaLengkap" class="form-label">Uang Booking</label>
                                    <div class="input-group"> 
                                        <span class="input-group-text">Rp</span>
                                        <input type="text" value="" class="form-control" id="price_display" disabled>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="namaLengkap" class="form-label">Jenis Pembayaran</label>
                                    <input type="text" value="" name="name" class="form-control" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="namaLengkap" class="form-label">Penyedia KPR</label>
                                    <input type="text" value="" name="name" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- modal ppjb --}}
                <div class="modal fade" tabindex="-1" id="ppjbModal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Ubah Data Proses Negosiasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body m-3">
                                <div class="mb-3">
                                    <label for="namaLengkap" class="form-label">File PPJB</label>
                                    
                                        <input class="form-control bg-white" type="file" id="formFile">
                                    
                                </div>
                                <div class="mb-3">
                                    <label for="namaLengkap" class="form-label">File SP3K</label>
                                   <input class="form-control bg-white" type="file" id="formFile">
                                   
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- modal ajb --}}
                <div class="modal fade" tabindex="-1" id="ajbModal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Ubah Data Proses Negosiasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body m-3">
                                <div class="mb-3">
                                    <label for="namaLengkap" class="form-label">Nama Notaris / PPAT</label>
                                    <input type="text" value="" name="name" class="form-control" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="namaLengkap" class="form-label">NIB</label>
                                    <input type="text" value="" name="name" class="form-control" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="namaLengkap" class="form-label">File AJB</label>
                                    <input class="form-control bg-white" type="file" id="formFile">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- modal balik nama --}}
                <div class="modal fade" tabindex="-1" id="tfModal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Ubah Data Proses Negosiasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body m-3">
                                <div class="mb-3">
                                    <label for="namaLengkap" class="form-label">File Sertifikat Balik Nama</label>
                                    <input class="form-control bg-white" type="file" id="formFile">
                                    
                                </div>
                                <div class="mb-3">
                                    <label for="namaLengkap" class="form-label">File Surat Hak Tanggungan</label>
                                    <input class="form-control bg-white" type="file" id="formFile">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
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