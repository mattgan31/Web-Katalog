@extends('Admin.template')
@section('title', 'Edit Makanan')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>@yield('title')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@yield('title')</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/admin/edit/{{ $food->id }}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Makanan</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                placeholder="Masukkan Nama Makanan" name="namefood" value="{{ $food->namefood }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Stok</label>
                            <input type='number' class="form-control" id="exampleFormControlTextarea1" rows="3"
                                placeholder="Masukan Jumlah Makanan" name="stock" value="{{ $food->stock }}">
                        </div>

                        <div class=" mb-3">
                            <label for="category" class="form-label">Kategori</label>
                            <select name="category" id="category" class="form-control">
                                <option value="">Pilih Kategori</option>
                                <option value="Makanan" @if ($food->category == 'Makanan') selected @endif>Makanan
                                </option>
                                <option value="Minuman" @if ($food->category == 'Minuman') selected @endif>Minuman
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Hargap per Porsi</label>
                            <input step="1000" type='number' class="form-control" id="exampleFormControlTextarea1"
                                rows="3" placeholder="Masukan Harga Makanan" name="price" value="{{ $food->price }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                            <textarea name="description" id="" cols="30" rows="6"
                                class="form-control">{{ $food->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Pilih Gambar</label>
                            <div class="row">
                                <img src="{{ asset('images') }}/{{ $food->image }}" alt=""
                                    style="width: 150px; margin-bottom:12px">
                                <input type='file' class="form-control" id="exampleFormControlTextarea1" rows="3"
                                    placeholder="Pilih Gambar" name="image">
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-success" type="submit">Apply</button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection
