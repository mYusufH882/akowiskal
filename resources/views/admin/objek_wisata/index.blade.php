@extends('layouts.admin')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg">
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

                        <a href="{{ route('objek_wisata.create') }}" class="btn btn-primary m-b-5" role="button">Tambah Objek Wisata</a>
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nama Lain</th>
                                        {{-- <th>Kode Provinsi</th>
                                        <th>Kode Kabupaten</th>
                                        <th>Kode Kecamatan</th> --}}
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($wisata as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->nama_lain }}</td>
                                            {{-- <td>{{ $item->kode_prov }}</td>
                                            <td>{{ $item->kode_kab }}</td>
                                            <td>{{ $item->kode_kec }}</td> --}}
                                            <td>{{ $item->deskripsi }}</td>
                                            <td>
                                                <a href="{{ route('objek_wisata.show', $item->id) }}" class="btn btn-secondary btn-rounded">Detail</a>
                                                <a href="{{ route('info_objek.edit', $item->id) }}" class="btn btn-info btn-rounded"><i class="fas fa-plus"></i> Info Tambahan</a>
                                                <a href="{{ route('objek_wisata.edit', $item->id) }}" class="btn btn-warning btn-rounded text-white">Edit</a>
                                                <a href="#" data-target="#hapusObjek{{ $item->id }}" data-toggle="modal" class="btn btn-danger btn-rounded">Hapus</a>
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

    <!-- modal hapus -->
@foreach ($wisata as $item)
<div class="modal fade" id="hapusObjek{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Hapus Objek Wisata</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <strong>Hapus</strong> Objek Wisata
                    </div>
                    <form action="{{ route('objek_wisata.destroy', $item->id) }}" method="post">
                    @csrf
                    @method('delete')

                    <div class="card-body card-block">
                        <p><b>Apakah anda yakin ingin menghapus data objek wisata <b class="text-danger">{{ $item->nama }}</b> ini ?</b></p>
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
