@extends('dashboard.layouts.app')

@section('title', 'Proses Penjualan - Review Iklan | Stone.id')

@section('dashboard_content')

<!-- TAB CONTAINER -->
<section class="container-xxl outer-main">

    {{-- debugging: hapus nanti --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

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
           <p>Saat ini anda berada di <span class="fw-bold text-dark">"Membuat Listing Penjual"</span></p>
       </header>    
       <main class="container box-wrapper">

                   <!-- progress bar three selling process -->
                   <div class="d-flex justify-content-around w-100">
                       <a class="btn bg-primary text-white btn-sm rounded-pill"
                       style="height: 2rem; 
                           width: 2rem;"
                       data-bs-toggle="tooltip" 
                       data-bs-placement="top" 
                       title="Membuat listing penjual"
                       
                       >1</a>
                       <span class="rounded mt-auto mb-auto" 
                       style="height: 0.2rem; width: 40%; background-color: #e2e2e2 !important;
                           ">
                           
                       </span>

                       <a class="btn text-white btn-sm rounded-pill"
                       style="height: 2rem; 
                           width: 2rem;
                           background-color: #e2e2e2 !important;"
                       data-bs-toggle="tooltip" 
                       data-bs-placement="top" 
                       title="Proses Menjual"
                       href="dashboard-selling-process-part2.html"
                       >2</a>
                       <span class="rounded mt-auto mb-auto" 
                       style="height: 0.2rem; width: 40%;
                           background-color: #e2e2e2 !important;">
                           
                       </span>
                       <a class="btn text-white btn-sm rounded-pill"
                       style="height: 2rem; 
                           width: 2rem;
                           background-color: #e2e2e2 !important;"
                       data-bs-toggle="tooltip" 
                       data-bs-placement="top" 
                       title="Property Selesai Terjual"
                       href="dashboard-selling-process-part3.html"
                       >3</a>
                      
               
                   </div>

                   <div class="row d-flex justify-content-around py-3 gx-0 ">
                    <div class="col-4 d-flex flex-column disabled">
                        <h5>Membuat listing penjual</h5>
                        <small class="text-muted">Review iklan penjualan dan temukan buyer</small>
                    </div>
                    <div class="col-4 d-flex flex-column justify-content-center text-center ">
                        <h5 class="">Proses Menjual</h5>
                        <small class="text-muted">Proses utama transaksi properti</small>
                    </div>
                    <div class="col-4 d-flex flex-column justify-content-end text-end disabled">
                        <h5 class="">Properti Selesai Terjual</h5>
                        <small class="text-muted">Dokumen verifikasi dan penjualan selesai</small>
                    </div>
                </div>

                   <div class="row border rounded-3">
                       <h5 class="my-3">Iklan Listing Preview:</h5>
                    
                       <div class="col-12 mb-3">
                           <!-- verified one -->
                           <div class="row gx-2 p-1 mt-3 justify-content-center border rounded">
                               <div class="col-xl-5 col-lg-5 col-md-12 position-relative">
                                   <a href="">
                                       <img src="{{ asset('storage/' . $property->propertyImages->first()?->image_path) }}" class="img-thumbnail shadow-box img-fluid">
                                   </a>
                                   <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                    {{ $property->transaction_type }}
                                   </div>
                                   <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">{{ $property->property_type }}</div>
                               </div>
                               <div class="col-xl-7 col-lg-7 col-md-12 px-4">
                                   <div class="row pt-2">
                                       <div class="col-8 align-content-center">
                                           <small class="text-muted" >{{'Dibuat Tanggal ' . $property->created_at->format('d/m/Y H:i')}}</small>
                                       </div>
                                       <div class="col-4 justify-content-end d-flex ">
                                           <div class="row nav nav-pills share-button">
                                               <div class="col-md-5 ps-2">
                                                   <button type="button" class="btn btn-outline-primary" href=""
                                                   data-bs-toggle="modal" data-bs-target="#deleteModal{{ $property->id }}"><i class="fas fa-trash float-start py-1" aria-hidden="true"></i></button>
                                               </div> 
                                               
                                           </div>
                                       </div>
                                   </div>
                                   
                                   <h5 class="card-title pb-2 text-primary mb-0 fw-bold">
                                    Rp {{ formatCurrencyLabel($property->price) . ' ' . ($property->min_rent_period) ?? null  }}
                                   </h5>
                                   <a href="" target="_blank" rel="noopener noreferrer"><h5 class="card-title pb-2 text-black mb-0 fw-bold">
                                    {{ Str::limit($property->name, 45, '...')  }}
                                   </h5></a>
                                   <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $property->address->district . ', ' . $property->address->city }}</p>
                                   
                                   <div class="d-flex w-75">
                                       <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>{{ $property->details->land_area }} m<sup>2</sup> </small>
                                       <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>{{ $property->details->bedrooms }} Kamar</small>
                                       <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>{{ $property->details->bathrooms }} Kamar Mandi</small>
                                   </div>
                                   <div class="row g-0 gx-5 align-items-center pt-3">
                                       {{-- <div class="col-lg-6 lh-1 g-0 gx-5 d-inline-flex listing-person">
                                           <img style="width: 50px;" class="rounded-circle img-thumbnail" src="img/team-2.jpg" alt="">
                                           <div class="ps-3 right-0">
                                               <a href="">
                                                   <h6 class="lh-1">Ferucio Daquafis</h6>
                                               </a>
                                           <small class="text-muted lh-1">User</small>
                                           </div>
                                           
                                       </div> --}}
                                   </div>
                                   
                               </div>
                           </div>
                           <!-- end -->
                        </div>
                        <div class="col-12 my-3 px-3">
                            <table class="table table-striped table-borderless table-listing-utility ">
                                <tbody>
                                    <tr>
                                       <td>Listing ID</td>
                                       <td width="60%">{{ $property->id_preview }}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat lengkap</td>
                                        <td>{{ $property->address->street . ', ' . $property->address->village . ', ' . $property->address->district . ', ' . $property->address->city . ', ' . $property->address->province . ', Kode pos: ' . $property->address->postal_code }}</td>
                                     </tr>
                                    <tr>
                                        <td>Visitors</td>
                                        <td>203</td>
                                    </tr>
                                    <tr>
                                    
                                    <td>Saved</td>
                                    <td>3</td>
                                    
                                    </tr>
                                    <tr>
                                    <td>Pageviews</td>
                                    <td>590</td>
                                    </tr>
                                </tbody>
                            </table>
                       </div>
                       <div class="col-12">
                           <h6>Catatan:</h6>
                           <ul>
                               <li>Agen telah berhasil mendapatkan calon pembeli yang tertarik dengan properti yang diiklankan.
                                   Pembeli telah menunjukkan minat dan bersedia melanjutkan ke tahap negosiasi atau transaksi sesuai ketentuan yang berlaku.
                                   </li>
                                   <li>
                                       Agen akan mendampingi penjual dalam proses selanjutnya, negosiasi, administrasi dokumen, dan koordinasi dengan notaris/PPAT. Agen bertugas memastikan transaksi berjalan lancar sesuai prosedur yang berlaku.
                                   </li>
                                   <li>Agen bertindak sebagai perantara yang membantu mempertemukan penjual dan pembeli. Semua keputusan akhir terkait transaksi tetap berada di tangan penjual dan pembeli, dengan mengikuti prosedur hukum yang berlaku.</li>
                           </ul> 

                           <!-- checklist box terhubung dengan activate button "pembeli ditemukan" -->
                           <div class="mb-3 form-check">
                               <input type="checkbox" name="TnCCheck" class="form-check-input" id="TnCCheck">
                               <label class="form-check-label fst-italic" for="TnCCheck">Ya. Saya sudah mendapatkan Pembeli dan bersiap untuk ke tahap transaksi.</label>
                           </div>
                           <div class="row gx-0 mb-3">
                               <div class="col-6">
                                  
                               </div>
                               <div class="col-6 d-flex justify-content-end text-end ">
                                <form action="{{ route('dashboard-agent.transaction.process.save', [$property->id_preview, $step]) }}" method="post">
                                    @csrf
                                     <button type="submit" name="submit" id="processSubmit" class="btn btn-primary w-auto" disabled>Pembeli Ditemukan</button>
                                </form>
                                  
                               </div>
                           </div>
                       </div>
                       
                   </div>
           </main>
           
   </main>


     <!-- DELETE MODAL -->
     <div class="modal fade" id="deleteModal{{ $property->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered rounded-3">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel"><i class="fas fa-trash-alt float-start py-1 pe-3" aria-hidden="true"></i>Hapus Properti Favorit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <div class="row d-flex flex-column justify-content-center align-items-center">
                    <i class="fas fa-exclamation-circle fa-4x text-warning my-2"></i>
                    <h3 class="text-warning mb-3">Apakah anda yakin?</h3>
                    <p>Anda akan menghapus property ini dan tidak bisa diulang.</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light text-primary border-primary" data-bs-dismiss="modal">Kembali</button>
                <form action="{{ route('dashboard-agent.delete-listing') }}" method="post">
                    @csrf
                    <input type="hidden" value="{{ $property->id }}" name="property_id">
                    <button type="submit" class="btn btn-primary">Hapus</button>
                </form>
            </div>
            </div>
        </div>
    </div>
    <!-- akhir halaman listing saya-->
</section>  
 @endsection

 @push('scripts')
 <script>
    const tnc = document.getElementById('TnCCheck'); 
    const sbmt = document.getElementById('processSubmit'); 

    tnc.addEventListener('change', function () {
        sbmt.disabled = !this.checked;
    });
</script>
 @endpush
