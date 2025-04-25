<!-- isi tab terakhir dikunjungi -->
<div class="tab-pane fade"  id="lastSeen" role="tabpanel" aria-labelledby="profile-tab">
    <!-- <h3 class="text-center text-muted py-5">Tidak Ada Pencarian</h3> -->
    <section class="bg-white pb-5 mb-5">
        <div class="container mt-5">
            <div class="row g-0">
                <h5 class="text-muted">Menampilkan 3 properti</h5>
            </div>
            <div class="row">
                <div class="col-xl-10">
                    <!-- list property -->
                     <!-- verified one -->
                     <div class="row gx-2 p-1 mt-3 justify-content-center border rounded">
                        <div class="col-xl-5 col-lg-5 col-md-12 position-relative">
                            <a href="">
                                <img src="{{ asset('images/properties/property-5.jpg') }}" class="img-thumbnail shadow-box img-fluid">
                            </a>
                            <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                Dijual
                            </div>
                            <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Rumah</div>
                        </div>
                        <div class="col-xl-7 col-lg-7 col-md-12 px-4">
                            <div class="row pt-2">
                                <div class="col-md-8 align-content-center">
                                    <small class="text-muted" >Disimpan Tanggal 05/02/2025 pukul 19:21 WIB</small>
                                </div>
                                <div class="col-md-4 justify-content-end d-flex ">
                                    <button id="popoverList" type="button" class="btn btn-outline-primary btn-share-menu px-2" href="" data-bs-toggle="popover" title=""><i class="fas fa-ellipsis-h float-start py-1" aria-hidden="true"></i></button>
                                    <div class="row nav nav-pills share-button">
                                    <!-- MENU SHARE AND DELETE POPOVER IN MEDIA REPONSIVE -->
                                    <div hidden>
                                        <div class="popover-content" data-name="popover-content">
                                            <div class="row g-0 gx-1">
                                                <div class="col-md-5 py-3 border-bottom">
                                                    <a class="" href=""
                                                    data-bs-toggle="modal" data-bs-target="#shareModal"><i class="fas fa-share-alt float-start pe-3" aria-hidden="true"></i> Bagikan</a>
                                                </div>
                                                <div class="col-md-5 py-3">
                                                    <a class="" href=""
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fas fa-trash float-start pe-3" aria-hidden="true"></i>Hapus Data</a>
                                                </div> 
                                            </div>
                                            
                                        </div>
                                    </div>

                                        <div class="col-md-5 pe-2">
                                            <button type="button" class="btn btn-outline-primary" href=""
                                            data-bs-toggle="modal" data-bs-target="#shareModal"><i class="fas fa-share-alt float-start py-1" aria-hidden="true"></i></button>
                                        </div>
                                        <div class="col-md-5 ps-2">
                                            <button type="button" class="btn btn-outline-primary" href=""
                                            data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fas fa-trash float-start py-1" aria-hidden="true"></i></button>
                                        </div> 
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <h5 class="card-title pb-2 text-primary mb-0 fw-bold">
                                Rp. 7.5 Miliar
                            </h5>
                            <a href="" target="_blank" rel="noopener noreferrer"><h5 class="card-title pb-2 text-black mb-0 fw-bold">
                                Citraland Surabaya Luxury Mansion
                            </h5></a>
                            <p><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York, USA</p>
                            
                            <div class="d-flex w-75">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>652 m<sup>2</sup> </small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>3 Kamar</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>2 Kamar Mandi</small>
                            </div>
                            <div class="row g-0 gx-5 align-items-center pt-3">
                                    <div class="col-lg-6 lh-1 g-0 gx-5 d-inline-flex listing-person">
                                        <img style="width: 50px;" class="rounded-circle img-thumbnail" src="{{ asset('images/users/team-1.jpg') }}" alt="">
                                        <div class="ps-3 right-0">
                                            <a href="">
                                                <h6 class="lh-1">Ferucio Daquafis</h6>
                                            </a>
                                        <small class="text-muted lh-1">Agen</small>
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-6 text-start text-lg-end">
                                        <div class="row nav nav-pills">
                                            <div class="col-md-6 g-0 gx-2 contact-button">
                                                <button type="button" class="btn btn-outline-primary w-100" href=""
                                                data-bs-toggle="modal" data-bs-target="#callModal"><i class="fa fa-phone float-start py-1" aria-hidden="true"></i><small>Hubungi</small></button>
                                            </div> 
                                            <div class="col-md-6 g-0 gx-2 contact-button">
                                                <button type="button" class="btn btn-primary w-100 active" href=""  data-bs-toggle="modal" data-bs-target="#whatsappModal"><i class="fab fa-whatsapp float-start py-1" aria-hidden="true"></i><small>Whatsapp</small></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                    <!-- end -->

                     <!-- verified one -->
                     <div class="row gx-2 p-1 mt-3 justify-content-center border rounded">
                        <div class="col-xl-5 col-lg-5 col-md-12 position-relative">
                            <a href="">
                                <img src="{{ asset('images/properties/property-4.jpg') }}" class="img-thumbnail shadow-box img-fluid">
                            </a>
                            <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                Dijual
                            </div>
                            <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Rumah</div>
                        </div>
                        <div class="col-xl-7 col-lg-7 col-md-12 px-4">
                            <div class="row pt-2">
                                <div class="col-md-8 align-content-center">
                                    <small class="text-muted" >Disimpan Tanggal 05/02/2025 pukul 19:21 WIB</small>
                                </div>
                                <div class="col-md-4 justify-content-end d-flex ">
                                    <button id="popoverList" type="button" class="btn btn-outline-primary btn-share-menu px-2" href="" data-bs-toggle="popover" title=""><i class="fas fa-ellipsis-h float-start py-1" aria-hidden="true"></i></button>
                                    <div class="row nav nav-pills share-button">
                                    <!-- MENU SHARE AND DELETE POPOVER IN MEDIA REPONSIVE -->
                                    <div hidden>
                                        <div class="popover-content" data-name="popover-content">
                                            <div class="row g-0 gx-1">
                                                <div class="col-md-5 py-3 border-bottom">
                                                    <a class="" href=""
                                                    data-bs-toggle="modal" data-bs-target="#shareModal"><i class="fas fa-share-alt float-start pe-3" aria-hidden="true"></i> Bagikan</a>
                                                </div>
                                                <div class="col-md-5 py-3">
                                                    <a class="" href=""
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fas fa-trash float-start pe-3" aria-hidden="true"></i>Hapus Data</a>
                                                </div> 
                                            </div>
                                            
                                        </div>
                                    </div>

                                        <div class="col-md-5 pe-2">
                                            <button type="button" class="btn btn-outline-primary" href=""
                                            data-bs-toggle="modal" data-bs-target="#shareModal"><i class="fas fa-share-alt float-start py-1" aria-hidden="true"></i></button>
                                        </div>
                                        <div class="col-md-5 ps-2">
                                            <button type="button" class="btn btn-outline-primary" href=""
                                            data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fas fa-trash float-start py-1" aria-hidden="true"></i></button>
                                        </div> 
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <h5 class="card-title pb-2 text-primary mb-0 fw-bold">
                                Rp. 7.5 Miliar
                            </h5>
                            <a href="" target="_blank" rel="noopener noreferrer"><h5 class="card-title pb-2 text-black mb-0 fw-bold">
                                Citraland Surabaya Luxury Mansion
                            </h5></a>
                            <p><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York, USA</p>
                            
                            <div class="d-flex w-75">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>652 m<sup>2</sup> </small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>3 Kamar</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>2 Kamar Mandi</small>
                            </div>
                            <div class="row g-0 gx-5 align-items-center pt-3">
                                    <div class="col-lg-6 lh-1 g-0 gx-5 d-inline-flex listing-person">
                                        <img style="width: 50px;" class="rounded-circle img-thumbnail" src="{{ asset('images/users/team-4.jpg') }}" alt="">
                                        <div class="ps-3 right-0">
                                            <a href="">
                                                <h6 class="lh-1">Ferucio Daquafis</h6>
                                            </a>
                                        <small class="text-muted lh-1">Agen</small>
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-6 text-start text-lg-end">
                                        <div class="row nav nav-pills">
                                            <div class="col-md-6 g-0 gx-2 contact-button">
                                                <button type="button" class="btn btn-outline-primary w-100" href=""
                                                data-bs-toggle="modal" data-bs-target="#callModal"><i class="fa fa-phone float-start py-1" aria-hidden="true"></i><small>Hubungi</small></button>
                                            </div> 
                                            <div class="col-md-6 g-0 gx-2 contact-button">
                                                <button type="button" class="btn btn-primary w-100 active" href=""  data-bs-toggle="modal" data-bs-target="#whatsappModal"><i class="fab fa-whatsapp float-start py-1" aria-hidden="true"></i><small>Whatsapp</small></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                    <!-- end -->

                     <!-- verified one -->
                     <div class="row gx-2 p-1 mt-3 justify-content-center border rounded">
                        <div class="col-xl-5 col-lg-5 col-md-12 position-relative">
                            <a href="">
                                <img src="{{ asset('images/properties/property-1.jpg') }}" class="img-thumbnail shadow-box img-fluid">
                            </a>
                            <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                Dijual
                            </div>
                            <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Rumah</div>
                        </div>
                        <div class="col-xl-7 col-lg-7 col-md-12 px-4">
                            <div class="row pt-2">
                                <div class="col-md-8 align-content-center">
                                    <small class="text-muted" >Disimpan Tanggal 05/02/2025 pukul 19:21 WIB</small>
                                </div>
                                <div class="col-md-4 justify-content-end d-flex ">
                                    <button id="popoverList" type="button" class="btn btn-outline-primary btn-share-menu px-2" href="" data-bs-toggle="popover" title=""><i class="fas fa-ellipsis-h float-start py-1" aria-hidden="true"></i></button>
                                    <div class="row nav nav-pills share-button">
                                    <!-- MENU SHARE AND DELETE POPOVER IN MEDIA REPONSIVE -->
                                    <div hidden>
                                        <div class="popover-content" data-name="popover-content">
                                            <div class="row g-0 gx-1">
                                                <div class="col-md-5 py-3 border-bottom">
                                                    <a class="" href=""
                                                    data-bs-toggle="modal" data-bs-target="#shareModal"><i class="fas fa-share-alt float-start pe-3" aria-hidden="true"></i> Bagikan</a>
                                                </div>
                                                <div class="col-md-5 py-3">
                                                    <a class="" href=""
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fas fa-trash float-start pe-3" aria-hidden="true"></i>Hapus Data</a>
                                                </div> 
                                            </div>
                                            
                                        </div>
                                    </div>

                                        <div class="col-md-5 pe-2">
                                            <button type="button" class="btn btn-outline-primary" href=""
                                            data-bs-toggle="modal" data-bs-target="#shareModal"><i class="fas fa-share-alt float-start py-1" aria-hidden="true"></i></button>
                                        </div>
                                        <div class="col-md-5 ps-2">
                                            <button type="button" class="btn btn-outline-primary" href=""
                                            data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="fas fa-trash float-start py-1" aria-hidden="true"></i></button>
                                        </div> 
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <h5 class="card-title pb-2 text-primary mb-0 fw-bold">
                                Rp. 7.5 Miliar
                            </h5>
                            <a href="" target="_blank" rel="noopener noreferrer"><h5 class="card-title pb-2 text-black mb-0 fw-bold">
                                Citraland Surabaya Luxury Mansion
                            </h5></a>
                            <p><i class="fa fa-map-marker-alt text-primary me-2"></i>123 Street, New York, USA</p>
                            
                            <div class="d-flex w-75">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>652 m<sup>2</sup> </small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>3 Kamar</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>2 Kamar Mandi</small>
                            </div>
                            <div class="row g-0 gx-5 align-items-center pt-3">
                                    <div class="col-lg-6 lh-1 g-0 gx-5 d-inline-flex listing-person">
                                        <img style="width: 50px;" class="rounded-circle img-thumbnail" src="{{ asset('images/users/team-2.jpg') }}" alt="">
                                        <div class="ps-3 right-0">
                                            <a href="">
                                                <h6 class="lh-1">Ferucio Daquafis</h6>
                                            </a>
                                        <small class="text-muted lh-1">Agen</small>
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-6 text-start text-lg-end">
                                        <div class="row nav nav-pills">
                                            <div class="col-md-6 g-0 gx-2 contact-button">
                                                <button type="button" class="btn btn-outline-primary w-100" href=""
                                                data-bs-toggle="modal" data-bs-target="#callModal"><i class="fa fa-phone float-start py-1" aria-hidden="true"></i><small>Hubungi</small></button>
                                            </div> 
                                            <div class="col-md-6 g-0 gx-2 contact-button">
                                                <button type="button" class="btn btn-primary w-100 active" href=""  data-bs-toggle="modal" data-bs-target="#whatsappModal"><i class="fab fa-whatsapp float-start py-1" aria-hidden="true"></i><small>Whatsapp</small></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                    <!-- end -->
                </div>
                <div class="col-xl-2">
                    <div class="bg-light text-dark p-3 mt-3 border rounded-3 banner-ad-agen sticky-top text-center align-content-center" style="height: 20em;" width="auto"><h5>BANNER UNTUK IKLAN/PROMO DLL</h5></div>
                </div>
            </div> 
        </div>
     </section>
</div>