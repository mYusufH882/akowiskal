@extends('layouts.front')

@section('content')
<section>
    <div class="row justify-content-center">
        <div class="card-group">
            @foreach ($wisata as $item)
                <div class="card" style="
                    margin: auto;
                    margin-bottom: 30px;
                    width: 50%;
                    border: 1px solid;
                    padding: 10px;">
                    <img class="card-img-top" src="{{ asset('asset/images/lampiran/'.$item->lamp_gambar) }}" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="blog-title" style="text-align: center;">{{ $item->nama }} ({{ $item->nama_lain }})</h3>
                        <p class="card-text">{{ Str::words($item->deskripsi, 45, ' ...') }}</p>
                        <a href="{{ route('category', $item->owid) }}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
