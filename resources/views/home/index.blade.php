@extends('template.layout')
@section('content')
    <div class="hero-area">
        <!-- Hero Slides Area -->
        <div class="hero-slides owl-carousel">
            <!-- Single Slide -->
            @foreach ($gambar as $item)
                <div class="single-hero-slide bg-img" style="background-image: url(img/bg-img/{{ $item }});">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-12">
                                <div class="slide-content text-center">
                                    <div class="post-tag">
                                        <a href="#" data-animation="fadeInUp">Coding</a>
                                    </div>
                                    <h2 data-animation="fadeInUp" data-delay="250ms"><a href="single-post.html"> Coding Itu
                                            Menyenangkan Bukan ? Bukan</a></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="blog-wrapper section-padding-100 clearfix">
            <div class="container">
                <div class="row align-items-end">
                    <!-- Single Blog Area -->
                    <div class="col-12 col-lg-4">
                        <div class="single-blog-area clearfix mb-100">
                            <!-- Blog Content -->
                            <div class="single-blog-content">
                                <div class="line"></div>
                                <a href="#" class="post-tag">Karepmu</a>
                                <h4><a href="#" class="post-headline">Selamat Datang Di Blog Ngawur</a></h4>
                                <p>Curabitur venenatis efficitur lorem sed tempor. Integer aliquet tempor cursus. Nullam
                                    vestibulum convallis risus vel condimentum. Nullam auctor lorem in libero luctus, vel
                                    volutpat quam tincidunt. Morbi sodales, dolor id ultricies dictum</p>
                                <a href="/semuapost" class="btn original-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    <!-- Single Blog Area -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="single-catagory-area clearfix mb-100">
                            <img src="img/bg-img/b1.jpg" alt="">
                            <!-- Catagory Title -->
                            <div class="catagory-title">
                                <a href="#">Lorem</a>
                            </div>
                        </div>
                    </div>
                    <!-- Single Blog Area -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="single-catagory-area clearfix mb-100">
                            <img src="img/bg-img/b2.jpg" alt="">
                            <!-- Catagory Title -->
                            <div class="catagory-title">
                                <a href="/semuapost">Post terbaru</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-9">

                        <!-- Single Blog Area  -->
                        @foreach ($data as $item)
                            <div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.2s"
                                data-wow-duration="1000ms">
                                <div class="row align-items-center">
                                    <div class="col-12 col-md-6">
                                        <div class="single-blog-thumbnail">
                                            <img src="{{ url('storage/gambar', $item->gambar) }}" alt="">
                                            <div class="post-date">
                                                <span>{{ $item->created_at->diffForHumans() }} </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <!-- Blog Content -->
                                        <div class="single-blog-content">
                                            <div class="line"></div>
                                            @foreach ($item->kategoris as $key)
                                                <a href="/semuapost?kategori[]={{ $key->slug }}" class="post-tag">
                                                    {{ $key->nama }}
                                                </a>
                                            @endforeach
                                            <h4><a href="/lihatpost/{{ $item->slug }}"
                                                    class="post-headline">{{ $item->judul }} </a></h4>
                                            <p>
                                                {!! $item->excerpt !!}
                                            </p>
                                            <div class="post-meta">
                                                <p>By <a href="/semuapost?author={{ $item->user->name }}">{{ $item->user->name }}
                                                    </a></p>
                                                {{-- <p>3 comments</p> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <!-- Single Blog Area  -->


                        <!-- Load More -->
                        <div class="load-more-btn mt-100 wow fadeInUp" data-wow-delay="0.7s" data-wow-duration="1000ms">
                            <a href="/semuapost" class="btn original-btn">Read More</a>
                        </div>
                    </div>

                    <!-- ##### Sidebar Area ##### -->
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="post-sidebar-area">

                            <!-- Widget Area -->
                            <div class="sidebar-widget-area">
                                <form action="/semuapost" method="GET" class="search-form">
                                    <input type="search" name="search" id="searchForm" placeholder="Search">
                                    <input type="submit" value="submit">
                                </form>
                            </div>
                            <!-- Widget Area -->
                            <div class="sidebar-widget-area">
                                <h5 class="title">Advertisement</h5>
                                <a href="#"><img src="img/bg-img/add.gif" alt=""></a>
                            </div>

                            <!-- Widget Area -->
                            <div class="sidebar-widget-area">

                                <!-- Widget Area -->
                                <div class="sidebar-widget-area">
                                    <h5 class="title">Kategori</h5>
                                    <div class="widget-content">
                                        <ul class="tags">
                                            @foreach ($kategori as $item)
                                                <li><a href="/semuapost?kategori[]={{ $item->slug }}">{{ $item->nama }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ##### Blog Wrapper End ##### -->

            <!-- ##### Instagram Feed Area Start ##### -->

        </div>
    @endsection
