@extends('website_pages/templates/layout')
@section('content')

<link rel="stylesheet" href="{{ URL::asset('css/website_pages/struktur_organisasi_inline_fix.css') }}">
<main class="main">

    <!-- Page Title -->
    {{-- <div class="page-title dark-background"> --}}
      <div class="container position-relative">
        {{-- <h1>Struktur Organisasi</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ route('index') }}">Beranda</a></li>
            <li class="current">Struktur Organisasi</li>
          </ol>
        </nav>
      </div> --}}
    </div><!-- End Page Title -->

    <!-- Portfolio Section -->
    <section id="portfolio">

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <div class="row gy-4 isotope-container">
            @forelse($struktur_organisasi as $struktur)
            <div class="col-11 portfolio-item isotope-item filter-app">
              <div class="portfolio-content h-100" style="position: relative; overflow: hidden;">
                <img
                  src="{{ $struktur->gambar }}"
                  class="img-fluid"
                  alt=""
                  style="width: 100%; height: 420px; object-fit: contain; background: transparent; display: block;"
                >

                <!-- Overlay judul (di atas gambar) -->
                {{-- <div
                  class="portfolio-info sptj-struct-overlay"
                  style="position: absolute; inset: 0; display: flex; align-items: flex-start; justify-content: center; padding-top: 18px; z-index: 2; pointer-events: none;"
                >
                  <div
                    style="background: rgba(0,0,0,0.45); border: 1px solid rgba(255,255,255,0.25); color: #fff; padding: 10px 16px; border-radius: 999px; font-weight: 700;"
                  >
                    Struktur Organisasi
                  </div>
                </div> --}}


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
