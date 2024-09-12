@extends('website_pages/templates/layout') 
@section('content')

<main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background">
      <div class="container position-relative">
        <h1>Galeri</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ route('index') }}">Beranda</a></li>
            <li class="current">Galeri</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li class="{{ request()->is('/galeri/0') ? 'filter-active' : '' }}"><a href="{{ route('galeri', 0) }}">Semua</a></li>
            @forelse($kategori_galeri as $kg)
            <li class="{{ str_contains(url()->current(), $kg->kd_kategori_galeri) ? 'filter-active' : '' }}"><a href="{{ route('galeri', $kg->kd_kategori_galeri) }}">{{ $kg->kategori_galeri }}</a></li>
            @empty
            @endforelse
          </ul><!-- End Portfolio Filters -->

          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
            @forelse($galeri as $glr)
            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <div class="portfolio-content h-100">
                <img src="{{ $glr->gambar }}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>{{ $glr->kategori_galeri }}</h4>
                  <a href="{{ $glr->gambar }}" title="{{ $glr->keterangan ?? ''}}" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->
            @empty
            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <div class="portfolio-content h-100">
                Belum Ada Foto!
              </div>
            </div><!-- End Portfolio Item -->
            @endforelse

          </div><!-- End Portfolio Container -->

        </div>

      </div>

    </section><!-- /Portfolio Section -->

  </main>

  @stop