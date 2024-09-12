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

    <section id="services" class="services section">

      <div class="container">
        <div class="row gy-4">
          @forelse($berita as $brt)
          <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="service-item position-relative">
              <div class="img">
                <img src="{{ $brt->gambar }}" class="img-fluid" alt="">
              </div>
              <div class="details">
                <a href="service-details.html" class="stretched-link">
                  <h3>{{ $brt->judul_berita }}</h3>
                </a>
                <p>{{ $brt->judul_berita }}</p>
              </div>
            </div>
          </div><!-- End Service Item -->
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