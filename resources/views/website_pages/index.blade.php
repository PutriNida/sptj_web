@extends('website_pages/templates/layout') 
@section('content')
  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background" >
      <div class="container position-relative text-center">
        <h1 data-aos="fade-up" data-aos-delay="100">Serikat Pekerja Transportasi Jakarta</h1>
        <p class="lead" data-aos="fade-up" data-aos-delay="200">Bersama Membangun Transportasi yang Lebih Baik</p>
        <a href="{{ route('auth.login') }}" class="btn btn-primary btn-lg" data-aos="fade-up" data-aos-delay="300">Login Anggota</a>
      </div>
    </section>
    <!-- /Hero Section -->

    <!-- Menu Section -->
    <section id="menu" class="menu section">

      <div class="container">

        <div class="row gy-4">
          <label class="section-title" data-aos="fade-up">
            <h2 class="bold">Selamat Datang di Serikat Pekerja Transportasi Jakarta </h2>
          </label>
          <div class="col-lg-4 col-md-6">
            <div class="card menu-card h-100 text-black position-relative overflow-visible">
              <!-- ICON FLOAT -->
              <div class="menu-icon">
                <i class="bi bi-calendar-event-fill"></i>
              </div>

              <div class="card-body text-center pt-5">
                <h5 class="card-title">Program & Kegiatan</h5>
                <p class="card-text">Informasi program dan kegiatan serikat pekerja.</p>
                <a href="{{ route('informasi', 1) }}" class="btn btn-primary">Lihat Detail</a>
              </div>

            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="card menu-card h-100 text-black position-relative overflow-visible">
               <div class="menu-icon">
                <i class="bi bi-newspaper"></i>
               </div>
               <div class="card-body text-center pt-5">
                <h5 class="card-title">Berita Terbaru</h5>
                <p class="card-text">Berita terkini dan pengumuman.</p>
                <a href="{{ route('berita', 1) }}" class="btn btn-primary">Lihat Berita</a>
              </div>
            </div>
            </div>

          <div class="col-lg-4 col-md-6">
           <div class="card menu-card h-100 text-black position-relative overflow-visible">
               <div class="menu-icon">
                <i class="bi bi-chat-dots-fill"></i>
               </div>
               <div class="card-body text-center pt-5">
                <h5 class="card-title">Aspirasi & Pengaduan</h5>
                <p class="card-text">Sampaikan aspirasi dan pengaduan Anda.</p>
                <a href="{{ route('hubungi_kami') }}" class="btn btn-primary">Hubungi Kami</a>
              </div>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Menu Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section">
      <div class="section-title" data-aos="fade-up">
        <h2>INFORMASI ANGGOTA</h2>
      <div class="container">

        <div class="row gy-4">

           <div class="col-lg-4 col-md-6">
            <div class="card menu-card h-100">
              <div class="card-body text-center">
                <div class="stat-label">Jumlah Anggota</div>
                 <div class="stat-number">{{$allmember}}</div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="card menu-card h-100">
              <div class="card-body text-center">
                <div class="stat-label">Divisi</div>
              <div class="stat-number">{{$unitkerja}}</div>              
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-4">
            <div class="card menu-card h-100">
              <div class="card-body text-center">
                <div class="stat-label">Lokasi Kerja</div>
              <div class="stat-number">{{$lokasikerja}}</div>              
              </div>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Stats Section -->


    <!-- Features Section -->
    <section id="features" class="features section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Berita Terbaru</h2>
      </div>
      <!-- End Section Title -->

      <div class="container">

        @if(count($berita) > 0)
        <div class="row gy-4 align-items-center features-item">
          <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
            <a href="{{ route('berita.detail', $berita[0]->no_berita) }}">
              <img src="{{ $berita[0]->gambar }}" class="img-fluid" alt="">
            </a>
          </div>
          <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
            <a href="{{ route('berita.detail', $berita[0]->no_berita) }}">
              <h3>{{ $berita[0]->judul_berita }}</h3>
            </a>
            <h4>{{ $berita[0]->kategori_berita }}</h4>
            <div class="stars">
                <i class="bi bi-eye-fill"></i><span>{{ $berita[0]->views }}</span>
                <i class="bi bi-hand-thumbs-up-fill"></i><span>{{ $berita[0]->likes }}</span>
                <i class="bi bi-hand-thumbs-down-fill"></i><span>{{ $berita[0]->dislikes }}</span>
                <i class="bi bi-chat-dots-fill"></i><span>{{ $berita[0]->comments }}</span>
            </div>
            <p class="fst-italic">
              {!! $berita[0]->highlight !!}
            </p>
          </div>
        </div>
        @endif
        <!-- Features Item -->
<!-- 
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
        </div> -->
        <!-- Features Item -->
        @endif

        @if(count($berita) > 2)
        <div class="row gy-4 align-items-center features-item">
          <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out">
            <a href="{{ route('berita.detail', $berita[2]->no_berita) }}">
              <img src="{{ $berita[2]->gambar }}" class="img-fluid" alt="">
            </a>
          </div>
          <div class="col-md-7" data-aos="fade-up">
            <a href="{{ route('berita.detail', $berita[2]->no_berita) }}">
              <h3>{{ $berita[2]->judul_berita }}</h3>
            </a>
            <h4>{{ $berita[2]->kategori_berita }}</h4>
            <div class="stars">
                <i class="bi bi-eye-fill"></i><span>{{ $berita[2]->views }}</span>
                <i class="bi bi-hand-thumbs-up-fill"></i><span>{{ $berita[2]->likes }}</span>
                <i class="bi bi-hand-thumbs-down-fill"></i><span>{{ $berita[2]->dislikes }}</span>
                <i class="bi bi-chat-dots-fill"></i><span>{{ $berita[2]->comments }}</span>
            </div>
            <p class="fst-italic">
              {!! $berita[2]->highlight !!}
            </p>
          </div>
        </div>
        @endif

        @if(count($berita) > 3)
        <div class="row gy-4 align-items-center features-item">
          <div class="col-md-5 order-1 order-md-2 d-flex align-items-center" data-aos="zoom-out">
            <a href="{{ route('berita.detail', $berita[3]->no_berita) }}">
              <img src="{{ $berita[3]->gambar }}" class="img-fluid" alt="">
            </a>
          </div>
          <div class="col-md-7 order-2 order-md-1" data-aos="fade-up">
            <a href="{{ route('berita.detail', $berita[3]->no_berita) }}">
              <h3>{{ $berita[3]->judul_berita }}</h3>
            </a>
            <h4>{{ $berita[3]->kategori_berita }}</h4>
            <div class="stars">
                <i class="bi bi-eye-fill"></i><span>{{ $berita[3]->views }}</span>
                <i class="bi bi-hand-thumbs-up-fill"></i><span>{{ $berita[3]->likes }}</span>
                <i class="bi bi-hand-thumbs-down-fill"></i><span>{{ $berita[3]->dislikes }}</span>
                <i class="bi bi-chat-dots-fill"></i><span>{{ $berita[3]->comments }}</span>
            </div>
            <p class="fst-italic">
              {!! $berita[3]->highlight !!}
            </p>
          </div>
        </div>
        @endif

      </div>

    </section>
    <!-- /Features Section -->

  </main>
@stop