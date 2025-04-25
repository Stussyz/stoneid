<!-- isi tab properti favorit -->
<div class="tab-pane fade show active" id="favoriteProp" role="tabpanel" aria-labelledby="home-tab">
    <!-- <h3 class="text-center text-muted py-5">Anda Belum Menambahkan Properti Favorit</h3> -->
    <section class="bg-white pb-5 mb-5">
        <div class="container mt-5">
            <div class="row g-0">
                <h5 class="text-muted">Menampilkan {{ $favorites->count() }} properti</h5>
            </div>
            <div class="row">
                <div class="col-xl-10">
                    @if(session('success_remove_favorite'))
                    <div class="alert alert-success alert-dismissible fade show w-auto">
                        {{ session('success_remove_favorite') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <!-- list property -->

                    @forelse($favorites as $property)

                    @php
                        $agent = $property->agentProfile;
                    @endphp
                    <!-- verified one -->
                    <div class="row gx-2 p-1 mt-3 justify-content-center border rounded">
                        <div class="col-xl-5 col-lg-5 col-md-12 position-relative">
                            <a href="{{ route('property.show', [$property->id_preview, $property->slug]) }}">
                                <img src="{{ asset('storage/' . $property->propertyImages->first()->image_path ?? 'user-default.jpg') }}" class="img-thumbnail shadow-box img-fluid h-100">
                            </a>
                            <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                {{ $property->transaction_type }}
                            </div>
                            <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">{{ $property->property_type }}</div>
                        </div>
                        <div class="col-xl-7 col-lg-7 col-md-12 px-4">
                            <div class="row pt-2">
                                <div class="col-md-8 align-content-center">
                                    <small class="text-muted" >Disimpan Tanggal {{  $property->pivot->created_at->format('d M Y H:i') }}</small>
                                </div>
                                <div class="col-md-4 justify-content-end d-flex ">
                                    <button id="popoverList" type="button" class="btn btn-outline-primary btn-share-menu px-2" href="" data-bs-toggle="popover"  title=""><i class="fas fa-ellipsis-h float-start py-1" aria-hidden="true"></i></button>
                                    <div class="row nav nav-pills share-button">
                                    <!-- MENU SHARE AND DELETE POPOVER IN MEDIA REPONSIVE -->
                                    <div hidden>
                                        <div class="popover-content" data-name="popover-content">
                                            <div class="row g-0 gx-1">
                                                <div class="col-md-5 py-3 border-bottom">
                                                    <a class="" href=""
                                                    data-bs-toggle="modal" data-bs-target="#shareModal{{ $property->id }}"><i class="fas fa-share-alt float-start pe-3" aria-hidden="true"></i> Bagikan</a>
                                                </div>
                                                <div class="col-md-5 py-3">
                                                    <a class="" href=""
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal{{ $property->id }}"><i class="fas fa-trash float-start pe-3" aria-hidden="true"></i>Hapus dari Favorit</a>
                                                </div> 
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-5 pe-2">
                                        <button type="button" class="btn btn-outline-primary" href=""
                                            data-bs-toggle="modal" data-bs-target="#shareModal{{ $property->id }}"><i class="fas fa-share-alt float-start py-1" aria-hidden="true"></i></button>
                                    </div>
                                    <div class="col-md-5 ps-2">
                                        <button type="button" class="btn btn-outline-primary" href=""
                                            data-bs-toggle="modal" data-bs-target="#deleteModal{{ $property->id }}"><i class="fas fa-trash float-start py-1" aria-hidden="true"></i></button>
                                    </div> 
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <h5 class="card-title pb-2 text-primary mb-0 fw-bold">
                                Rp {{ formatCurrencyLabel($property->price) . ' ' . ($property->min_rent_period) ?? null  }}
                            </h5>
                            <a href="{{ route('property.show', [$property->id_preview, $property->slug]) }}" target="_blank" rel="noopener noreferrer"><h5 class="card-title pb-2 text-black mb-0 fw-bold">
                                {{ Str::limit($property->name, 45, '...')  }}
                            </h5></a>
                            <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $property->address->district . ', ' . $property->address->city }}</p>
                            
                            <div class="d-flex w-75">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>{{ $property->details->land_area }} m<sup>2</sup> </small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>{{ $property->details->bedrooms }} Kamar</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>{{ $property->details->bathrooms }} Kamar Mandi</small>
                            </div>
                            <div class="row g-0 gx-5 align-items-center pt-3">
                                    <div class="col-lg-6 lh-1 g-0 gx-5 d-inline-flex listing-person">
                                        <img style="width: 50px; aspect-ratio:1" class="rounded-circle img-thumbnail" src="{{ asset('storage/images/agents/' . $agent->photo) }}" alt="">
                                        <div class="ps-3 right-0">
                                            <a href="">
                                                <h6 class="lh-1">{{ $agent->user->name }}</h6>
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
                    
                    <!-- MODAL for delete snd share -->

                    <!-- DELETE -->
                    <div class="modal fade" id="deleteModal{{ $property->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered rounded-3">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel"><i class="fas fa-trash-alt float-start py-1 pe-3" aria-hidden="true"></i>Hapus Properti Favorit</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apa kamu yakin untuk menghapus properti ini dari daftar simpan?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light text-primary border-primary" data-bs-dismiss="modal">Kembali</button>
                                <form action="{{ route('stone.remove-favorite', $property->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary">Hapus</button>
                                </form>
                                
                            </div>
                            </div>
                        </div>
                    </div>

                    <!-- SHARE -->
                    <div class="modal fade" id="shareModal{{ $property->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel"><i class="fas fa-share-alt float-start py-1 pe-3" aria-hidden="true"></i></i>Bagikan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                        <div class="row g-0 gx-3 py-2">
                                            <div class="col-4">
                                                <img class="img-thumbnail w-100 h-100 img-fluid rounded-3" src="{{ asset('storage/' . $property->propertyImages->first()->image_path ?? 'user-default.jpg') }}" alt="">
                                            </div>
                                            <div class="col-8">
                                                <article class="lh-1">
                                                    <h6>{{ $property->name }}</h6>
                                                    <h6 class="text-primary">Rp {{ formatCurrencyLabel($property->price) . ' ' . ($property->min_rent_period) ?? null }}</h6>
                                                    <small class="overflow-hidden text-muted">https://www.stone-id.com/properti/malang/hos15842238/</small>
                                                </article>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer ">
                                    <div class="container">
                                        <div class="row d-inline share-icons">
                                            <a href="button"><img src="{{ asset('images/icons/x-icon.png') }}" alt=""></a>
                                            <a href="button"><img src="{{ asset('images/icons/facebook-icon.png') }}" alt=""></a>
                                            <a href="button"><img src="{{ asset('images/icons/google-icon.png') }}" alt=""></a>
                                            <a href="button"><img src="{{ asset('images/icons/whatsapp-icon.png') }}" alt=""></a>
                                            <a href="button"><img src="{{ asset('images/icons/telegram-icon.png') }}" alt=""></a>
                                            <a href="button"><i class="fas fa-ellipsis-h float-end py-2" aria-hidden="true"></i></a>
                                        </div>
                                        <div class="row copy-link pt-4">
                                     <button onclick="copy('https://www.stone-id.com/properti/malang/hos15842238/','#copyLink')"
                                            id="copyLink" 
                                            class="btn btn-primary copy-button" 
                                            >
                                                <i class="fas fa-link float-start pt-1 pe-3" aria-hidden="true"></i>
                                                Salin Tautan
                                            </button>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end -->
                    @empty

                    <div class="d-flex flex-column align-items-center justify-content-center text-center px-5">
                        <img src="{{ asset('images/icons/empty-state-icon.png') }}" alt="No History" style="width: 180px; height: auto;">
                        <h3 class="text-dark fw-semibold">Belum Ada Properti yang Disimpan</h3>
                        <p class="text-muted">Temukan properti favoritmu dan klik tomobl hati untuk menyimpan properti favorit</p>
                        <a href="{{ route('property.listings') }}" class="btn btn-primary mt-3">
                            Cari Properti
                        </a>
                    </div>

                    @endforelse


                    <!-- end list -->
                </div>
                <div class="col-xl-2">
                    <div class="bg-light text-dark p-3 mt-3 border rounded-3 banner-ad-agen sticky-top text-center align-content-center" style="height: 20em;" width="auto"><h5>BANNER UNTUK IKLAN/PROMO DLL</h5></div>
                </div>
            </div>
        </div>
     </section>

</div>