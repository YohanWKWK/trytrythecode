@extends('layouts.main')

@section('title', 'Box Of Fish | Dasboard')

{{-- ini navigation 2 --}}
@section('navigation2')
    <ul class="nav justify-content-center" style="background: #F5EFE7">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">KATEGORI</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">SOROTAN</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">ARTIKEL</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">BANTUAN</a>
        </li>
    </ul>
@endsection

{{-- ini content per halaman --}}
@section('content')

    {{-- Search --}}
    <div class="container mt-5">
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
    <br>

    {{-- Kategori --}}
    <div class="text-center my-5" style="background: linear-gradient(178deg, #213555 0%, #46B7B7 100%);">
        <br>
        <h1 style="color: #FFFFFF; font-weight: 300;">KATEGORI</h1>

        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card-bg card text-center mb-3" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">AIR TAWAR</h5>
                            <a href="{{ url('products/air-tawar') }}" class="btn btn-warning btn-style">cek</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card-bg card text-center mb-3" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">AIR LAUT</h5>
                            <a href="{{ url('products/air-laut') }}" class="btn btn-warning btn-style">cek</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card-bg card text-center mb-3" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">TANAMAN AIR</h5>
                            <a href="{{ url('products/tanaman-air') }}" class="btn btn-warning btn-style">cek</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>

    </div>

    <br>
@endsection
