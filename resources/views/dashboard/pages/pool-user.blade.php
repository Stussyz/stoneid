@extends('dashboard.layouts.app')

@section('title', 'Request Iklan Penjual | Dashboard Agen Stone.id')

@section('dashboard_content')
 
 
 <!-- halaman pool user -->
 <main class="container main-content pt-3">
    <div class="row px-2 py-3">
        <h3>Pool User Listing</h3>
        <p>{{ $listingRequests->count() }} total listing ditemukan berdasarkan daerah anda "{{ $selectedLocation }}"</p>
        <section class="bg-white mb-3">
            <div class="container mt-3">
                <div class="row">
                     <!-- search and filter -->
                     <div class="col-lg-5 g-0 mb-3 text-start">
                        <div class="row g-0">
                            
                            <div class="col-8 gx-2">
                                <input type="text" class=" w-100 form-control borders py-2" placeholder="Nama listing, id listing, user...">
                            
                            </div>
                            <div class="col-4 gx-2">
                                <a href="listing.html" class="btn btn-dark border-0 w-75 py-2">Cari</a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-4 g-0">
                         Pilih Domisili
                        <span class="p-3">
                            <select class="d-inline form-select form-select-sm w-auto py-2">
                                <option selected value="1">Tampilkan Semua</option>
                                <option value="2">Request Penjualan</option>
                                <option value="3">Iklan Saya</option>
                            </select>
                        </span>
                    </div>
                       
                    <div class="col-lg-3 gx-0">
                        <span>Urutkan</span>
                            <span class="p-3">
                                <select class="d-inline form-select form-select-sm w-auto py-2">
                                    <option selected value="1">Terbaru</option>
                                    <option value="2">Terlama</option>
                                    <option value="3">A - Z</option>
                                    <option value="4">Z - A</option>
                                    
                                </select>
                            </span>
                    </div>
                </div>

                <div class="row">
                    @if($listingRequests->isEmpty())
                    <div class="row text-center mt-3">
                         <h3 class="text-muted py-3">Tidak Ada User yang Request Iklan di {{ $selectedLocation }}</h3>
                        
                    </div>
                    @endif
                </div>


                 <!-- POOL USER -->
                <main class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-0 gx-5 mt-3">

               
                 @if(!$listingRequests->isEmpty())
                {{-- iterate the listing / listing request --}}
                @foreach($listingRequests as $listing)
                    <div class="col user-pool mb-5">
                        <div class="card pool-user-card w-100">
                            <div class="position-relative overflow-hidden">
                                <img src="{{ asset('storage/images/users/' . $listing->photo ) }}" class="card-img-top" style="aspect-ratio: 16/9;" alt="...">
                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-2 py-1 px-3">{{ $listing->transaction_type }}</div>
                                <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-2 pt-1 px-3">{{ $listing->property_type }}</div>
                            </div>
                            <div class="card-body">
                                <h6 class="text-primary">Rp {{ formatCurrencyLabel($listing->price) }}</h6>
                                
                                    <h6 class="card-title text-capitalize">{{ $listing->property_title }}</h6>
                                    <div style="height:8rem; overflow-y:auto;">
                                    <small class="lh-1"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $listing->address}}</small>
                                    <article class="lh-1 text-muted pt-2 ">
                                        <small>{{ $listing->description}}</small>
                                    </article>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-primary w-100"><i class="fab fa-whatsapp float-start py-1" aria-hidden="true"></i>Hubungi User</a>
                              </div>
                          </div>
                    </div>

                    @endforeach
                    @endif
                </main> 

                <div class="col-md-12 text-center wow fadeInUp mb-5" data-wow-delay="0.1s">
                    <button id="loadMore" class="btn btn-primary p-3" href="">Memuat Lebih Banyak</button>
                </div>
            </div>
         </section>
    </div>
</main>
 <!-- akhir halaman pool user-->

 @endsection