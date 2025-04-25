@extends('stone.layouts.app')

@section('title', 'Properti Dijual atau Disewa di Indonesia | Harga 2025')

@section('content')
         
         <!-- Search Start -->
         <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                <div class="row g-2">
                    <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 py-3" placeholder="Lokasi, kata kunci, area...">
                            </div>
                            <div class="col-md-6">
                                <select class="form-select border-0 py-3">
                                    <option selected value="1">Dijual</option>
                                    <option value="2">Disewa</option>
                                    <option value="3">Proyek Baru</option>
                                </select>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href="listing.html" class="btn btn-dark border-0 w-100 py-3">Cari</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search End -->

        
        <!-- Property List Start -->
        <section class="container-xxl py-3">
            <div class="container">
                <header>
                    <div class="row">
                    <h3>Menampilkan hasil pencarian...</h3>
                    <p class="text-muted">1982 properti tampil</p>
                </div>
                <div class="row g-0 gx-5 align-items-end">
                    <div class="col-lg-12 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                        
                        Urutkan
                        <span class="p-3">
                        <select class="d-inline form-select form-select-sm w-25 py-3 px-3 shadow-sm">
                            <option selected value="1">Dari terbaru ke terlama</option>
                            <option value="2">Dari terlama ke terbaru</option>
                            <option value="3">Dari termahal ke termurah</option>
                            <option value="4">Dari termurah ke termahal</option>
                            
                        </select></span>
                        <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-primary active" data-bs-toggle="pill" href="#tab-1">Terpopuler</a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-2">Terbaru</a>
                            </li>
                        </ul>
                    </div>
                </div>
                </header>
                
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        
                        <main class="row g-4">

                        @forelse($properties as $property)
                            @php
                                $coverImage = $property->propertyImages->firstWhere('order', 1);
                                 $address = $property->address;
                                 $addressDisplay = $address->district . ', ' . $address->city;
                            @endphp

                            <div class="col-lg-4 col-md-6 wow fadeInUp property-card" data-wow-delay="0.1s">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden property-thumbnail-wrapper">
                                        <a href="{{ route('property.show', [$property->id_preview, $property->slug]) }}">
                                            <img class="img-fluid" src="{{ asset('storage/' . $coverImage->image_path ) }}" alt="">
                                        </a>
                                        <div class="share-favorite-btn position-absolute top-0 w-100">
                                            <div class=" d-flex flex-row pt-4 justify-content-end pe-3">
                                                <a><h4 class="me-3"><i class="text-white bi bi-share"></i></h4></a>
                                                @auth
                                                    @role('user')
                                                        <a><h4><i class="text-white bi bi {{ in_array($property->id, $userFavorites) ? 'bi-heart-fill text-danger' : 'bi-heart' }} favorite-toggle"
                                                        data-id="{{ $property->id }}"></h4></i></a>  
                                                    @endrole  
                                                @endauth
                                            </div> 
                                        </div>
                                       
                                        <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3"> {{ $property->transaction_type }}</div>
                                        <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">{{ $property->property_type }}</div>
                                    </div>

                                    {{-- PRICE, NAME AND ADDRESS --}}
                                    <div class="p-4 pb-0">
                                        <h5 class="text-primary mb-3">Rp {{ formatCurrencyLabel($property->price) . ' ' . ($property->min_rent_period) ?? null  }}</h5>
                                        <a class="d-block h5 mb-2" href="{{ route('property.show', [$property->id_preview, $property->slug]) }}">{{ Str::limit($property->name, 45, '...')  }}</a>
                                        <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $addressDisplay }}</p>
                                    </div>

                                    {{-- AMENITIES --}}
                                    <div class="d-flex border-top">
                                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>{{ $property->details->land_area }} m<sup>2</sup></small>
                                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>{{ $property->details->bedrooms }} Kamar</small>
                                        <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>{{ $property->details->bathrooms }} Kamar Mandi</small>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="d-flex flex-column align-items-center justify-content-center text-center px-5 py-3">
                                <img src="{{ asset('images/icons/empty-state-icon.png') }}" alt="No History" style="width: 180px; height: auto;">
                                <h3 class="text-dark fw-semibold">Properti Tidak Tersedia</h3>
                                <p class="text-muted">Coba Cari Properti Lain.</p>
                                <a href="{{ route('property.listings') }}" class="btn btn-primary mt-3">
                                    Lihat Properti
                                </a>
                            </div>
                        @endforelse
                       
                        <div class="row d-flex justify-content-center wow fadeInUp mt-5 " data-wow-delay="0.1s">
                            <button id="loadMore" class="btn btn-primary py-3 px-5 w-auto" href="">Memuat Lebih Banyak</button>
                       </div>
                      
                        </main>
                    </div>
                </div>
            </div>
        </section>
        <!-- Property List End -->
       
@endsection

@push('stone-scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const token = "{{ csrf_token() }}";
    
      document.querySelectorAll('.favorite-toggle').forEach(button => {
        button.addEventListener('click', function () {
          const propertyId = this.dataset.id;
          const icon = this;
    
          fetch(`/property/${propertyId}/favorite`, {
            method: 'POST',
            headers: {
              'X-CSRF-TOKEN': token,
              'Accept': 'application/json',
            }
          })
          .then(response => response.json())
          .then(data => {
            if (data.favorited) {
              icon.classList.remove('bi-heart');
              icon.classList.add('bi-heart-fill', 'text-danger');
            } else {
              icon.classList.remove('bi-heart-fill', 'text-danger');
              icon.classList.add('bi-heart');
            }
          });
        });
      });
    });
</script>
@endpush