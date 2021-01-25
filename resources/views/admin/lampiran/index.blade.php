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

                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Objek Wiisata</th>
                                    <th>Judul Lampiran</th>
                                    <th>Deskripsi Lampiran</th>
                                    <th>Alamat Lampiran</th>
                                    <th>Gambar</th>
                                    <th>Referensi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($join as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->lamp_judul }}</td>
                                        <td>{{ $item->lamp_alamat}}</td>
                                        <td>{{ $item->lamp_deskripsi }}</td>
                                        <td><img src="{{ asset('asset/images/lampiran/' . $item->lamp_gambar) }}" alt="{{ $item->lamp_gambar }}"></td>
                                        <td>{{ $item->lamp_referensi }}</td>
                                        <td>
                                            <a href="{{ route('objek_wisata.edit', $item->idow) }}" class="btn btn-warning btn-rounded text-white">Edit</a> <!-- Alih ke halaman Objek Wisata -->
                                            <a href="#" data-target="#hapusLampiran{{ $item->id }}" data-toggle="modal" class="btn btn-danger btn-rounded">Hapus</a>
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

<!-- modal delete -->
@foreach ($lampiran as $item)
<div class="modal fade" id="hapusLampiran{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Hapus Lampiran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <strong>Hapus</strong> Lampiran
                    </div>
                    <form action="{{ route('lampiran.destroy', $item->id) }}" method="post">
                    @csrf
                    @method('delete')

                    <div class="card-body card-block">
                        <p><b>Apakah anda yakin ingin menghapus data Lampiran <b class="text-danger">{{ $item->lamp_judul }}</b> ini ?</b></p>
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
<!-- end modal delete -->

@endsection
