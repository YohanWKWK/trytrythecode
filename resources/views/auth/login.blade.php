<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>
    <style>
        .custom-bg {
            background-color: #64a0c68d;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    @vite('resources/sass/app.scss')
</head>

<body class="custom-bg">
    <div class="position-login">
        <div class="container">
            <div class="card text-center card-login"
                style="width: 19rem; height: 26rem;
                background: linear-gradient(147deg, #213555 0%, #64C6B4 100%); border:none ;">
                <div class="card-body">

                    <img src="{{ asset('images/Logo 1.png') }}" alt="Logo 1" width="40" height="40"
                        class="d-inline-block align-text-top">
                    {{-- <br> --}}

                    <h3
                        style="color: #FFF;
                        font-size: 23px;
                        font-style: normal;
                        font-weight: 380;
                        line-height: normal;">
                        LOGIN TO BOX OF FISH
                    </h3>

                    <br>

                    @if (session()->has('error_message'))
                        <div class="alert alert-danger">
                            {{ session()->get('error_message') }}
                        </div>
                    @endif
                    <form action="{{ url('login') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control " id="password" name="password">
                        </div>
                        {{-- <br> --}}
                        <div class="mb-3 mt-4">
                            <button type="submit" class="btn btn-warning">Submit</button>
                        </div>
                    </form>
                    <br>

                    <a href="{{ url('register') }}"
                        class="link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">create
                        new account</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
