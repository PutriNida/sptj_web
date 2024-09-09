@extends('website_pages/templates/layout') 
@section('content')

  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background">
      <div class="container position-relative">
        <h1>Berita</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ route('index') }}">Beranda</a></li>
            <li class="current">Berita</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Blog Posts Section -->
    <section id="blog-posts" class="blog-posts section">

      <div class="container">
        <div class="row gy-4">
          @forelse($berita as $brt)
          <a href="{{ route('berita.detail', $brt->no_berita) }}" class="col-lg-4">
            <article>
              <div class="post-img">
                <img src="{{ $brt->gambar }}" alt="" class="img-fluid">
              </div>

              <p class="post-category">{{ $brt->kategori_berita }}</p>

              <h2 class="title">
                {{ $brt->judul_berita }}
              </h2>

              <div class="d-flex align-items-center">
                <div class="post-meta">
                  <p class="post-author">{{ $brt->nama_lengkap }}</p>
                  <p class="post-date">
                    <time datetime="2022-01-01">{{ date('d-m-Y', strtotime($brt->publish_at)); }}</time>
                  </p>
                </div>
              </div>

            </article>
          </a><!-- End post list item -->
          @empty
          @endforelse
        </div>
      </div>

    </section><!-- /Blog Posts Section -->

    <!-- Blog Pagination Section -->
    <section id="blog-pagination" class="blog-pagination section">

      <div class="container">
        <div class="d-flex justify-content-center">
          <ul>
            <li><a href="{{ $current_page > 1 ? route('berita', $current_page - 1) : ''}}"><i class="bi bi-chevron-left"></i></a></li>
            @for($i = 1; $i <= $total_pages; $i++)
            <li><a href="{{ route('berita', $i) }}" class="{{ $current_page == $i ? 'active' : ''}}">{{ $i }}</a></li>
            @endfor
            <li><a href="{{ $current_page < $total_pages ? route('berita', $current_page + 1) : ''}}"><i class="bi bi-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>

    </section><!-- /Blog Pagination Section -->

  </main>

  @stop