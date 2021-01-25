@extends('layouts.admin')

@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg">
                        <div class="card">
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

                            <div class="card-header">Pengaturan Profil</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Profil </h3>
                                </div>
                            <form action="{{ route('pengaturan.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('patch')

                                <div class="card-body">
                                    <img src="{{ asset('asset/images/profil/'.Auth::user()->picture) }}" alt="{{ Auth::user()->picture }}" width="250px" class="mx-auto d-block">

                                        <div class="form-group">
                                            <label for="nama" class="control-label mb-1">Username</label>
                                            <input name="name" id="name" type="text" class="form-control" value="{{ Auth::user()->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="control-label mb-1">Email</label>
                                            <input name="email" id="email" type="email" class="form-control" value="{{ Auth::user()->email }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="control-label mb-1">Password Baru (<span class="text-warning">Isi Jika Ingin Mengubah Password</span>)</label>
                                            <input name="password" id="password" type="text" class="form-control" placeholder="Ubah-Password-Baru">
                                        </div>
                                        <div class="form-group">
                                            <label for="profil" class="control-label mb-1">Ganti Profil</label>
                                            <input name="picture" id="profil" type="file" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-warning text-white btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Edit
                                    </button>
                                    {{-- <button type="reset" class="btn btn-danger btn-sm">
                                        <i class="fa fa-ban"></i> Reset
                                    </button> --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
