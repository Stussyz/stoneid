@extends('stone.layouts.app')

@section('title', 'Stone.id - Jual Rumah Jadi Gampang')

@section('content')

@push('stone-styles')
    <style>
         .owl-carousel{
        z-index : 0 !important;
        }
        .hero-section {
        background: linear-gradient(rgba( 41, 218, 176, 0.9), rgba(0, 185, 142, 0.9));
        padding: 2rem 2rem;
        color: white;
        border-radius: 0.5rem;
        width: 100%;
        
    
        .nav-underline .nav-link {
        border: 2px solid transparent !important;
        color: rgba(255, 255, 255, 0.7);
        background: transparent !important;
        margin: 0 1rem;
        font-weight: 500;
        padding-bottom: 0.5rem;
        transition: border-color 0.3s ease, color 0.3s ease;
        }
    
        .nav-underline .nav-link.active {
            border-bottom: 2px solid white !important;
            color: #fff;
        }
    
        .search-box {
        background: #fff;
        border-radius: 0.5rem;
        padding: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-top: 0.5rem;
        }
    
        .search-box .search-icon {
        color: #888;
        padding-left: 0.75rem;
        }
    
        .search-box input {
        border: none;
        outline: none;
        flex-grow: 1;
        padding: 0.5rem 0.75rem;
        }
    
        .search-box input::placeholder {
        color: #aaa;
        }
    
        .search-box button {
        background-color: var(--dark);
        color: white;
        border: none;
        border-radius: 0.5rem;
        padding: 0.4rem 2rem;
        font-weight: 500;
        margin-right: 0.5rem;
        }
    }
    </style>
