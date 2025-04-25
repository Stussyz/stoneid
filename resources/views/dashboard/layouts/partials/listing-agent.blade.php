@forelse($properties as $property)
@php
    $photo = optional(optional(optional($property->listingRequest)->user)->userProfile)->photo;
    $address = $property->address;
    $addressDisplay = $address->district . ', ' . $address->city;
    $mainImage = $property->propertyImages->where('order', 1)->first();
    $listingReq = $property->listingRequest ?? null;
        
    $transaction = $property->transactions;
    $step = $transaction->current_step ;
    $showStep = '';

    //previewstep
    foreach($steps as $key => $previewStep){
        if($key === $step){
            $showStep = $previewStep;
        }
    }

    

    //check the property is rent / sale
    $sale = $property->transaction_type === 'Dijual';
    // $rent = $property->transaction_type === 'Disewa';
        
@endphp
    <!-- verified one -->
    <div class="row gx-2 p-1 my-3 justify-content-center border rounded">
        <div class="col-xl-5 col-lg-5 col-md-12 position-relative">
                <a href="{{$sale ? 
                route('dashboard-agent.transaction.process', [$property->id_preview, $step]) :
                route('dashboard-agent.rent-utility', [$property->id_preview])}}">

                <img src="{{ asset('storage/' . $mainImage->image_path ) }}" class="img-thumbnail shadow-box img-fluid"
                style="height: 100%;">
            </a>
            <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                {{ $property->transaction_type }}
            </div>
            <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">{{ $property->property_type }}</div>
        </div>
        <div class="col-xl-7 col-lg-7 col-md-12 px-4">
            <div class="row mt-2">
                <div class="col-8 align-content-center">
                    <small class="text-muted" >{{'Dibuat Tanggal ' . $property->created_at->format('d/m/Y H:i')}}</small>
                </div>
                <div class="col-4 justify-content-end d-flex ">
                    @if($transaction->status === 'initiated')
                    <div class="form-check form-switch">
                        <label class="toggle-switch">
                            <input type="hidden" id="csrfToken" value="{{ csrf_token() }}">
                            <input 
                                type="checkbox" 
                                id="property-status-toggle" 
                                {{ $property->status !== 'draft' ? 'checked' : '' }}
                                onchange="togglePropertyStatus({{ $property->id }}, this)"
                            >
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                    @else
                    <div class="form-check form-switch">
                        <label class="toggle-switch">
                            <input 
                                type="checkbox" 
                                id="property-status-toggle" 
                                disabled >
                            <span class="toggle-slider die"></span>
                        </label>
                    </div>
                    @endif
                </div>
            </div>
            
            <h5 class="card-title pb-2 text-primary mb-0 fw-bold">
                Rp {{ formatCurrencyLabel($property->price) . ' ' . ($property->min_rent_period) ?? null }} 
            </h5>

            <a href="{{ $sale ? 
                route('dashboard-agent.transaction.process', [$property->id_preview, $step]) :
                route('dashboard-agent.rent-utility', [$property->id_preview]) }}" 
                target="_blank" rel="noopener noreferrer"><h5 class="card-title pb-2 text-black mb-0 fw-bold">
                {{ Str::limit($property->name, 45, '...')  }}
            </h5></a>
            <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $addressDisplay }}</p>
            
            <!-- PROGRESS STEP PENJUALAN -->
            <div class="d-flex justify-content-around w-75 transaction_progress_bar">
                <button class="btn bg-primary text-white btn-sm rounded-pill"
                data-bs-toggle="tooltip" 
                data-bs-placement="top" 
                title="Membuat listing penjual"
                >1</button>
                <span class="w-25 rounded mt-auto mb-auto {{ $transaction->status === 'processed' || $transaction->status === 'completed' ? 'bg-primary' : 'bg-washed'  }}">
                </span>

                <button class="btn text-white btn-sm rounded-pill {{ $transaction->status === 'processed' || $transaction->status === 'completed' ? 'bg-primary' : 'bg-washed'  }}"
                data-bs-toggle="tooltip" 
                data-bs-placement="top" 
                title="Proses Menjual"
                >2</button>
                <span class="w-25 rounded mt-auto mb-auto
                {{ $transaction->status === 'completed' ? 'bg-primary' : 'bg-washed'  }}
                ">   
                </span>
                <button class="btn text-white btn-sm rounded-pill 
                {{ $transaction->status === 'completed' ?  'bg-primary' : 'bg-washed'  }}"
                data-bs-toggle="tooltip" 
                data-bs-placement="top" 
                title="Property Selesai Terjual"
                >3</button>
                <!-- AKHIR PROGRES STEP PENJUALAN -->
                

            </div>
            <div class="row g-0 gx-5 align-items-center pt-3 pb-2">
                    <div class="col-lg-6 lh-1 g-0 gx-5 d-inline-flex listing-person">
                        @if (!empty($listingReq))
                            <img style="width: 50px;" class="rounded-circle img-thumbnail" src="{{ asset('storage/images/users/' . $photo ) }}" alt="">
                            <div class="ps-3 right-0">
                                <a href="">
                                    <h6 class="lh-1">{{ $listingReq->user->name }}</h6>
                                </a>
                            <small class="text-muted lh-1">User</small>
                            </div>
                        @elseif ($sale && empty($listingRequest))
                        <div class="row gx-0 my-3 my-lg-0 w-100">
                            <span class="border border-primary px-3 py-2 rounded-3 text-primary mt-1 text-center">{{ $showStep }}</span>
                        </div>
                        @else
                        <div class="row gx-0 my-3 my-lg-0 w-100">
                            <small class="px-3 py-2 rounded-3 text-primary mt-1 ">Aktif sampai {{ $property->expires_at }} </small>
                        </div>

                        @endif                                           
                    </div>
                    <div class="col-lg-6 text-start text-lg-end">
                        <div class="row nav nav-pills  justify-content-end">
                            <div class="col-md-8 g-0 gx-2 ">
                                {{-- @if($transaction->status === 'initiated') --}}
                                <a class="btn btn-primary w-100 {{ $transaction->status === 'initiated' ? '' : 'disabled' }}" href="{{ route('dashboard-agent.edit-listing', $property->id_preview) }}" 
                                    
                                    
                                    ><i class="fas fa-edit float-start py-1"></i><small>Edit Listing</small></a>
                                {{-- @else

                                @endif --}}
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
    </div>
    <!-- end -->

    <!-- MODAL for delete snd share -->                      

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
                                <img class="img-thubnail w-100 h-100 img-fluid rounded-3" src="{{ asset('storage/' . $mainImage->image_path ) }}" alt="">
                            </div>
                            <div class="col-8">
                                <article class="lh-1">
                                    <h6>Citraland Surabaya Luxury Mansion</h6>
                                    <h6 class="text-primary">Rp. 7,5 Miliar</h6>
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

@empty
    <div class="row my-5">
        <h3 class="text-primary text-center">Anda Belum Mempunyai Iklan</h3>  
    </div>
@endforelse