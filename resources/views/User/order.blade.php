@extends('User.template')
@section('content')
<section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Selamat Datang di Delia Foods</h1>
                    <p class="lead text-muted">Menyediakan beragam jenis makanan interlokal</p>

                </div>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach ($orders as $od)
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="{{ asset('images/foods') }}/{{ $od->image }}" alt="" class="card-images">

                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4 class="card-title">{{ $od->namefood }}</h4>
                                        <b class="text-bold text-right">Rp{{ $od->price }}</b>
                                    </div>
                                    <p class="card-text">{{ Str::limit($od->description, 90) }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Add to
                                                Cart</button>
                                            <a href="/order/{{$od->id}}" class="btn btn-sm btn-outline-secondary">Buy
                                                Now</a>
                                        </div>
                                        <small class="text-muted">{{ $od->created_at->format('d/m/Y') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
        <img src="..." class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      </div>
    </div>
  </div>
</div>
                    @endforeach

                </div>
            </div>
        </div>
@endsection
