@extends('dashboard.layouts.app')

@section('title', 'Request Iklan Penjual | Dashboard Agen Stone.id')

@section('dashboard_content')
 
 
 <!-- halaman pool user -->
 <main class="container main-content pt-3">
    <div class="row px-2 py-3">
        <h3>Pool User Listing</h3>
        <p>{{ $listingRequests->count() }} total listing ditemukan berdasarkan daerah anda: <h5><i class="fa fa-map-marker-alt text-primary me-2"></i> {{ $selectedLocation }}</h5></p>
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
                        {{-- TARUH EMPTY STATE MESSAGE DISINI  --}}
                    </div>
                    @endif
                </div>
                 <!-- POOL USER -->
                 @if(!$listingRequests->isEmpty())
                    <main class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-0 gx-5 mt-3">
                    {{-- iterate the listing / listing request --}}
                        @foreach($listingRequests as $listing)
                        @php
                            $address = $listing->address->street . ', ' . $listing->address->village . ', ' . $listing->address->district . ', ' . $listing->address->city . ', ' . $listing->address->province
                        @endphp
                            <div class="col user-pool mb-5">
                                <div class="card pool-user-card w-100">
                                    <div class="position-relative overflow-hidden">
                                        <img src="{{ asset('storage/images/listing_request/' . $listing->photo ) }}" class="card-img-top" style="aspect-ratio: 16/9;" alt="...">
                                        <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-2 py-1 px-3">{{ $listing->transaction_type }}</div>
                                        <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-2 pt-1 px-3">{{ $listing->property_type }}</div>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="text-primary">Rp {{ formatCurrencyLabel($listing->price) }}</h6>
                                        <h6 class="card-title text-capitalize">{{ $listing->property_title }}</h6>
                                        <div style="height:5rem; overflow-y:auto;">
                                            <span>
                                                <small class="lh-1"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $listing->address->village . ', ' . $listing->address->district }}</small>
                                            </span>
                                            <article class="lh-1 text-muted pt-2 ">
                                                <small>{{Str::limit($listing->description, 60, '...') }}</small>
                                            </article>
                                        </div>
                                    </div>
                                    
                                    <div class="card-footer">
                                        <a href="#" class="btn btn-primary w-100"  data-bs-toggle="modal" data-bs-target="#seeMoreReqListingModal{{ $listing->id }}"></i>Lihat Selengkapnya</a>
                                        {{-- <i class="fab fa-whatsapp float-start py-1" aria-hidden="true"> --}}
                                    </div>
                                </div>
                            </div>

                             <!-- Modal See more...-->
                        <div class="modal fade" id="seeMoreReqListingModal{{ $listing->id }}" tabindex="-1" aria-labelledby="seeMoreReqListingModal" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="seeMoreReqListingModalLabel">Detail Permintaan Iklan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card">
                                            <div class="position-relative overflow-hidden">
                                                <img src="{{ asset('storage/images/listing_request/' . $listing->photo ) }}" class="card-img-top" style="aspect-ratio: 16/9;" alt="...">
                                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-2 py-2 px-3">{{ $listing->transaction_type }}</div>
                                                <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-2 pt-1 px-3">{{ $listing->property_type }}</div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <h3>{{ $listing->property_title}}</h3>
                                                    </div>
                                                    <div class="col-lg-6 text-end">
                                                        <h3 class="text-primary">Rp {{ formatCurrencyLabel($listing->price) }}</h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <small class="lh-1"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $address }}</small>
                                                    <div class="description-wrapper mt-3">
                                                        {{ $listing->description}}
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-lg-6 d-inline-flex align-items-center">
                                                        <img style="width: 80px; aspect-ratio:1" class="rounded-circle img-thumbnail" src="{{ asset('storage/images/users/' . $listing->user->profile->photo) }}" alt="">
                                                        <div class="ps-3 right-0">
                                                            <a href="">
                                                                <h5 class="lh-1">{{ $listing->user->name }}</h5>
                                                            </a>
                                                        <small class="text-muted lh-1">User</small>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-lg-6 d-inline-flex justify-content-start justify-content-lg-end align-items-end">
                                                        Dibuat {{ $listing->created_at->diffForHumans() }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                        <form action="{{ route('dashboard-agent.pool-user.accept', $listing) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Terima Permintaan Iklan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </main>
                    <div class="col-md-12 text-center wow fadeInUp mb-5" data-wow-delay="0.1s">
                        <button id="loadMore" class="btn btn-primary p-3" href="">Memuat Lebih Banyak</button>
                    </div>
                @endif
            </div>
         </section>
    </div>
</main>
 <!-- akhir halaman pool user-->

 @endsection