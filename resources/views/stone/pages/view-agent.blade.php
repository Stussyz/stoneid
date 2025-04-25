@extends('stone.layouts.app')

@section('title', 'Properti Dijual atau Disewa di Indonesia | Harga 2025')

{{-- IMAGE NYA BELOM DIGANTI! --}}

@section('content')

        <!-- Header Start -->
        <header class="container-fluid header bg-white p-0">
            <div class="row g-0 flex-column-reverse flex-md-row">
                <article class="col-md-6 p-5">
                    <div class="row mb-3 agen-breadcrumb">
                        <h2>Agen Properti</h2>
                        <nav aria-label="breadcrumb animated fadeIn">
                            <ol class="breadcrumb text-uppercase">
                                <li class="breadcrumb-item"><a href="{{ Route('home') }}">beranda</a></li>
                                <li class="breadcrumb-item"><a href="{{ Route('cari-agen') }}">Cari agen</a></li>
                                <li class="breadcrumb-item text-body active" aria-current="page">Agen Properti</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row g-0 gx-5">
                        <div class="col-md-4 ">
                            <a href="" class="animated fadeIn">
                                <div class="mx-auto text-center ">
                                    <img src="{{ asset('images/users/person-1.jpg') }}" class="agen-img img-thumbnail mb-3 mb-md-0" alt="">
                                </div>
                            </a> 
                        </div>
                        <div class="col-md-8 profile-desc">
                            <h3 class="text-primary">Nicholas Agosto</h3>
                            <h5 class="text-muted">Agen Korporat</h5>
                            <p class="text-black">Member sejak 2025</p>
                            <div class="row rating d-inline-flex mb-3">
                                <div class="star">
                                    <i class="fas fa-star fa-lg"></i>
                                    <i class="fas fa-star fa-lg"></i>
                                    <i class="fas fa-star fa-lg"></i>
                                    <i class="fas fa-star fa-lg"></i>
                                    <i class="fas fa-star fa-lg"></i>
                                    <small class="fw-bold">(4,85)</small>
                                    <small class="ms-1 text-muted">12 Rating</small>
                                </div>
                            </div>
                            <p><i class="fa fa-map-marker-alt text-primary me-2"></i>Jakarta Selatan</p>
                                <div class="row nav nav-pills mb-3 justify-content-center">
                                    <div class="col-lg-5 w-50 px-2">
                                        <a class="btn btn-outline-primary w-100" href="upload-listing.html"
                                        ><i class="fas fa-phone-alt float-start py-1"></i>Hubungi</a>
                                    </div> 
                                    <div class="col-lg-5 w-50 px-2">
                                        <button type="button" class="btn btn-primary w-100 active" href=""  data-bs-toggle="modal" data-bs-target="#whatsappModal"><i class="fas fa-share-square float-start py-1" aria-hidden="true"></i>Share </button>
                                    </div>
                                </div>
                                
                        </div>     
                    </div>
                    <div class="row my-3 ">
                        <input id="toggleReadMore" class="d-none" type="checkbox">
                        <div class="wrapper description-wrapper" style="max-height:20vh;">
                            <p>Sebagai agen properti yang berdedikasi dan berorientasi pada hasil, saya menghubungkan pembeli dan penjual dengan peluang real estat terbaik.</p> 
                        </div>
                        <a class="show text-center text-primary w-100" href="#personal-profil">Lihat Lebih Banyak <i class="fas fa-chevron-down ps-3"></i></a>

                    </div>
                   
                </article>
                <div class="col-md-6 profile-banner">
                    <img class="img-fluid" src="{{ asset('images/banners/banner-1.png')}}" alt="">
                </div>
            </div>
        </header>
        <!-- Header End -->

        <!-- listing overview -->
        <section class="container-xxl pb-5 px-5 bg-white">
            <div class="container">
                <main class="row w-75 mx-auto shadow-sm border rounded-3 mt-3 gx-5 g-0">
                    <div class="col-md-3 text-center py-4">
                        <i class="fas fa-money-bill-wave fa-2x mb-3"></i>
                        <h2 class="text-primary mb-2" data-toggle="counter-up">89.45</h2>
                        <h5 class="text-dark mb-0">Miliar</h5>
                    </div>
                    <div class="col-md-3 text-center py-4">
                        <i class="fas fa-home fa-2x mb-3"></i>
                        <h2 class="text-primary mb-2" data-toggle="counter-up">170</h2>
                        <h5 class="text-dark mb-0">Listing</h5>
                    </div>
                    <div class="col-md-3  text-center py-4">
                        <i class="fas fa-handshake mb-3 fa-2x"></i>
                        <h2 class="text-primary mb-2" data-toggle="counter-up">129</h2>
                        <h5 class="text-dark mb-0">Jual</h5>
                    </div>
                    <div class="col-md-3  text-center   py-4">
                        <i class="fas fa-calendar-alt mb-3 fa-2x"></i>
                        <h2 class="text-primary mb-2" data-toggle="counter-up">41</h2>
                        <h5 class="text-dark mb-0">Sewa</h5>
                    </div>
                </main>
            </div>
        </section>

        <!-- Award list -->
        <section class="container-xxl pb-5 px-5 bg-white">
            <div class="container">
                <header>
                    <h5>Penghargaan</h5>
                </header>
                <main class="row award owl-carousel award-carousel shadow-sm border rounded-3 mt-3 g-0">
                    <div class="col text-center p-4">
                        <img class="mx-auto" src="{{ asset('images/logo/award.png') }}" alt="">
                        <h6 class="text-dark mb-0">Award best performing 2025</h6>
                    </div>
                    <div class="col text-center p-4">
                        <img class="mx-auto" src="{{ asset('images/logo/award.png') }}" alt="">
                        <h6 class="text-dark mb-0">Award 10M milestone</h6>
                    </div>
                    <div class="col text-center p-4">
                        <img class="mx-auto" src="{{ asset('images/logo/award.png') }}" alt="">
                        <h6 class="text-dark mb-0">Silver Award</h6>
                    </div>
                    <div class="col text-center p-4">
                        <img class="mx-auto" src="{{ asset('images/logo/award.png') }}" alt="">
                        <h6 class="text-dark mb-0">Award 100M milestone</h6>
                    </div>
                    <div class="col text-center p-4">
                        <img class="mx-auto" src="{{ asset('images/logo/award.png') }}" alt="">
                        <h6 class="text-dark mb-0">Award 500M Milestone</h6>
                    </div>
                    <div class="col text-center p-4">
                        <img class="mx-auto" src="{{ asset('images/logo/award.png') }}" alt="">
                        <h6 class="text-dark mb-0">Award 1T Milestone</h6>
                    </div>  
                </main>
            </div>
        </section>

        <section class="container-xxl pb-5 px-5 bg-white">
            <div class="container border-bottom" id="personal-profil">
                <article class="row mb-3 gx-5 g-0">
                    <h5>Bidang Properti</h5>
                    <p>Rumah</p>
                    <p>Apartemen</p>
                </article>
                <article class="row mb-3 gx-5 g-0">
                    <h5>Personal Profil Agen</h5>
                    <p>Sebagai agen properti yang berdedikasi dan berorientasi pada hasil, saya menghubungkan pembeli dan penjual dengan peluang real estat terbaik. Dengan pemahaman mendalam tentang tren pasar dan kebutuhan klien, saya memberikan panduan profesional dalam transaksi properti, baik residensial maupun komersial. <br><br>Saya selalu mengutamakan kepercayaan, transparansi, dan pelayanan personal, sehingga setiap klien mendapatkan pengalaman yang lancar dan bebas stres. Apakah Anda ingin membeli rumah pertama, berinvestasi di properti, atau menjual aset, saya siap membantu dengan profesionalisme dan integritas untuk mencapai hasil terbaik. Mari temukan properti impian Anda bersama!  </p>
                </article>
                <article class="row">
                    <h5>Area Properti</h5>
                    <div class="col">
                        <p>Jakarta Barat</p>
                        <p>Jakarta Selatan</p>
                        <P>Bogor</P>
                    </div>
                    <div class="col">
                        <p>Bekasi</p>
                        <p>Bandung</p>
                        <P>Serang</P>
                    </div>
                </article>
            </div>
        </section>

         <!-- Testimonial Start -->
         <section class="container-xxl pt-3 pb-5 px-5">
            <div class="container">
                <header class="row mb-3 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h3 class="mb-3">Ulasan Klien</h3>
                    <div class="row rating d-inline-flex mb-3">
                        <div class="star">
                            <i class="fas fa-star fa-lg"></i>
                            <i class="fas fa-star fa-lg"></i>
                            <i class="fas fa-star fa-lg"></i>
                            <i class="fas fa-star fa-lg"></i>
                            <i class="fas fa-star fa-lg"></i>
                            <small class="fw-bold">(4,95)</small>
                            <small class="ms-1 text-muted">12 Rating</small>
                        </div>
                    </div>
                    <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
                </header>
                <main class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                    <article class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>"Saya sangat puas dengan pelayanan agen ini! Proses pencarian rumah impian saya menjadi sangat mudah dan cepat. Agen sangat responsif, profesional, dan memberikan banyak saran berharga. Mereka benar-benar memahami kebutuhan saya dan membantu menemukan rumah yang sesuai dengan anggaran serta keinginan saya. Terima kasih atas bantuannya!"</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src="{{ asset('images/users/testimonial-1.jpg') }}" style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">Dian P.</h6>
                                    <div class="star">
                                        <i class="fas fa-star fa-sm"></i>
                                        <i class="fas fa-star fa-sm"></i>
                                        <i class="fas fa-star fa-sm"></i>
                                        <i class="fas fa-star fa-sm"></i>
                                        <i class="fas fa-star fa-sm"></i>
                                        <small class="fw-bold">(5,0)</small>
                                    </div>
                                    <small>Jakarta</small>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>"Saya sangat terbantu dengan agen ini dalam mencari rumah yang sesuai dengan kebutuhan saya. Mereka profesional, ramah, dan memberikan banyak pilihan properti yang menarik. Proses pembelian pun berjalan cukup lancar. Namun, ada sedikit keterlambatan dalam memberikan update terkait dokumen, sehingga saya harus menunggu lebih lama dari yang diperkirakan. Meski begitu, secara keseluruhan, saya puas dengan pelayanannya dan tetap merekomendasikan agen ini untuk yang mencari properti!"</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src="{{ asset('images/users/testimonial-2.jpg') }}" style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">Rizky S. </h6>
                                    <div class="star">
                                        <i class="fas fa-star fa-sm"></i>
                                        <i class="fas fa-star fa-sm"></i>
                                        <i class="fas fa-star fa-sm"></i>
                                        <i class="fas fa-star fa-sm"></i>
                                        <i class="fas fa-star-half-alt fa-sm"></i>
                                        <small class="fw-bold">(4,5)</small>
                                    </div>
                                    <small>Bandung</small>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>"Sebagai investor properti, saya sudah bekerja sama dengan banyak agen, tetapi pengalaman dengan agen ini adalah yang terbaik! Mereka memiliki wawasan pasar yang luas dan selalu memberikan listing properti berkualitas tinggi. Komunikasi jelas dan sangat transparan. Pasti akan kembali menggunakan jasa mereka!"</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src="{{ asset('images/users/testimonial-3.jpg') }}" style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">Andreas L., </h6>
                                    <div class="star">
                                        <i class="fas fa-star fa-sm"></i>
                                        <i class="fas fa-star fa-sm"></i>
                                        <i class="fas fa-star fa-sm"></i>
                                        <i class="fas fa-star fa-sm"></i>
                                        <i class="far fa-star fa-sm"></i>
                                        <small class="fw-bold">(4,0)</small>
                                    </div>
                                    <small>Surabaya</small>
                                </div>
                            </div>
                        </div>
                    </article>
                </main>
            </div>
        </section>
        <!-- Testimonial End -->


         <!-- Listing agen -->
         <section class="container-xxl pb-5 px-5 bg-white">
            <div class="container">
        <!-- search and filter -->
                <div class="row g-2 mb-3">
                    <h3 class="mb-5">Semua Properti Nicholas Agosto</h3>
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
                                <option value="2">Dijual</option>
                                <option value="3">Disewa</option>
                                <option value="2">Terjual</option>
                                <option value="3">Tersewa</option>
                            </select>
                        </span>
                    </div>
                    
                    <div class="col-lg-3 g-0">
                        Urutkan
                            <span class="p-3">
                                <select class="d-inline form-select form-select-sm w-auto py-2">
                                    <option selected value="1">Terbaru</option>
                                    <option value="2">Terlama</option>
                                    <option value="3">Termahal</option>
                                    <option value="4">Termurah</option>
                                </select>
                            </span>
                    </div>
                    <h5 class="text-muted">Menampilkan 9 Listing properti</h5>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow property-by-agent fadeInUp" data-wow-delay="0.1s">
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
                    <div class="col-lg-4 col-md-6 wow property-by-agent fadeInUp" data-wow-delay="0.3s">
                        <div class="property-item rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <a href=""><img class="img-fluid" src="img/property-2.jpg" alt=""></a>
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
                    <div class="col-lg-4 col-md-6 wow property-by-agent fadeInUp" data-wow-delay="0.5s">
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
                    <div class="col-lg-4 col-md-6 wow property-by-agent fadeInUp" data-wow-delay="0.1s">
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
                    <div class="col-lg-4 col-md-6 wow property-by-agent fadeInUp" data-wow-delay="0.3s">
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
                    <div class="col-lg-4 col-md-6 wow property-by-agent fadeInUp" data-wow-delay="0.5s">
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
                    <div class="col-md-12 text-center wow fadeInUp mt-5" data-wow-delay="0.1s">
                        <button id="loadMore" class="btn btn-primary p-3" href="">Memuat Lebih Banyak</button>
                    </div>
                </div>
                <!-- end search and filter -->
            </div>
        </section>
         
  
