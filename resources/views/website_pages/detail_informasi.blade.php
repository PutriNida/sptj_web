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
                    <li class="d-flex align-items-center"><i class="bi bi-eye-fill"></i> {{ $informasi->views }}</li>
                    <a href="{{ route('informasi.likes', $informasi->no_informasi) }}"><li class="d-flex align-items-center"><i class="bi bi-hand-thumbs-up-fill"></i> {{ $informasi->likes }}</li></a>
                    <a href="{{ route('informasi.likes', $informasi->no_informasi) }}"><li class="d-flex align-items-center"><i class="bi bi-hand-thumbs-down-fill"></i> {{ $informasi->dislikes }}</li></a>
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

            <!-- Recent Posts Widget -->
            <div class="recent-posts-widget widget-item">

              <h3 class="widget-title">Informasi terbaru</h3>

              @forelse ($latestpost as $latest)
              <div class="post-item">
                <div>
                  <h4><a href="blog-details.html">{{ $latest->judul_informasi }}</a></h4>
                  <time datetime="2020-01-01">{{ $latest->create_at }}</time>
                </div>
              </div>
              @empty
              @endforelse

            </div><!--/Recent Posts Widget -->

          </div>

        </div>

      </div>
    </div>

  </main>

  @stop