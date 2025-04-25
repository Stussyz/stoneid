@extends('stone.layouts.app')

@section('title', 'Kredit Pemilik Rumah | Terbaru 2025')

@vite(['resources/css/stone/user-profile-enhancer.css'])


@section('content')

 <!-- Header Start -->
 <div class="container-fluid header bg-white p-0">
    <div class="row g-0 flex-column-reverse flex-md-row">
        <div class="col-md-6 p-5 mt-lg-5">
            <h1 class="display-5 animated fadeIn mb-4" style="margin-top: 4rem;">KPR Bersama<br><span class="text-primary"> Stone.id</span></h1> 
            <nav aria-label="breadcrumb animated fadeIn">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item text-body active" aria-current="page">KPR</li>
                </ol>
            </nav>
            <p>KPR dari Stone.id, Solusi Punya Rumah <br> Jadi Lebih Mudah!</p>
            <button type="button" class="btn btn-primary" href=""
            data-bs-toggle="modal" data-bs-target="#daftarIklanUserModal"><i class="fas fa-bullhorn float-start py-1 pe-2" aria-hidden="true"></i>Bantu Saya Dapatkan KPR</button>
        </div>
        <div class="col-md-6 animated fadeIn">
            <img class="img-fluid" src="{{ asset('images/banners/kpr-banner.png') }}" alt="">
        </div>
    </div>
</div>
<!-- Header End -->
<section class="container-xxl p-5 bg-white">
    <div class="container my-2">
        <div class="row gx-5 align-items-center">
            
            
            <ul class="nav nav-tabs <!--d-none d-md-flex-->" id="myTab" role="tablist">
                <!-- <li class="nav-item" role="presentation">
                  <button class="tab-link " id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><h5>Edukasi KPR</h5></button>
                </li> -->
                <li class="nav-item" role="presentation">
                  <button class="tab-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"><h5>Simulasi KPR</h5></button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="tab-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"><h5>Kemampuan KPR</h5></button>
                </li>
            </ul>

<!--                     
            <div class="owl-carousel text-center responsive-tab-carousel nav nav-tabs d-flex d-md-none" id="myTab" role="tablist">
                <div class="nav-item" role="presentation">
                  <button class="tab-link text-center" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><h5>Edukasi KPR</h5></button>
                </div>
                <div class="nav-item" role="presentation">
                  <button class="tab-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"><h5>Simulasi KPR</h5></button>
                </div>
                <div class="nav-item" role="presentation">
                  <button class="tab-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"><h5>Kemampuan KPR</h5></button>
                </div>
            </div> -->



        </div>
        <div class="row tab-content py-3" id="myTabContent">
             <!-- isi tab Edukasi KPR  -->
            <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
            </div>

            @include('stone.pages.mortgage-parts.simulasi-kpr')

            @include('stone.pages.mortgage-parts.kemampuan-kpr')
           
          </div>
     </div>
</section>

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


@endsection