@extends('stone.layouts.app')

@section('title', $property->name . ' | Stone.id')


@php
    //main title
    $property_title = $property->name;
    $property_price = $property->price;
    $property_address = $property->address->district . ', ' . $property->address->city . ', ' . $property->address->province; 
    $details = $property->details;


    $property_rent_period = $property->min_rent_period ?? null; 
    //get video path and name here
    $videoPath = $property->videos->video_path ?? null;
    $agentPreference = 'images/users/testimonial-3.jpg';
    $agent= $property->agentProfile;

    /*-----------------------------------------------------------------
    Warning : if it gets bigger (icons used everywhere or 
    want to changed to custom stone.id icons) 
    make sure to put this in helper 
    so it can be used globally
    -----------------------------------------------------------------*/

    
    $IHfacilityIcons = [
        'Taman' => 'fas fa-spa',
        'AC' => 'fas fa-wind',
        'CCTV' => 'fas fa-video',
        'Kolam Renang' => 'fas fa-swimming-pool',
        'Kolam Ikan' => 'fas fa-fish',
        'Telfon' => 'fas fa-phone',
        'Teras' => "fas fa-chair",
        'Smart Home' => "fas fa-mobile-alt",
        'Balkon' => 'fas fa-building',
        'Basement' => 'fas fa-level-down-alt'
    ];

    $complexIcons = [
        'Akses Parkir' => 'fas fa-parking',
        'Trek Jogging' => 'fas fa-running',
        'Tempat Ibadah' => 'fas fa-mosque',
        'Keamanan 24 jam' => 'fas fa-user-secret',
        'One Gate System' => 'fas fa-hand-paper',
        'Tempat Gym' => 'fas fa-dumbbell',
        'Foodcourt' => 'fas fa-hamburger'
    ];
    $inHouse_facilities = json_decode($property->facilities->in_house ?? '[]');
    $complex_facilities = json_decode($property->facilities->complex ?? '[]');


@endphp


@section('content')
    
    @vite(['resources/css/stone/property-enhancer.css'])
      <!-- content -->
      
      <div class="container-xxl pb-5">
        <div class="container">
            <main class="row mt-5 mx-3">
                <article class="col-md-6 ">
                    <h3>{{ $property->name }}</h3>
                    <p class="text-muted"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $property_address }}</p>
                    <div class="d-inline-flex">
                        <small class="flex-fill border-end pe-3"><i class="fa fa-bath text-primary me-2"></i>{{ $details->bathrooms }} kamar mandi</small>
                        <small class="flex-fill border-end px-3"><i class="fa fa-bed text-primary me-2"></i>{{ $details->bedrooms }} kamar tidur</small>
                        <small class="flex-fill px-3"><i class="fa fa-ruler-combined text-primary me-2"></i>{{ $details->land_area }} m<sup>2</sup></small>
                    </div>
                    
                </article>
                <a class="col-md-6 mt-3 mt-lg-0">
                    <div class="d-flex justify-content-start justify-content-md-end w-100 ">
                            <h3 class="text-primary pe-5 my-2">Rp {{ formatCurrencyLabel($property_price) . ' ' . $property_rent_period }}</h3> 
                            <div class="bg-primary rounded text-white px-5 py-2 d-flex align-content-center justify-content-end flex-wrap border">{{ $property->transaction_type }}</div>
                    </div>
                </a>
            </main>
            <section class="row mt-5">
                <div class="col-lg-8">


                    <!-- carousel image gallery -->
                    <div class="container">
                        <div class="gallery-container">

                            <!-- Large Main Image -->
                            <div class="image-wrapper">
                                <img id="current-image" src="" class="main-image" alt="Product Image">
                                <button class="nav-gallery-btn prev-gallery-btn"><i class="fas fa-chevron-left fa-2x"></i></button>
                                <button class="nav-gallery-btn next-gallery-btn"><i class="fas fa-chevron-right fa-2x"></i></button>
                            </div>
                    
                            <!-- Thumbnail Carousel -->
                            <div class="mt-3">
                                <div class="owl-carousel gallery-thumbnails">

                                    @foreach ($property->propertyImages as $image)

                                    @if ($image->order === 1)
                                        <img src="{{ asset('storage/' . $image->image_path ) }}" class="thumb-item init" data-src="{{ asset('storage/' . $image->image_path ) }}">
                                    @else
                                    <img src="{{ asset('storage/' . $image->image_path ) }}" class="thumb-item" data-src="{{ asset('storage/' . $image->image_path ) }}">
                                    
                                    @endif  
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Fullscreen Overlay -->
                    <div class="fullscreen-overlay d-none">
                        <span class="close-fullscreen-btn">&times;</span>
                        <img class="fullscreen-image">
                    </div>
                    <!-- end carousel image gallery -->

                    {{-- video  --}}
                    <div class="bg-light rounded p-3 mt-5 ">
                        <div class="bg-white rounded px-4 py-3" style="border: 1px dashed rgba(0, 185, 142, .3)">
                            <div class="row my-3 ">
                                <h3>Video Properti</h3>
                           </div>
                            <div class="row g-5 align-items-center">
                                <div class="col mx-3 overflow-hidden wow fadeIn" data-wow-delay="0.1s">
                                    @if (!empty($videoPath))
                                        <video class="w-100" src="{{ asset('storage/' . $videoPath) }}" controls></video>
                                    @else
                                        <div class="wrapper px-3 py-5 flex-column align-items-center justify-content-center text-center rounded-3" style="background-color: #e0e0e0; height: auto;">
                                            <i class="fas fa-play-circle mt-5 mb-3 fa-3x"></i>
                                            <h3>Video Belum Tersedia</h3>
                                            <p>silahkan hubungi agen untuk melihat lebih lanjut</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>


                            <div class="bg-light rounded p-3 mt-3">
                                <div class="bg-white rounded px-4 pt-3" style="border: 1px dashed rgba(0, 185, 142, .3)">
                                    <div class="row g-5 align-items-center">
                                        <div class="col mx-3 overflow-hidden wow fadeIn" data-wow-delay="0.1s">
                                            
                                                <img class="img-fluid rounded w-100 virtual-image" src="{{ asset('images/banners/tur-virtual.jpg') }}" alt="">
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                         <div class="col wow fadeIn text-center my-3" data-wow-delay="0.5s">
                                                <h1 class="mb-3">360<sup>o</sup> Tur Virtual&trade;</h1>
                                                <p>Tur Virtual 360<sup>o</sup> tersedia! Klik untuk melakukan Tur Virtual</p>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="fullscreen-virtual-overlay d-none">
                                <span class="close-fullscreen-virtual-btn">&times;</span>
                                <iframe class="fullscreen-virtual-image" src="https://momento360.com/e/u/0209ce3f73194e1db540f71c03c2459b?utm_campaign=embed&utm_source=other&heading=261.23&pitch=-5.39&field-of-view=75&size=medium&display-plan=true"></iframe>
                            </div>        
                      
                        
                    <article class="bg-light rounded p-3 mt-3">
                        <div class="bg-white rounded p-4" 
                            style="border: 1px dashed rgba(0, 185, 142, .3)">
                            <h3>Deskripsi Properti</h3>
                            <input id="toggleReadMore" class="d-none" type="checkbox">
                            <div class="wrapper description-wrapper py-3">
                                {!! $property->description !!}

                                <label for="toggleReadMore" class="show text-center text-primary w-100 px-3">Lihat Lebih Sedikit <i class="fas fa-chevron-up ps-3"></i></label>
                            </div>
                            <label for="toggleReadMore" class="show text-center text-primary w-100 px-3">Lihat Lebih Banyak <i class="fas fa-chevron-down ps-3"></i></label>
                        </div>
                    </article>
                    <article class="bg-light rounded p-3 mt-3">
                        <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                            <h3>Informasi Properti</h3>
                            <table class="table">
                                <tbody>
                                   
                                  <tr>
                                    <td>Transaksi</td>
                                    <td>{{ $property->transaction_type}}</td>
                                  </tr>
                                  <tr>
                                    <td>Kamar Tidur</td>
                                    <td>{{ $details->bedrooms}}</td>
                                  </tr>
                                  <tr>
                                    <td>Kamar Mandi</td>
                                    <td>{{ $details->bathrooms}}</td>
                                  </tr>
                                  <tr>
                                    <td>Luas Tanah</td>
                                    <td>{{ $details->land_area }} m<sup>2</sup></td>
                                  </tr>
                                  <tr>
                                    <td>Luas Bangunan</td>
                                    <td>{{ $details->building_area }} m<sup>2</sup></td>
                                  </tr>
                                  <tr>
                                    <td>Carport</td>
                                    <td>{{ $details->carport }}</td>
                                  </tr>
                                  <tr>
                                    <td>Sertifikat</td>
                                    <td>{{ $details->certificate }}</td>
                                  </tr>
                                  <tr>
                                    <td>Jumlah Lantai</td>
                                    <td>{{ $details->floors }}</td>
                                  </tr>
                                  <tr>
                                    <td>Furnished</td>
                                    <td>{{ $details->furnishing }}</td>
                                  </tr>
                                  <tr>
                                    <td>Listrik</td>
                                    <td>{{ $details->electricity }} Watt</td>
                                  </tr>
                                  <tr>
                                    <td>Konsep dan Gaya</td>
                                    <td class="text-capitalize">{{ $details->concept_and_style }}</td>
                                  </tr>
                                </tbody>
                              </table>
                        </div>
                    </article>
                    <article class="bg-light rounded p-3 mt-3">
                        <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                            <h3>Fasilitas</h3>
                            <div class="row g-0 p-3">
                                <h6>Fasilitas Rumah</h6>
                                <div class="col-md-12">
                                    <div class="row my-3 gx-0">
                                        @foreach ($inHouse_facilities as $IH)
                                            <div class="col-md-6 pb-3">
                                                <div class="row">
                                                    <div class="col-2 text-center"><i class="{{ $IHfacilityIcons[$IH] ?? 'fa-solid fa-circle-question' }}"></i>
                                                </div>
                                                    <div class="col">{{ $IH }}</div>
                                                </div>
                                                
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row g-0 p-3">
                                <h6>Fasilitas Perumahan</h6>
                                <div class="col-md-12">
                                    <div class="row my-3 gx-0">
                                        @foreach ($complex_facilities as $complex)
                                                <div class="col-md-6 pb-3">
                                                    <div class="row">
                                                        <div class="col-2 text-center"><i class="{{ $complexIcons[$complex] ?? 'fa-solid fa-circle-question' }}"></i>
                                                    </div>
                                                        <div class="col">{{ $complex }}</div>
                                                    </div>
                                                    
                                                </div>
                                        @endforeach
                                    </div>

                                    
                                </div>
                            </div>
                            
                        </div>
                    </article>

                    <!-- map lokasi -->
                    <article class="bg-light rounded p-3 mt-3">
                        <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                            <h3>Lokasi Properti</h3>
                            <iframe class="my-3 w-100 rpunded-3" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d16978.820343918513!2d112.63078312842781!3d-7.95396473739228!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sen!2sid!4v1741071502404!5m2!1sen!2sid" style="border:0; height: 50vh;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae necessitatibus veritatis quidem ipsum quo! Quam in, quos quibusdam necessitatibus placeat facilis consequuntur, ipsa rem cupiditate debitis, ipsam mollitia dolorem commodi.</p>

                        </div>
                    </article>

                    <!-- simulasi kpr: hanya untuk yang dijual-->

                    @if(empty($property->min_rent_period))
                    <article class="bg-light rounded p-3 mt-3">
                        <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                            <h3>Simulasi KPR</h3>
                            <hr>
                            <div class="row mt-5">
                                <div class="col"><h6>Harga Properti</h6></div>
                                <div class="col d-flex justify-content-end"><h6>Rp {{ formatCurrencyLabel($property->price) . ' ' . ($property->min_rent_period) ?? null  }}</h6></div>
                            </div>
                            <div class="row my-2">
                                <div class="col-md-4"><h6>Uang Muka</h6></div>
                                <div class="col-md-8 d-flex justify-content-start justify-content-md-end">
                                    <div class="input-group mb-3 w-75">
                                        <input type="number" id="percentInput" min="1" max="50" class="form-control" placeholder="persen" aria-label="percent" style="max-width: 30%;" value="20">
                                        <span class="input-group-text">%</span>
                                        <span class="input-group-text">Rp</span>
                                        <input type="text" class="form-control price-control" pattern="[0-9.,]+" data-type="number" placeholder="Masukkan Uang Muka" value="1,500,000,000" id="rupiahInput" readonly>
                                      </div>
                                </div>
                            </div>
                            <input class="w-100" id="percentRange" data-id='ex1RangePicker' type="range" min="1" max="50" value="20"/>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <small class="text-muted">1%</small>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted text-end float-end">50%</small>
                                </div> 
                            </div>
                            <div class="bg-dark border-dark rounded-3 p-3 text-white mb-4">
                                Persentase uang muka 20% adalah jumlah minimum yang disarankan.
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <h5><span id="instalmentRate">Rp 0</span></h5><small class="text-muted ms-2">per bulan</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <small class="text-muted"><sup class="text-danger">*</sup>Hasil perhitungan dalam masa tenor 15 tahun dan merupakan estimasi.</small>
                                </div> 
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-6 mb-3 mb-sm-0 d-flex justify-content-end">
                                    <a class="btn btn-outline-primary w-100" href="{{ Route('mortgage') }}"
                                    ><i class="fas fa-calculator float-start py-1" aria-hidden="true"></i>Detail Perhitungan</a>
                                </div>
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-primary w-100 active" href=""  data-bs-toggle="modal" data-bs-target="#whatsappModal"><i class="fab fa-whatsapp float-start py-1" aria-hidden="true"></i>Saya Tertarik</button>
                                </div> 
                            </div>           
                        </div>
                    </article>
                    @endif
                </div>
                

                <!-- aside agen sticky top -->
                <aside class="col-lg-4">
                    <article class="bg-light rounded p-3 contact-agent sticky-top">
                        <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                            <h5>Kontak Agen Properti</h5>
                            <div class="row p-2 align-items-center">
                                <div class="col-lg-4 d-flex justify-content-center">

                                    {{-- tambahin 'storage' sebelum agentPreferences pas deploy --}}
                                    <img class="rounded-circle" src="{{ asset('storage/images/agents/' . $property->agentProfile->photo) }}" alt="" style="aspect-ratio: 1; width: 100px; height: auto;"> 
                                </div>
                                <div class="col-lg-8 text-center text-lg-start">
                                    <p class="fs-5 p-0 mx-0 mb-0 mt-3 mt-lg-0 fw-bold text-primary">{{ $agent->user->name; }}</p>
                                    <p class="fs-6 text-muted p-0 m-0">Agen Stone.id</p>
                                    <p class="fs-6 text-muted p-0 m-0">NIB : {{ Str::limit($agent->NIB, 9, '***') }}</p>

                                </div>
                            </div>
                            <hr class="w-100">
                            <div class="row nav nav-pills mb-3 justify-content-center">
                                <div class="col-md-5 w-50 px-2">
                                    <button type="button" class="btn btn-outline-primary w-100" href=""
                                    data-bs-toggle="modal" data-bs-target="#callModal"><i class="fa fa-phone float-start py-1" aria-hidden="true"></i>Hubungi</button>
                                </div> 
                                <div class="col-md-5 w-50 px-2">
                                    <button type="button" class="btn btn-primary w-100 active" href=""  data-bs-toggle="modal" data-bs-target="#whatsappModal"><i class="fab fa-whatsapp float-start py-1" aria-hidden="true"></i>Whatsapp</button>
                                </div>
                            </div>


                            <small class="text-muted">Dengan klik tombol kontak, Pengguna setuju dengan <a href="">Syarat Pengguna</a> dan <a href="">Kebijakan Privasi</a></small>

                            <div class="accordion disclaimer mt-3" id="accordionDisclaimer">
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button text-muted fw-lighter" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true">
                                      Disclaimer
                                    </button>
                                  </h2>
                                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionDisclaimer">
                                    <div class="accordion-body">
                                        <small>Informasi properti yang disajikan sepenuhnya merupakan tanggung jawab pengiklan. Pengguna disarankan untuk melakukan verifikasi dengan pengiklan sebelum mengambil keputusan.</small>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </aside>
            </section>

            <!-- Rekomendasi -->
            <section class="row mt-5">
                <h3 class="my-5">Rekomendasi sesuai Pencarianmu</h3>
                <div class="owl-carousel property-carousel wow fadeInUp" data-wow-delay="0.1s">
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
                        <div class="property-item rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <a href=""><img class="img-fluid" src="{{ asset('images/properties/property-4.jpg') }}" alt=""></a>
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
                                <a href=""><img class="img-fluid" src="{{ asset('images/properties/property-7.jpeg') }}" alt=""></a>
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
                                <a href=""><img class="img-fluid" src="{{ asset('images/properties/property-2.jpg') }}" alt=""></a>
                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For Sell</div>
                                <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Home</div>
                            </div>
                            <div class="p-4 pb-0">
                                <h5 class="text-primary mb-3">$999,000</h5>
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
            </section>

            <section class="row mt-5">
                <h3 class="my-5">Mungkin Anda Tertarik</h3>
                <div class="owl-carousel property-carousel wow fadeInUp" data-wow-delay="0.1s">
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
                        <div class="property-item rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <a href=""><img class="img-fluid" src="{{ asset('images/properties/property-1.jpg') }}" alt=""></a>
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
                                <a href=""><img class="img-fluid" src="{{ asset('images/properties/property-2.jpg') }}" alt=""></a>
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
                                <a href=""><img class="img-fluid" src="{{ asset('images/properties/property-3.jpg') }}" alt=""></a>
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
            </section>
        </div>
    </div>



     <!-- isi modal hubungi-->
    <div class="modal fade" id="callModal" tabindex="0" aria-labelledby="callModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="callModalLabel">Hubungi Telefon Agen</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>{{$agent->user->name}}</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus amet vitae veniam provident.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary w-100"><i class="fa fa-phone float-start py-1" aria-hidden="true"></i>{{ Str::limit($agent->user->phone, 9, '***') }}</button>
                </div>
            </div>
        </div>
    </div>

       <!-- isi modal whatsapp -->
    <div class="modal fade" id="whatsappModal" tabindex="0" aria-labelledby="whatsappModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title" id="whatsappModalLabel">Hubungi Whatsapp Agen</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>{{$agent->user->name}}</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus amet vitae veniam provident.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary w-100"><i class="fab fa-whatsapp float-start py-1" aria-hidden="true"></i>{{ Str::limit($agent->user->phone, 9, '***') }}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- content end -->


    @vite(['resources/js/stone/image-carousel-gallery.js'])

