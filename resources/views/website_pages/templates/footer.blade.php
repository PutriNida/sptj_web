<footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="d-flex align-items-center">
            <span class="sitename">Serikat Pekerja Transportasi Jakarta</span>
          </a>
          <div class="footer-contact pt-3">
            <p>A108 Adam Street</p>
            <p>New York, NY 535022</p>
            <p class="mt-3"><strong>Nomor Telepon:</strong> <span>+1 5589 55488 55</span></p>
            <p><strong>Email:</strong> <span>info@example.com</span></p>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('index') }}">Beranda</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('berita', 1) }}">Berita</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Informasi</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Galeri</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Tentang Kami</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Hubungi Kami</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12">
          <h4>Ikuti Kami</h4>
          <div class="social-links d-flex">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
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