<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Box Of Fish | Create Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @include('layouts.main.header')

    <div class="container mt-5">
        <h2>Create Product</h2>
        <form action="{{ url('/products') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name">
                @if ($errors->has('product_name'))
                    <span class="text-danger">{{ $errors->first('product_name') }} </span>
                @endif
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category" name="category">
                    <option value="handphone">Handphone</option>
                    <option value="laptop">Laptop</option>
                    <option value="elektronik lain">Elektronik Lain</option>
                </select>
                @if ($errors->has('category'))
                    <span class="text-danger">{{ $errors->first('category') }} </span>
                @endif
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }} </span>
                @endif
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01">
                @if ($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }} </span>
                @endif
            </div>
            <div class="mb-3">
                <label for="order_type" class="form-label">Condition</label>
                <select class="form-select" id="order_type" name="order_type">
                    <option value="new">Baru</option>
                    <option value="used">Bekas</option>
                </select>
                @if ($errors->has('order_type'))
                    <span class="text-danger">{{ $errors->first('order_type') }} </span>
                @endif
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Photo</label>
                <input type="file" class="form-control" id="image" name="image" accept=".png, .jpg, .jpeg"
                    onchange="previewImage()">
                @if ($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }} </span>
                @endif
            </div>
            <div class="mb-3 d-flex justify-content-center align-items-center">
                <img id="preview-image-before-upload" src=" {{ asset('images/image-not-found.jpeg') }} "
                    alt="preview image" style="max-height: 250px;">
            </div>
            <button type="submit" class="btn btn-primary mb-3">Submit</button>
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
                preview.src = "{{ asset('images/image-not-found.jpeg') }}";
            }
        }
    </script>
</body>

</html>