@endsection


@push('stone-styles')
<style>
    .agen-breadcrumb{
        margin-top: 7rem;
    }
    .agen-img{
        width: 100%;
        height: auto;
    }

    /* large viewport reponsive */
    @media (max-width: 992px) {
        .agen-breadcrumb{
        margin-top: 0;
        }
    }

    /* medium viewport reponsive */
    @media (max-width: 768px) {
        .agen-img{
        width: 50%;
        height: auto;
        }
    }

    .star i{
        color: orange;
        filter: drop-shadow(2px 2px 2px rgba(0,0,0,0.1));
    }

    .award img{
        max-width: 10rem;
        max-height: 10rem;
    }

    .property-by-agent{
        display: none;
    }

    /* AWARD CAROUSEL */
        .award-carousel .owl-nav {
            position: absolute;
            width: 100%;
            height: 40px;
            top: calc(50% - 20px);
            left: 0;
            display: flex;
            justify-content: space-between;
            z-index: 1;
        }

        .award-carousel .owl-nav .owl-prev,
        .award-carousel .owl-nav .owl-next {
            position: relative;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: transparent;
            border-radius: 40px;
            font-size: 20px;
            transition: .5s;
        }

        .testimonial-item p{
            height: 30vh;
            overflow-y: auto;
        } 
</style>
@endpush


@push('stone-scripts')
<script>       
    $(document).ready(function() {


        $('[data-toggle="counter-up"]').counterUp({
            delay: 10,
            time: 2000
        });

    //CUSTOM "SHARE AND DELETE" POPOVER
    let options = {
        html: true,
        title: "",
        //html element
        //content: $("#popover-content")
        content: $('[data-name="popover-content"]')

    }
    let popoverList = document.getElementById('popoverList');
    let execPopover = new bootstrap.Popover(popoverList, options);

    // hide popover over a modal
    $('body').on('shown.bs.modal', function() {
        execPopover.hide();
    });
    })
</script>
@endpush