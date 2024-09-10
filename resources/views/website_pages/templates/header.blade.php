<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Serikat Pekerja Transportasi Jakarta</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ URL::asset('sptj_img/logo.png'); }}" rel="icon">
  <link href="{{ URL::asset('sptj_img/logo.png'); }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ URL::asset('vendor/web/bootstrap/css/bootstrap.min.css'); }}" rel="stylesheet">
  <link href="{{ URL::asset('vendor/web/bootstrap-icons/bootstrap-icons.css'); }}" rel="stylesheet">
  <link href="{{ URL::asset('vendor/web/aos/aos.css'); }}" rel="stylesheet">
  <link href="{{ URL::asset('vendor/web/glightbox/css/glightbox.min.css'); }}" rel="stylesheet">
  <link href="{{ URL::asset('vendor/web/swiper/swiper-bundle.min.css'); }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ URL::asset('css/web/main.css'); }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Moderna
  * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="{{ URL::asset('img/web/logo.png'); }}" alt=""> -->
        <h1 class="sitename">SPTJ</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <ul>
          <li><a href="{{ route('index') }}" class="{{ request()->is('/') ? 'active' : ''}}">Beranda</a></li>
          <li><a href="{{ route('berita', 1) }}" class="{{ str_contains(url()->current(), '/berita') ? 'active' : ''}}">Berita</a></li>
          <li><a href="{{ route('informasi', 1) }}" class="{{ str_contains(url()->current(), '/informasi') ? 'active' : ''}}">Informasi</a></li>
          <li><a href="" class="{{ str_contains(url()->current(), '/galeri') ? 'active' : ''}}">Galeri</a></li>
          <li><a href="" class="{{ str_contains(url()->current(), '/tentang_kami') ? 'active' : ''}}">Tentang Kami</a></li>
          <li><a href="" class="{{ str_contains(url()->current(), '/hubungi_kami') ? 'active' : ''}}">Hubungi Kami</a></li>
          <li><a href="{{ route('auth.login') }}">Masuk</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>