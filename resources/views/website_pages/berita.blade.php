@extends('website_pages/templates/layout') 
@section('content')

  <main class="main">

    <!-- Page Title -->
    <!-- <div class="page-title dark-background"> -->
      <div class="container position-relative">
        <!-- <h1>Berita</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ route('index') }}">Beranda</a></li>
            <li class="current">Berita</li>
          </ol>
        </nav>
      </div> -->
    </div><!-- End Page Title -->

    <section id="services" class="services section">

      <div class="container">
        <div class="row gy-3 mb-3">
          <div class="col-12">
            <div class="sptj-berita-filter">
               <a href="{{ route('berita', 1) }}"
           class="sptj-berita-filter-item {{ empty(request()->query('kategori')) ? 'active' : '' }}">
           Semua
        </a>

        <!-- KATEGORI -->
        @foreach($kategori_berita ?? [] as $kat)
          <a href="{{ route('berita', $current_page ?? 1).'?kategori='.urlencode($kat->kd_kategori_berita) }}"
             class="sptj-berita-filter-item {{ request()->query('kategori') == ($kat->kd_kategori_berita ?? null) ? 'active' : '' }}">
             {{ $kat->kategori_berita ?? '' }}
          </a>
        @endforeach


            </div>
          </div>
        </div>

        <div class="row g-4">
          @forelse($berita as $brt)
            <div class="col-12 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($loop->index ?? 0) * 50 }}">

              <div class="sptj-berita-row h-100">

                <a href="{{ route('berita.detail', $brt->no_berita) }}" class="sptj-berita-row-link">
                  <div class="sptj-berita-thumb">
                    <img src="{{ $brt->gambar }}" alt="{{ $brt->judul_berita }}" class="sptj-berita-img">
                  </div>

                  <div class="sptj-berita-content">
                  <div class="d-flex align-items-center gap-2">
                  <div class="sptj-berita-meta">{{ $brt->kategori_berita ?? 'Berita' }}</div>

                      @if(!empty($brt->create_at))
                        <div class="sptj-berita-date">{{ $brt->create_at }}</div>
                      @endif
                    </div>
                    <h3 class="sptj-berita-title">{{ $brt->judul_berita }}</h3>

                    <p class="sptj-berita-highlight">{{ $brt->highlight }}</p>

                    <div class="sptj-berita-stats">
                      @if(!empty($brt->views))
                        <span class="sptj-berita-stat"><i class="bi bi-eye-fill me-1 text-primary"></i>{{ $brt->views }}</span>
                      @endif
                      @if(!empty($brt->likes))
                        <span class="sptj-berita-stat"><i class="bi bi-hand-thumbs-up-fill me-1 text-primary"></i>{{ $brt->likes }}</span>
                      @endif
                      @if(!empty($brt->comments))
                        <span class="sptj-berita-stat"><i class="bi bi-chat-dots-fill me-1 text-primary"></i>{{ $brt->comments }}</span>
                      @endif
                    </div>
                  </div>
                </a>
              </div>
            </div>
          @empty
          @endforelse
        </div>
      </div>

    </section><!-- /Blog Posts Section -->

    <!-- Blog Pagination Section -->
    <section id="blog-pagination" class="blog-pagination section">

      <div class="container">
        <div class="d-flex justify-content-center">
          <ul>
            <li><a href="{{ (int)$current_page > 1 ? route('berita', (int)$current_page - 1) : ''}}"><i class="bi bi-chevron-left"></i></a></li>
            @for($i = 1; $i <= $total_pages; $i++)
            <li><a href="{{ route('berita', $i) }}" class="{{ (int)$current_page == $i ? 'active' : ''}}">{{ $i }}</a></li>
            @endfor
            <li><a href="{{ (int)$current_page < $total_pages ? route('berita', (int)$current_page + 1) : ''}}"><i class="bi bi-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>

    </section><!-- /Blog Pagination Section -->

  </main>

  @stop