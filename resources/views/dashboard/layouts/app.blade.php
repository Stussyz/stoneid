{{-- MASTER LAYOUT @app.blade.php --}}
<!DOCTYPE html>
<html lang="en">
@include('dashboard.layouts.partials.head')
<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
         <!-- Spinner End -->

         <!-- Topbar Start -->
        @include('dashboard.layouts.partials.topbar')
        <!-- Topbar End -->

         <!-- Navbar Start -->
        @include('dashboard.layouts.partials.navbar')
        <!-- Navbar End -->

        <!-- Sidebar Start -->
        @include('dashboard.layouts.partials.sidebar')
        <!-- Sidebar End -->
      
        <section class="tab-content container-xxl pb-5 px-5 outer-main" id="sidebarTabContent">
            @yield('dashboard_content')
        </section>
      

        @include('dashboard.layouts.partials.footer')
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
        
       
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    {{-- additional inline js / js plugin each pages --}}
    @stack('scripts')
</body>
</html>
