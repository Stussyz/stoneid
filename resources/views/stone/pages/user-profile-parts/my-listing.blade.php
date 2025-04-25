<!-- isi tab iklan property saya -->
<div class="tab-pane fade" role="tabpanel" aria-labelledby="contact-tab" id="myListing">
    <section class="bg-white mb-5">
        <div class="container mt-5">
            <header class="row g-0">
                 <!-- search and filter -->
                    <div class="col-lg-6 g-0 mb-3 text-start">
                        <div class="row g-0">
                            <div class="col-8 gx-2">
                                <input type="text" class=" w-100 form-control borders py-2" placeholder="Nama listing, id listing, user...">
                            
                            </div>
                            <div class="col-4 gx-2">
                                <a href="listing.html" class="btn btn-dark border-0 w-75 py-2">Cari</a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-3 g-0">
                         Pilih Listing
                        <span class="p-3">
                            <select class="d-inline form-select form-select-sm w-auto py-2">
                                <option selected value="1">Tampilkan Semua</option>
                                <option value="2">Request Penjualan</option>
                                <option value="3">Iklan Saya</option>
                            </select>
                        </span>
                    </div>
                       
                    <div class="col-lg-3 g-0">
                        Urutkan
                            <span class="p-3">
                                <select class="d-inline form-select form-select-sm w-auto py-2">
                                    <option selected value="1">Terbaru</option>
                                    <option value="2">Terlama</option>
                                    <option value="3">A - Z</option>
                                    <option value="4">Z - A</option>
                                    
                                </select>
                            </span>
                        </div>
                    @if (!$listingRequests->isEmpty())
                        <h5 class="text-muted">Menampilkan {{ $listingRequests->count() }} Listing properti</h5>
                    @endif
                     
                
                <!-- end search and filter -->          
            </header>

            <div class="row">
                <div class="col-xl-10">
                    @if($listingRequests->isEmpty())
                        <div class="row text-center mt-3">
                             <h3 class="text-muted py-3">Anda Belum Mengiklankan Properti Apapun</h3>
                             <div class="btn btn-primary py-3 px-5 w-50 mx-auto">Iklankan Propertimu Sekarang!</div>
                        </div>
                    @else
                    {{-- iterate the listing / listing request --}}
                    @foreach($listingRequests as $listing)

                    <div class="row gx-2 p-1 mt-3 justify-content-center border rounded">
                        <div class="col-xl-5 col-lg-5 col-md-12 position-relative">
                            <a href="">
                                <img src="{{ asset('storage/images/users/' . $listing->photo ) }}" class="img-thumbnail shadow-box img-fluid">
                            </a>
                            <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                {{ $listing->transaction_type }}
                            </div>
                            <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">{{ $listing->property_type }}</div>
                        </div>
                        <div class="col-xl-7 col-lg-7 col-md-12 px-4">
                            <div class="row pt-2">
                                <div class="col-md-8">
                                    <small class="text-muted" >Dibuat Tanggal {{ $listing->created_at->format('d/m/Y H:i') }}  </small>
                                </div>
                                <div class="col-md-4 justify-content-end d-flex">
                                    <div class="row nav nav-pills share-button">
                                        <div class="col-md-5 ps-2">
                                            <button type="button" class="btn btn-outline-primary" href=""
                                            data-bs-toggle="modal" data-bs-target="#deleteReqListingModal"><i class="fas fa-trash float-start py-1" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column">
                                <h5 class="card-title pb-2 text-primary mb-0 fw-bold">
                                    Rp {{ formatCurrencyLabel($listing->price) }}
                                </h5>
                                <a href="" target="_blank" rel="noopener noreferrer"><h5 class="card-title pb-2 text-black mb-0 fw-bold">
                                    {{ $listing->property_title }}
                                </h5></a>
                                <span class="mb-2"> <i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $listing->address}}</span>
                               
                                <small class="mb-2">{{ $listing->description}}</small>
                                <div class="text-end">
                                     <h5><span class="badge bg-warning">{{ $listing->status}}</span></h5>
                                </div>
                               
                            </div>
                        </div>
                    </div>

                    @endforeach
                    @endif

                    
                </div>
                <div class="col-xl-2">
                    <div class="bg-light text-dark p-3 mt-3 border rounded-3 banner-ad-agen sticky-top text-center align-content-center" style="height: 20em;" width="auto"><h5>BANNER UNTUK IKLAN/PROMO DLL</h5></div>
                </div>
                
            </div>
        </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteReqListingModal" tabindex="-1" aria-labelledby="deleteReqListingModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteReqListingModalLabel">Hapus Request Iklan?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <div class="row d-flex flex-column justify-content-center align-items-center">
                    <i class="fas fa-exclamation-circle fa-4x text-warning my-2"></i>
                    <h3 class="text-warning mb-3">Apakah anda yakin?</h3>
                    <p>Anda akan menghapus request ini dan tidak bisa diulang.</p>
                </div>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Hapus</button>
            </div>
        </div>
    </div>
</div>