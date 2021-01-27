@extends('layouts.front')

@section('content')
    @include('laytemps.carousel')
    <section>
        <div class="row">
            <!-- Artikel Post -->
            <div class="col-md-8">
                @forelse ($wisata as $item)
                    <article class="blog-post">
                        <div class="blog-post-image">
                            <a href="post.html"><img src="asset/images/lampiran/{{ $item->lamp_gambar }}" alt=""></a>
                        </div>
                        <div class="blog-post-body">
                            <h2><a href="post.html">{{ $item->nama }} ({{ $item->nama_lain }})</a></h2>
                            <div class="post-meta"><span><i class="fa fa-clock-o"></i>{{ date('d F Y', strtotime($item->created_at)) }}</span></div>
                            <p>{{ $item->deskripsi }}</p>
                            <div class="read-more"><a href="{{ route('category', $item->owid) }}">Continue Reading</a></div>
                        </div>
                    </article>
                @empty
                    <article>
                        <div class="blog-post-image">
                            <a href="post.html"><img src="asset/renda/images/750x500-1.jpg" alt=""></a>
                        </div>
                        <div class="blog-post-body">
                            <h3 class="text-center">Maaf Wisata Tidak Tersedia</h3>
                        </div>
                    </article>

                @endforelse

            </div>
            <!-- End Artikel Post -->

            <!-- Sidebar -->
            <div class="col-md-4 sidebar-gutter">
                <aside>
                <!-- sidebar-widget -->
                <!-- About Me -->
                {{-- <div class="sidebar-widget">
                    <h3 class="sidebar-title">About Me</h3>
                    <div class="widget-container widget-about">
                        <a href="post.html"><img src="asset/images/F1.jpg" alt=""></a>
                        <h4>Muhammad Yusuf Haryadi</h4>
                        <div class="author-title">Back-End Developer</div>
                        <p>Setiap orang memiliki massa nya dimana ia paham atau ia bisa mengerti, tapi waktulah yang dapat menjawab itu semua.</p>
                    </div>
                </div> --}}
                <!-- sidebar-widget -->
                {{-- <div class="sidebar-widget">
                    <h3 class="sidebar-title">Featured Posts</h3>
                    <div class="widget-container">
                        <article class="widget-post">
                            <div class="post-image">
                                <a href="post.html"><img src="asset/renda/images/90x60-1.jpg" alt=""></a>
                            </div>
                            <div class="post-body">
                                <h2><a href="post.html">The State of the Word 2014</a></h2>
                                <div class="post-meta">
                                    <span><i class="fa fa-clock-o"></i> 2. august 2015</span> <span><a href="post.html"><i class="fa fa-comment-o"></i> 23</a></span>
                                </div>
                            </div>
                        </article>
                        <article class="widget-post">
                            <div class="post-image">
                                <a href="post.html"><img src="asset/renda/images/90x60-2.jpg" alt=""></a>
                            </div>
                            <div class="post-body">
                                <h2><a href="post.html">Why The Muppets Needs to Channel 30 Rock</a></h2>
                                <div class="post-meta">
                                    <span><i class="fa fa-clock-o"></i> 2. august 2015</span> <span><a href="post.html"><i class="fa fa-comment-o"></i> 23</a></span>
                                </div>
                            </div>
                        </article>
                        <article class="widget-post">
                            <div class="post-image">
                                <a href="post.html"><img src="asset/renda/images/90x60-3.jpg" alt=""></a>
                            </div>
                            <div class="post-body">
                                <h2><a href="post.html">The State of the Word 2014</a></h2>
                                <div class="post-meta">
                                    <span><i class="fa fa-clock-o"></i> 2. august 2015</span> <span><a href="post.html"><i class="fa fa-comment-o"></i> 23</a></span>
                                </div>
                            </div>
                        </article>
                        <article class="widget-post">
                            <div class="post-image">
                                <a href="post.html"><img src="asset/renda/images/90x60-4.jpg" alt=""></a>
                            </div>
                            <div class="post-body">
                                <h2><a href="post.html">Vintage-Inspired Finds for Your Home</a></h2>
                                <div class="post-meta">
                                    <span><i class="fa fa-clock-o"></i> 2. august 2015</span> <span><a href="post.html"><i class="fa fa-comment-o"></i> 23</a></span>
                                </div>
                            </div>
                        </article>
                        <article class="widget-post">
                            <div class="post-image">
                                <a href="post.html"><img src="asset/renda/images/90x60-5.jpg" alt=""></a>
                            </div>
                            <div class="post-body">
                                <h2><a href="post.html">The State of the Word 2014</a></h2>
                                <div class="post-meta">
                                    <span><i class="fa fa-clock-o"></i> 2. august 2015</span> <span><a href="post.html"><i class="fa fa-comment-o"></i> 23</a></span>
                                </div>
                            </div>
                        </article>
                    </div>
                </div> --}}
                <!-- sidebar-widget -->
                {{-- <div class="sidebar-widget">
                    <h3 class="sidebar-title">Socials</h3>
                    <div class="widget-container">
                        <div class="widget-socials">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-reddit"></i></a>
                        </div>
                    </div>
                </div> --}}
                <!-- sidebar-widget categories -->
                    @include('laytemps.categories')
                </div>
                </aside>
            </div>
            <!-- End Sidebar -->
        </div>
    </section>
@endsection
