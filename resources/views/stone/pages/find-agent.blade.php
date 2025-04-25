@extends('stone.layouts.app')

@section('title', 'Temukan Agen Pilihanmu | Stone.id')

{{-- IMAGE NYA BELOM DIGANTI! --}}

@section('content')


@push('stone-styles')
<style>
    .region-filter-img img{
        transition: .3s ease-in;
    }

    .region-filter-img img:hover,
    .region-name:hover img{
        transform: scale(1.1);

    }
    .region-item img{
        height: 10em;
    }
    .cari-agen-card{
        display: none;
    }
</style>
@endpush

         
  <!-- Header Start -->
<div class="container-fluid header bg-white p-0">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-6 p-5 mt-lg-5">
            <h1 class="display-5 animated fadeIn mb-4">Cari agen</h1> 
            <nav aria-label="breadcrumb animated fadeIn">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ Route('home') }}">Home</a></li>
                    <li class="breadcrumb-item text-body active" aria-current="page">Cari Agen</li>
                </ol>
            </nav>
            <p>Kami memberikan fasilitas agen untuk <br>kemudahan penjualan properti anda.</p>
        </div>
        <div class="col-md-6 animated fadeIn">
            <img class="img-fluid" src="{{ asset('images/banners/banner-1.png')}}" alt="">
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Search Start -->
<div class="container-fluid bg-primary mb-3 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
    <div class="container">
        <div class="row g-2">
            <div class="col-md-10 gx-3">
                <div class="row g-2 ">
                    <div class="col-md-12">
                        <input type="text" class="form-control border-0 py-3 w-100" placeholder="Cari Lokasi, nama agen, kata kunci lainnya">
                    </div>
                   
                </div>
            </div>
            <div class="col-md-2">
                <button class="btn btn-dark border-0 w-100 py-3">Search</button>
            </div>
        </div>
    </div>
</div>
<!-- Search End -->


