  <header class="header-area">

      <!-- Top Header Area -->
      <div class="top-header">
          <div class="container h-100">
              <div class="row h-100 align-items-center">
                  <!-- Breaking News Area -->
                  <div class="col-12 col-sm-8">
                      <div class="breaking-news-area">
                          <div id="breakingNewsTicker" class="ticker">
                              <ul>
                                  <li><a href="#">Hello Semua</a></li>
                                  <li><a href="#">Welcome To My Blog</a></li>
                                  {{-- <li><a href="#">Hello Original!</a></li> --}}
                              </ul>
                          </div>
                      </div>
                  </div>
                  <!-- Top Social Area -->
                  <div class="col-12 col-sm-4">
                      <div class="top-social-area">
                          @if (Auth::user())
                              <a href="dashboard/home" data-toggle="tooltip" data-placement="bottom" title="Dashboard">
                                  Dashboard
                              </a>
                          @else
                              <a href="/login" data-toggle="tooltip" data-placement="bottom" title="Login">
                                  Login
                              </a>
                          @endif

                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!-- Logo Area -->
      <div class="logo-area text-center">
          <div class="container h-100">
              <div class="row h-100 align-items-center">
                  <div class="col-12">
                      <a href="index.html" class="original-logo"><img src="{{ url('img/core-img/opo.png') }}"
                              alt=""></a>
                  </div>
              </div>
          </div>
      </div>

      <!-- Nav Area -->
      <div class="original-nav-area" id="stickyNav">
          <div class="classy-nav-container breakpoint-off">
              <div class="container">
                  <!-- Classy Menu -->
                  <nav class="classy-navbar justify-content-between">

                      <!-- Subscribe btn -->
                      <div class="subscribe-btn">
                          {{-- <a href="#" class="btn subscribe-btn" data-toggle="modal"
                              data-target="#subsModal">Subscribe</a> --}}
                      </div>

                      <!-- Navbar Toggler -->
                      <div class="classy-navbar-toggler">
                          <span class="navbarToggler"><span></span><span></span><span></span></span>
                      </div>

                      <!-- Menu -->
                      <div class="classy-menu" id="originalNav">
                          <!-- close btn -->
                          <div class="classycloseIcon">
                              <div class="cross-wrap"><span class="top"></span><span
                                      class="bottom"></span></div>
                          </div>

                          <!-- Nav Start -->
                          <div class="classynav">
                              <ul>
                                  <li><a href="/">Home</a></li>
                                  <li><a href="/semuapost">Semua Post</a></li>
                                  @if (Request::segment(1) == '')
                                      <li><a href="#">Kategori</a>
                                          <ul class="dropdown">
                                              @foreach ($kategori as $item)
                                                  <li><a
                                                          href="/semuapost?kategori[]={{ $item->slug }}">{{ $item->nama }}</a>
                                                  </li>
                                              @endforeach
                                          </ul>
                                      </li>
                                  @endif
                              </ul>

                              <!-- Search Form  -->
                              <div id="search-wrapper">
                                  <form action="/semuapost" method="GET">
                                      <input type="text" class="form-control" name="search" id="search"
                                          placeholder="Search something...">
                                      <div id="close-icon"></div>
                                      <input class="d-none" type="submit" value="">
                                  </form>
                              </div>
                          </div>
                          <!-- Nav End -->
                      </div>
                  </nav>
              </div>
          </div>
      </div>
  </header>
