@extends('website_pages/templates/layout')
@section('content')

{{-- <link rel="stylesheet" href="{{ URL::asset('css/website_pages/struktur_organisasi_inline_fix.css') }}"> --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
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
    <section id="portfolio" class="pt-0">

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
    <section id="struktur-anggota" >

        <div class="container">

            {{-- <h3 class="mb-3">Daftar Anggota</h3> --}}

            <!-- Swiper -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">

                    @forelse($struktur_anggota as $item)
                    <div class="swiper-slide">
                        <div class="card text-center p-3 shadow-sm h-100">
                            @if(!empty($item->gambar))
                                <img
                                    src="{{ $item->gambar }}"
                                    alt=""
                                    class="card-img-top"
                                    style="width: 100%; height: 220px; object-fit: contain; background: transparent;"
                                >
                            @endif
                            <div>
                                <h5 class="card-title">{{ $item->nama_lengkap }}</h5>
                                {{-- <p class="card-text">
                                    {{ $item->no_karyawan }}
                                </p> --}}
                            </div>
                            <div>
                              @if(!empty($item->keterangan))
                                <p class="card-text mt-2 mb-0"><strong>Keterangan:</strong> </p>
                                <p class="card-text mb-0">{{ $item->keterangan }}</p>   
                              @endif
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="swiper-slide">
                        <div class="card p-3 text-center">
                            Tidak ada data anggota
                        </div>
                    </div>
                    @endforelse

                </div>

                <!-- tombol (pakai ikon supaya terlihat di UI) -->
                <div class="swiper-button-prev">
                  <i class="bi bi-chevron-left"></i>
                </div>
                <div class="swiper-button-next">
                  <i class="bi bi-chevron-right"></i>
                </div>


                <!-- pagination -->
                <div class="swiper-pagination"></div>
            </div>

        </div>

    </section>
      <script>
      document.addEventListener("DOMContentLoaded", function () {
        // prevent double init: stop script jalan ulang saat pindah halaman via cache
        if (window.__swiperStrukturOrganisasiInited) return;
        window.__swiperStrukturOrganisasiInited = true;


    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 'auto',
        spaceBetween: 20,
        loop: true,

        // supaya drag/cursor next-prev stabil
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
            reverseDirection: true,
        },


        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        on: {
            init: function () {
                // pastikan tombol tidak tertutup elemen lain
                var next = document.querySelector('.swiper-button-next');
                var prev = document.querySelector('.swiper-button-prev');
                if (next) { next.style.zIndex = 9999; }
                if (prev) { prev.style.zIndex = 9999; }
            }
        },


        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },

        breakpoints: {
            0: { slidesPerView: 1 },
            768: { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
            1400: { slidesPerView: 4 }
        }
    });

    console.log(document.querySelectorAll('.swiper-slide').length);

});
</script>
@stop