@extends('stone.layouts.app')

@section('title', 'Selamat Datang William! (user)')

@section('content')


@vite(['resources/css/stone/user-profile-enhancer.css'])

<!-- Header Start -->
<header class="container-fluid header bg-white p-0">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-6 p-5 mt-lg-5">
            <div class="row g-0 gx-5">
                <div class="col-md-4">
                    <a href="" class="animated fadeIn">
                        <div class="mx-auto text-center ">
                            <img style="aspect-ratio:1/1;" src="{{ asset('storage/images/users/' . $profile->photo) }}" class="rounded-circle img-thumbnail center-block" style="width: 200px; object-fit:cover;" alt="">
                        </div>
                    </a> 
                </div>
                <div class="col-md-8 profile-desc">
                    <h3 class="text-primary">{{ $user->name }}</h3>
                    <h5 class="text-muted">User</h5>
                    <p>{{ ($profile->description  ?? 'Halo saya user baru!') }}</p>
                        <div class="row nav nav-pills mb-3 justify-content-center">
                            <div class="col-md-5 w-50 px-2">
                                <button type="button" class="btn btn-outline-primary w-100" href=""
                                data-bs-toggle="modal" data-bs-target="#daftarIklanUserModal"><i class="fas fa-bullhorn float-start py-1" aria-hidden="true"></i>Pasang Iklan</button>
                            </div> 
                            <div class="col-md-5 w-50 px-2">
                                <a class="btn btn-primary w-100 active" href="{{ route('stone.user-edit-profile') }}"><i class="fas fa-user float-start py-1" aria-hidden="true"></i>Edit Profil</a>
                            </div>
                        </div>

                        {{-- Displaying success/error messsages --}}
                        <div class="row">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>

                       @include('stone.pages.user-profile-parts.modal-reqlist')
                        
                </div>     
            </div>
        </div>
        <div class="col-md-6 profile-banner">
            <img class="img-fluid" src="{{ asset('images/banners/banner-1.png')}}" alt="">
        </div>
    </div>
</header>
<!-- Header End -->

<section class="container-xxl p-5 bg-white">
    <div class="container my-2">
        <div class="row gx-5 align-items-center">

            <!-- nav tab  -->
            <ul class="nav nav-tabs d-none d-md-flex" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="tab-link active" id="home-tab" href="#favoriteProp" data-bs-toggle="tab" data-bs-target="#favoriteProp" type="button" role="tab" aria-controls="home" aria-selected="true"><h5>Property Favorit</h5></a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="tab-link" href="#lastSeen" id="profile-tab" data-bs-toggle="tab" data-bs-target="#lastSeen" type="button" role="tab" aria-controls="profile" aria-selected="false"><h5>Terakhir Dilihat</h5></a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="tab-link" href="#myListing" id="contact-tab" data-bs-toggle="tab" data-bs-target="#myListing" type="button" role="tab" aria-controls="contact" aria-selected="false"><h5>Iklan Saya</h5></a>
                </li>
                
            </ul>

              <!-- responsive nav tab in middle@768px viewport -->
            <div class="tab-pane-responsive-container d-flex justify-content-center d-md-none align-items-center py-3 border-bottom">
                <span class="nav-arrow prev-tab me-5 cursor-pointer"><i class="fas fa-chevron-left fa-lg"></i></span>
                <div class="tab-pane-box btn btn-primary w-75" id="active-tab">Property Favorit</div>
                <span class="nav-arrow next-tab ms-5 cursor-pointer"><i class="fas fa-chevron-right fa-lg"></i></span>
            </div>
            <ul class="nav nav-tabs d-none" id="tab-nav-responsive">
                <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#favoriteProp">Property Favorit</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#lastSeen">Terakhir Dilihat</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#myListing">Iklan Saya</a></li>
            </ul>
            <!-- end responsive tab -->

        </div>
        <div class="row tab-content py-3" id="myTabContent">

            {{-- user favorite tab --}}
            @include('stone.pages.user-profile-parts.favorite')

             {{-- last seen listing tab --}}
            @include('stone.pages.user-profile-parts.last-seen')

            {{-- my listing tab --}}
            @include('stone.pages.user-profile-parts.my-listing')
            
          </div>
     </div>
