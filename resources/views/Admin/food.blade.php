@extends('Admin.template')
@section('title', 'Daftar Makanan')
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
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Gambar
                                </th>
                                <th>
                                    Nama Makanan
                                </th>
                                <th>
                                    Kategori
                                </th>
                                <th>
                                    Stok
                                </th>
                                <th>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1 @endphp
                            @foreach ($foods as $fd)
                                <tr>
                                    <td>
                                        {{ $no++ }}
                                    </td>
                                    <td>
                                        <img src="{{ asset('images/foods') }}/{{ $fd->image }}" alt=""
                                            style="height: 50px; width:100px">
                                    </td>
                                    <td>
                                        <a href="/admin/show/{{ $fd->id }}" class="text-bold text-black"
                                            style="text-decoration:none">
                                            {{ $fd->namefood }}
                                        </a>
                                        <br />
                                        <small>
                                            Created {{ $fd->created_at->format('d-M-Y') }}
                                        </small>
                                    </td>
                                    <td>
                                        {{ $fd->category }}
                                    </td>
                                    <td>
                                        {{ $fd->stock }} <span class="text-muted">pcs</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="/admin/edit/{{ $fd->id }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <form action="/admin/delete/{{ $fd->id }}" method="post"
                                            class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt">
                                                </i>
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="/admin/add-food" class="btn btn-success">Tambah Makanan</a>
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection
