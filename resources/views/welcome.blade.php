@extends('layouts.main')

@section('title', 'Box Of Fish')

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


    {{-- Kategori --}}
    {{-- <div class="text-center my-5" style="background: linear-gradient(178deg, #213655 0%, #46B7B7 100%);">
        <br>
        <h1 style="color: #FFFFFF; font-weight: 300;">KATEGORI</h1>

        <div class="container mt-12">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card-bg-1 card text-center mb-3" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title title-style">HANDPHONE</h5>
                            <a href="{{ url('products/handphone') }}" class="btn btn-warning btn-style btn-style-card">cek</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card-bg-2 card text-center mb-3" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title title-style">LAPTOP</h5>
                            <a href="{{ url('products/laptop') }}" class="btn btn-warning btn-style btn-style-card">cek</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card-bg-3 card text-center mb-3" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title title-style">ELEKTRONIK LAIN</h5>
                            <a href="{{ url('products/elektronik-lain') }}" class="btn btn-warning btn-style btn-style-card">cek</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>

    </div> --}}
    <div class="text-center my-5" style="background-color: #213655;">
        <br>
        <h1 style="color: #FFFFFF; font-weight: 300;">KATEGORI</h1>

        <div class="container mt-5">
            <div class="row">
                <div class="card text-center mb-3 card-bg" style="width: 18rem;">
                    <a href="{{ url('/product') }}" class="btn-category">
                        <div class="card-body ">
                            <h5 class="card-title">HANDPHONE</h5>
                        </div>
                    </a>
                </div>

                <div class="card text-center mb-3 card-bg-1" style="width: 18rem;">
                    <a href="{{ url('/product') }}" class="btn-category">
                        <div class="card-body ">
                            <h5 class="card-title">LAPTOP</h5>
                        </div>
                    </a>
                </div>

                <div class="card text-center mb-3 card-bg-2" style="width: 18rem;">
                    <a href="{{ url('/product') }}" class="btn-category">
                        <div class="card-body ">
                            <h5 class="card-title">ELEKTRONIK LAIN</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <br>
    </div>

    <br>
@endsection
