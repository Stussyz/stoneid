@extends('dashboard.layouts.app')

@section('title', 'Buat Iklan Baru | Stone.id')

@section('dashboard_content')

<!-- halaman buat listing baru -->
   <main class="container main-content pt-3">
    <div class="row py-3">
        <div class="col-12">
            
        </div>
        <h3>Buat Listing Baru</h3>
        <p>Pastikan penjual/user memverifikasi listing anda</p>

        <form method="post" action="{{ route('dashboard-agent.store-listing') }}" enctype="multipart/form-data">
            @csrf
            @include('dashboard.layouts.partials.listing-form')
        </form>
    </div>
</main>
 <!-- akhir halaman buat listing baru -->
 @endsection

@push('scripts')
<script>
    window.addEventListener('load', function () {
    const defaultRadio = document.getElementById('CB_sale'); // or 'rentOption'
    if (defaultRadio) {
        defaultRadio.checked = true;
        defaultRadio.dispatchEvent(new Event('change')); // Trigger change if needed
    }
});
</script>
@endpush






