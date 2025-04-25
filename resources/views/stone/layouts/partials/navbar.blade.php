@auth
    @php
        $folder = auth()->user()->hasRole('user') ? 'users' : 'agents';
        $profile_pic = asset("storage/images/{$folder}/" . $profile->photo);
    @endphp 
@endauth


<!-- Navbar Start -->
<div class="container-fluid nav-bar bg-transparent">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
        <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center text-center">
            <div class="icon p-2 me-2">
                <img class="img-fluid" src="{{ asset('images/icons/favicon.png') }}" alt="Icon" style="width: 30px; height: 30px;">
            </div>
            <h1 class="m-0 text-primary">Stone.id</h1>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                <a href="{{ route('home') }}" class="nav-item nav-link {{ Route::is('home') ? 'active' : '' }}">Beranda</a>  
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Property</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="{{ route('property.listings') }}" class="dropdown-item">Rumah</a>
                        <a href="{{ route('property.listings') }}" class="dropdown-item">Tanah</a>
                        <a href="{{ route('property.listings') }}" class="dropdown-item">Apartemen</a>
                    </div>
                </div>
                <a href="{{ route('cari-agen') }}" class="nav-item nav-link {{ Route::is('cari-agen') ? 'active' : '' }}">Cari Agen</a>
                <a href="{{ route('mortgage') }}" class="nav-item nav-link {{ Route::is('mortgage') ? 'active' : '' }}">KPR</a>
                <a href="{{ route('contact-us') }}" class="nav-item nav-link {{ Route::is('contact-us') ? 'active' : '' }}">Bantuan</a>
            </div>

            @auth  
            <div class="dropdown dropdown_profile">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ $profile_pic}}" alt="User" class="profile_pic rounded-circle me-2">
                    <small>Welcome!</small>
                </button>
              
                <ul class="dropdown-menu dropdown-animated p-3 shadow rounded " aria-labelledby="dropdownMenuButton">
                    <div class="d-flex align-items-center mb-2">
                        <img src="{{ $profile_pic }}" alt="User" class="rounded-circle me-2 profile_pic">
                        <div>
                            <strong>{{ $user->name }}</strong><br>
                            <small class="text-muted">{{ auth()->user()->getRoleNames()->first() }}</small>
                        </div>
                    </div>
                    <hr>

                    @role('user')

                    <li><a class="dropdown-item d-flex justify-content-between" href="{{ route('stone.user-profile') }}"><span><i class="bi bi-person me-2"></i>Lihat Profil</span></a></li>

                    <li><a class="dropdown-item d-flex justify-content-between" href="#"><span><i class="bi bi-gear me-2"></i>Settings</span></a></li>
                    <li><a class="dropdown-item d-flex justify-content-between" href="{{ route('stone.user-profile') }}#favoriteProp"><span><i class="bi bi-star me-2"></i>Properti Favorit</span>

                    <span class="badge rounded-pill bg-danger d-flex align-items-center">
                        99+
                        <span class="visually-hidden">unread messages</span>
                    </span></a>
                    </li>
                    <hr>
                    <li><a class="dropdown-item d-flex justify-content-between" href="{{ route('stone.user-profile') }}#myListing"><span><i class="bi bi-list-ul me-2"></i>Iklan saya</span></a></li>
                    <li><a class="dropdown-item d-flex justify-content-between" href="{{ route('stone.user-profile') }}#lastSeen"><span><i class="bi bi-clock-history me-2"></i>Terakhir Dilihat</span></a></li>
                    <li><a class="dropdown-item d-flex justify-content-between" href="{{ route('stone.user-edit-profile') }}"><span><i class="bi bi-bi bi-pencil-square me-2"></i>Ubah Profil</span></a></li>
                    @elserole('agent') 

                    <li><a class="dropdown-item d-flex justify-content-between" href="{{ route('dashboard-agent.index') }}"><span><i class="bi bi-speedometer me-2"></i>Dashboard</span></a></li>
                    <li><a class="dropdown-item d-flex justify-content-between" href="{{ route('dashboard-agent.my-listing') }}"><span><i class="bi bi bi-list-ul me-2"></i>Iklan Saya</span></a></li>
                    <li><a class="dropdown-item d-flex justify-content-between" href="{{ route('dashboard-agent.edit-profile') }}"><span><i class="bi bi bi-pencil-square me-2"></i>Ubah Profil</span></a></li>

                    @endrole
                    <hr>
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="dropdown-item d-flex justify-content-between text-danger"><span><i class="bi bi-box-arrow-right me-2"></i>Sign Out</span></button>
                        </form>
                    </li>
                </ul>
              </div>
            @else
              <a href="{{ route('user.login') }}" class="btn btn-primary px-3 mb-3 mb-md-0 {{ Route::is('user.login') ? 'd-none' : '' }} ">Login</a>
            @endauth 
        </div>
    </nav>
</div>
<!-- Navbar End -->



