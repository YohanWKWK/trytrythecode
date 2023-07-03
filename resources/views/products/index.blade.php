@extends('layouts.product')

@section('title', 'Box Of Fish | Products')

@section('content')
    {{-- Search Start --}}
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>

    {{-- Search End --}}

    {{-- Filter Start --}}
    <div class="container mt-5">
        <div class="">
            <form action="" method="post">

                <div class="row">

                    {{-- Filter Tipe Order --}}
                    <div class="col-md-4 mt-2">
                        <h6 class="mb-3">Order Type</h6>
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option value="penjual">Penjual</option>
                            <option value="pembeli">Pembeli</option>
                        </select>
                    </div>

                    {{-- Filter Lokasi --}}
                    <div class="col-md-4 mt-2">
                        <h6 class="mb-3">Lokasi</h6>
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option value="Aceh">Aceh</option>
                            <option value="Sumatra Utara">Sumatra Utara</option>
                            <option value="Sumatra Barat">Sumatra Barat</option>
                            <option value="Riau">Riau</option>
                            <option value="Jambi">Jambi</option>
                            <option value="Sumatra Selatan">Sumatra Selatan</option>
                        </select>
                    </div>

                    <div class="col-md-4 d-flex justify-content-center align-items-center mt-2">
                        <button class="btn btn-warning btn-style" type="submit">Terapkan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Filter End --}}

    {{-- Show Product Start --}}
    <div class="row mb-3 mt-4 text-center bg-primary bg-gradient">
        <div class="col-md themed-grid-col">
            <div class="row pt-1 pb-1" style="background: linear-gradient(18deg, #46B7B7 0% , #213555 100%);">
                <div class="col-md-1 thermed-grid-col"></div>
                <div class="col-md-2 thermed-grid-col text-light border-end">PHOTO</div>
                <div class="col-md-2 thermed-grid-col text-light border-end">JUDUL</div>
                <div class="col-md-2 thermed-grid-col text-light border-end">KETERANGAN</div>
                <div class="col-md-2 thermed-grid-col text-light border-end">HARGA</div>
                <div class="col-md-2 thermed-grid-col text-light">ACTION</div>
                <div class="col-md-1 thermed-grid-col"></div>
            </div>
            @foreach ($products as $product)
                @php
                    $slug_category = str_replace(' ', '-', $product->category);
                    $descriptionLimited = Str::limit($product->description, 75);
                    $formattedPrice = number_format($product->price, 2, ',', '.');
                @endphp
                <div class="row pt-1 mb-1">
                    <div class="col-md-1 thermed-grid-col d-flex align-items-center justify-content-center">
                        <!-- Isi kolom -->
                    </div>
                    <div class="col-md-2 thermed-grid-col d-flex align-items-center justify-content-center">
                        <img src="{{ asset("photos/products_photo/$product->image_path") }}"
                            alt="{{ $product->product_name }}" width="100" height="75">
                    </div>
                    <div class="col-md-2 thermed-grid-col d-flex align-items-center justify-content-center">
                        {{ $product->product_name }}
                    </div>
                    <div class="col-md-2 thermed-grid-col d-flex align-items-center justify-content-center">
                        {{ $descriptionLimited }}
                    </div>
                    <div class="col-md-2 thermed-grid-col d-flex align-items-center justify-content-center">
                        Rp{{ $formattedPrice }}
                    </div>
                    <div class="col-md-2 thermed-grid-col d-flex align-items-center justify-content-center">
                        <a href="{{ url("products/$slug_category/$product->slug") }}"
                            class="btn btn-warning rounded-pill btn-style">Lihat</a>
                    </div>
                    <div class="col-md-1 thermed-grid-col d-flex align-items-center justify-content-center">
                        <!-- Isi kolom -->
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    {{-- Show Product End --}}
@endsection
