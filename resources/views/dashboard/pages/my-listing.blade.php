@extends('dashboard.layouts.app')

@section('title', 'Iklan Saya | Stone.id')

@section('dashboard_content') 
 
 <!-- halaman listing saya -->
 <main class="container main-content pt-3">
    <div class="row px-2 py-3">
        <h3>Listing Saya</h3>
        <p>107 Total Listing</p>
        <section class="bg-white mb-5">
            <div class="container mt-3">
                 {{-- Displaying success/error messsages --}}
                 @if (session('success'))
                 <div class="row">
                    <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif
                <!-- search and filter -->

               
                <header class="row g-2 mt-4">
                    <div class="col-lg-5 g-0 mb-3 text-center">
                        <div class="row g-0 w-100">
                            <div class="col-8 gx-2">
                                <input type="text" class=" w-100 form-control borders" placeholder="Nama listing, id listing, user...">
                            
                            </div>
                            <div class="col-4 gx-2">
                                <a href="listing.html" class="btn btn-dark border-0 w-75">Cari</a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-4 g-0 mb-3 mb-lg-0">
                        <div class="row g-0 d-flex flex-row align-items-center">
                            <div class="col-4 text-start text-lg-end">
                                Pilih Listing
                            </div>
                            <div class="col">
                                <span class="p-3">
                                    <select id="transactionTypeFilter" class="d-inline form-select form-select-sm w-auto w-md-100 py-2">
                                        <option selected value="">Tampilkan Semua</option>
                                        <option value="Dijual">Dijual</option>
                                        <option value="Disewa">Disewa</option>
                                    </select>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 g-0">
                        <div class="row g-0 d-flex flex-row align-items-center">
                            <div class="col-4 text-start text-lg-end">
                                Urutkan
                            </div>
                            <div class="col">
                                <span class="p-3">
                                    <select id="sortOrder" class="d-inline form-select form-select-sm w-100 py-2">
                                        <option selected value="newest">Terbaru</option>
                                        <option value="oldest">Terlama</option>
                                        <option value="a-z">A - Z</option>
                                        <option value="z-a">Z - A</option>
                                    </select>
                                </span>
                            </div>
                        </div>
                        </div>
                     <h5 class="text-muted">Menampilkan {{ $properties->count() }} Properti Anda</h5>
                     
                </header>
                <!-- end search and filter -->

                <main id="listingContent">
                    @include('dashboard.layouts.partials.listing-agent')
                </main>                    
            </div>
         </section>
    </div>
</main>
 <!-- akhir halaman listing saya-->

 @endsection

 @push('styles')
 <style>

    .transaction_progress_bar button{
        height: 2rem; 
        width: 2rem;
    }

    .transaction_progress_bar span{
        height: .2rem;
    }

    .bg-washed{
        background-color: #e2e2e2 !important;
    }

    .modal{
            z-index: 2000 !important;
        }
        .tooltip{
            z-index: 3000 !important;
        }
        @media (max-width: 768px) { 
            .share-button{
                display: none;
            }
            .contact-button{
                padding: 5px;
            }
            .btn-share-menu{
                display: inline-block;
            }
            .w-md-100{
                width: 100% !important;
            }
        }
        @media (min-width: 768px) { 
            .btn-share-menu{
                display: none;
            }
        }


    .toggle-switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 30px;
    }

    .toggle-switch input {
    display: none;
    }

    .toggle-slider {
    position: absolute;
    cursor: pointer;
    background-color: #ccc;
    transition: 0.4s;
    border-radius: 34px;
    height: 100%;
    width: 100%;
    }

    .toggle-slider.die{
        cursor:auto;
    }

    .toggle-slider::before {
    content: "";
    position: absolute;
    height: 26px;
    width: 26px;
    left: 2px;
    bottom: 2px;
    background-color: white;
    transition: 0.4s;
    border-radius: 50%;
    }

    input:checked + .toggle-slider {
    background-color: #198754; /* Bootstrap green */
    }

    input:checked + .toggle-slider::before {
    transform: translateX(30px);
    }



 </style>
 @endpush

 @push('scripts')

 {{-- toggle button --}}
<script>
  
    function togglePropertyStatus(propertyId, toggleElement) {
        
        const status = toggleElement.checked ? 'published' : 'draft';
        console.log(status)
        //Select token with getAttribute
        const csrfToken = document.getElementById('csrfToken').value;

        fetch(`/dashboard-agent/property/${propertyId}/status`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                "X-Requested-With": "XMLHttpRequest",
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ status })
        })
        .then(response => {
            if (!response.ok) throw new Error('Status update failed');
            return response.json();
        })
        .then(data => {
            console.log('Status updated:', data.message);
        })
        .catch(e => {
            toggleElement.checked = !toggleElement.checked; // revert if error
            alert('Failed to update status');
        });
    }

</script>

{{-- sort and filter --}}
<script>
    const transactionFilter = document.getElementById('transactionTypeFilter');
    const sortOrder = document.getElementById('sortOrder');

    function filterProperties() {
        const type = transactionFilter.value;
        const sort = sortOrder.value;

        fetch(`{{ route('dashboard-agent.property-filterSort') }}?type=${type}&sort=${sort}`)
            .then(response => response.text())
            .then(html => {
                document.getElementById('listingContent').innerHTML = html;
            });
    }

    transactionFilter.addEventListener('change', filterProperties);
    sortOrder.addEventListener('change', filterProperties);
</script>

     
 @endpush