<!-- FILTER REGION AGEN -->
<section class="container-xxl px-5 pt-5 bg-white">
    <div class="container">
        <h3>Lokasi Agen</h3>
        <p>Temukan agen di lokasi incaran anda!</p>
        <!-- filter daerah -->
            <div class="owl-carousel region-filter-carousel wow fadeInUp " data-wow-delay="0.1s">
                <div class="region-item overflow-hidden position-relative rounded-3">
                    <a class="region-filter-img" href="">
                        <img src="{{ asset('images/banners/jakarta.jpg') }}" style="filter: brightness(50%);" alt="">
                        <div class="region-name text-center lh-1 position-absolute align-content-center top-50 start-50 translate-middle">
                            <h5 class="text-white">Jabodetabek</h5>
                            <small class="text-white mx-auto">180 Agen</small>
                        </div> 
                    </a>
                </div> 
                <div class="region-item rounded overflow-hidden position-relative rounded-3">
                    <a class="region-filter-img" href="">
                        <img src="{{ asset('images/banners/bandung.jpg') }}" style="filter: brightness(50%);" alt="">
                        <div class="region-name lh-1 text-center position-absolute align-content-center top-50 start-50 translate-middle">
                            <h5 class="text-white">Bandung</h5>
                            <small class="text-white mx-auto">23 Agen</small>
                        </div> 
                    </a>
                </div> 
                <div class="region-item rounded overflow-hidden position-relative rounded-3">
                    <a class="region-filter-img" href="">
                        <img src="{{ asset('images/banners/semarang.jpg') }}" style="filter: brightness(50%);" alt="">
                        <div class="region-name lh-1 text-center position-absolute align-content-center top-50 start-50 translate-middle">
                            <h5 class="text-white">Semarang</h5>
                            <small class="text-white mx-auto">92 Agen</small>
                        </div> 
                    </a>
                </div> 
                <div class="region-item rounded overflow-hidden position-relative rounded-3">
                    <a class="region-filter-img" href="">
                        <img src="{{ asset('images/banners/surabaya.jpg') }}" style="filter: brightness(50%);" alt="">
                        <div class="region-name lh-1 text-center position-absolute align-content-center top-50 start-50 translate-middle">
                            <h5 class="text-white">Surabaya</h5>
                            <small class="text-white mx-auto">78 Agen</small>
                        </div> 
                    </a>
                </div> 
                <div class="region-item rounded overflow-hidden position-relative rounded-3">
                    <a class="region-filter-img" href="">
                        <img src="{{ asset('images/banners/malang.jpg') }}" style="filter: brightness(50%);" alt="">
                        <div class="region-name lh-1 text-center position-absolute align-content-center top-50 start-50 translate-middle">
                            <h5 class="text-white">Malang</h5>
                            <small class="text-white mx-auto">34 Agen</small>
                        </div> 
                    </a>
                </div> 
                <div class="region-item rounded overflow-hidden position-relative rounded-3">
                    <a class="region-filter-img" href="">
                        <img src="{{ asset('images/banners/yogyakarta.jpg') }}" style="filter: brightness(50%);" alt="">
                        <div class="region-name lh-1 text-center position-absolute align-content-center top-50 start-50 translate-middle">
                            <h5 class="text-white">Yogyakarta</h5>
                            <small class="text-white mx-auto">57 Agen</small>
                        </div> 
                    </a>
                </div> 
                <div class="region-item rounded overflow-hidden position-relative rounded-3">
                    <a class="region-filter-img" href="">
                        <img src="{{ asset('images/banners/medan.jpg') }}" style="filter: brightness(50%);" alt="">
                        <div class="region-name lh-1 text-center position-absolute align-content-center top-50 start-50 translate-middle">
                            <h5 class="text-white">Medan</h5>
                            <small class="text-white mx-auto">48 Agen</small>
                        </div> 
                    </a>
                </div> 
                <div class="region-item rounded overflow-hidden position-relative rounded-3">
                    <a class="region-filter-img" href="">
                        <img src="{{ asset('images/banners/samarinda.jpg') }}" style="filter: brightness(50%);" alt="">
                        <div class="region-name lh-1 text-center position-absolute align-content-center top-50 start-50 translate-middle">
                            <h5 class="text-white">Samarinda</h5>
                            <small class="text-white mx-auto">12 Agen</small>
                        </div> 
                    </a>
                </div>     
                
            </div>

        </div>
    
</section>


