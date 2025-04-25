@extends('dashboard.layouts.app')

@section('title', 'Proses Penjualan - Review Iklan | Stone.id')

@section('dashboard_content')

<!-- CONTENT -->
<section class="container-xxl outer-main">
    <main class="container main-content pt-3">
        <header class="row px-2 pb-3">
            <nav class="py-3 px-3" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard-agent.my-listing') }}">Listing Saya</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Property User {{ $property->id_preview }}</li>
                </ol>
            </nav>
 
 
            <h3>Pilihan Menu Sewa Properti</h3>
            <p>Anda dapat <span class="fw-bold text-dark">Memperpanjang atau Menghentikan</span> iklan sewa properti</p>

            <section class="bg-white mb-3 p-5">
                <form>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Lama Sewa</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </section>
        </header> 
    </main>  
</section>

 @endsection