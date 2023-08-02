<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Box Of Fish | User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    @vite('resources/sass/profile.scss')

    <style>
        .circle {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            overflow: hidden;
        }

        .image-mask {
            width: 100%;
            height: 100%;
            mask-image: radial-gradient(circle, transparent 50%, black 50%);
            mask-mode: alpha;
            mask-repeat: no-repeat;
            mask-position: center;
        }
    </style>
</head>

<body>

    @include('layouts.main.header')


    <div class="container mt-4">
        {{-- <div class="main-body"> --}}
        <div class="row gutters-sm">
            <div class="col-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{ asset("photos/users_photo/$user->image_path") }}" alt="{{ $user->name }}"
                                class="circle" style="width: 150px; height: 150px;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Username</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <p class="text-muted mb-0">{{ $user->name }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <p class="text-muted mb-0"> {{ $user->email }} </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Kota / Kabupaten</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <p class="text-muted mb-0"> {{ $user->kota_kabupaten }} </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Alamat Lengkap</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <p class="text-muted mb-0"> {{ $user->alamat_lengkap }} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row mb-3 mt-4 text-center bg-primary bg-gradient">
        <div class="col-md themed-grid-col">
            <div class="row pt-1 pb-1" style="background:  #213555;">
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
                        <a href="{{ url("products/$slug_category/$product->slug/edit") }}"
                            class="btn btn-warning rounded-pill btn-style">Edit</a>
                    </div>
                    <div class="col-md-1 thermed-grid-col d-flex align-items-center justify-content-center">
                        <!-- Isi kolom -->
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    @include('layouts.main.footer')

    <!-- Floating Action Button (FAB) -->
    <div class="position-fixed bottom-0 end-0 p-3">
        <a href="{{ url('products/create') }}" class="btn btn-warning btn-fab">
            <i class="bi bi-plus"></i>
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    @vite('resources/js/app.js')
</body>

</html>
