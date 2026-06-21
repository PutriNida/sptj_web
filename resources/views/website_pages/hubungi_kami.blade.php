@extends('website_pages/templates/layout') 
@section('content')

  <main class="main">

    <!-- Page Title -->
    {{-- <div class="page-title dark-background"> --}}
      <div class="container position-relative">
        {{-- <h1>Hubungi Kami</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ route('index') }}">Beranda</a></li>
            <li class="current">Hubungi Kami</li>
          </ol>
        </nav> --}}
      </div>
    </div><!-- End Page Title -->

    <!-- Contact + Complaint Section (2 Columns) -->
    <section id="contact" class="contact section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          <!-- Left: Address + Contact + Map -->
          <div class="col-lg-6 order-2 order-lg-1">
            <div class="row gy-4">
              <div class="col-lg-12">
                <div class="info-item d-flex flex-column justify-content-center align-items-center card menu-card position-relative overflow-visible" data-aos="fade-up" data-aos-delay="200">
                  <h3>Pengaduan dan Aspirasi</h3>
                  <p>Kirimkan pengaduan atau aspirasi Anda kepada kami.</p>
                </div>
              </div>
            </div>


            <div class="row gy-4 mt-4">
              <div class="col-lg-12 card menu-card position-relative overflow-visible p-4 h-100">



                @if(session('success'))
                  <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                  </div>
                @endif

                <form action="{{ route('hubungi_kami.submit') }}" method="POST" data-aos="fade-up" data-aos-delay="300">
                  @csrf
                  <div class="row gy-4">
                    <div class="col-md-6 form-group">

                      <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Lengkap" value="{{ old('nama') }}" required>
                      @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-md-6 form-group">
                      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required>
                      @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                     <div class="col-md-6 form-group">
                      <input type="nik" name="nik" class="form-control @error('nik') is-invalid @enderror" placeholder="NIK" value="{{ old('nik') }}" required>
                      @error('nik')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                     <div class="col-md-6 form-group">
                      <input type="nohp" name="nohp" class="form-control @error('nohp') is-invalid @enderror" placeholder="No.HP/WA" value="{{ old('nohp') }}" required>
                      @error('nohp')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group mt-3">
                    <select name="jenis" class="form-control @error('jenis') is-invalid @enderror" required>
                      <option value="">Pilih Jenis</option>
                      <option value="pengaduan" {{ old('jenis') == 'pengaduan' ? 'selected' : '' }}>Pengaduan</option>
                      <option value="aspirasi" {{ old('jenis') == 'aspirasi' ? 'selected' : '' }}>Aspirasi</option>
                    </select>
                    @error('jenis')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-group mt-3">
                    <textarea name="pesan" class="form-control @error('pesan') is-invalid @enderror" rows="5" placeholder="Pesan" required>{{ old('pesan') }}</textarea>
                    @error('pesan')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="text-center mt-3">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- Right: Address + Contact + Map -->
          <div class="col-lg-6">
            <div class="row gy-4">
              <div class="col-lg-12">
                
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item d-flex flex-column justify-content-center align-items-center card menu-card position-relative overflow-visible" data-aos="fade-up" data-aos-delay="300">
                  <div class="menu-icon">
                    <i class="bi bi-telephone"></i>
                  </div>
                  <h3>Telepon</h3>
                  <p>{{ $notelp }}</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item d-flex flex-column justify-content-center align-items-center card menu-card position-relative overflow-visible" data-aos="fade-up" data-aos-delay="400">
                  <div class="menu-icon">
                    <i class="bi bi-envelope"></i>
                  </div>
                  <h3>Email</h3>
                  <p>{{ $email }}</p>
                </div>
              </div><!-- End Info Item -->
              <div class="info-item d-flex flex-column justify-content-center align-items-center card menu-card position-relative overflow-visible" data-aos="fade-up" data-aos-delay="300">
                  <div class="menu-icon">
                    <i class="bi bi-geo-alt"></i>
                  </div>
                  <h3>Alamat</h3>
                  <p>{{ $alamat }}</p>
                </div>
            </div>

            <div class="mt-5" data-aos="fade-up" data-aos-delay="200">
              <iframe
                style="border:0; width: 100%; height: 220px;"
                src="{{ $map }}"
                frameborder="0"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
              </iframe>
            </div><!-- End Google Maps -->
          </div>
        </div>

      </div>
    </section><!-- /Contact + Complaint Section -->

  </main>

  @stop

