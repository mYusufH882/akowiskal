@extends('layouts.admin')

@section('content')
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg">
                    <button type="button" class="btn btn-primary btn-rounded mb-1" data-toggle="modal" data-target="#addKategori">
                        Input Kategori
                    </button>

                    @if ($message = Session::get('success'))
                        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show mt-3 mb-3">
                            <span class="badge badge-pill badge-success">Berhasil</span>
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if ($message = Session::get('error'))
                        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show mt-3 mb-3">
                            <span class="badge badge-pill badge-danger">Gagal</span>
                            {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategori as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kategori_nama }}</td>
                                        <td>
                                            <a href="#" data-target="#editKategori{{ $item->id }}" data-toggle="modal" class="btn btn-warning btn-rounded text-white">Edit</a>
                                            <a href="#" data-target="#hapusKategori{{ $item->id }}" data-toggle="modal" class="btn btn-danger btn-rounded">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal add -->
<div class="modal fade" id="addKategori" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Input Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <strong>Input</strong> Kategori
                    </div>
                    <form action="{{ route('kategori.store') }}" method="post">
                    @csrf
                    <div class="card-body card-block">
                        <div class="form-group">
                            <label for="exampleInputName2" class="pr-1  form-control-label">Nama Kategori</label>
                            <input type="text" name="kategori_nama" id="exampleInputName2" placeholder="Nama Kategori" required="" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-ban"></i> Reset
                        </button>
                    </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal add -->

<!-- modal edit -->
@foreach ($kategori as $item)
    <div class="modal fade" id="editKategori{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Edit Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header">
                            <strong>Edit</strong> Kategori
                        </div>
                        <form action="{{ route('kategori.update', $item->id) }}" method="post">
                        @csrf
                        @method('patch')

                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="exampleInputName2" class="pr-1  form-control-label">Nama Kategori</label>
                                <input type="text" name="kategori_nama" id="exampleInputName2" placeholder="Nama Kategori" value="{{ $item->kategori_nama }}" required="" class="form-control">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning text-white btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Edit
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
<!-- end modal edit -->

<!-- modal hapus -->
@foreach ($kategori as $item)
    <div class="modal fade" id="hapusKategori{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Hapus Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header">
                            <strong>Hapus</strong> Kategori
                        </div>
                        <form action="{{ route('kategori.destroy', $item->id) }}" method="post">
                        @csrf
                        @method('delete')

                        <div class="card-body card-block">
                            <p><b>Apakah anda yakin ingin menghapus data kategori <b class="text-danger">{{ $item->kategori_nama }}</b> ini ?</b></p>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-danger text-white btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Hapus
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
<!-- end modal hapus -->

@endsection