@endsection

@push('stone-scripts')
<script>
    const property_price = {{ $property_price }};
    const percentRange = document.getElementById('percentRange');
    const percentInput = document.getElementById('percentInput');
    const rupiahInput = document.getElementById('rupiahInput');
    const showInstalment = document.getElementById('instalmentRate');


    // Function to format number into Rupiah format
    function formatRupiah(number) {
        return new Intl.NumberFormat('id-ID').format(number);
    }
    
    function calcInstalment(value){
        const remaining = (property_price - value);
        const year = 15;
        const tenor = year * 12;
        const instalment = (remaining/tenor) + ((remaining * 0.0487 * year) / tenor) ;
        return instalment;
    }

    function updateInputs(value) {
        const downPayment = (property_price * value / 100);
        percentInput.value = value;
        rupiahInput.value = formatRupiah(downPayment);

        const monthlyInstalment = calcInstalment(downPayment);
        showInstalment.textContent = "Rp " + formatRupiah(monthlyInstalment);
    }

    // Sync slider -> inputs
    percentRange.addEventListener('input', (e) => {
        updateInputs(e.target.value);
    });

    // Sync input -> slider
    percentInput.addEventListener('input', (e) => {
        let val = parseInt(e.target.value);
        if (val < 1) val = 1;
        if (val > 50) val = 50;
        percentRange.value = val;
        updateInputs(val);
        calcInstalment(val);
    });

    // Initial value
    updateInputs(percentRange.value);
</script>
    
@endpush