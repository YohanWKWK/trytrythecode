@extends('layouts.main.detail-product')

@section('title', "Box Of Fish | $product->product_name")

@section('content')

    @php
        $product_name = strtoupper($product->product_name);
        $category = strtoupper($product->category);
    @endphp
    <div class="pt-6 p-4 p-md-5 text-body-emphasis bg-body-secondary d-flex justify-content-center align-items-center">
        <img src="{{ asset("photos/products_photo/$product->image_path") }}" alt="{{ $product->product_name }}" width="400">
    </div>
    <div class="pt-6 p-2 text-body-emphasis bg-body-secondary d-flex justify-content-center align-items-center"
        style="background: linear-gradient(18deg, #46B7B7 0% , #213555 100%);">
        <h2 class="text-light">{{ $product_name }}</h2>
    </div>
    <div class="pt-6 mb-4 text-body-emphasis bg-body-secondary d-flex justify-content-center align-items-center">
        <h5 class="text-secondary-emphasis p-1" style="margin: 0">{{ $category }}</h5>
    </div>

    <div class="container mb-4 ">
        <div class="row">
            <div class="col-md-7">
                <div class="p-3 rounded col-md-12 bg-body-secondary">
                    <h4 class="pb-1">Description</h4>
                    <p>{{ $product->description }}</p>
                </div>
            </div>
            <div class="col-md-4 offset-md-1">
                <div class="p-2 mb-2 col-md-12 rounded bg-body-secondary d-flex justify-content-center align-items-center">
                    <h4> Rp {{ $product->price }}</h4>
                </div>
                <div class="p-2 mb-2 col-md-12 rounded bg-body-secondary d-flex justify-content-center align-items-center">
                    <div class="col-md-6">
                        <h6> {{ $user_product->name }} </h6>
                        <p> {{ $user_product->kota_kabupaten }} </p>
                    </div>
                    <div class="col-md-6 rounded-circle circle d-flex justify-content-center align-items-center">
                        <img src="{{ asset("photos/users_photo/$user_product->image_path") }}" alt="" width="100">
                    </div>
                </div>
                <div class="p-2 mb-2 col-md-12 rounded bg-body-secondary d-flex justify-content-center align-items-center">
                    <div class="container-fluid col-md-6 d-flex justify-content-center align-items-center">
                        <a class="btn btn-warning btn-style" type="button" href="{{ url('#') }}">CHAT</a>
                    </div>
                    <div class="container-fluid col-md-6 d-flex justify-content-center align-items-center">
                        <a class="btn btn-success btn-style" type="button" href="{{ url("order/$product->id") }}">BELI</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
