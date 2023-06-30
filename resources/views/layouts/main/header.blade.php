<nav class="navbar navbar-expand-lg" style="background: linear-gradient(1deg, #213555 0%, #46B7B7 100%);">
    <div class="container">

        <a class="navbar-brand" href="/welcome">
            <img href="{{ url('/') }}" src="{{ asset('images/Logo 1.png') }}" alt="Logo 1" width="60"
                height="60" class="d-inline-block align-text-top">
        </a>


        <span>
            {{-- Mailbox & Nama user --}}
            <div class="container-fluid">
                <a class="btn btn-warning btn-style" type="button" href="{{ url('login') }}">LOGIN</a>
            </div>
        </span>
    </div>
</nav>
