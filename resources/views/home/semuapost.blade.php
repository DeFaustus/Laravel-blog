@extends('template.layout')
@section('content')
    <div class="hero-area">

        <div class="blog-wrapper section-padding-100 clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="post-sidebar-area">

                            <!-- Widget Area -->
                            {{-- <div class="sidebar-widget-area"> --}}
                            <form action="/semuapost" method="get">
                                <p>Cari berdasarkan Judul : </p>
                                <input type="text" class="form-control" name="search" value="{{ request('search') }}"
                                    id="">
                                <br>
                                <p>Cari berdasarkan kategori : </p>
                                <select class="form-control kategori" name="kategori[]" multiple="multiple">
                                    @foreach ($kategori as $key)
                                        <option value="{{ $key->slug }}"
                                            {{ in_array($key->slug, $kategoris) ? 'selected' : '' }}>{{ $key->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-success mt-5">Cari</button>
                            </form>
                            {{-- </div> --}}
                        </div>
                    </div>
                    <div class="col-12 col-lg-8">

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
                                                <a href="/semuapost?kategori={{ $key->nama }}" class="post-tag">
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
                        {{ $data->links() }}
                    </div>
                    <!-- ##### Sidebar Area ##### -->
                </div>
            </div>
        </div>
        <!-- ##### Blog Wrapper End ##### -->

        <!-- ##### Instagram Feed Area Start ##### -->

    </div>
@endsection
