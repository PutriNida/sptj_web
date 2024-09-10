@extends('website_pages/templates/layout') 
@section('content')

  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background">
      <div class="container position-relative">
        <h1>Informasi</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Beranda</a></li>
            <li class="current">Informasi</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <div class="container">
      <div class="row">

        <div class="col-lg-8">

          <!-- Blog Details Section -->
          <section id="blog-details" class="blog-details section">
            <div class="container">

              <article class="article">

                <div class="post-img">
                  <img src="{{ $informasi->gambar }}" alt="" class="img-fluid">
                </div>

                <h2 class="title">{{ $informasi->judul_informasi }}</h2>

                <div class="meta-top">
                  <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> {{ $informasi->nama_lengkap }}</li>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> Dipublikasikan: {{ date('d-m-Y', strtotime($informasi->publish_at)); }}</li>
                    <li class="d-flex align-items-center"><i class="bi bi-eye-fill"></i> {{ $informasi->views }}</a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-hand-thumbs-up-fill"></i> {{ $informasi->likes }}</a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-hand-thumbs-down-fill"></i> {{ $informasi->dislikes }}</a></li>
                  </ul>
                </div><!-- End meta top -->

                <div class="content">
                  {!! $informasi->content !!}
                </div><!-- End post content -->

                <div class="meta-bottom">
                  <i class="bi bi-folder"></i>
                  <ul class="cats">
                    <li><a href="#">{{ $informasi->kategori_informasi }}</a></li>
                  </ul>
                </div><!-- End meta bottom -->

              </article>

            </div>
          </section><!-- /Blog Details Section -->

        </div>

        <div class="col-lg-4 sidebar">

          <div class="widgets-container">
            <!-- Categories Widget -->
            <div class="categories-widget widget-item">

              <h3 class="widget-title">Kategori</h3>
              <ul class="mt-3">
                @forelse($kategori_informasi as $kb)
                <li><a href="#">{{ $kb->kategori_informasi }} <span>({{ $kb->num }})</span></a></li>
                @empty
                @endforelse
              </ul>

            </div><!--/Categories Widget -->

            <!-- Recent Posts Widget -->
            <div class="recent-posts-widget widget-item">

              <h3 class="widget-title">Recent Posts</h3>

              <div class="post-item">
                <img src="assets/img/blog/blog-recent-1.jpg" alt="" class="flex-shrink-0">
                <div>
                  <h4><a href="blog-details.html">Nihil blanditiis at in nihil autem</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>
              </div><!-- End recent post item-->

              <div class="post-item">
                <img src="assets/img/blog/blog-recent-2.jpg" alt="" class="flex-shrink-0">
                <div>
                  <h4><a href="blog-details.html">Quidem autem et impedit</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>
              </div><!-- End recent post item-->

              <div class="post-item">
                <img src="assets/img/blog/blog-recent-3.jpg" alt="" class="flex-shrink-0">
                <div>
                  <h4><a href="blog-details.html">Id quia et et ut maxime similique occaecati ut</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>
              </div><!-- End recent post item-->

              <div class="post-item">
                <img src="assets/img/blog/blog-recent-4.jpg" alt="" class="flex-shrink-0">
                <div>
                  <h4><a href="blog-details.html">Laborum corporis quo dara net para</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>
              </div><!-- End recent post item-->

              <div class="post-item">
                <img src="assets/img/blog/blog-recent-5.jpg" alt="" class="flex-shrink-0">
                <div>
                  <h4><a href="blog-details.html">Et dolores corrupti quae illo quod dolor</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>
              </div><!-- End recent post item-->

            </div><!--/Recent Posts Widget -->

          </div>

        </div>

      </div>
    </div>

  </main>

  @stop