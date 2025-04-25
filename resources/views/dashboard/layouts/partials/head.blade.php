    <meta charset="utf-8">
    <title>@yield('title', 'insert title web')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('images/icons/favicon.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    @vite([
    // 'resources/libs/wow/wow.min.js', 
    'resources/libs/owlcarousel/assets/owl.carousel.min.css', 
    'resources/libs/owlcarousel/owl.carousel.min.js',
    'resources/libs/animate/animate.min.css', 
    'resources/libs/easing/easing.min.js', 
    'resources/libs/waypoints/waypoints.min.js',
    'resources/css/bootstrap.min.css',
    'resources/js/dashboard/chart_config.js',
    'resources/libs/chartJS/chartjs.min.js',

    'resources/css/dashboard/dashboard.css',
    'resources/js/dashboard/dashboard.js'
    ])

{{-- additional inline style/ plugin style each pages --}}
@stack('styles')