  @extends('template.layout')
  @section('content')
      <div class="single-blog-wrapper section-padding-0-100">

          <!-- Single Blog Area  -->
          <div class="single-blog-area blog-style-2 mb-50">
              <div class="single-blog-thumbnail">
                  <img src="{{ url('storage/gambar', $post->gambar) }}" alt="">
                  <div class="post-tag-content">
                      <div class="container">
                          <div class="row">
                              <div class="col-12">
                                  <div class="post-date">
                                      <span>
                                          {{ $post->created_at->diffForHumans() }}
                                      </span>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="container">
              <div class="row">
                  <div class="col-12 col-lg-9">
                      <!-- Single Blog Area  -->
                      <div class="single-blog-area blog-style-2 mb-50">
                          <!-- Blog Content -->
                          <div class="single-blog-content">
                              <div class="line"></div>
                              @foreach ($post->kategoris as $item)
                                  <a href="/semuapost?kategori={{ $item->nama }}" class="post-tag">
                                      {{ $item->nama }}
                                  </a>
                              @endforeach
                              <h4><a href="#" class="post-headline mb-0">{{ $post->judul }}</a></h4>
                              <div class="post-meta mb-50">
                                  <p>By <a href="/semuapost?author={{ $post->user->name }}">{{ $post->user->name }} </a>
                                  </p>
                                  {{-- <p>3 comments</p> --}}
                              </div>
                              <p>
                                  {!! $post->isi !!}
                              </p>
                          </div>
                      </div>

                      <!-- About Author -->
                      <div class="blog-post-author mt-100 d-flex">
                          <div class="author-thumbnail">
                              <img src="{{ url('storage/gambar', $post->gambar) }}" alt="">
                          </div>
                          <div class="author-info">
                              <div class="line"></div>
                              <h4><a href="/semuapost?author={{ $post->user->name }}"
                                      class="author-name">{{ $post->user->name }}</a></h4>
                              <p>Curabitur venenatis efficitur lorem sed tempor. Integer aliquet tempor cursus. Nullam
                                  vestibulum convallis risus vel condimentum. Nullam auctor lorem in libero luctus, vel
                                  volutpat quam tincidunt. Nullam vestibulum convallis risus vel condimentum. Nullam
                                  auctor lorem in libero.</p>
                          </div>
                      </div>

                      <!-- Comment Area Start -->
                      {{-- <div class="comment_area clearfix mt-70">
                          <h5 class="title">Comments</h5>

                          <ol>
                              <!-- Single Comment Area -->
                              <li class="single_comment_area">
                                  <!-- Comment Content -->
                                  <div class="comment-content d-flex">
                                      <!-- Comment Author -->
                                      <div class="comment-author">
                                          <img src="img/bg-img/b7.jpg" alt="author">
                                      </div>
                                      <!-- Comment Meta -->
                                      <div class="comment-meta">
                                          <a href="#" class="post-date">March 12</a>
                                          <p><a href="#" class="post-author">William James</a></p>
                                          <p>Efficitur lorem sed tempor. Integer aliquet tempor cursus. Nullam vestibulum
                                              convallis risus vel condimentum. Nullam auctor lorem in libero luctus, vel
                                              volutpat quam tincidunt.</p>
                                          <a href="#" class="comment-reply">Reply</a>
                                      </div>
                                  </div>
                                  <ol class="children">
                                      <li class="single_comment_area">
                                          <!-- Comment Content -->
                                          <div class="comment-content d-flex">
                                              <!-- Comment Author -->
                                              <div class="comment-author">
                                                  <img src="img/bg-img/b7.jpg" alt="author">
                                              </div>
                                              <!-- Comment Meta -->
                                              <div class="comment-meta">
                                                  <a href="#" class="post-date">March 12</a>
                                                  <p><a href="#" class="post-author">William James</a></p>
                                                  <p>Efficitur lorem sed tempor. Integer aliquet tempor cursus. Nullam
                                                      vestibulum convallis risus vel condimentum. Nullam auctor lorem in
                                                      libero luctus, vel volutpat quam tincidunt.</p>
                                                  <a href="#" class="comment-reply">Reply</a>
                                              </div>
                                          </div>
                                      </li>
                                  </ol>
                              </li>

                              <!-- Single Comment Area -->
                              <li class="single_comment_area">
                                  <!-- Comment Content -->
                                  <div class="comment-content d-flex">
                                      <!-- Comment Author -->
                                      <div class="comment-author">
                                          <img src="img/bg-img/b7.jpg" alt="author">
                                      </div>
                                      <!-- Comment Meta -->
                                      <div class="comment-meta">
                                          <a href="#" class="post-date">March 12</a>
                                          <p><a href="#" class="post-author">William James</a></p>
                                          <p>Efficitur lorem sed tempor. Integer aliquet tempor cursus. Nullam vestibulum
                                              convallis risus vel condimentum. Nullam auctor lorem in libero luctus, vel
                                              volutpat quam tincidunt.</p>
                                          <a href="#" class="comment-reply">Reply</a>
                                      </div>
                                  </div>
                              </li>
                          </ol>
                      </div>

                      <div class="post-a-comment-area mt-70">
                          <h5>Leave a reply</h5>
                          <!-- Reply Form -->
                          <form action="#" method="post">
                              <div class="row">
                                  <div class="col-12 col-md-6">
                                      <div class="group">
                                          <input type="text" name="name" id="name" required>
                                          <span class="highlight"></span>
                                          <span class="bar"></span>
                                          <label>Name</label>
                                      </div>
                                  </div>
                                  <div class="col-12 col-md-6">
                                      <div class="group">
                                          <input type="email" name="email" id="email" required>
                                          <span class="highlight"></span>
                                          <span class="bar"></span>
                                          <label>Email</label>
                                      </div>
                                  </div>
                                  <div class="col-12">
                                      <div class="group">
                                          <input type="text" name="subject" id="subject" required>
                                          <span class="highlight"></span>
                                          <span class="bar"></span>
                                          <label>Subject</label>
                                      </div>
                                  </div>
                                  <div class="col-12">
                                      <div class="group">
                                          <textarea name="message" id="message" required></textarea>
                                          <span class="highlight"></span>
                                          <span class="bar"></span>
                                          <label>Comment</label>
                                      </div>
                                  </div>
                                  <div class="col-12">
                                      <button type="submit" class="btn original-btn">Reply</button>
                                  </div>
                              </div>
                          </form>
                      </div> --}}
                  </div>
                  <div class="col-12 col-md-4 col-lg-3">
                      <div class="post-sidebar-area">
                          <!-- Widget Area -->
                          <div class="sidebar-widget-area">
                              <h5 class="title">Tags</h5>
                              <div class="widget-content">
                                  <ul class="tags">
                                      @foreach ($kategori as $item)
                                          <li><a href="/semuapost?kategori[]={{ $item->slug }}">{{ $item->nama }} </a>
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
      <!-- ##### Single Blog Area End ##### -->
  @endsection
