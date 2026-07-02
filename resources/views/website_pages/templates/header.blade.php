<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Serikat Pekerja Transportasi Jakarta</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ URL::asset('sptj_img/logo.png') }}" rel="icon">
  <link href="{{ URL::asset('sptj_img/logo.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/xlsx/dist/xlsx.full.min.js"></script>

  <!-- Vendor CSS Files -->
  <link href="{{ URL::asset('vendor/web/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('vendor/web/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('vendor/web/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('vendor/web/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('vendor/web/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ URL::asset('css/web/main.css') }}" rel="stylesheet">

  <!-- Custom CSS File -->
  <link href="{{ URL::asset('css/custom.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Moderna
  * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <style>
    .sptj-topbar {
      background: #ffffff;
      color: #00008B; /* biru */
       padding: 12px 20px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.04);
      position: relative;
      z-index: 1030;
      margin-top: 0;
    }

    .sptj-topbar .sitename {
      margin: 0;
      font-weight: 700;
      color: #00008B; /* biru */
    }

    .sptj-topbar img {
      height: 42px;
      width: auto;
    }

    .sptj-social a {
      color: #00008B; /* biru */
    }

    /* Pastikan navbar berada di bawah topbar */
    #header {
      position: sticky;
      top: 0;
      z-index: 1020;
    }
.sptj-topbar span {
      line-height: 1.2;
    }

    .sptj-topbar .alamat {
      max-width: 300px;
      font-size: 12px;
    }

    /* Mobile: rapikan navmenu supaya tidak terlalu lebar/berantakan */
    @media (max-width: 575.98px) {
      /* Biarkan header tetap di atas */
      #header {
        padding: 8px 0;
      }

      /* Saat menu mobile dibuka (overlay) */
      body.mobile-nav-active .navmenu {
        padding: 0 10px;
      }

      /* Item list menu: kecilkan padding + tambahkan pembatas */
      .navmenu ul {
        inset: 60px 10px 10px 10px;
        border-radius: 10px;
        border: 1px solid rgba(0, 0, 0, 0.08);
        box-shadow: 0 8px 24px rgba(0,0,0,0.08);
        overflow: hidden;
      }

      /* Pembatas antar item */
      .navmenu ul li {
        border-bottom: 1px solid rgba(0, 0, 0, 0.08);
      }

      .navmenu ul li:last-child {
        border-bottom: 0;
      }

      .navmenu ul a {
        width: 100%;
      }

      .navmenu a,
      .navmenu a:focus {
        padding: 10px 12px;
        font-size: 16px;
      }

      .mobile-nav-toggle {
        font-size: 26px !important;
        margin-right: 6px !important;
      }
    }

    /* Mobile: topbar dibuat lebih ringkas agar tidak berantakan */
    @media (max-width: 575.98px) {
      .sptj-topbar {
        padding: 8px 12px;
      }

      .sptj-topbar img {
        height: 48px !important;
      }

      /* Hilangkan teks panjang (alamat/email/telepon) di mobile */
      .sptj-topbar .alamat,
      .sptj-topbar .alamat span,
      .sptj-topbar .ms-5 {
        display: none !important;
      }

      .sptj-topbar .d-flex.flex-column.ms-3 {
        margin-left: 8px !important;
      }

      .sptj-topbar .top-text {
        font-size: 14px !important;
        line-height: 1.1;
      }

      .sptj-topbar .bottom-text {
        font-size: 14px !important;
        line-height: 1.1;
      }

      .sptj-topbar .logo {
        gap: 8px;
      }
    }
  </style>
</head>

<body class="index-page">
  <!-- Top bar: logo + social (di atas navbar) -->
  <div class="sptj-topbar">
    <div class="container-fluid d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center text-decoration-none">
        <img src="{{ URL::asset('sptj_img/logo.png') }}" alt="SPTJ Logo" style="height: 80px;"/>
       <!-- BAGIAN KIRI (TETAP KE BAWAH) -->
  <div class="d-flex flex-column ms-3">
    <span class="sitename top-text">SERIKAT PEKERJA</span>
    <span class="sitename bottom-text" style="color: black;">TRANSPORTASI JAKARTA</span>
    <span style="color: black;">Berani ● Tulus ● Setia</span>
  </div>

<!-- ALAMAT -->
 <div class="ms-5 d-flex align-items-start ">

  <!-- ICON -->
  <i class="bi bi-geo-alt me-2 mt-1" style="color:#00008B;"></i>

  <!-- TEXT -->
  <div class="d-flex flex-column ">
    <span class="sitename top-text" style="color:#00008B; font-size:16px;">
      Alamat:
    </span>
    <span style="font-size:16px; color: black;">
      Jl. Mayjen Sutoyo No.1 RT.5/RW 5, Kel. Pala, Kec. Makasar,
    </span>
    <span style="font-size:16px; color: black;">
      Kota Jakarta Timur, DKI Jakarta 13540
    </span>
  </div>

</div>
<!-- EMAIL -->
<div class="ms-5 d-flex align-items-start">
  <i class="bi bi-envelope me-2 mt-1" style="color:#00008B;"></i>

  <div class="d-flex flex-column">
    <span class="sitename top-text" style="color:#00008B; font-size:16px;">
      Email:
    </span>
    <span style="font-size:16px; color: black;">
      sptj.transportasijakarta@mail.com
    </span>
  </div>
</div>

<!-- TELEPON -->
<div class="ms-5 d-flex align-items-start">
  <i class="bi bi-telephone me-2 mt-1" style="color:#00008B;"></i>

  <div class="d-flex flex-column">
    <span class="sitename top-text" style="color:#00008B; font-size:16px;">
      Telepon:
    </span>
    <span style="font-size:16px; color: black;">
      (021) 8088-1234
    </span>
  </div>
</div>
      </a>
      
      <!-- <div class=" ms-3 sptj-social d-none d-lg-flex align-items-center gap-2">
        <span class="fw-semibold me-2">Media Sosial</span>
        <a href="#" aria-label="Instagram" class="text-decoration-none"><i class="bi bi-instagram fs-5"></i></a>
        <a href="#" aria-label="Facebook" class="text-decoration-none"><i class="bi bi-facebook fs-5"></i></a>
        <a href="#" aria-label="YouTube" class="text-decoration-none"><i class="bi bi-youtube fs-5"></i></a>
        <a href="#" aria-label="WhatsApp" class="text-decoration-none"><i class="bi bi-whatsapp fs-5"></i></a>
      </div> -->
    </div>
  </div>

  <!-- Navbar -->
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
          <li><a href="{{ route('dokumen') }}" class="{{ str_contains(url()->current(), '/dokumen') ? 'active' : ''}}">Dokumen</a></li>
          <li><a href="{{ route('pendaftaran_anggota.create') }}" class="{{ str_contains(url()->current(), '/pendaftaran-anggota') ? 'active' : ''}}">Pendaftaran Anggota</a></li>
          <li><a href="{{ route('auth.login') }}">Login</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

