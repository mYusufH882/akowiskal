@extends('layouts.front')

@section('content')
<section>
    <div class="row">
        @foreach ($wisata as $item)
            <div class="col-md-8">
                <article class="blog-post">
                    <div class="blog-post-image">
                        <a href="post.html"><img src="{{ asset('asset/images/lampiran/' . $item->lamp_gambar) }}" alt=""></a>
                    </div>
                    <div class="blog-post-body">
                        <h2><a href="post.html">{{ $item->nama }}({{ $item->nama_lain }})</a></h2>
                        <div class="post-meta"><span><i class="fa fa-clock-o"></i>{{ date('d F Y', strtotime($item->created_at)) }}</span></div>
                        <div class="blog-post-text">
                            <p>{{ $item->deskripsi }}</p>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-md-4 sidebar-gutter">
                <aside>
                <!-- sidebar-widget -->
                <div class="sidebar-widget">
                    <h3 class="sidebar-title">Informasi</h3>
                    <div class="widget-container widget-about">
                        <h4>{{ $item->lamp_judul }}</h4>
                        <p>{{ $item->lamp_deskripsi }}</p>
                    </div>
                </div>
                <!-- sidebar-widget -->
                <div class="sidebar-widget">
                    <h3 class="sidebar-title">Alamat Wisata</h3>
                    <div class="widget-container">
                        <p style="text-align: center">{{ $item->lamp_alamat }}</p>
                    </div>
                </div>
                <!-- sidebar-widget -->
                <div class="sidebar-widget">
                    <h3 class="sidebar-title">Referensi</h3>
                    <div class="widget-container">
                        <a href="{{ $item->lamp_referensi }}" style="text-align: center">Wisata Alam Cimahi</a>
                    </div>
                </div>
                <!-- sidebar-widget -->
                <div class="sidebar-widget">
                    <h3 class="sidebar-title">Kategori</h3>
                    <div class="widget-container">
                        @foreach ($owkategori as $item)
                            <p style="text-align: center">{{ $item->kategori_nama }}</p>
                        @endforeach
                    </div>
                </div>
                </aside>
            </div>
        @endforeach
    </div>
</section>
@endsection
