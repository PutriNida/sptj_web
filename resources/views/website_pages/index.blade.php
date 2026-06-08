@extends('website_pages/templates/layout') 
@section('content')
  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background" >
      <div class="container position-relative text-start" style="margin-left: 40px;">
        <h1 data-aos="fade-up" data-aos-delay="100" style="color:#00008B ;">BERSAMA PERJUANGKAN</h1>
        <h1 data-aos="fade-up" data-aos-delay="100" style="color:#00008B ;">KESEJAHTERAAN PEKERJA</h1>
        <h1 data-aos="fade-up" data-aos-delay="100" style="color:#00008B ;">TRANSPORTASI</h1>
        <h1  data-aos="fade-up" data-aos-delay="200" style="font-size: 16px; color: black;">SPTJ Hadir untuk melinduki hak. meningkatkan</h1>
        <h1  data-aos="fade-up" data-aos-delay="200" style="font-size: 16px; color: black;">kesejahteraan, dan solidaritas pekerja transportasi di Jakarta.</h1>
        <a href="{{ route('auth.login') }}" class="btn btn-sptj btn-lg" data-aos="fade-up" data-aos-delay="300" style="color:white;">Login Anggota</a>
        <a href="{{ route('pendaftaran_anggota.create') }}" class="btn btn-sptj btn-lg" data-aos="fade-up" data-aos-delay="300" style="color:white;">Daftar Anggota</a>
        <a href="{{ route('hubungi_kami') }}" class="btn btn-sptj btn-lg" data-aos="fade-up" data-aos-delay="300" style="color:white;">Aspirasi</a>
      </div>
    </section>
    <!-- /Hero Section -->

    <!-- Menu Section -->
    <section id="menu" class="menu section">

      <div class="container">

        <div class="row gy-4">
          <!-- <label class="section-title" data-aos="fade-up">
            <h2 class="bold">Selamat Datang di Serikat Pekerja Transportasi Jakarta </h2>
          </label> -->
          <div class="col-lg-4 col-md-6">
            <div class="card menu-card h-100 text-black position-relative overflow-visible">
              <!-- ICON FLOAT -->
              <div class="menu-icon">
                <i class="bi bi-calendar-event-fill"></i>
              </div>

              <div class="card-body text-center pt-5 text-s">
                <h5 class="card-title">Program & Kegiatan</h5>
                <p class="card-text">Informasi program dan kegiatan serikat pekerja.</p>
                <a href="{{ route('informasi', 1) }}" class="btn btn-sptj">Lihat Detail</a>
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
                <a href="{{ route('berita', 1) }}" class="btn btn-sptj">Lihat Berita</a>
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

  <div class="container section-title" data-aos="fade-up">
    <h2>Berita Terbaru</h2>
  </div>
  <div class="container">
    
    <div class="d-flex flex-nowrap overflow-x-auto pb-4 custom-slider" style="scroll-snap-type: x mandatory; gap: 1.5rem; -webkit-overflow-scrolling: touch;">
      
      @foreach($berita as $item)
      <div class="card h-100 flex-shrink-0 bg-white" style="width: 18rem; scroll-snap-align: start; border: 1px solid #e5e7eb; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);">
        
        <div style="height: 180px; width: 100%; overflow: hidden; position: relative;">
          <a href="{{ route('berita.detail', $item->no_berita) }}">
            <img src="{{ $item->gambar }}" style="width: 100%; height: 100%; object-fit: cover;" alt="{{ $item->judul_berita }}">
          </a>
        </div>

        <div class="card-body d-flex flex-column justify-content-between p-3" style="min-height: 200px;">
          <div>
            <span class="badge mb-2 text-primary" style="background-color: #eff6ff; font-weight: 600; font-size: 0.75rem; border-radius: 6px; padding: 0.35rem 0.6rem;">
              {{ $item->kategori_berita }}
            </span>

            <a href="{{ route('berita.detail', $item->no_berita) }}" class="text-decoration-none text-dark">
              <h5 class="card-title text-truncate-2" style="font-size: 1rem; font-weight: 600; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; margin-bottom: 0.5rem;">
                {{ $item->judul_berita }}
              </h5>
            </a>
            
            <div class="text-muted" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; font-size: 0.85rem; line-height: 1.5;">
              {!! $item->highlight !!}
            </div>
          </div>

          <div class="stars d-flex gap-3 text-muted mt-3 pt-2 border-top" style="font-size: 0.8rem; border-color: #f3f4f6 !important;">
            <span><i class="bi bi-eye-fill me-1 text-primary"></i>{{ $item->views }}</span>
            <span><i class="bi bi-hand-thumbs-up-fill me-1 text-primary"></i>{{ $item->likes }}</span>
            <span><i class="bi bi-chat-dots-fill me-1 text-primary"></i>{{ $item->comments }}</span>
          </div>
        </div>

      </div>
      @endforeach

    </div>

  </div>

</section>

<style>
  /* Menyembunyikan scrollbar bawaan browser agar terlihat minimalis dan bersih */
  .custom-slider::-webkit-scrollbar {
    height: 6px;
  }
  .custom-slider::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
  }
  .custom-slider::-webkit-scrollbar-thumb {
    background: #bfdbfe; /* Warna biru soft untuk scrollbar */
    border-radius: 10px;
  }
  .custom-slider::-webkit-scrollbar-thumb:hover {
    background: #3b82f6; /* Biru accents saat di-hover */
  }
</style>
    <!-- /Features Section -->

  </main>
@stop