@extends('website_pages/templates/layout') 
@section('content')
  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <div id="hero-carousel" class="carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <div class="container position-relative">

          <div class="carousel-item active">
            <div class="carousel-container">
              <h2>Serikat Pekerja Transportasi Jakarta</h2>
              <h4>Kami Berlipat Ganda</h4>
              <p>#setiasampaiakhir</p>
            </div>
          </div><!-- End Carousel Item -->

        </div>

      </div>

    </section><!-- /Hero Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Informasi</h2>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
          <div class="swiper-wrapper">

          @forelse ($informasi as $info)
          <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="{{ $info->gambar }}" class="testimonial-img" alt="">
                <h3>{{ $info->judul_informasi }}</h3>
                <h4>{{ $info->kategori_informasi }}</h4>
                <div class="stars">
                  <i class="bi bi-eye-fill"></i><span>{{ $info->views }}</span>  
                  <i class="bi bi-hand-thumbs-up-fill"></i><span>{{ $info->likes }}</span>  
                  <i class="bi bi-hand-thumbs-down-fill"></i><span>{{ $info->dislikes }}</span>  
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  <span>{!! $info->content !!}</span>
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->
          @empty
          kosong
          @endforelse

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->


    <!-- Features Section -->
    <section id="features" class="features section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Berita</h2>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4 align-items-center features-item">
          <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
            <img src="{{ $berita[0]->gambar }}" class="img-fluid" alt="" width="300" height="300">
          </div>
          <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
            <h3>{{ $berita[0]->judul_berita }}</h3>
            <h4>{{ $berita[0]->kategori_berita }}</h4>
            <div class="stars">
                <i class="bi bi-eye-fill"></i><span>{{ $berita[0]->views }}</span>  
                <i class="bi bi-hand-thumbs-up-fill"></i><span>{{ $berita[0]->likes }}</span>  
                <i class="bi bi-hand-thumbs-down-fill"></i><span>{{ $berita[0]->dislikes }}</span>  
                <i class="bi bi-hand-thumbs-down-fill"></i><span>{{ $berita[0]->comments }}</span>
            </div>
            <p class="fst-italic">
              {!! $berita[0]->highlight !!}
            </p>
          </div>
        </div><!-- Features Item -->

        @if(count($berita) > 1)
        <div class="row gy-4 align-items-center features-item">
          <div class="col-md-5 order-1 order-md-2 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="{{ $berita[1]->gambar }}" class="img-fluid" alt="" width="300" height="300">
          </div>
          <div class="col-md-7 order-2 order-md-1" data-aos="fade-up" data-aos-delay="200">
            <h3>{{ $berita[1]->judul_berita }}</h3>
            <h4>{{ $berita[1]->kategori_berita }}</h4>
            <div class="stars">
                <i class="bi bi-eye-fill"></i><span>{{ $berita[1]->views }}</span>  
                <i class="bi bi-hand-thumbs-up-fill"></i><span>{{ $berita[1]->likes }}</span>  
                <i class="bi bi-hand-thumbs-down-fill"></i><span>{{ $berita[1]->dislikes }}</span>  
                <i class="bi bi-hand-thumbs-down-fill"></i><span>{{ $berita[1]->comments }}</span>
            </div>
            <p class="fst-italic">
              {!! $berita[1]->highlight !!}
            </p>
          </div>
        </div><!-- Features Item -->
        @endif

        @if(count($berita) > 2)
        <div class="row gy-4 align-items-center features-item">
          <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out">
            <img src="{{ $berita[2]->gambar }}" class="img-fluid" alt="" width="300" height="300">
          </div>
          <div class="col-md-7" data-aos="fade-up">
            <h3>{{ $berita[2]->judul_berita }}</h3>
            <h4>{{ $berita[2]->kategori_berita }}</h4>
            <div class="stars">
                <i class="bi bi-eye-fill"></i><span>{{ $berita[2]->views }}</span>  
                <i class="bi bi-hand-thumbs-up-fill"></i><span>{{ $berita[2]->likes }}</span>  
                <i class="bi bi-hand-thumbs-down-fill"></i><span>{{ $berita[2]->dislikes }}</span>  
                <i class="bi bi-hand-thumbs-down-fill"></i><span>{{ $berita[2]->comments }}</span>
            </div>
            <p class="fst-italic">
              {!! $berita[3]->highlight !!}
            </p>
          </div>
        </div><!-- Features Item -->
        @endif

        @if(count($berita) > 3)
        <div class="row gy-4 align-items-center features-item">
          <div class="col-md-5 order-1 order-md-2 d-flex align-items-center" data-aos="zoom-out">
            <img src="{{ $berita[3]->gambar }}" class="img-fluid" alt="" width="300" height="300">
          </div>
          <div class="col-md-7 order-2 order-md-1" data-aos="fade-up">
            <h3>{{ $berita[3]->judul_berita }}</h3>
            <h4>{{ $berita[3]->kategori_berita }}</h4>
            <div class="stars">
                <i class="bi bi-eye-fill"></i><span>{{ $berita[3]->views }}</span>  
                <i class="bi bi-hand-thumbs-up-fill"></i><span>{{ $berita[3]->likes }}</span>  
                <i class="bi bi-hand-thumbs-down-fill"></i><span>{{ $berita[3]->dislikes }}</span>  
                <i class="bi bi-hand-thumbs-down-fill"></i><span>{{ $berita[3]->comments }}</span>
            </div>
            <p class="fst-italic">
              {!! $berita[3]->highlight !!}
            </p>
          </div>
        </div><!-- Features Item -->
        @endif

      </div>

    </section><!-- /Features Section -->

  </main>
@stop