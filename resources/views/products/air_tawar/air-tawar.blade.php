@extends('layouts.main')
@section('title', 'Box Of Fish | Ikan Air Tawar')

@vite('resources/sass/filter.scss')

@section('content')
    <br>

    {{-- Search --}}
    <div class="container mt-5">
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>

    <div class="container mt-5">
        <div class="card card-filter">
            <div class="row row-filter">

                {{-- Filter Tipe Order --}}
                <div class="col-sm">
                    <h6>Order Type</h6>
                    <select class="form-select form-select-sm" aria-label=".form-select-lg example">
                        <option value="penjual">Penjual</option>
                        <option value="pembeli">Pembeli</option>
                    </select>
                </div>

                {{-- Filter Lokasi --}}
                <div class="col-sm">
                    <h6>Lokasi</h6>
                    <select class="form-select form-select-sm" aria-label=".form-select-lg example">
                        <option value="Aceh">Aceh</option>
                        <option value="Sumatra Utara">Sumatra Utara</option>
                        <option value="Sumatra Barat">Sumatra Barat</option>
                        <option value="Riau">Riau</option>
                        <option value="Jambi">Jambi</option>
                        <option value="Sumatra Selatan">Sumatra Selatan</option>
                    </select>
                </div>

                <div class="col-sm position-button">
                    <h6></h6>
                    <button class="btn btn-warning btn-style" type="submit">Terapkan</button>
                </div>
            </div>
        </div>
    </div>
    <br>

    {{-- iki dummy ngko hapusen --}}
    <table class="table">
        <thead style="background: linear-gradient(18deg, #46B7B7 0% , #213555 100%);
    ">
            <tr>
                <th scope="col"></th>
                <th scope="col">JUDUL</th>
                <th scope="col">KETERANGAN</th>
                <th scope="col">HARGA</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>JUDUL 1</td>
                <td>Lorem ipsum dolor sit amet consectetur.</td>
                <td>5000</td>
            </tr>

            @foreach ($products as $product)
            @endforeach
        </tbody>
    </table>
    {{-- sampe sini --}}

    <br>
@endsection
