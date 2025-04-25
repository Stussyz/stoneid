@extends('stone.layouts.app')

@section('title', 'Butuh bantuan? | Stone.id')

{{-- IMAGE NYA BELOM DIGANTI! --}}

@section('content')

        <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4">Butuh Bantuan?</h1> 
                    <nav aria-label="breadcrumb animated fadeIn">
                        <ol class="breadcrumb text-uppercase">
                            <li class="breadcrumb-item"><a href="{{ Route('home') }}">Home</a></li>
                            <li class="breadcrumb-item text-body active" aria-current="page">Bantuan</li>
                        </ol>
                    </nav>
                    <p>Jangan khawatir, kami akan membantu anda terkait <br> layanan kami.</p>
                    <a class="btn btn-primary" href="#contactUs"><i class="fas fa-phone-alt float-start py-1 pe-2" aria-hidden="true"></i>Hubungi Kami</a>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <img class="img-fluid" src="{{ asset('images/banners/banner-1.png') }}" alt="">
                </div>
            </div>
        </div>
        <!-- Header End -->

        
        <main class="container-xxl px-5 pt-5 bg-white">
            <div class="container">
                <section class="row my-5">
                    <div class="col-md-6 contact-desc">
                        <img src="{{ asset('images/banners/banner-contact-us.png') }}" alt="">
                    </div>
                    <div class="col-md-6">
                        <article class="px-2">
                            <h2>Bantuan Apa yang anda butuhkan?</h2>
                            <p class="text-muted">Butuh bantuan carikan properti? <a href="">klik disini</a></p>
                            <p>
                                Kami hadir untuk membantu Anda memahami cara kerja platform jual-beli properti kami secara mudah dan cepat. Baik Anda seorang pencari rumah impian, investor properti, maupun agen properti profesional, platform kami dirancang untuk membuat proses pencarian, pemasaran, dan transaksi properti menjadi lebih efisien, transparan, dan menyenangkan. <br><br>Di sini, Anda dapat menemukan jawaban atas pertanyaan umum (FAQ), serta menghubungi tim kami secara langsung jika membutuhkan bantuan lebih lanjut.
                            </p>
                        </article>
                        <div class="row mt-3">
                            <div class="col-6 px-2">
                                <div class="faq-box p-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#transactionalFAQModal">
                                    <div class="wrapper text-center ">
                                        <img src="{{ asset('images/icons/faq-selling.png') }}" alt="">
                                        <h5>Seputar Transaksi Properti</h5>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-6 px-2">
                                <div class="faq-box p-3 shadow-sm">
                                    <div class="wrapper text-center " data-bs-toggle="modal" data-bs-target="#businessInquiryFAQModal">
                                        <img src="{{ asset('images/icons/faq-business.png') }}" alt="">
                                        <h5>Bisnis Inquiry</h5>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </section>
            </div>

            <div class="container mt-5">
                <section class="row mb-5" id="contactUs">
                    <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        
                            <h2 class="mb-3">Hubungi Kami</h2>
                            <p>Silakan isi formulir Kontak Kami di samping.<br> Tim dukungan kami siap membantu Anda dengan cepat dan profesional.</p>
                            <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+62 878-555-666</p>
                            <p class="mb-2"><i class="fa fa-envelope me-3"></i>stoneid@gmail.com</p>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="wow fadeInUp" data-wow-delay="0.5s">
                            <form>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" placeholder="Your Name">
                                            <label for="name">Masukkan Nama</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" placeholder="Your Email">
                                            <label for="email">Masukkan Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="subject" placeholder="Subject">
                                            <label for="subject">Masukkan Subjek</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Ketikkan pesan anda..." id="message" style="height: 150px"></textarea>
                                            <label for="message">Pesan</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">Kirim</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </main>

         <!-- Modal transactional FAQ -->
         <div class="modal fade" id="transactionalFAQModal" tabindex="-1" aria-labelledby="transactionalFAQModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="transactionalFAQlLabel">Pertanyaan Seputar Jual Beli Properti</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- modal content -->
                        <div class="accordion" id="accordionTransactionalFAQ">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQTransactional1" aria-expanded="false" aria-controls="FAQTransactional1">
                                        Bagaimana cara mencari properti di website ini?
                                    </button>
                                </h2>
                                <div id="FAQTransactional1" class="accordion-collapse collapse" data-bs-parent="#accordionTransactionalFAQ">
                                    <div class="accordion-body">
                                        Cukup gunakan kolom pencarian atau filter lokasi, harga, dan tipe properti. Kami akan menampilkan properti terbaik yang sesuai dengan kebutuhan Anda.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQTransactional2" aria-expanded="false" aria-controls="FAQTransactional2">
                                        Apakah saya bisa menghubungi agen langsung?
                                    </button>
                                </h2>
                                <div id="FAQTransactional2" class="accordion-collapse collapse" data-bs-parent="#accordionTransactionalFAQ">
                                    <div class="accordion-body">
                                        Tentu! Setiap listing properti dilengkapi dengan profil agen. Anda bisa menghubungi mereka langsung melalui fitur chat atau formulir kontak yang tersedia.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQTransactional3" aria-expanded="false" aria-controls="FAQTransactional3">
                                        Bagaimana jika saya ingin menjual properti saya?
                                    </button>
                                </h2>
                                <div id="FAQTransactional3" class="accordion-collapse collapse" data-bs-parent="#accordionTransactionalFAQ">
                                    <div class="accordion-body">
                                        Anda dapat mendaftar sebagai agen atau pemilik properti, lalu unggah informasi dan foto properti Anda. Tim kami akan membantu agar properti Anda tampil maksimal di mata calon pembeli.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQTransactional4" aria-expanded="false" aria-controls="FAQTransactional4">
                                        Apakah penggunaan platform ini gratis?
                                    </button>
                                </h2>
                                <div id="FAQTransactional4" class="accordion-collapse collapse" data-bs-parent="#accordionTransactionalFAQ">
                                    <div class="accordion-body">
                                        Ya, pencarian dan penjelajahan properti tidak dipungut biaya. Untuk fitur premium, tersedia paket khusus bagi agen atau developer.
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal business inqiry FAQ-->
        <div class="modal fade" id="businessInquiryFAQModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Pertanyaan Business Inquiry</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <!-- modal content -->
                        <div class="accordion" id="accordionBusinessInquiryFAQ">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQBusinessInquiry1" aria-expanded="false" aria-controls="FAQBusinessInquiry1">
                                        Bagaimana cara mendaftar sebagai agen properti resmi di Stone.id?
                                    </button>
                                </h2>
                                <div id="FAQBusinessInquiry1" class="accordion-collapse collapse" data-bs-parent="#accordionBusinessInquiryFAQ">
                                    <div class="accordion-body">
                                        Anda dapat mendaftar sebagai agen dengan mengisi formulir pendaftaran agen pada halaman [Daftar Agen]. Setelah itu, tim kami akan melakukan verifikasi data Anda. Setelah disetujui, Anda dapat mulai mengunggah listing properti dan memanfaatkan berbagai fitur eksklusif untuk agen profesional.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQBusinessInquiry2" aria-expanded="false" aria-controls="FAQBusinessInquiry2">
                                        Saya memiliki perusahaan properti, apakah bisa bergabung sebagai partner?
                                    </button>
                                </h2>
                                <div id="FAQBusinessInquiry2" class="accordion-collapse collapse" data-bs-parent="#accordionBusinessInquiryFAQ">
                                    <div class="accordion-body">
                                        Tentu bisa. Kami terbuka untuk kerja sama dengan perusahaan properti, developer, maupun broker. Silakan hubungi tim bisnis kami melalui formulir kontak atau email langsung ke <a href="#">stoneid@gmail.com</a> untuk diskusi lebih lanjut.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQBusinessInquiry3" aria-expanded="false" aria-controls="FAQBusinessInquiry3">
                                        Apakah tersedia paket khusus atau fitur premium untuk agen dan perusahaan?
                                    </button>
                                </h2>
                                <div id="FAQBusinessInquiry3" class="accordion-collapse collapse" data-bs-parent="#accordionBusinessInquiryFAQ">
                                    <div class="accordion-body">
                                        Ya, kami menyediakan paket dan fitur premium seperti penempatan listing prioritas, branding agen, statistik pengunjung, hingga iklan berbayar. Anda dapat memilih paket yang sesuai dengan kebutuhan bisnis Anda.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#FAQBusinessInquiry4" aria-expanded="false" aria-controls="FAQBusinessInquiry4">
                                        Apakah saya bisa menampilkan logo perusahaan atau branding di listing saya?
                                    </button>
                                </h2>
                                <div id="FAQBusinessInquiry4" class="accordion-collapse collapse" data-bs-parent="#accordionBusinessInquiryFAQ">
                                    <div class="accordion-body">
                                        Bisa. Kami menyediakan fitur branding untuk agen dan perusahaan agar profil serta properti Anda terlihat lebih profesional dan menonjol. Fitur ini tersedia untuk pengguna yang sudah terverifikasi.
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

@endsection




@push('stone-styles')
<style>
    .contact-desc img{
        height: fit-content;
        width: 100%;
    }
    .faq-box{
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        height: 12rem;
        width: auto;
        transition: .25s ease-in;
        cursor: pointer;
        background-color: var(--light);
    }

    .faq-box:hover{
        box-shadow: none !important;
        background-color: white;
    }
    .faq-box img{
        height: 5rem;
        width: 5rem;
    }
</style>
@endpush