<main class="container-xxl px-5 pt-5 bg-white">
    <div class="container">
        <section class="row mt-5">
            <article class="col-md-6">
                <h4>Agen Properti di Indonesia</h4>
                <small class="text-muted">{{ $agents->count() }} Agen Properti ditemukan</small>
            </article>
            <div class="col-md-6 text-start text-lg-end">
                <div class="row mt-3">
                         <!-- search and filter -->  
                          
                         <ul class="nav nav-pills d-inline-flex justify-content-end mb-3">
                            <li class="nav-item me-4">Spesialisasi
                                <select class="d-inline form-select form-select-sm w-auto py-2">
                                    <option selected value="1">Segala Properti</option>
                                    <option value="2">Rumah</option>
                                    <option value="3">Ruko</option>
                                    <option value="4">Apartmen</option>
                                    <option value="5">Tanah</option>
                                    <option value="6">Villa</option>
                                    <option value="7">Gedung</option>
                                    <option value="8">Pabrik</option>
                                </select>
                            </li>
                            <li class="nav-item me-2">Urutkan
                                <select class="d-inline form-select form-select-sm w-auto py-2">
                                    <option selected value="1">Agen Terlama</option>
                                    <option value="2">Agen Terbaru</option>
                                    <option value="3">Listing Iklan Terbanyak</option>
                                    <option value="4">Terjual Terbanyak</option>
                                    <option value="4">Tersewa Terbanyak</option>
                                    
                                </select>
                            </li>
                        </ul>

                        <!-- end search and filter -->
                </div>

            </div>
        </section>
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3 my-3">

            @forelse($agents as $agent)
                <div class="col cari-agen-card mb-3">
                    <article class="bg-light rounded p-3">
                        <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                            <a href="{{ route('view-agent', $agent->id) }}">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <img class="rounded-circle" src="{{ asset('storage/images/agents/' . $agent->photo) }}" alt="" style=" width: 100px; height: 100px; aspect-ratio: 1;">
                                    </div>
                                    <div class="col-md-8">
                                        <p class="fs-5 p-0 m-0 fw-bold text-primary">{{ $agent->user->name }}</p>
                                        <p class="fs-6 text-muted p-0 m-0"><i class="fa fa-map-marker-alt text-primary me-2"></i>Bandung, Jawa Barat</p>
                                        <p class="fs-6 text-muted p-0 m-0">{{ Str::limit($agent->NIB, 9, '***') }}</p>
                                    
                                    </div>
                                </div>
                            </a>
                            <hr class="w-100">
                            <div class="row my-3">
                                <small class="fw-bold text-dark">Member sejak {{ $agent->created_at->format('M Y') }}</small><br>
                                <small>{!! $agent->bio !!}</small>
                                <a href="{{ route('view-agent', $agent->id) }}" class="border-primary">Lihat Info Agen</a>
                            </div>
                            
                            <div class="row border rounded-3 mb-3">
                                <div class="col-md-4 text-center py-3 lh-1">
                                    <i class="far fa-handshake mb-2 "></i>
                                    <h5 class="text-primary mb-2" data-toggle="counter-up">170</h5>
                                    <small class="text-muted mb-0">Iklan Tayang</small>
                                </div>
                                <div class="col-md-4 text-center py-3 lh-1">
                                    <i class="fas fa-money-bill-wave mb-2"></i>
                                    <h5 class="text-primary mb-2" data-toggle="counter-up">129</h5>
                                    <small class="ttext-muted mb-0">Terjual</small>
                                </div>
                                <div class="col-md-4 text-center py-3 lh-1">
                                    <i class="fas fa-calendar-alt mb-2"></i>
                                    <h5 class="text-primary mb-2" data-toggle="counter-up">41</h5>
                                    <small class="text-muted mb-0">Tersewa</small>
                                </div>
                            </div>
                        
                            <div class="row nav nav-pills mb-3 justify-content-center">
                                <div class="col-md-5 w-50 px-2">
                                    <button type="button" class="btn btn-outline-primary w-100" href=""
                                    data-bs-toggle="modal" data-bs-target="#callModal"><i class="fa fa-phone float-start py-1" aria-hidden="true"></i>Hubungi</button>
                                </div> 
                                <div class="col-md-5 w-50 px-2">
                                    <button type="button" class="btn btn-primary w-100 active" href=""  data-bs-toggle="modal" data-bs-target="#whatsappModal"><i class="fab fa-whatsapp float-start py-1" aria-hidden="true"></i>Whatsapp</button>
                                </div>
                            </div>
                            
                        </div>
                    </article>
                </div>
            @empty
            <div class="d-flex flex-column align-items-center justify-content-center text-center px-5">
                <img src="{{ asset('images/icons/empty-state-icon.png') }}" alt="No History" style="width: 180px; height: auto;">
                <h3 class="text-dark fw-semibold">Belum ada Agen Tersedia di Daerahmu</h3>
                <p class="text-muted">Agen di wilayahmu sedang tidak aktif / belum tersedia, silahkan cari agen di wilayah lainnya atau meminta bantuan untuk request iklan.</p>
                <a href="{{ route('property.listings') }}" class="btn btn-primary mt-3">
                    Cari Properti
                </a>
            </div>
            @endforelse
            
        </div>

        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
            <button id="loadMore" class="btn btn-primary py-3 px-5">Memuat Lebih Banyak</button>
        </div>

    </div>
</main>

@endsection