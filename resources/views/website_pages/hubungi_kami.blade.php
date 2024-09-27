@extends('website_pages/templates/layout') 
@section('content')

  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background">
      <div class="container position-relative">
        <h1>Hubungi Kami</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ route('index') }}">Beranda</a></li>
            <li class="current">Hubungi Kami</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

          <div class="row gy-4">
            <div class="col-lg-6 ">
              <div class="row gy-4">

                <div class="col-lg-12">
                  <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
                    <i class="bi bi-geo-alt"></i>
                    <h3>Alamat</h3>
                    <p>{{ $alamat }}</p>
                  </div>
                </div><!-- End Info Item -->

              </div>
            </div>

            <div class="col-lg-6">
              <div class="row gy-4">
                <div class="col-md-6">
                  
                
                  <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
                    <i class="bi bi-telephone"></i>
                    <h3>Telepon</h3>
                    <p>{{ $notelp }}</p>
                  </div>
                </div><!-- End Info Item -->
                <div class="col-md-6">
                  <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
                    <i class="bi bi-envelope"></i>
                    <h3>Email</h3>
                    <p>{{ $email }}</p>
                  </div>
                </div><!-- End Info Item -->
              </div>
            </div><!-- End Contact Form -->

          </div>

        </div>

      <div class="mt-5" data-aos="fade-up" data-aos-delay="200">
        <iframe style="border:0; width: 100%; height: 370px;" src="{{ $map }}" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div><!-- End Google Maps -->

    </section><!-- /Contact Section -->


  </main>

  @stop