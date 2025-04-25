<!-- Navbar Start -->

<div class="container-fluid nav-bar bg-light shadow-sm ">
    <nav class="navbar navbar-expand-lg navbar-light bg-white p-3 py-lg-0 px-lg-3 justify-content-between align-items-center">
        <div class="header-left d-flex">
            <div class="logo me-3">
                <a href="{{ route('home') }}">
                    <h3 class="text-primary text-center">Stone.id</h3>
                </a>
            </div>
            <a href="#" class="sidebarCollapse sidebar-toggle mt-1 ps-3 fs-5"  data-placement="bottom">
                <span class="fas fa-bars"></span>
            </a>
        </div>
        <ul class="navbar-nav flex-row ml-auto">
            <li class="nav-item dropdown agen-profile-dropdown">
                <a href="" class="nav-link" id="notify" data-bs-toggle="dropdown">
                    <span class="fas fa-bell fa-lg"></span>
                    <p class="counter rounded-circle text-white">5</p>
                </a>
                <div class="dropdown-menu">
                    <div class="dp-main-menu">
                        <a href="" class="dropdown-item d-flex border-bottom pt-2">
                            <i class="fas fa-edit fa-lg me-2"></i>
                            <div class="note-dismiss d-flex justify-content-between align-items-center w-100">
                                <div class="user-notify-info">
                                    <p>
                                        <span class="fw-bold">William Fabrianto</span><br>
                                        <span class="">Request edit property</span><br>
                                        <span class="text-muted">20 menit lalu</span>
                                    </p>
                                </div>
                                <p class="status-link ps-1"><span class="fas fa-times"></span></p>
                            </div>
                        </a>
                        <a href="" class="dropdown-item d-flex border-bottom pt-2">
                            <i class="fas fa-edit fa-lg me-2"></i>
                            <div class="note-dismiss d-flex justify-content-between align-items-center w-100">
                                <div class="user-notify-info">
                                    <p>
                                        <span class="fw-bold">Rihanna</span><br>
                                        <span class="">Mengirimkan anda pesan!</span><br>
                                        <span class="text-muted">1 jam lalu</span>
                                    </p>
                                </div>
                                <p class="status-link ps-1"><span class="fas fa-times"></span></p>
                            </div>
                        </a>
                        <a href="" class="dropdown-item d-flex border-bottom pt-2">
                            <i class="fas fa-edit fa-lg me-2"></i>
                            <div class="note-dismiss d-flex justify-content-between align-items-center w-100">
                                <div class="user-notify-info">
                                    <p>
                                        <span class="fw-bold">Belinda</span><br>
                                        <span class="">Request edit property</span><br>
                                        <span class="text-muted">50 menit lalu</span>
                                    </p>
                                </div>
                                <p class="status-link ps-1"><span class="fas fa-times"></span></p>
                            </div>
                        </a>
                        <a href="" class="dropdown-item d-flex border-bottom pt-2">
                            <i class="fas fa-edit fa-lg me-2"></i>
                            <div class="note-dismiss d-flex justify-content-between align-items-center w-100">
                                <div class="user-notify-info">
                                    <p>
                                        <span class="fw-bold">Daniel Mananta</span><br>
                                        <span class="">Mengirimkan anda pesan!</span><br>
                                        <span class="text-muted">20 menit lalu</span>
                                    </p>
                                </div>
                                <p class="status-link ps-1"><span class="fas fa-times"></span></p>
                            </div>
                        </a>
                    </div>  
                </div>
            </li>
            <li class="nav-item dropdown agen-profile-dropdown">
                <a href="" class="nav-link" id="notify" data-bs-toggle="dropdown">
                    <span class="fas fa-user-circle fa-lg"></span>
                </a>
                <div class="dropdown-menu">
                    <div class="agen-profile-section">
                        <div class="bg-primary text-center text-white pt-3 pb-2 lh-1">
                            <img src="{{ asset('storage/images/agents/' . $profile->photo) }}" class="img-fluid img-thumbnail rounded-circle " style="height: 50px; width: 50px;" alt="">
                            <h5 class="text-white mt-2">{{ $user->name }}</h5>
                            <p>Basic</p>
                        </div>
                        
                    </div> 
                    <div class="dp-main-menu">
                        <a href="" class="dropdown-item d-flex border-bottom pt-2"><span class="fas fa-user me-3 text-primary"></span>Profil Saya</a>
                        <a href="" class="dropdown-item d-flex border-bottom pt-2"><span class="fas fa-lock-open me-3 text-primary"></span>Lock Screen</a>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <span class="fas fa-sign-out-alt me-3 text-primary py-2"></span>Logout
                            </button>
                        </form>
                        {{-- <a href="" class="dropdown-item d-flex border-bottom pt-2"><span class="fas fa-sign-out-alt me-3 text-primary"></span>Logout</a> --}}
                        
                    </div> 
                </div>
            </li>
            <li class="nav-item dropdown agen-profile-dropdown">
                <a href="" class="nav-link" id="notify">
                    <i class="fas fa-cog fa-lg"></i>
                </a>
                <div class="dropdown-menu">
                    <div class="dp-main-menu">
                        <a href="" class="dropdown-item d-flex border-bottom py-3"><span class="fas fa-question-circle me-3 text-primary"></span>Support</a>
                        <a href="" class="dropdown-item d-flex border-bottom py-3"><span class="fas fa-user me-3 text-primary"></span>Account Setting</a>
                        <a href="" class="dropdown-item d-flex border-bottom py-3"><span class="fas fa-lock me-3 text-primary"></span>Privacy center</a>
                        <a href="" class="dropdown-item d-flex border-bottom py-3"><span class="fas fa-comments me-3 text-primary"></span>Feedback</a>
                    </div> 
                </div>
            </li>
        </ul>
    </nav>
</div>
<!-- Navbar End -->