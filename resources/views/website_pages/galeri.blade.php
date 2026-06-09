@extends('website_pages/templates/layout') 
@section('content')

<main class="main">

    <!-- Page Title -->
    {{-- <div class="page-title dark-background"> --}}
      <div class="container position-relative">
        {{-- <h1>Galeri</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ route('index') }}">Beranda</a></li>
            <li class="current">Galeri</li>
          </ol>
        </nav>
      </div> --}}
    </div><!-- End Page Title -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <div class="sptj-berita-filter">
            <a href="{{ route('galeri', 0) }}"
               class="sptj-berita-filter-item {{ request()->is('galeri/0') ? 'active' : '' }}">
              Semua
            </a>

            @forelse($kategori_galeri as $kg)
              <a href="{{ route('galeri', $kg->kd_kategori_galeri) }}"
                 class="sptj-berita-filter-item {{ str_contains(url()->current(), $kg->kd_kategori_galeri) ? 'active' : '' }}">
                {{ $kg->kategori_galeri }}
              </a>
            @empty
            @endforelse
          </div><!-- End Filter Buttons -->

          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
            @forelse($galeri as $glr)
              <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">

                <div class="card h-100" style="border: 1px solid #e5e7eb; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);">

                  <a
                    href="{{ $glr->gambar }}"
                    title="{{ $glr->keterangan ?? ''}}"
                    class="glightbox preview-link"
                    data-gallery="portfolio-gallery-app"
                    style="display:block; text-decoration:none;"
                  >

                    <div class="position-relative" style="height: 260px;">
                      <img
                        src="{{ $glr->gambar }}"
                        class="img-fluid"
                        alt="{{ $glr->keterangan ?? 'Galeri' }}"
                        style="width: 100%; height: 260px; object-fit: cover; display: block;"
                      >

                      <!-- Overlay kategori + icon -->
                      <div
                        class="position-absolute start-0 end-0"
                        style="bottom: 0; padding: 12px 12px; background: rgba(0,0,0,0.45); z-index: 2;"
                      >
                        <div class="d-flex align-items-center justify-content-between">
                          <h4 style="margin: 0; font-size: 14px; font-weight: 800; color: #fff;">{{ $glr->kategori_galeri ?? '' }}</h4>
                          <span
                            style="width: 42px; height: 42px; border-radius: 999px; display:flex; align-items:center; justify-content:center; background: rgba(0,0,0,0.35); border: 1px solid rgba(255,255,255,0.25); color:#fff;"
                          >
                            <i class="bi bi-zoom-in"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                  </a>

                </div>

              </div><!-- End Portfolio Item -->
            @empty
              <div class="col-12 portfolio-item isotope-item filter-app">
                <div class="portfolio-content h-100" style="padding: 18px; background: #fff; border: 1px solid #e5e7eb; border-radius: 16px;">
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

