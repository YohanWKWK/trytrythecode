<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    @vite('resources/sass/app.scss')

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

<body> {{-- class="custom-bg" --}}

    @include('layouts.main.header')

    <div class="containter">
        {{-- ini content --}}
        @yield('content')

        @include('layouts.main.footer')

    </div>

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
