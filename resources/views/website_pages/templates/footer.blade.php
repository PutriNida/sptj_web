<footer id="footer" class="footer dark-background" >

    <footer class="footer-sptj">

  <div class="container py-2">
    <div class="row gy-4">
  <!-- LOGO + DESKRIPSI -->
  <div class="col-lg-3 col-md-6">
    <div class="d-flex align-items-center mb-3">
      <img src="{{ URL::asset('sptj_img/logo.png') }}" style="height:70px;">
      <div class="ms-2 text-white fw-bold">
        SERIKAT PEKERJA<br>TRANSPORTASI JAKARTA<br style="color: black">Berani ● Tulus ● Setia
      </div>
      
    </div>

    <p class="text-light small">
      SPTJ berkomitmen memperjuangkan hak dan kesejahteraan pekerja transportasi untuk Jakarta yang lebih baik.
    </p>

  </div>

  <!-- LINK CEPAT -->
  <div class="col-lg-2 col-md-6 footer-col">
    <h6>LINK CEPAT</h6>
    <ul>
      <li><a href="{{ route('index') }}">Beranda</a></li>
      <li><a href="{{ route('tentang_kami') }}">Profil</a></li>
      {{-- <li><a href="#">Kepengurusan</a></li> --}}
      <li><a href="{{ route('berita',1) }}">Berita</a></li>
      {{-- <li><a href="#">Keanggotaan</a></li> --}}
    </ul>
  </div>

  <!-- LAYANAN -->
  {{-- <div class="col-lg-2 col-md-6 footer-col">
    <h6>LAYANAN</h6>
    <ul>
      <li><a href="#">Data Anggota</a></li>
      <li><a href="#">Aspirasi</a></li>
      <li><a href="#">Download</a></li>
      <li><a href="#">Kartu Digital</a></li>
    </ul>
  </div> --}}

  <!-- KONTAK -->
  <div class="col-lg-3 col-md-6 footer-col">
    <h6>KANTOR SEKRETARIAT</h6>

    @foreach($hubungi_kami ?? [] as $hk)
      @if($hk->kd_tipe_kontak == 4)
        <p><i class="bi bi-geo-alt"></i> {{ $hk->tujuan }}</p>
      @elseif($hk->kd_tipe_kontak == 1)
        <p><i class="bi bi-telephone"></i> {{ $hk->tujuan }}</p>
      @elseif($hk->kd_tipe_kontak == 3)
        <p><i class="bi bi-envelope"></i> {{ $hk->tujuan }}</p>
      @endif
    @endforeach

    <p><i class="bi bi-clock"></i> Senin - Jumat 08.00 - 16.00</p>
  </div>

  <!-- IKUTI KAMI -->
  <div class="col-lg-2 col-md-6 footer-col">
    <h6>IKUTI KAMI</h6>
    <div class="social-links d-flex">
    @foreach($medsos ?? [] as $ms)
        <a href="{{ $ms->url }}" target="_blank">
            <img src="{{ $ms->ikon_media_sosial }}" 
                 alt="sosmed"
                 style="width: 24px; height: 24px;">
        </a>
    @endforeach
</div>
          <div class="container d-flex flex-column flex-md-row justify-content-between">
      <div style="font-size: 9px">© 2026 SPTJ - All Rights Reserved</div>
    </div>
  </div>

</div>

  </div>


</footer>

  </footer>

  <!-- Scroll Top -->
   <a href="https://wa.me/6282115506119" target="_blank"
   class="whatsapp-float d-flex align-items-center justify-content-center">
    <i class="bi bi-whatsapp"></i>
</a>
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
<script src="{{ URL::asset('vendor/web/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
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