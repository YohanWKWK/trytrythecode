@extends('layout/main')
@section('title','list')

{{-- ini navigation 2 --}}
@section('navigation2')
<ul class="nav justify-content-center">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="#">Active</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled">Disabled</a>
    </li>
  </ul>
@endsection

{{-- ini content per halaman --}}
@section('content')
<div class="container text-center my-5">
    <div class="container mt-5">
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>

    <div class="container mt-5">
        <div class="row">

            <div class="col-sm-4">
                <div class="card text-center mb-4" style="width: 18rem;">
                    <div class="card-body card-bg">
                      <h5 class="card-title">AIR TAWAR</h5>
                      <a href="#" class="btn btn-primary" style="background: #FDD400;">cek</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
@endsection
