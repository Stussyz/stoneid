<div class="sidebar-wrapper">
    <aside class="sidebar active bg-primary position-absolute shadow-sm me-lg-0 me-3 border">
        <main class="pb-3 border-bottom px-3 pt-3 text-white d-md-block d-none">
            <div class="row">
                <div class="col-3 pe-2">
                    <img class="rounded-circle" src="{{ asset('storage/images/agents/' . $profile->photo) }}" alt="" style="width: 50px; height: 50px;">
                </div>
                <div class="col-9 lh-1">
                    <h6 class="text-white">{{ $user->name }}</h6>
                    <small class="text-white">{{ $profile->level }} | <a href="#" class="text-white">Upgrade</a></small>
                </div>
            </div>
            <div class="row text-white lh-2 pt-3 my-2 ">
                <div class="col-6"><small>Aktif Hingga</small></div>
                <div class="col-6 text-end"><small class="fw-bold "> - </small></div>

                <div class="col-6"><small>Anggota Sejak</small></div>
                <div class="col-6 text-end"><small class="fw-bold ">{{ $user->created_at->format('d F Y') }}</small></div>

                <div class="col-6"><small>Status</small></div>
                <div class="col-6 text-end"><small class="fw-bold ">Independent Agent</small></div>

               
            </div>
        </main>
        <nav class="nav flex-column pt-3" id="sidebarTab">
            <a href="{{ route('dashboard-agent.index') }}" class="nav-link py-3 mb-2 {{ Route::is('dashboard-agent.index') ? 'active' : '' }}" id="dashboard-tab">
                <span class=""><i class="fas fa-home"></i></span>
                <span class="sidebar-description">Dashboard</span>
            </a>
            <a href="{{ route('dashboard-agent.my-listing') }}" class="nav-link py-3 mb-2 {{ 
            Route::is('dashboard-agent.my-listing') ||
            Route::is('dashboard-agent.transaction.process') ||
            Route::is('dashboard-agent.transaction.process.save') ||
            Route::is('dashboard-agent.edit-listing') ||
            Route::is('dashboard-agent.rent-utility')
             ? 'active' : '' }}" id="myListing-tab" >
                <span class=""><i class="fas fa-list-ul"></i></span>
                <span class="sidebar-description">Listing Saya</span>
            </a>
            <a href="{{ route('dashboard-agent.pool-user') }}" class="nav-link py-3 mb-2 {{ Route::is('dashboard-agent.pool-user') ? 'active' : '' }}" id="poolUser-tab" >
                <span class=""><i class="fas fa-user-tag"></i></span>
                <span class="sidebar-description">Pool User</span>
            </a>
            <a href="{{ route('dashboard-agent.create-listing') }}" class="nav-link py-3 mb-2 {{ Route::is('dashboard-agent.create-listing') ? 'active' : '' }}" id="addListing-tab" >
                <span class=""><i class="fas fa-layer-group"></i></span>
                <span class="sidebar-description">Buat Listing Properti</span>
            </a>
            <a href="{{ route('dashboard-agent.history-index') }}" class="nav-link py-3 mb-2 {{ Route::is('dashboard-agent.history-index') ? 'active' : '' }}" id="listingHistory-tab">
                <span class=""><i class="fas fa-history"></i></span>
                <span class="sidebar-description">Riwayat Penjualan</span>
            </a>
            <a href="{{ route('dashboard-agent.edit-profile') }}" class="nav-link py-3 mb-2 {{ Route::is('home') ? 'edit-profile' : '' }}" id="editProfil-tab">
                <span class=""><i class="fas fa-edit"></i></span>
                <span class="sidebar-description">Ubah Profil</span>
            </a>

        </nav>
    </aside>
</div>