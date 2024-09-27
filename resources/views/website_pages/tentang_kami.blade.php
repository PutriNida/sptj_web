@extends('website_pages/templates/layout') 
@section('content')

  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background">
      <div class="container position-relative">
        <h1>Tentang Kami</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ route('index') }}">Beranda</a></li>
            <li class="current">Tentang Kami</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Features Section -->
    <section id="features" class="features section">

      <div class="container">

        @forelse($tentang_kami as $tk)
            @if($loop->iteration % 2 > 0)
                <div class="row gy-4 align-items-center features-item">
                <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
                    <img src="{{ $tk->gambar ?? URL::asset('img/carousel-1.jpg') }}" class="img-fluid" alt="">
                </div>
                <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
                    <h3>{{ $tk->judul }}</h3>
                    {!! $tk->detail !!}
                </div>
                </div><!-- Features Item -->
            @else
                <div class="row gy-4 align-items-center features-item">
                <div class="col-md-5 order-1 order-md-2 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ $tk->gambar  ?? URL::asset('img/carousel-2.jpg') }}" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 order-2 order-md-1" data-aos="fade-up" data-aos-delay="200">
                    <h3>{{ $tk->judul }}</h3>
                    {!! $tk->detail !!}
                </div>
                </div><!-- Features Item -->
            @endif
        @empty
        @endforelse
      
    </div>

    </section><!-- /Features Section -->

  </main>

  @stop