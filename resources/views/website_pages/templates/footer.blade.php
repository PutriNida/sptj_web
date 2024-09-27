<footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="d-flex align-items-center">
            <span class="sitename">Serikat Pekerja Transportasi Jakarta</span>
          </a>
          <div class="footer-contact pt-3">
            @forelse($hubungi_kami as $hk)
            @if($hk->kd_tipe_kontak == 4)
            <p>              
              {{ $hk->tujuan }}
            </p>
            <br>
            @elseif($hk->kd_tipe_kontak == 1)
            <p class="mt-3"><strong>Nomor Telepon:</strong> <span>
              {{ $hk->tujuan }}
            </span></p>
            @elseif($hk->kd_tipe_kontak == 3)
            <p><strong>Email:</strong> <span>
              {{ $hk->tujuan }}
              </span></p>
            @endif
            @empty
            @endforelse
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('index') }}">Beranda</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('berita', 1) }}">Berita</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('informasi', 1) }}">Informasi</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('galeri', 0) }}">Galeri</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('tentang_kami') }}">Tentang Kami</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('hubungi_kami') }}">Hubungi Kami</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12">
          <h4>Ikuti Kami</h4>
          <div class="social-links d-flex">
            @forelse($medsos as $ms)
              @if($ms->kd_media_sosial == 2)
              <a href="{{ $ms->url }}" target="_blank"><i class="bi bi-twitter-x"></i></a>
              @endif
              @if($ms->kd_media_sosial == 1)
              <a href="{{ $ms->url }}" target="_blank"><i class="bi bi-facebook"></i></a>
              @endif
              @if($ms->kd_media_sosial == 3)
              <a href="{{ $ms->url }}" target="_blank"><i class="bi bi-instagram"></i></a>
              @endif
            @empty
            @endforelse
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Limitless Innovation 2024</strong></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ URL::asset('vendor/web/bootstrap/js/bootstrap.bundle.min.js'); }}"></script>
  <script src="{{ URL::asset('vendor/web/php-email-form/validate.js'); }}"></script>
  <script src="{{ URL::asset('vendor/web/aos/aos.js'); }}"></script>
  <script src="{{ URL::asset('vendor/web/glightbox/js/glightbox.min.js'); }}"></script>
  <script src="{{ URL::asset('vendor/web/purecounter/purecounter_vanilla.js'); }}"></script>
  <script src="{{ URL::asset('vendor/web/swiper/swiper-bundle.min.js'); }}"></script>
  <script src="{{ URL::asset('vendor/web/waypoints/noframework.waypoints.js'); }}"></script>
  <script src="{{ URL::asset('vendor/web/imagesloaded/imagesloaded.pkgd.min.js'); }}"></script>
  <script src="{{ URL::asset('vendor/web/isotope-layout/isotope.pkgd.min.js'); }}"></script>

  <!-- Main JS File -->
  <script src="{{ URL::asset('js/web/main.js'); }}"></script>

</body>

</html>