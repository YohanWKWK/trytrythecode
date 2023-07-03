<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <style>
        .custom-bg {
            background-color: #64a0c68d;
        }

        .card-regist {
            margin: auto;

        }

        .user-regist {
            margin-top: 5%;
        }

        .form-label {
            color: #FFF;
            font-size: 15px;
            font-style: normal;
            font-weight: 250;
            line-height: normal;
        }
    </style>
</head>

<body class="custom-bg">
    <div class="user-regist">
        <div class="container">
            <div class="card text-center card-regist"
                style="width: 35rem; height: auto;
                background: linear-gradient(147deg, #213555 0%, #64C6B4 100%); border-radius: 1rem; ;">
                <div class="card-body">
                    <img src="{{ asset('images/Logo 1.png') }}" alt="Logo 1" width="40" height="40">
                    <br>

                    <h3
                        style="color: #FFF;
                        font-size: 23px;
                        font-style: normal;
                        font-weight: 380;
                        line-height: normal;">
                        REGISTRATION TO BOX FISH
                    </h3>
                    @if (session()->has('error_message'))
                        <div class="alert alert-danger">
                            {{ session()->get('error_message') }}
                        </div>
                    @endif
                    <form action="{{ url('register') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }} </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }} </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control " id="password" name="password">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }} </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control " id="password_confirmation"
                                name="password_confirmation">
                        </div>
                        <div class="mb-3">
                            <label for="kota_kabupaten" class="form-label">Kota / Kabupaten</label>
                            <input type="text" class="form-control" id="kota_kabupaten" name="kota_kabupaten">
                            @if ($errors->has('kota_kabupaten'))
                                <span class="text-danger">{{ $errors->first('kota_kabupaten') }} </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
                            <input type="text" class="form-control " id="alamat_lengkap" name="alamat_lengkap">
                            @if ($errors->has('alamat_lengkap'))
                                <span class="text-danger">{{ $errors->first('alamat_lengkap') }} </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Add Photo</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                                id="image" accept=".png, .jpg, .jpeg" name="image">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            {{-- @if ($errors->has('photo'))
                                <span class="text-danger">{{ $errors->first('photo') }} </span>
                            @endif --}}
                        </div>
                        <br>
                        <div class="mb-3 mt-4">
                            <button type="submit" class="btn btn-warning">Registration</button>
                        </div>
                    </form>
                    <br>

                    <a href="{{ url('login') }}"
                        class="text-warning link-warning link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Already
                        have an Account? Login</a>
                </div>
            </div>
            <br>
            <br>
            <br>

        </div>
    </div>

    <!-- Bootstrap requirement jQuery pada posisi pertama, kemudian Popper.js, danyang terakhit Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>
