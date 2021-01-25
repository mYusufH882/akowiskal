@extends('layouts.admin')

@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-6">
                    @foreach ($join3 as $item)
                        <div class="card">
                            <div class="card-header">
                                <strong>Kategori</strong> Objek Wisata
                            </div>
                            <div class="card-body card-block">
                                <form action="" method="post" class="form-inline">
                                    <div class="form-group">
                                        <label for="exampleInputName2" class="pr-1  form-control-label">Kategori</label>
                                        <input type="text" id="exampleInputName2" value="{{ $item->kategori_nama }}" class="form-control" readonly>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach

                    @foreach ($join2 as $item)
                        <div class="card">
                            <div class="card-header">
                                <strong>Lampiran</strong>
                                <small> Objek Wisata</small>
                            </div>
                            <div class="card-body card-block">
                                <img src="{{ asset('asset/images/lampiran/' . $item->lamp_gambar) }}" alt="{{ $item->lamp_gambar }}" class="mx-auto d-block">
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Judul</label>
                                    <input type="text" id="company" value="{{ $item->lamp_judul }}" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Deskripsi</label>
                                    <textarea id="vat" cols="30" rows="10" class="form-control" readonly>{{ $item->lamp_deskripsi }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Alamat</label>
                                    <textarea id="vat" cols="30" rows="10" class="form-control" readonly>{{ $item->lamp_alamat }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">Referensi</label>
                                    <textarea id="vat" cols="30" rows="10" class="form-control" readonly>{{ $item->lamp_referensi }}</textarea>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>

                    @foreach ($join1 as $item)
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">Objek Wisata</div>
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Wisata </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="nama" class="control-label mb-1">Nama Objek Wisata</label>
                                            <input id="nama" type="text" class="form-control" value="{{ $item->nama }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_lain" class="control-label mb-1">Nama Lain Objek Wisata</label>
                                            <input id="nama_lain" type="text" class="form-control" value="{{ $item->nama_lain }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi" class="control-label mb-1">Deskripsi</label>
                                            <textarea id="deskripsi" cols="30" rows="10" class="form-control" readonly>{{ $item->deskripsi }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi" class="control-label mb-1">Cara Tempuh</label>
                                            <textarea id="cara_tempuh" cols="30" rows="10" class="form-control" readonly>{{ $item->cara_tempuh }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="fasilitas" class="control-label mb-1">Fasilitas</label>
                                            <textarea id="deskripsi" cols="30" rows="10" class="form-control" readonly>{{ $item->fasilitas }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
