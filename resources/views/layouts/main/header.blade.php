<header class="py-2 p-1 border-bottom" style="background-color: #213655;">
    <div class="container">
        <div class="container-fluid d-grid gap-3 align-items-center justify-content-between"
            style="grid-template-columns: 1fr 2fr;">
            <a href="{{ url('/') }}"
                class="d-flex align-items-center col-lg-4 mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                <img src="{{Vite::asset('resources/images/Logo-SiBarang.png')}}" class="bi me-2" width="60" height="60">
            </a>
            <div class="text-end">

                @if (Auth::check())
                    <div class="d-flex align-items-center">
                        <div class="w-100 me-3 d-flex align-items-center justify-content-end">
                            <a href="#" class="btn btn-warning btn-style">MAIL BOX</a>
                        </div>
                        <div class="col-md-auto me-3 text-end text-light">
                            <p class="fs-6 fw-light mb-0"> {{ $user->name }} </p>
                            <p class="fs-6 fw-light mb-0"> {{ $user->kota_kabupaten }} </p>
                        </div>

                        <div class="flex-shrink-0 dropdown">
                            <a href="#"
                                class="d-block link-body-emphasis text-decoration-none dropdown-toggle btn-light"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="0,20">
                                <img src="{{ asset("photos/users_photo/$user->image_path") }}" alt="mdo"
                                    width="32" height="32" class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu text-small shadow">
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="{{ url("profile/$user->id") }}">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ url('logout') }}">Sign out</a></li>
                            </ul>
                        </div>
                    </div>
                @else
                    <a href="{{ url('login') }}" class="btn btn-warning btn-style me-2">LOGIN</a>
                    <a href="{{ url('register') }}" class="btn btn-primary btn-style me-2">REGISTER</a>
                @endif

            </div>
        </div>
    </div>
</header>
