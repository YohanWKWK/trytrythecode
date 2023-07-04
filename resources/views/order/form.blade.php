{{-- resources/views/order/form.blade.php --}}

@extends('layouts.main')

@section('title', "Order Form | $product->product_name")

@section('content')
    <div class="container mb-4 mt-3">
        <div class="row">
            <div class="col-md-7">
                <div class="p-3 row rounded col-md-12 bg-body-primary">
                    <div class="col-md-7">
                        <h4 class="pb-1">Product Details</h4>
                        <p><strong>Name:</strong> {{ $product->product_name }}</p>
                        <p><strong>Description:</strong> {{ $product->description }}</p>
                        <p><strong>Price:</strong> Rp {{ number_format($product->price, 2, ',', '.') }}</p>
                    </div>
                    <div class="col-md-5 d-flex justify-content-center align-content-center ">
                        <img src="{{ asset("photos/products_photo/$product->image_path") }}" alt="" width="200"
                            class="rounded">
                    </div>
                    <!-- Tampilkan detail produk lainnya yang ingin Anda tampilkan -->
                </div>
            </div>
            <div class="col-md-4 offset-md-1">
                <div class="p-2 mb-2 col-md-12 rounded bg-body-secondary d-flex justify-content-center align-items-center"
                    style="background: linear-gradient(1deg, #213555 0%, #46B7B7 100%); color: white;">
                    <h4>Order Form</h4>
                </div>
                <form action="" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="address" class="form-label" style="color: black">Shipping Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="courier" class="form-label" style="color: black">Courier</label>
                        <select class="form-select" id="courier" name="courier" required>
                            <option value="PosIndonesia">Pos Indonesia</option>
                            <option value="J&T">J&T</option>
                            <option value="JNEReg">JNE Reg</option>
                            <!-- Tambahkan pilihan kurir lainnya sesuai dengan kebutuhan -->
                        </select>
                        @error('courier')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="payment_method" class="form-label" style="color: black">Payment Method</label>
                        <select class="form-select" id="payment_method" name="payment_method" required>
                            <option value="BCA">Bank BCA</option>
                            <option value="BRI">Bank BRI</option>
                            <!-- Tambahkan metode pembayaran lainnya sesuai dengan kebutuhan -->
                        </select>
                        @error('payment_method')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-warning btn-style" style="color: white;">Submit Order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
