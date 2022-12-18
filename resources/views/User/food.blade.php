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

                @if (! $foods->isEmpty())
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach ($foods as $fd)
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="{{ asset('images/foods') }}/{{ $fd->image }}" alt="" class="card-images">

                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4 class="card-title">{{ $fd->namefood }}</h4>
                                        <b class="text-bold text-right">Rp{{ $fd->price }}</b>
                                    </div>
                                    <p class="card-text">{{ Str::limit($fd->description, 90) }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-primary">Add to
                                                Cart</button>
                                                <form action="/order/{{$fd->id}}" class="btn btn-sm btn-primary">
                                                    @csrf
                                                <button class="" type="submit" style="background-color: inherit; border:none;color:white">Buy Now</button>
                                                </form>
                                        </div>
                                        <small class="text-muted">{{ $fd->created_at->format('d/m/Y') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @else
                    <h2 class="text-center">Foods are not available</h2>
                @endif
            </div>
        </div>
@endsection
