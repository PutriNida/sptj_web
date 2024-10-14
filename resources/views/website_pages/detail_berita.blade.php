@extends('website_pages/templates/layout') 
@section('content')

  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background">
      <div class="container position-relative">
        <h1>Berita</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Beranda</a></li>
            <li class="current">Berita</li>
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
                  <img src="{{ $berita->gambar }}" alt="" class="img-fluid">
                </div>

                <h2 class="title">{{ $berita->judul_berita }}</h2>

                <div class="meta-top">
                  <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> {{ $berita->nama_lengkap }}   </li>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> Dipublikasikan: {{ date('d-m-Y', strtotime($berita->publish_at)); }}   </li>
                    <li class="d-flex align-items-center"><i class="bi bi-eye-fill"></i> {{ $berita->views }}   </li>
                    <a href="{{ route('berita.likes', $berita->no_berita) }}"><li class="d-flex align-items-center"><i class="bi bi-hand-thumbs-up-fill"></i> {{ $berita->likes }}   </li></a>
                    <a href="{{ route('berita.dislikes', $berita->no_berita) }}"><li class="d-flex align-items-center"><i class="bi bi-hand-thumbs-down-fill"></i> {{ $berita->dislikes }}   </li></a>
                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> {{ $berita->comments }} </li>
                  </ul>
                </div><!-- End meta top -->

                <div class="content">
                  {!! $berita->content !!}
                </div><!-- End post content -->

                <div class="meta-bottom">
                  <i class="bi bi-folder"></i>
                  <ul class="cats">
                    <li><a href="#">{{ $berita->kategori_berita }}</a></li>
                  </ul>
                </div><!-- End meta bottom -->

              </article>

            </div>
          </section><!-- /Blog Details Section -->

          <!-- Blog Comments Section -->
          <section id="blog-comments" class="blog-comments section">

            <div class="container">

              <h4 class="comments-count">Komentar: {{ $berita->comments }}</h4>

              @forelse ($komentar as $komen)
                <div id="comment-1" class="comment">
                  <div class="d-flex">
                    <div class="comment-img"></div>
                    <div>
                      <h5>{{ $komen->isAnonymous == '1' ? 'Anonymous' : $komen->nama }} </h5>
                      <time datetime="2020-01-01">{{ $komen->create_at }}</time>
                      <p>
                        {!! $komen->komentar !!}
                      </p>
                    </div>
                  </div>
                </div>
              @empty
              @endforelse

          </section><!-- /Blog Comments Section -->

          <!-- Comment Form Section -->
          <section id="comment-form" class="comment-form section">
            <div class="container">

              <form action="{{ route('berita.komen') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                {{ csrf_field() }}
                <input type="hidden" name="no_berita" value="{{ $berita->no_berita }}" />
                <h4>Komentar</h4>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <input name="nama" type="text" class="form-control" placeholder="Nama">
                  </div>
                  <div class="col-md-6 form-group">
                    <input class="form-check-check" type="checkbox" name="isAnonymous" id="isAnonymous" value="1">
                    <label class="form-check-label" for="isAnonymous">
                      Anonymous
                    </label>
                  </div>
                </div>
                <div class="row">
                  <div class="col form-group">
                    <textarea name="komentar" class="form-control" placeholder="Komentar"></textarea>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Kirim</button>
                </div>

              </form>

            </div>
          </section><!-- /Comment Form Section -->

        </div>

        <div class="col-lg-4 sidebar">

          <div class="widgets-container">

            <!-- Recent Posts Widget -->
            <div class="recent-posts-widget widget-item">

              <h3 class="widget-title">Berita terbaru</h3>

              @forelse ($latestpost as $latest)
              <div class="post-item">
                <div>
                  <h4><a href="{{ route('berita.detail', $latest->no_berita) }}">{{ $latest->judul_berita }}</a></h4>
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