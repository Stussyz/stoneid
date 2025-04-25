@extends('dashboard.layouts.app')

@section('title', 'Selamat Datang! | Dashboard Agen Stone.id')

@section('dashboard_content')
<!-- halaman dashboard -->
<main class="container main-content pt-3 tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
    <div class="row px-2 py-3">
        <h3>Dashboard</h3>
    </div>
    <div class="row">
        <div class="col-12">
            {{-- Displaying success/error messsages --}}
            @if (session('success'))
            <div class="row">
               <div class="alert alert-success alert-dismissible fade show">
                       {{ session('success') }}
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
           </div>
           @elseif (session('agent-success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('agent-success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
           @endif
           
            <div class="box-wrapper bg-primary">
                <div class="row">
                    <div class="col-1 d-none d-xl-flex align-items-center justify-content-center">
                        <h3 class="text-white"><i class="fas fa-landmark fa-2x"></i></h3>
                    </div>
                    <div class="col-10">
                        <h5 class="text-white">Total Properti</h5>
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 85%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small class="text-white">90 terjual Terjual dari 197 properti</small>
                    </div>
                    <div class="col align-items-center d-flex justify-content-end">
                        <h3 class="text-white">197</h3>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-4">
            <div class="box-wrapper">
                <div class="row flex-column-reverse flex-lg-row">
                    <div class="col-lg-7 lh-1">
                        <h3 class="text-info">94</h3>
                         <h6 class="fw-bold">Listing Jual</h6>
                        <small class="text-muted">Target 100 tahun ini</small>
                    </div>
                    <div class="col-lg-5 align-items-center d-flex justify-content-center">
                        <circle-progress class="circle2" value="94" max="107" text-format="percent"></circle-progress>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="box-wrapper">
                <div class="row flex-column-reverse flex-lg-row">
                    <div class="col-lg-7 lh-1">
                        <h3 class="text-danger">13</h3>
                         <h6 class="fw-bold">Listing Sewa</h6>
                        <small class="text-muted">Target 100 tahun ini</small>
                    </div>
                    <div class="col-lg-5 align-items-center d-flex justify-content-center">
                        <circle-progress class="circle3" value="13" max="107" text-format="percent"></circle-progress>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="box-wrapper">
                <div class="row flex-column-reverse flex-lg-row">
                    <div class="col-lg-7 lh-1">
                        <h3 class="text-primary">107 </h3>
                         <h6 class="fw-bold ">Total Listing</h6>
                        <small class="">Target 100</small>
                    </div>
                    <div class="col-lg-5 align-items-center d-flex justify-content-center">
                        <circle-progress class="circle1" value="107" max="190" text-format="percent"></circle-progress>
                    </div>
                </div>
            </div>
        </div>
      
    
        <div class="col-8">
            <!-- value graphic chart -->
            <div class="box-wrapper">
                <h3>Revenue</h3>

                <div class="chart">
                    <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                </div>
                
            </div>
        </div>
        <div class="col-4">
            <div class="box-wrapper">
                <div class="lh-1 mb-3">
                    <h3 class="text-primary">Rp 120 Miliar</h3>
                    <small class="text-muted">Dari total 124 properti yang telah terjual</small>
                </div>
            
                <h6>Rank Properti</h6>
                <table class="table table-striped table-borderless table-hover">
                    <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Properti</th>
                        <th scope="col">Keuntungan</th>
                    
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Rumah Victoria</td>
                        <td>24 Miliar</td>
                        
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Apt. Royal Plaza 605D</td>
                        <td>13.6 Miliar</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Citra Land 80D</td>
                        <td>8.8 Miliar</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Villa Jungle</td>
                        <td>4.32 Miliar</td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>Riverside Malang</td>
                        <td>4.10 Miliar</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            
        </div>
    
        <div class="col-6">
            <!-- Listing Category Preview -->
            <div class="box-wrapper">
                <div class="row lh-1 mb-3">
                    <h5>Kategori</h5>
                    <small class="text-muted">Properti terjual berdasarkan Kategori</small>
                </div>
                
                <div class="row">
                    <div class="col-lg-4 col-sm-6 mb-2" >
                        <a class="cat-item d-block bg-light text-center rounded p-2" href="">
                            <div class="rounded p-2">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-apartment.png" alt="Icon">
                                </div>
                                <h6>Apartemen</h6>
                                <span>12 </span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-2">
                        <a class="cat-item d-block bg-light text-center rounded p-2" href="">
                            <div class="rounded p-2">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-villa.png" alt="Icon">
                                </div>
                                <h6>Villa</h6>
                                <span>0</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-2" >
                        <a class="cat-item d-block bg-light text-center rounded p-2" href="">
                            <div class="rounded p-2">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-house.png" alt="Icon">
                                </div>
                                <h6>Rumah</h6>
                                <span>109</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-2">
                        <a class="cat-item d-block bg-light text-center rounded p-2" href="">
                            <div class="rounded p-2">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-housing.png" alt="Icon">
                                </div>
                                <h6>Open House</h6>
                                <span>0</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-2" >
                        <a class="cat-item d-block bg-light text-center rounded p-2" href="">
                            <div class="rounded p-2">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-building.png" alt="Icon">
                                </div>
                                <h6>Tanah</h6>
                                <span>2</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-2" >
                        <a class="cat-item d-block bg-light text-center rounded p-2" href="">
                            <div class="rounded p-2">
                                <div class="icon mb-3">
                                    <img class="img-fluid" src="img/icon-neighborhood.png" alt="Icon">
                                </div>
                                <h6>Gudang</h6>
                                <span>1 Properti</span>
                            </div>
                        </a>
                    </div>
                </div>
                
           
            </div>
        </div>
        <div class="col-6">
            <div class="box-wrapper">
                <h5>Menu Cepat Listing</h5>

                <!-- LISTING ITEM -->
                 <div class="row p-1 mt-3 justify-content-center border rounded">
                    <div class="col-xl-5 col-lg-5 col-md-12 position-relative">
                        <a href="">
                            <img src="img/property-2.jpg" class="img-thumbnail shadow-box img-fluid">
                        </a>
                       
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-12 px-1">
                        <a href="" target="_blank" rel="noopener noreferrer"><p class="card-title pb-1 text-black mb-0 fw-bold">
                            Citraland Surabaya Luxury Mansion
                        </p></a>
                        <p><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York, USA</p>
                        
                        <!-- PROGRESS STEP PENJUALAN -->
                        <div class="d-flex justify-content-around w-75">
                            <button class="btn bg-primary text-white btn-sm rounded-pill"
                            style="height: 2rem; 
                                   width: 2rem;"
                            data-bs-toggle="tooltip" 
                            data-bs-placement="top" 
                            title="Membuat listing penjual"
                            
                            >1</button>
                            <span class="w-25 rounded mt-auto mb-auto" 
                            style="height: 0.2rem;
                                background-color: #e2e2e2 !important;">
                                
                            </span>

                            <button class="btn text-white btn-sm rounded-pill"
                            style="height: 2rem; 
                                   width: 2rem;
                                   background-color: #e2e2e2 !important;"
                             data-bs-toggle="tooltip" 
                             data-bs-placement="top" 
                             title="Proses Menjual"
                            >2</button>
                            <span class="w-25 rounded mt-auto mb-auto" 
                            style="height: 0.2rem;
                                background-color: #e2e2e2 !important;">
                                
                            </span>
                            <button class="btn text-white btn-sm rounded-pill"
                            style="height: 2rem; 
                                   width: 2rem;
                                   background-color: #e2e2e2 !important;"
                             data-bs-toggle="tooltip" 
                             data-bs-placement="top" 
                             title="Property Selesai Terjual"
                            >3</button>
                            <!-- AKHIR PROGRES STEP PENJUALAN -->
                        </div>  
                    </div>
                </div>
                <div class="row p-1 mt-3 justify-content-center border rounded">
                    <div class="col-xl-5 col-lg-5 col-md-12 position-relative">
                        <a href="">
                            <img src="img/property-6.jpg" class="img-thumbnail shadow-box img-fluid">
                        </a>
                       
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-12 px-1">
                        <a href="" target="_blank" rel="noopener noreferrer"><p class="card-title pb-1 text-black mb-0 fw-bold">
                            Citraland Surabaya Luxury Mansion
                        </p></a>
                        <p><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York, USA</p>
                        
                        <!-- PROGRESS STEP PENJUALAN -->
                        <div class="d-flex justify-content-around w-75">
                            <button class="btn bg-primary text-white btn-sm rounded-pill"
                            style="height: 2rem; 
                                   width: 2rem;"
                            data-bs-toggle="tooltip" 
                            data-bs-placement="top" 
                            title="Membuat listing penjual"
                            
                            >1</button>
                            <span class="w-25 rounded bg-primary mt-auto mb-auto" 
                            style="height: 0.2rem;">
                                
                            </span>

                            <button class="btn text-white btn-sm rounded-pill bg-primary"
                            style="height: 2rem; 
                                   width: 2rem;"
                             data-bs-toggle="tooltip" 
                             data-bs-placement="top" 
                             title="Proses Menjual"
                            >2</button>
                            <span class="w-25 rounded mt-auto mb-auto" 
                            style="height: 0.2rem;
                                background-color: #e2e2e2 !important;">
                                
                            </span>
                            <button class="btn text-white btn-sm rounded-pill"
                            style="height: 2rem; 
                                   width: 2rem;
                                   background-color: #e2e2e2 !important;"
                             data-bs-toggle="tooltip" 
                             data-bs-placement="top" 
                             title="Property Selesai Terjual"
                            >3</button>
                            <!-- AKHIR PROGRES STEP PENJUALAN -->
                            

                        </div> 
                    </div>
                </div>
                <div class="row p-1 mt-3 justify-content-center border rounded">
                    <div class="col-xl-5 col-lg-5 col-md-12 position-relative">
                        <a href="">
                            <img src="img/property-1.jpg" class="img-thumbnail shadow-box img-fluid">
                        </a>
                       
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-12 px-1">
                        <a href="" target="_blank" rel="noopener noreferrer"><p class="card-title pb-1 text-black mb-0 fw-bold">
                            Villa Golden Tulip No 69
                        </p></a>
                        <p><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York, USA</p>
                        
                        <!-- PROGRESS STEP PENJUALAN -->
                        <div class="d-flex justify-content-around w-75">
                            <button class="btn bg-primary text-white btn-sm rounded-pill"
                            style="height: 2rem; 
                                   width: 2rem;"
                            data-bs-toggle="tooltip" 
                            data-bs-placement="top" 
                            title="Membuat listing penjual"
                            
                            >1</button>
                            <span class="w-25 rounded mt-auto mb-auto" 
                            style="height: 0.2rem;
                                background-color: #e2e2e2 !important;">
                                
                            </span>

                            <button class="btn text-white btn-sm rounded-pill"
                            style="height: 2rem; 
                                   width: 2rem;
                                   background-color: #e2e2e2 !important;"
                             data-bs-toggle="tooltip" 
                             data-bs-placement="top" 
                             title="Proses Menjual"
                            >2</button>
                            <span class="w-25 rounded mt-auto mb-auto" 
                            style="height: 0.2rem;
                                background-color: #e2e2e2 !important;">
                                
                            </span>
                            <button class="btn text-white btn-sm rounded-pill"
                            style="height: 2rem; 
                                   width: 2rem;
                                   background-color: #e2e2e2 !important;"
                             data-bs-toggle="tooltip" 
                             data-bs-placement="top" 
                             title="Property Selesai Terjual"
                            >3</button>
                            <!-- AKHIR PROGRES STEP PENJUALAN -->
                        </div>  
                    </div>
                </div>

                <div class="row d-flex justify-content-center pt-3">
                    <a href="#" class="text-center">Lihat Selengkapnya</a>
                </div>



            </div>
        </div>
    </div>
    
</main>
 <!-- akhir halaman dashboard -->



 @endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/js-circle-progress/dist/circle-progress.min.js" type="module"></script> 
@endpush