</section>

{{-- MAU DIBUAT KE K0MPONEN AJA --}}
 <!-- isi modal hubungi-->
<div class="modal fade" id="callModal" tabindex="0" aria-labelledby="callModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <p class="modal-title" id="callModalLabel">Hubungi Telefon Agen</p>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h3>Ferucio Lamborghini</h3>
          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus amet vitae veniam provident.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary w-100"><i class="fa fa-phone float-start py-1" aria-hidden="true"></i>087126428***</button>
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
          <h3>Ferucio Lamborghini</h3>
          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus amet vitae veniam provident.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary w-100"><i class="fab fa-whatsapp float-start py-1" aria-hidden="true"></i>087126428***</button>
        </div>
      </div>
    </div>
</div>

@vite(['resources/js/stone/navTabSlide.js'])

@endsection

@push('stone-scripts')
    {{-- if input validation error, it will open modal form --}}
    @if ($errors->any())
    <script>
        window.addEventListener('load', function () {
            const listingModal = new bootstrap.Modal(document.getElementById('daftarIklanUserModal'), {
        // optional
            });

            listingModal.show();
        });
    </script>
    @endif


    {{-- photo input handler and submit button on Terms and Condition checkbox --}}
    <script>
    const tnc = document.getElementById('TnCCheck'); 
    const sbmt = document.getElementById('listingReqSubmit'); 

    tnc.addEventListener('change', function () {
        sbmt.disabled = !this.checked;
    });

    const dropArea = document.getElementById('drop-area');
    const photoInput = document.getElementById('photo-input');
    const fileName = document.getElementById('file-name');
    const previewPhoto = document.getElementById('preview-photo');

    dropArea.addEventListener('click', () => photoInput.click());

    dropArea.addEventListener('dragover', (e) => {
    e.preventDefault();
    dropArea.classList.add('bg-light');
    });

    dropArea.addEventListener('dragleave', () => {
    dropArea.classList.remove('bg-light');
    });

    dropArea.addEventListener('drop', (e) => {
    e.preventDefault();
    photoInput.classList.remove('d-none');
    dropArea.classList.remove('bg-light');
    const files = e.dataTransfer.files;
    if (files.length > 0) {
        photoInput.files = files;
        updatePreview(files[0]);
    }
    });

    photoInput.addEventListener('change', () => {
    if (photoInput.files.length > 0) {
        updatePreview(photoInput.files[0]);
    }
    });

    function updatePreview(file) {
    const reader = new FileReader();
    reader.onload = function (e) {
        previewPhoto.src = e.target.result;
        fileName.textContent = `Dipilih: ${file.name}`;
    };
    reader.readAsDataURL(file);
    }


    //CUSTOM "SHARE AND DELETE" POPOVER


    //    COPY CLIPBOARD LINK
    function copy(text, target) {
            setTimeout(function() {
            $('#copied_tip').remove();
            }, 2000);
            $(target).append("<div class='tip' id='copied_tip'>Copied!</div>");
            var input = document.createElement('input');
            input.setAttribute('value', text);
            document.body.appendChild(input);
            input.select();
            input.focus();
            var result = document.execCommand('copy');
            input.remove();
            ajax-error.focus();
    }

        document.addEventListener('DOMContentLoaded', function () {
        const displayInput = document.getElementById('price_display');
        const hiddenInput = document.getElementById('price');

        displayInput.addEventListener('input', function (e) {
            // Remove non-digit
            let raw = displayInput.value.replace(/\D/g, '');
            // Format number
            displayInput.value = raw.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            // Set to hidden input (unformatted)
            hiddenInput.value = raw;
        });
    });
    </script>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const hash = window.location.hash;
        if (hash) {
            const triggerEl = document.querySelector(`a[href="${hash}"]`);
        if (triggerEl) {
        const tab = new bootstrap.Tab(triggerEl);
        tab.show();
            }
        }
    });
</script>

@endpush