@endpush

         <!-- Header Start -->
         <header class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center align-items-lg-start flex-column-reverse flex-md-row">
                <div class="col-md-6 pb-5 px-5" style="margin-top:10rem;">
                    <h1 class="display-5 animated fadeIn mb-4">Jual Beli <span class="text-primary">Property</span><br> Masa Kini</h1>
                    <p class="animated fadeIn mb-3 pb-2">Pengalaman Transaksi berbasis A.I , Virtual Tur,<br> dan proses yang cepat!</p>

                    <section class="hero-section text-center mx-auto">
                        {{-- <h4 class="fw-bold mb-4 text-white">Jual Beli dan Sewa Properti Jadi Mudah</h4> --}}
                      
                        <!-- Tabs -->
                        <ul class="nav nav-underline justify-content-center mb-4" id="propertyTabs" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active" id="dijual-tab" data-bs-toggle="tab" data-bs-target="#dijual" type="button">Dijual</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="disewa-tab" data-bs-toggle="tab" data-bs-target="#disewa" type="button">Disewa</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="baru-tab" data-bs-toggle="tab" data-bs-target="#baru" type="button">Properti Baru</button>
                            </li>
                        </ul>
                      
                        <!-- Search Box -->
                        <form action="{{ route('property.listings') }}" method="GET" 
                        class="search-box mx-auto" style="max-width: 500px;">
                            <span class="search-icon"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control" name="q" value="{{ request('q') }}" placeholder="Lokasi, keyword, area, project, developer">
                            <button type="submit">Cari</button>
                        </form>
                    </section>
                </div>
                <div class="col-md-6 ">
                    <div class="owl-carousel header-carousel">
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="{{ asset('images/banners/banner-1.png')}}" alt="">
                        </div>
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="{{ asset('images/banners/banner-2.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header End -->

                <!-- Search Start -->
                {{-- <section class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
                    <div class="container">
                        <main class="row g-2">
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
                        </main>
                    </div>
                </section> --}}
        
        
                <!-- Category Start -->
                <section class="container-xxl pb-5 pt-5">
                    <div class="container">
                        <div class="row g-4">
                            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                                <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                                    <div class="rounded p-4">
                                        <div class="icon mb-3">
                                            <img class="img-fluid" src="{{ asset('images/icons/icon-apartment.png')}}" alt="Icon">
                                        </div>
                                        <h6>Apartemen</h6>
                                        <span>123 Properties</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                                <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                                    <div class="rounded p-4">
                                        <div class="icon mb-3">
                                            <img class="img-fluid" src="{{ asset('images/icons/icon-villa.png')}}" alt="Icon">
                                        </div>
                                        <h6>Villa</h6>
                                        <span>123 Properties</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                                <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                                    <div class="rounded p-4">
                                        <div class="icon mb-3">
                                            <img class="img-fluid" src="{{ asset('images/icons/icon-house.png')}}" alt="Icon">
                                        </div>
                                        <h6>Rumah</h6>
                                        <span>123 Properties</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                                <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                                    <div class="rounded p-4">
                                        <div class="icon mb-3">
                                            <img class="img-fluid" src="{{ asset('images/icons/icon-housing.png')}}" alt="Icon">
                                        </div>
                                        <h6>Open House</h6>
                                        <span>123 Properties</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                                <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                                    <div class="rounded p-4">
                                        <div class="icon mb-3">
                                            <img class="img-fluid" src="{{ asset('images/icons/icon-building.png')}}" alt="Icon">
                                        </div>
                                        <h6>Tanah</h6>
                                        <span>123 Properties</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                                <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                                    <div class="rounded p-4">
                                        <div class="icon mb-3">
                                            <img class="img-fluid" src="{{ asset('images/icons/icon-neighborhood.png')}}" alt="Icon">
                                        </div>
                                        <h6>Gudang</h6>
                                        <span>123 Properties</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                                <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                                    <div class="rounded p-4">
                                        <div class="icon mb-3">
                                            <img class="img-fluid" src="{{ asset('images/icons/icon-condominium.png')}}" alt="Icon">
                                        </div>
                                        <h6>Carikan Properti</h6>
                                        <span>123 Properties</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                                <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                                    <div class="rounded p-4">
                                        <div class="icon mb-3">
                                            <img class="img-fluid" src="{{ asset('images/icons/icon-luxury.png')}}" alt="Icon">
                                        </div>
                                        <h6>Titip Jual</h6>
                                        <span>123 Properties</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Category End -->
        
        
                <!-- About Start -->
                <section class="container-xxl py-5">
                    <div class="container">
                        <main class="row g-5 align-items-center">
                            <aside class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                                <div class="about-img position-relative overflow-hidden p-5 pe-0">
                                    <img class="img-fluid w-100" src="{{ asset('images/banners/about.jpg')}}">
                                </div>
                            </aside>
                            <article class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                                <h1 class="mb-4">#1 Tempat Jual Beli Properti Online Se-Indonesia</h1>
                                <p class="mb-4">Stone.id adalah solusi terbaik untuk kebutuhan properti Anda! Kami menyediakan berbagai pilihan properti eksklusif di Indonesia, mulai dari rumah mewah, apartemen strategis, hingga tanah investasi bernilai tinggi. Dengan pengalaman dan jaringan luas, kami memastikan setiap transaksi properti berjalan aman, mudah, dan menguntungkan. Jadikan Stone.id mitra terpercaya Anda dalam mewujudkan investasi properti impian! </p>
                                <p><i class="fa fa-check text-primary me-3"></i>Harga Lebih Kompetitif</p>
                                <p><i class="fa fa-check text-primary me-3"></i>Proses Lebih Transparan</p>
                                <p><i class="fa fa-check text-primary me-3"></i>Dukungan Personal & Fleksibel</p>
                                <a class="btn btn-primary py-3 px-5 mt-3" href="">Read More</a>
                            </article>
                        </main>
                    </div>
                </section>
                <!-- About End -->
        
                
                <!-- Rekomendasi -->
                <section class="container-xxl py-3">
                    <div class="container">
                        <div class="row">
                            <h1 class="my-5">Rekomendasi sesuai Pencarianmu</h1>
                            <div class="owl-carousel property-carousel wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="property-item rounded overflow-hidden">
                                        <div class="position-relative overflow-hidden">
                                            <a href=""><img class="img-fluid" src="{{ asset('images/properties/property-5.jpg')}}" alt=""></a>
                                            <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For Sell</div>
                                            <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Home</div>
                                        </div>
                                        <div class="p-4 pb-0">
                                            <h5 class="text-primary mb-3">$12,345</h5>
                                            <a class="d-block h5 mb-2" href="">Golden Urban House For Sell</a>
                                            <p><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York, USA</p>
                                        </div>
                                        <div class="d-flex border-top">
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>1000 Sqft</small>
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                                            <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                                        </div>
                                    </div>
                                    <div class="property-item rounded overflow-hidden">
                                        <div class="position-relative overflow-hidden">
                                            <a href=""><img class="img-fluid" src="{{ asset('images/properties/property-5.jpg')}}" alt=""></a>
                                            <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For Sell</div>
                                            <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Home</div>
                                        </div>
                                        <div class="p-4 pb-0">
                                            <h5 class="text-primary mb-3">$12,345</h5>
                                            <a class="d-block h5 mb-2" href="">Golden Urban House For Sell</a>
                                            <p><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York, USA</p>
                                        </div>
                                        <div class="d-flex border-top">
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>1000 Sqft</small>
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                                            <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                                        </div>
                                    </div>           
                                    <div class="property-item rounded overflow-hidden">
                                        <div class="position-relative overflow-hidden">
                                            <a href=""><img class="img-fluid" src="{{ asset('images/properties/property-5.jpg')}}" alt=""></a>
                                            <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For Sell</div>
                                            <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Home</div>
                                        </div>
                                        <div class="p-4 pb-0">
                                            <h5 class="text-primary mb-3">$12,345</h5>
                                            <a class="d-block h5 mb-2" href="">Golden Urban House For Sell</a>
                                            <p><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York, USA</p>
                                        </div>
                                        <div class="d-flex border-top">
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>1000 Sqft</small>
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                                            <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                                        </div>
                                    </div>
                                    <div class="property-item rounded overflow-hidden">
                                        <div class="position-relative overflow-hidden">
                                            <a href=""><img class="img-fluid" src="{{ asset('images/properties/property-5.jpg')}}" alt=""></a>
                                            <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For Sell</div>
                                            <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Home</div>
                                        </div>
                                        <div class="p-4 pb-0">
                                            <h5 class="text-primary mb-3">$12,345</h5>
                                            <a class="d-block h5 mb-2" href="">Golden Urban House For Sell</a>
                                            <p><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York, USA</p>
                                        </div>
                                        <div class="d-flex border-top">
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>1000 Sqft</small>
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                                            <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </section>
                
                

                <!-- Property List Start -->
                <section class="container-xxl py-5">
                    <div class="container">
                        <div class="row g-0 gx-5 align-items-end">
                            <div class="col-lg-6">
                                <article class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                                    <h1 class="mb-3">Property Terpopuler</h1>
                                    <p>Rekomendasi terbaik untuk Anda. Dapatkan informasi proyek terkini mengenai rumah minimalis, ruko strategis, hingga apartment modern.</p>
                                </article>
                            </div>
                            <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                                <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                                    <li class="nav-item me-2">
                                        <button class="btn btn-outline-primary active" data-bs-toggle="pill" data-bs-target="#tab-1" type="button" role="tab" aria-selected="true">Terpopuler</button>
                                    </li>
                                    <li class="nav-item me-2">
                                        <button class="btn btn-outline-primary" data-bs-toggle="pill" data-bs-target="#tab-2">Terbaru</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane fade show p-0 active">
                                <div class="row g-4">
                                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                        <div class="property-item rounded overflow-hidden">
                                            <div class="position-relative overflow-hidden">
                                                <a href=""><img class="img-fluid" src="{{ asset('images/properties/property-1.jpg') }}" alt=""></a>
                                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">Dijual</div>
                                                <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Rumah</div>
                                            </div>
                                            <div class="p-4 pb-0">
                                                <h5 class="text-primary mb-3">Rp 7,5 Miliar</h5>
                                                <a class="d-block h5 mb-2" href="listing-detail.html">Citraland Surabaya Luxury Mansion</a>
                                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York, USA</p>
                                            </div>
                                            <div class="d-flex border-top">
                                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>1000 Sqft</small>
                                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                                                <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                                        <div class="property-item rounded overflow-hidden">
                                            <div class="position-relative overflow-hidden">
                                                <a href=""><img class="img-fluid" src="{{ asset('images/properties/property-2.jpg') }}" alt=""></a>
                                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">Disewakan</div>
                                                <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Villa</div>
                                            </div>
                                            <div class="p-4 pb-0">
                                                <h5 class="text-primary mb-3">Rp 10 Juta</h5>
                                                <a class="d-block h5 mb-2" href="">Villa Golden Tulip No 69</a>
                                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York, USA</p>
                                            </div>
                                            <div class="d-flex border-top">
                                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>1000 Sqft</small>
                                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                                                <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                                        <div class="property-item rounded overflow-hidden">
                                            <div class="position-relative overflow-hidden">
                                                <a href=""><img class="img-fluid" src="{{ asset('images/properties/property-3.jpg') }}" alt=""></a>
                                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For Sell</div>
                                                <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Office</div>
                                            </div>
                                            <div class="p-4 pb-0">
                                                <h5 class="text-primary mb-3">$12,345</h5>
                                                <a class="d-block h5 mb-2" href="">Golden Urban House For Sell</a>
                                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York, USA</p>
                                            </div>
                                            <div class="d-flex border-top">
                                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>1000 Sqft</small>
                                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                                                <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                        <div class="property-item rounded overflow-hidden">
                                            <div class="position-relative overflow-hidden">
                                                <a href=""><img class="img-fluid" src="{{ asset('images/properties/property-4.jpg') }}" alt=""></a>
                                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For Rent</div>
                                                <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Building</div>
                                            </div>
                                            <div class="p-4 pb-0">
                                                <h5 class="text-primary mb-3">$12,345</h5>
                                                <a class="d-block h5 mb-2" href="">Golden Urban House For Sell</a>
                                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York, USA</p>
                                            </div>
                                            <div class="d-flex border-top">
                                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>1000 Sqft</small>
                                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                                                <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                                        <div class="property-item rounded overflow-hidden">
                                            <div class="position-relative overflow-hidden">
                                                <a href=""><img class="img-fluid" src="{{ asset('images/properties/property-5.jpg') }}" alt=""></a>
                                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For Sell</div>
                                                <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Home</div>
                                            </div>
                                            <div class="p-4 pb-0">
                                                <h5 class="text-primary mb-3">$12,345</h5>
                                                <a class="d-block h5 mb-2" href="">Golden Urban House For Sell</a>
                                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York, USA</p>
                                            </div>
                                            <div class="d-flex border-top">
                                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>1000 Sqft</small>
                                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                                                <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                                        <div class="property-item rounded overflow-hidden">
                                            <div class="position-relative overflow-hidden">
                                                <a href=""><img class="img-fluid" src="{{ asset('images/properties/property-6.jpg') }}" alt=""></a>
                                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For Rent</div>
                                                <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Shop</div>
                                            </div>
                                            <div class="p-4 pb-0">
                                                <h5 class="text-primary mb-3">$12,345</h5>
                                                <a class="d-block h5 mb-2" href="">Golden Urban House For Sell</a>
                                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York, USA</p>
                                            </div>
                                            <div class="d-flex border-top">
                                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>1000 Sqft</small>
                                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                                                <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                                        <a class="btn btn-primary py-3 px-5" href="#">Lihat Property Lainnya</a>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane fade p-0">
                                <div class="row g-4">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="property-item rounded overflow-hidden">
                                            <div class="position-relative overflow-hidden">
                                                <a href=""><img class="img-fluid" src="img/property-1.jpg" alt=""></a>
                                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For Sell</div>
                                                <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Appartment</div>
                                            </div>
                                            <div class="p-4 pb-0">
                                                <h5 class="text-primary mb-3">$12,345</h5>
                                                <a class="d-block h5 mb-2" href="">Golden Urban House For Sell</a>
                                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York, USA</p>
                                            </div>
                                            <div class="d-flex border-top">
                                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>1000 Sqft</small>
                                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                                                <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="property-item rounded overflow-hidden">
                                            <div class="position-relative overflow-hidden">
                                                <a href=""><img class="img-fluid" src="img/property-2.jpg" alt=""></a>
                                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For Rent</div>
                                                <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Villa</div>
                                            </div>
                                            <div class="p-4 pb-0">
                                                <h5 class="text-primary mb-3">$12,345</h5>
                                                <a class="d-block h5 mb-2" href="">Golden Urban House For Sell</a>
                                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York, USA</p>
                                            </div>
                                            <div class="d-flex border-top">
                                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>1000 Sqft</small>
                                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                                                <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="property-item rounded overflow-hidden">
                                            <div class="position-relative overflow-hidden">
                                                <a href=""><img class="img-fluid" src="img/property-3.jpg" alt=""></a>
                                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For Sell</div>
                                                <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Office</div>
                                            </div>
                                            <div class="p-4 pb-0">
                                                <h5 class="text-primary mb-3">$12,345</h5>
                                                <a class="d-block h5 mb-2" href="">Golden Urban House For Sell</a>
                                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York, USA</p>
                                            </div>
                                            <div class="d-flex border-top">
                                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>1000 Sqft</small>
                                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                                                <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="property-item rounded overflow-hidden">
                                            <div class="position-relative overflow-hidden">
                                                <a href=""><img class="img-fluid" src="img/property-4.jpg" alt=""></a>
                                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For Rent</div>
                                                <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Building</div>
                                            </div>
                                            <div class="p-4 pb-0">
                                                <h5 class="text-primary mb-3">$12,345</h5>
                                                <a class="d-block h5 mb-2" href="">Golden Urban House For Sell</a>
                                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York, USA</p>
                                            </div>
                                            <div class="d-flex border-top">
                                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>1000 Sqft</small>
                                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                                                <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="property-item rounded overflow-hidden">
                                            <div class="position-relative overflow-hidden">
                                                <a href=""><img class="img-fluid" src="img/property-5.jpg" alt=""></a>
                                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For Sell</div>
                                                <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Home</div>
                                            </div>
                                            <div class="p-4 pb-0">
                                                <h5 class="text-primary mb-3">$12,345</h5>
                                                <a class="d-block h5 mb-2" href="">Golden Urban House For Sell</a>
                                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York, USA</p>
                                            </div>
                                            <div class="d-flex border-top">
                                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>1000 Sqft</small>
                                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                                                <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="property-item rounded overflow-hidden">
                                            <div class="position-relative overflow-hidden">
                                                <a href=""><img class="img-fluid" src="img/property-6.jpg" alt=""></a>
                                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For Rent</div>
                                                <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Shop</div>
                                            </div>
                                            <div class="p-4 pb-0">
                                                <h5 class="text-primary mb-3">$12,345</h5>
                                                <a class="d-block h5 mb-2" href="">Golden Urban House For Sell</a>
                                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York, USA</p>
                                            </div>
                                            <div class="d-flex border-top">
                                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>1000 Sqft</small>
                                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                                                <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <a class="btn btn-primary py-3 px-5" href="#">Lihat Property Lainnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Property List End -->
        
        
                <!-- Tour Virtual Start -->
                <section class="container-xxl py-5">
                    <div class="container">
                        <div class="bg-light rounded p-3">
                            <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                                <div class="row g-5 align-items-center">
                                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                                        <img class="img-fluid rounded w-100" src="{{ asset('images/banners/tur-virtual.jpg')}}" alt="">
                                    </div>
                                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                                        <div class="mb-4">
                                            <h1 class="mb-3">360<sup>o</sup> Tur Virtual&trade;</h1>
                                            <p>Stone.id menyediakan fitur tur 360<sup>o</sup> virtual untuk <span class="fw-bolder">segala jenis properti</span>. Kamu dapat melalukan tur properti dari mana saja kapanpun dan dimanapun!</p>
                                        </div>
                                        <a href="cari-agen.html" class="btn btn-primary py-3 px-4 me-2"><i class="fa fa-phone-alt me-2"></i>Hubungi Agen</a>
                                        <a href="" class="btn btn-dark py-3 px-4"><i class="fas fa-book me-2"></i>Pelajari Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Call to Action End -->
        
        
                <!-- Team Start -->
                <section class="container-xxl py-5">
                    <div class="container">
                        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                            <h1 class="mb-3">Agen Properti Featured</h1>
                            <p>Kami turut menyediakan agen properti profesional Stone.id yang berpengalaman. Siap membantu anda mencarikan dan melakukan proses transaksi properti kapanpun dan dimanapun secara cepat dan praktis.</p>
                        </div>
                        <div class="row g-4">
                            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="team-item rounded overflow-hidden">
                                    <div class="position-relative">
                                        <img class="img-fluid" src="{{ asset('images/users/team-4.jpg')}}" alt="">
                                        <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                            <button class="btn btn-primary py-2 px-3 me-2"><i class="fa fa-phone-alt me-2"></i>Hubungi</button>
                                        </div>
                                    </div>
                                    <div class="text-center p-4 mt-3">
                                        <h5 class="fw-bold mb-0">William Fabrianto</h5>
                                        <small>Agen Korporat Stone.id</small><br>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                                <div class="team-item rounded overflow-hidden">
                                    <div class="position-relative">
                                        <img class="img-fluid" src="{{ asset('images/users/team-2.jpg')}}" alt="">
                                        <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                            <button class="btn btn-primary py-2 px-3 me-2"><i class="fa fa-phone-alt me-2"></i>Hubungi</button>
                                        </div>
                                    </div>
                                    <div class="text-center p-4 mt-3">
                                        <h5 class="fw-bold mb-0">John Locke</h5>
                                        <small>Agen Korporat Stone.id</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                                <div class="team-item rounded overflow-hidden">
                                    <div class="position-relative">
                                        <img class="img-fluid" src="{{ asset('images/users/team-3.jpg')}}" alt="">
                                        <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                            <button class="btn btn-primary py-2 px-3 me-2"><i class="fa fa-phone-alt me-2"></i>Hubungi</button>
                                        </div>
                                    </div>
                                    <div class="text-center p-4 mt-3">
                                        <h5 class="fw-bold mb-0">Irine Kusumawati</h5>
                                        <small>Agen Korporat Stone.id</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                                <div class="team-item rounded overflow-hidden">
                                    <div class="position-relative">
                                        <img class="img-fluid" src="{{ asset('images/users/team-1.jpg')}}" alt="">
                                        <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                            <button class="btn btn-primary py-2 px-3 me-2"><i class="fa fa-phone-alt me-2"></i>Hubungi</button>
                                        </div>
                                    </div>
                                    <div class="text-center p-4 mt-3">
                                        <h5 class="fw-bold mb-0">Melisa Della</h5>
                                        <small>Agen Korporat Stone.id</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Team End -->
        
        
                <!-- Testimonial Start -->
                <section class="container-xxl py-5">
                    <div class="container">
                        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                            <h1 class="mb-3">Kata Mereka</h1>
                            <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
                        </div>
                        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                            <div class="testimonial-item bg-light rounded p-3">
                                <div class="bg-white border rounded p-4">
                                    <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                                    <div class="d-flex align-items-center">
                                        <img class="img-fluid flex-shrink-0 rounded" src="{{ asset('images/users/testimonial-1.jpg')}}" style="width: 45px; height: 45px;">
                                        <div class="ps-3">
                                            <h6 class="fw-bold mb-1">Client Name</h6>
                                            <small>Profession</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-item bg-light rounded p-3">
                                <div class="bg-white border rounded p-4">
                                    <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                                    <div class="d-flex align-items-center">
                                        <img class="img-fluid flex-shrink-0 rounded" src="{{ asset('images/users/testimonial-2.jpg')}}" style="width: 45px; height: 45px;">
                                        <div class="ps-3">
                                            <h6 class="fw-bold mb-1">Client Name</h6>
                                            <small>Profession</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-item bg-light rounded p-3">
                                <div class="bg-white border rounded p-4">
                                    <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                                    <div class="d-flex align-items-center">
                                        <img class="img-fluid flex-shrink-0 rounded" src="{{ asset('images/users/testimonial-3.jpg')}}" style="width: 45px; height: 45px;">
                                        <div class="ps-3">
                                            <h6 class="fw-bold mb-1">Client Name</h6>
                                            <small>Profession</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Testimonial End -->
                

@endsection

