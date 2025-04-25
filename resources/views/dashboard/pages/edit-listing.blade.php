@extends('dashboard.layouts.app')

@section('title', 'Ubah Iklan | Dashboard Agen Stone.id')

@php
     $isRented = $property->min_rent_period ?? null; // or however your property type is defined
@endphp

@section('dashboard_content')

<!-- halaman buat listing baru -->
   <main class="container main-content pt-3">
    <div class="row py-3">
        <div class="col-12">
            
        </div>
        <h3>Ubah Iklan </h3>
        <p>Iklan ID: {{ $property->id_preview }}</p>

        <form method="POST" action="{{ route('dashboard-agent.update-listing', $property) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('dashboard.layouts.partials.listing-form')
        </form>
    </div>
</main>
 <!-- akhir halaman buat listing baru -->

 @endsection



 




