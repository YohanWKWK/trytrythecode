<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <style>
        .custom-bg {
            background-color: #ffffff24;
        }
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        @vite('resources/sass/app.scss')
    </head>
    <body class="custom-bg">
        <nav class="navbar navbar-expand-lg" style="background: linear-gradient(250deg, #213555 0%, #46B7B7 100%);
        ">
            <div class="container">

                <a class="navbar-brand" href="/welcome">
                    <img href="{{url('')}}" src="{{asset("images/Logo 1.png")}}" alt="Logo 1" width="60" height="60" class="d-inline-block align-text-top">
                </a>


                <span>
                    {{-- Mailbox & Nama user --}}
                    <div class="container-fluid">
                        <form class="d-flex" role="search">
                          <button class="btn btn-warning btn-style" type="submit">LOGIN</button>
                        </form>
                    </div>
                </span>
            </div>
        </nav>

        {{-- ini  nvigation 2 --}}
        @yield('navigation2')

        {{-- ini content --}}

        @yield('content')


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
        </script>

        <footer class="footer mt-auto py-3" style="background: linear-gradient(320deg, #213555 0%, #46B7B7 100%);">
        </footer>
        @vite('resources/js/app.js')
    </body>
</html>
