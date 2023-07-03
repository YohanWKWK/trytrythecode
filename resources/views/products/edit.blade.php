<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Box Of Fish | Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @include('layouts.main.header')

    @php
        $category = str_replace(' ', '-', $product->category);
    @endphp
    <div class="container mt-5">
        <h2>Create Product</h2>
        <form method="POST" action="{{ route('products.update', ['category' => $category, 'id' => $product->id]) }}"
            enctype="multipart/form-data">
            @method('PATCH')
            @csrf

            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name"
                    value="{{ $product->product_name }}">
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category" name="category" aria-valuetext="{{ $product->category }}">
                    <option value="air tawar">Air Tawar</option>
                    <option value="air laut">Air Laut</option>
                    <option value="tanaman air">Tanaman Air</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4">{{ $product->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01"
                    value="{{ $product->price }}">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Photo</label>
                <input type="file" class="form-control" id="image" name="image" accept=".png, .jpg, .jpeg"
                    onchange="previewImage()">
                @if ($product->image_path)
                    <p>Current Image: {{ $product->image_path }}</p>
                @endif
            </div>
            <div class="mb-3 d-flex justify-content-center align-items-center">
                <img id="preview-image-before-upload" src=" {{ asset("photos/products_photo/$product->image_path") }} "
                    alt="preview image" style="max-height: 250px;">
            </div>
            <div class="mb-3 d-flex justify-content-end align-items-center">
                <button type="submit" class="btn btn-primary me-3">Submit</button>
                {{-- <button type="submit" class="btn btn-danger">Cancel</button> --}}
            </div>
        </form>
    </div>

    @include('layouts.main.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

    <script>
        function previewImage() {
            var preview = document.querySelector('#preview-image-before-upload');
            var file = document.querySelector('#image').files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "{{ asset('photos/products_photo/' . $product->image_path) }}";
            }
        }
    </script>

</body>

</html>