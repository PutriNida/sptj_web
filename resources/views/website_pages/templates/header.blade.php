<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Serikat Pekerja Transportasi Jakarta</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <link href="{{ URL::asset('sptj_img/logo.png') }}" rel="icon">
  <link href="{{ URL::asset('sptj_img/logo.png') }}" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <link href="{{ URL::asset('vendor/web/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('vendor/web/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('vendor/web/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('vendor/web/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('vendor/web/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <link href="{{ URL::asset('css/web/main.css') }}" rel="stylesheet">

  <link href="{{ URL::asset('css/custom.css') }}" rel="stylesheet">

  <style>
    /* REVISI CSS: Membuat topbar bersih, putih, dengan aksen biru profesional */
    .sptj-topbar {
      background: #ffffff;
      color: #00008B;
      padding: 10px 20px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      position: relative;
      z-index: 1030;
    }

    .sptj-topbar .sitename {
      margin: 0;
      font-weight: 700;
      color: #00008B;
    }

    /* Ukuran logo adaptif: agak kecil di HP, normal di Desktop */
    .sptj-topbar .sptj-logo-img {
      height: 50px;
      width: auto;
    }
    @media (min-width: 768px) {
      .sptj-topbar .sptj-logo-img {
        height: 70px;
      }
    }

    .sptj-social a {
      color: #00008B;
      transition: color 0.2s ease;
    }
    .sptj-social a:hover {
      color: #3b82f6;
    }

    #header {
      position: sticky;
      top: 0;
      z-index: 1020;
    }
    
    .sptj-topbar span {
      line-height: 1.3;
    }
  </style>
</head>

<body class="index-page">

  <div class="sptj-topbar">
    <div class="container-fluid d-flex align-items-center justify-content-between">
      
      <a href="#" class="logo d-flex align-items-center text-decoration-none">
        <img src="{{ URL::asset('sptj_img/logo.png') }}" alt="SPTJ Logo" class="sptj-logo-img"/>
        
        <div class="d-flex flex-column ms-2 ms-sm-3">
          <span class="sitename" style="font-size: 13px; letter-spacing: 0.5px;">SERIKAT PEKERJA</span>
          <span class="sitename" style="color: black; font-size: 13px; letter-spacing: 0.5px;">TRANSPORTASI JAKARTA</span>
          <span class="d-none d-sm-inline mt-1" style="color: #6b7280; font-size: 11px; font-weight: 500;">Berani ● Tulus ● Setia</span>
        </div>
      </a>

      <div class="d-none d-xl-flex align-items-center gap-4 mx-3">

        <div class="d-flex align-items-start">
          <i class="bi bi-geo-alt me-2 mt-1" style="color:#00008B; font-size: 1.1rem;"></i>
          <div class="d-flex flex-column" style="max-width: 260px;">
            <span class="fw-bold" style="color:#00008B; font-size: 13px;">Alamat:</span>
            <span style="font-size: 12px; color: black; line-height: 1.4;">
              Jl. Mayjen Sutoyo No.1 RT.5/RW 5, Kel. Pala, Kec. Makasar, Jakarta Timur 13540
            </span>
          </div>
        </div>

        <div class="d-flex align-items-start">
          <i class="bi bi-envelope me-2 mt-1" style="color:#00008B; font-size: 1.1rem;"></i>
          <div class="d-flex flex-column">
            <span class="fw-bold" style="color:#00008B; font-size: 13px;">Email:</span>
            <span style="font-size: 12px; color: black;">sptj.transportasijakarta@mail.com</span>
          </div>
        </div>

        <div class="d-flex align-items-start">
          <i class="bi bi-telephone me-2 mt-1" style="color:#00008B; font-size: 1.1rem;"></i>
          <div class="d-flex flex-column">
            <span class="fw-bold" style="color:#00008B; font-size: 13px;">Telepon:</span>
            <span style="font-size: 12px; color: black;">(021) 8088-1234</span>
          </div>
        </div>

      </div>
      
      <div class="sptj-social d-none d-lg-flex align-items-center gap-2">
        <span class="fw-semibold me-2" style="font-size: 12px; color: #4b5563;">Media Sosial</span>
        <a href="#" aria-label="Instagram" class="text-decoration-none"><i class="bi bi-instagram fs-6"></i></a>
        <a href="#" aria-label="Facebook" class="text-decoration-none"><i class="bi bi-facebook fs-6"></i></a>
        <a href="#" aria-label="YouTube" class="text-decoration-none"><i class="bi bi-youtube fs-6"></i></a>
        <a href="#" aria-label="WhatsApp" class="text-decoration-none"><i class="bi bi-whatsapp fs-6"></i></a>
      </div>

    </div>
  </div>

  <header id="header" class="header">
    <div class="container-fluid position-relative">
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('index') }}" class="{{ request()->is('/') ? 'active' : ''}}">Beranda</a></li>
          <li><a href="{{ route('tentang_kami') }}" class="{{ str_contains(url()->current(), '/tentang_kami') ? 'active' : ''}}">Profil</a></li>
          <li><a href="{{ route('berita', 1) }}" class="{{ str_contains(url()->current(), '/berita') ? 'active' : ''}}">Berita</a></li>
          <li><a href="{{ route('informasi', 1) }}" class="{{ str_contains(url()->current(), '/informasi') ? 'active' : ''}}">Layanan Anggota</a></li>
          <li><a href="{{ route('struktur') }}" class="{{ str_contains(url()->current(), '/struktur') ? 'active' : ''}}">Struktur Organisasi</a></li>
          <li class="{{ request()->is('galeri') || request()->is('/galeri/*') ? 'active' : '' }}">
            <a href="{{ route('galeri', 0) }}">Galeri</a>
          </li>
          <li><a href="{{ route('pendaftaran_anggota.create') }}" class="{{ str_contains(url()->current(), '/pendaftaran-anggota') ? 'active' : ''}}">Pendaftaran Anggota</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  @yield('content')

</body>
</html>