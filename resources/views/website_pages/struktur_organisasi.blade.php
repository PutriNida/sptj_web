@extends('website_pages/templates/layout')
@section('content')

<main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background">
      <div class="container position-relative">
        <h1>Struktur Organisasi</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ route('index') }}">Beranda</a></li>
            <li class="current">Struktur Organisasi</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <div class="row gy-4 isotope-container">
            @forelse($struktur_organisasi as $struktur)
            <div class="col-11 portfolio-item isotope-item filter-app">
              <div class="portfolio-content h-100">
                <img src="{{ $struktur->gambar }}" class="img-fluid" alt="">
                <div class="portfolio-info">
                  <h4>Struktur Organisasi</h4>
                  <a href="{{ $struktur->gambar }}" title="{{ $struktur->keterangan ?? ''}}" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->
            @empty
            <div class="col-12 portfolio-item isotope-item filter-app">
              <div class="portfolio-content h-100">
                Belum Ada Gambar Struktur Organisasi!
              </div>
            </div><!-- End Portfolio Item -->
            @endforelse

          </div><!-- End Portfolio Container -->

        </div>

      </div>

    </section><!-- /Portfolio Section -->

  </main>

  @stop
