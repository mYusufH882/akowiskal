@extends('layouts.admin')

@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg">
                    <div class="card">
                        <div class="card-header">
                            <strong>Tambah Data</strong> Info Objek Wisata
                        </div>
                        <form action="{{ route('info_objek.store') }}" method="POST">
                        @csrf

                        <div class="card-body card-block">

                                @foreach ($wisata as $item)
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Nama Objek Wisata</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="hidden" name="id_ow" value="{{ $item->id }}">
                                            <input type="text" id="text-input" placeholder="Nama Objek Wisata" value="{{ $item->nama }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                @endforeach
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
            </div>
        </div>
    </div>
</div>
@endsection
