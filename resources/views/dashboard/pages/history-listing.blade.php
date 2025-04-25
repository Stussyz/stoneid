@extends('dashboard.layouts.app')

@section('title', 'History Iklan Saya | Stone.id')

@section('dashboard_content')



 <!-- halaman riwayat listing -->
 <main class="container main-content pt-3">
    <div class="row px-2 py-3">
        <h3>Riwayat Penjualan</h3>
        <p>90 Total Listing</p>
        <div class="container mt-3 mb-5">
            <!-- search and filter -->
            <header class="row g-2">
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
                     Pilih Listing
                    <span class="p-3">
                        <select class="d-inline form-select form-select-sm w-auto py-2">
                            <option selected value="1">Tampilkan Semua</option>
                            <option value="2">Dijual</option>
                            <option value="3">Disewa</option>
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
                 <h5 class="text-muted">Menampilkan 3 Riwayat Listing Properti</h5>
            </header>
            <!-- end search and filter -->


            <!-- RIWAYAT LISTING -->
            @forelse($histories as $history)

                    @php
                        $transaction = $history->property->transactions()->latest()->first();
                        $stepDetail = optional($transaction->stepDetails->where('step_name', 'negotiation')->first());
                        $finalPrice = $stepDetail->additional_data['final_price'] ?? null;
                    @endphp
                    <!-- list riwayat listing -->
                    <div class="row gx-2 p-1 mt-3 justify-content-center border rounded">
                        <div class="col-xl-5 col-lg-5 col-md-12 position-relative">
                            <a href="">
                                <img src="{{ asset('storage/' . optional($history->property->propertyImages->first())->image_path) }}" class="img-thumbnail shadow-box img-fluid">
                            </a>
                            <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                               Dijual
                            </div>
                            <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Rumah</div>
                        </div>
                        <div class="col-xl-7 col-lg-7 col-md-12 px-4">
                            <div class="row pt-2">
                                <div class="col-md-8 align-content-center">
                                    <small class="text-muted" >Terjual Tanggal {{ $history->finalized_at }}</small>
                                </div>
                                <div class="col-md-4 justify-content-end d-flex ">
                                    
                                </div>
                            </div>
                            
                            <h5 class="card-title pb-2 text-primary mb-0 fw-bold">
                                {{ formatCurrencyLabel($finalPrice) }}
                            </h5>
                            <a href="" target="_blank" rel="noopener noreferrer"><h5 class="card-title pb-2 text-black mb-0 fw-bold">
                                {{ $history->property->name }}
                            </h5></a>
                            <p class="lh-1"><i class="fa fa-map-marker-alt text-primary me-2"></i>Jl. Bukit Panderman Hill Kec. Batu, Jawa Timur</p>
                            
                       
                            <div class="d-flex justify-content-around w-75">
                                <small class="text-muted">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laudantium porro neque, voluptates amet eos adipisci quas quibusdam numquam? Ad?</small>
                            </div>
                            <div class="row g-0 gx-5 align-items-center pt-3">
                                    {{-- <div class="col-lg-6 lh-1 g-0 gx-5 d-inline-flex listing-person">
                                        <img style="width: 50px;" class="rounded-circle img-thumbnail" src="img/team-4.jpg" alt="">
                                        <div class="ps-3 right-0">
                                            <a href="">
                                                <h6 class="lh-1">Harry Styles</h6>
                                            </a>
                                        <small class="text-muted lh-1">User</small>
                                        </div>
                                        
                                    </div> --}}
                                    <div class="col-lg-6 text-start text-lg-end">
                                        <div class="row nav nav-pills  justify-content-end">
                                            <button type="button" class="btn btn-outline-primary w-100" disabled
                                            >Properti Berhasil Terjual</button>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
            @empty
            <div class="d-flex flex-column align-items-center justify-content-center text-center px-5 py-3">
                <img src="{{ asset('images/icons/empty-state-icon.png') }}" alt="No History" style="width: 180px; height: auto;">
                <h3 class="text-dark fw-semibold">Belum Ada Riwayat Transaksi</h3>
                <p class="text-muted">Setelah Anda menyelesaikan transaksi properti, riwayat akan muncul di sini untuk referensi Anda.</p>
                <a href="{{ route('dashboard-agent.my-listing') }}" class="btn btn-primary mt-3">
                    Lihat Properti
                </a>
            </div>

            @endforelse
        </div>
    </div>
</main>
 <!-- akhir halaman riwayat listing -->

 @endsection