@extends('layouts.admin')

@section('content')
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg">
                    {{-- <button type="button" class="btn btn-primary btn-rounded mb-1" data-toggle="modal" data-target="#addInfo">
                        Input Info Objek
                    </button> --}}

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
                                    <th>Nama Objek Wisata</th>
                                    <th>Narasi</th>
                                    <th>Sumber</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($info as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->info_narasi }}</td>
                                        <td>{{ $item->info_sumber }}</td>
                                        <td>
                                            <a href="#" data-target="#editInfo{{ $item->idof }}" data-toggle="modal" class="btn btn-warning btn-rounded text-white">Edit</a>
                                            <a href="#" data-target="#hapusInfo{{ $item->idof }}" data-toggle="modal" class="btn btn-danger btn-rounded">Hapus</a>
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
{{-- <div class="modal fade" id="addInfo" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Input Info Objek Wisata</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <strong>Input</strong> Info Objek Wisata
                    </div>
                    <form action="{{ route('info_objek.store') }}" method="post">
                    @csrf
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label">Nama Objek Wisata</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="id_ow" id="select" class="form-control">
                                        <option value="0">Please select</option>
                                        @foreach ($wisata as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label">Info Narasi</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="info_narasi" id="textarea-input" rows="9" placeholder="Info Narasi..." class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label">Info Sumber</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="info_sumber" id="textarea-input" rows="9" placeholder="Info Sumber..." class="form-control"></textarea>
                                </div>
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
</div> --}}
<!-- end modal add -->

<!-- modal edit -->
@foreach ($info as $item)
<div class="modal fade" id="editInfo{{ $item->idof }}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Input Info Objek Wisata</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <strong>Input</strong> Info Objek Wisata
                    </div>
                    <form action="{{ route('info_objek.update', $item->idof) }}" method="post">
                    @csrf
                    @method('patch')
                        <div class="card-body card-block">
                            @foreach ($wisata as $it)
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Nama Objek Wisata</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="hidden" name="id_ow" value="{{ $it->id }}">
                                        <input type="text" id="text-input" placeholder="Nama Objek Wisata" value="{{ $it->nama }}" class="form-control" readonly>
                                    </div>
                                </div>
                            @endforeach
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label">Info Narasi</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="info_narasi" id="textarea-input" rows="9" placeholder="Info Narasi..." class="form-control">{{ $item->info_narasi }}</textarea>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label">Info Sumber</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="info_sumber" id="textarea-input" rows="9" placeholder="Info Sumber..." class="form-control">{{ $item->info_sumber }}</textarea>
                                </div>
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

<!-- modal delete -->
@foreach ($info as $item)
<div class="modal fade" id="hapusInfo{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Hapus Info Objek Wisata</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <strong>Hapus</strong> Info Objek Wisata
                    </div>
                    <form action="{{ route('info_objek.destroy', $item->id) }}" method="post">
                    @csrf
                    @method('delete')
                        <div class="card-body card-block">
                            <p><b>Apakah anda yakin ingin menghapus data info objek wisata <b class="text-danger">{{ $item->nama }}</b> ini ?</b></p>
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
