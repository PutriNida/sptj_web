@extends('website_pages/templates/layout') 
@section('content')
  <main class="main">

    <section id="hero" class="hero section dark-background">
      <div class="container position-relative text-start p-4 p-md-5" style="margin-left: 40px; border: 1px solid rgba(0, 0, 139, 0.15); border-radius: 24px; background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(8px); max-width: 650px;">
        <h1 data-aos="fade-up" data-aos-delay="100" style="color:#00008B; font-weight: 800; margin-bottom: 0px;">BERSAMA PERJUANGKAN</h1>
        <h1 data-aos="fade-up" data-aos-delay="120" style="color:#00008B; font-weight: 800; margin-bottom: 0px;">KESEJAHTERAAN PEKERJA</h1>
        <h1 data-aos="fade-up" data-aos-delay="140" style="color:#00008B; font-weight: 800; margin-bottom: 20px;">TRANSPORTASI</h1>
        
        <p data-aos="fade-up" data-aos-delay="200" style="font-size: 16px; color: #374151; line-height: 1.6; margin-bottom: 25px;">
          SPTJ Hadir untuk melindungi hak, meningkatkan kesejahteraan, dan solidaritas pekerja transportasi di Jakarta.
        </p>

        <div class="d-flex flex-wrap gap-2" data-aos="fade-up" data-aos-delay="300">
          <a href="{{ route('auth.login') }}" class="btn btn-sptj btn-lg shadow-sm" style="color:white; border-radius: 10px;">Login Anggota</a>
          <a href="{{ route('pendaftaran_anggota.create') }}" class="btn btn-sptj btn-lg shadow-sm" style="color:white; border-radius: 10px;">Daftar Anggota</a>
          <a href="{{ route('hubungi_kami') }}" class="btn btn-sptj btn-lg shadow-sm" style="color:white; border-radius: 10px;">Aspirasi</a>
        </div>
      </div>
    </section>
    <section id="menu" class="menu section">
      <div class="container">
        <div class="row gy-4">
          
          <div class="col-lg-4 col-md-6">
            <div class="card menu-card h-100 text-black position-relative overflow-visible" style="border: 1px solid #e5e7eb; border-radius: 16px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); transition: all 0.3s ease;">
              <div class="menu-icon">
                <i class="bi bi-calendar-event-fill"></i>
              </div>
              <div class="card-body text-center pt-5">
                <h5 class="card-title" style="font-weight: 600;">Program & Kegiatan</h5>
                <p class="card-text text-muted" style="font-size: 0.9rem;">Informasi program dan kegiatan serikat pekerja.</p>
                <a href="{{ route('informasi', 1) }}" class="btn btn-sptj w-100 mt-2" style="border-radius: 8px;">Lihat Detail</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="card menu-card h-100 text-black position-relative overflow-visible" style="border: 1px solid #e5e7eb; border-radius: 16px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); transition: all 0.3s ease;">
              <div class="menu-icon">
                <i class="bi bi-newspaper"></i>
              </div>
              <div class="card-body text-center pt-5">
                <h5 class="card-title" style="font-weight: 600;">Berita Terbaru</h5>
                <p class="card-text text-muted" style="font-size: 0.9rem;">Berita terkini dan pengumuman.</p>
                <a href="{{ route('berita', 1) }}" class="btn btn-sptj w-100 mt-2" style="border-radius: 8px;">Lihat Berita</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="card menu-card h-100 text-black position-relative overflow-visible" style="border: 1px solid #e5e7eb; border-radius: 16px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); transition: all 0.3s ease;">
              <div class="menu-icon">
                <i class="bi bi-chat-dots-fill"></i>
              </div>
              <div class="card-body text-center pt-5">
                <h5 class="card-title" style="font-weight: 600;">Aspirasi & Pengaduan</h5>
                <p class="card-text text-muted" style="font-size: 0.9rem;">Sampaikan aspirasi dan pengaduan Anda.</p>
                <a href="{{ route('hubungi_kami') }}" class="btn btn-primary w-100 mt-2" style="border-radius: 8px; background-color: #00008B; border-color: #00008B;">Hubungi Kami</a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
    <section id="stats" class="stats section">
      <div class="container section-title" data-aos="fade-up">
        <h2>INFORMASI ANGGOTA</h2>
      </div>
      
      <div class="container">
        <div class="row gy-4">

          <div class="col-lg-4 col-md-6">
            <div class="card menu-card h-100" style="border: 1px solid #e5e7eb; border-radius: 16px; background-color: #fff; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
              <div class="card-body text-center p-4">
                <div class="stat-label text-muted mb-2" style="font-weight: 500; font-size: 0.95rem;">Jumlah Anggota</div>
                <div class="stat-number" style="color: #00008B; font-size: 2.5rem; font-weight: 700;">{{$allmember}}</div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="card menu-card h-100" style="border: 1px solid #e5e7eb; border-radius: 16px; background-color: #fff; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
              <div class="card-body text-center p-4">
                <div class="stat-label text-muted mb-2" style="font-weight: 500; font-size: 0.95rem;">Divisi</div>
                <div class="stat-number" style="color: #00008B; font-size: 2.5rem; font-weight: 700;">{{$unitkerja}}</div>              
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="card menu-card h-100" style="border: 1px solid #e5e7eb; border-radius: 16px; background-color: #fff; box-shadow: 0 2px 4px rgba(0,0,0,0.02);">
              <div class="card-body text-center p-4">
                <div class="stat-label text-muted mb-2" style="font-weight: 500; font-size: 0.95rem;">Lokasi Kerja</div>
                <div class="stat-number" style="color: #00008B; font-size: 2.5rem; font-weight: 700;">{{$lokasikerja}}</div>              
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
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
        background: #bfdbfe; 
        border-radius: 10px;
      }
      .custom-slider::-webkit-scrollbar-thumb:hover {
        background: #3b82f6; 
      }
      /* Efek hover interaktif ringan pada menu card */
      .menu-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1) !important;
        border-color: #bfdbfe !important;
      }
    </style>
    </main>
@stop