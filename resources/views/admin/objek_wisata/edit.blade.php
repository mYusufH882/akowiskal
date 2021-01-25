@extends('layouts.admin')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg">
                    <div class="card">
                        <div class="card-header">
                            <strong>Edit Data</strong> Objek Wisata
                        </div>
                        <div class="card-body card-block">
                            @foreach ($owlamp as $item)
                            <form action="{{ route('objek_wisata.update', $item->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                @method('patch')

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class="form-control-label">Nama Objek Wisata</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="nama" placeholder="Nama Objek Wisata" value="{{ $item->nama }}" class="form-control">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Nama Lain Objek Wisata</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="nama_lain" placeholder="Nama Lain Objek Wisata" value="{{ $item->nama_lain }}" class="form-control">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Kategori</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="id_kategori" id="select" class="form-control">
                                            <option value="0">Please select</option>
                                            @foreach ($kategori as $item)
                                                @if ($item->id === $pilihanKategori->id)
                                                    <option value="{{ $item->id }}" selected>{{ $item->kategori_nama }}</option>
                                                @else
                                                    <option value="{{ $item->id }}">{{ $item->kategori_nama }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Kode Provinsi</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="kode_prov" id="select" class="form-control">
                                            <option value="0">Please select</option>
                                            <option value="1">Option #1</option>
                                            <option value="2">Option #2</option>
                                            <option value="3">Option #3</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Kode Kabupaten</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="kode_kab" id="select" class="form-control">
                                            <option value="0">Please select</option>
                                            <option value="1">Option #1</option>
                                            <option value="2">Option #2</option>
                                            <option value="3">Option #3</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Kode Kecamatan</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="kode_kec" id="select" class="form-control">
                                            <option value="0">Please select</option>
                                            <option value="1">Option #1</option>
                                            <option value="2">Option #2</option>
                                            <option value="3">Option #3</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Kode Desa</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="kode_desa" id="select" class="form-control">
                                            <option value="0">Please select</option>
                                            <option value="1">Option #1</option>
                                            <option value="2">Option #2</option>
                                            <option value="3">Option #3</option>
                                        </select>
                                    </div>
                                </div> --}}

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Deskripsi</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="deskripsi" id="textarea-input" rows="9" placeholder="Deskripsi..." class="form-control">{{ $item->deskripsi }}</textarea>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Cara Tempuh</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="cara_tempuh" id="textarea-input" rows="9" placeholder="Cara Tempuh... , ..." class="form-control">{{ $item->cara_tempuh }}</textarea>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Fasilitas</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="fasilitas" id="textarea-input" rows="9" placeholder="Fasilitas... , ..." class="form-control">{{ $item->fasilitas }}</textarea>
                                    </div>
                                </div>
                                @endforeach
                        </div>

                        <div class="card-footer">
                            {{-- <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button> --}}
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <strong>Input Data</strong> Lampiran
                        </div>
                        <div class="card-body card-block">
                                @foreach($owlamp as $item)
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Judul Lampiran</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="lamp_judul" placeholder="Judul Lampiran" value="{{ $item->lamp_judul }}" class="form-control">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Deskripsi</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="lamp_deskripsi" id="textarea-input" rows="9" placeholder="Deskripsi..." class="form-control">{{ $item->lamp_deskripsi }}</textarea>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Alamat</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="lamp_alamat" id="textarea-input" rows="9" placeholder="Alamat..." class="form-control">{{ $item->lamp_alamat }}</textarea>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="file-input" class=" form-control-label">Gambar Sebelumnya (<span class="text-success">{{ $item->lamp_gambar }}</span>)</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="file-input" name="lamp_gambar" class="form-control-file">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Lampiran Referensi</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="lamp_referensi" placeholder="Lampiran Referensi..." value="{{ $item->lamp_referensi }}" class="form-control">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-warning text-white btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Edit
                                </button>
                            </form>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
