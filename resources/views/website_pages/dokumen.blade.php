@extends('website_pages/templates/layout')
@section('content')
<main class="main">

    <section id="dokumen" class="dokumen section">
        <div class="container position-relative" style="margin-top:20px;">
            <h2 style="color:#00008B; font-weight:800;">Dokumen</h2>
            <p style="color:#374151;">Unduh dokumen berdasarkan jenis.</p>
        </div>

        <div class="container">
            <div class="row g-4">
                <!-- Left: filter -->
                <div class="col-lg-3">
                    <div class="card shadow-sm" style="border-radius:16px;">
                        <div class="card-body">
                            <h5 class="mb-3" style="color:#00008B; font-weight:800;">Filter Jenis</h5>

                            <div class="d-grid gap-2">
                                @php
                                    $activeJenis = (int)($selected_kd_jenis_dokumen ?? 0);
                                @endphp

                                <a href="{{ url('/dokumen') }}?kd_jenis_dokumen=0" class="btn btn-outline-primary {{ $activeJenis === 0 ? 'active' : '' }}">Semua</a>

                                @foreach($jenis as $j)
                                    <a href="{{ url('/dokumen') }}?kd_jenis_dokumen={{ $j->id }}"
                                       class="btn btn-outline-primary {{ $activeJenis === (int)$j->id ? 'active' : '' }}">
                                        {{ $j->nama_jenis_dokumen }}
                                    </a>
                                @endforeach
                            </div>


                            <hr>
                            <div class="d-flex justify-content-between">
                                <span class="text-muted">Total Dokumen</span>
                                <span style="font-weight:800; color:#00008B;">{{ $total_dokumen ?? 0 }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: list -->
                <div class="col-lg-9">
                    <div class="card shadow-sm" style="border-radius:16px;">
                        <div class="card-body">

                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                                <div>
                                    <h5 class="mb-0" style="font-weight:800; color:#00008B;">Daftar Dokumen</h5>
                                    <small class="text-muted">{{ $activeJenis === 0 ? 'Menampilkan semua jenis' : ($selected_nama_jenis_dokumen ?? '-') }}</small>
                                </div>
                                <div class="text-end">
                                    <div class="text-muted">Ditampilkan</div>
                                    <div style="font-weight:800; color:#00008B; font-size:20px;">{{ $dokumen->count() }}</div>
                                </div>
                            </div>

                            <div class="list-group">
                                @forelse($dokumen as $d)
                                    <div class="list-group-item" style="border-left:4px solid #00008B;">
                                        <div class="d-flex align-items-center justify-content-between gap-3">
                                            <div>
                                                <div style="font-weight:800;">{{ $d->nama }}</div>
                                                <div class="text-muted" style="font-size:13px;">
                                                    {{ $d->nama_jenis_dokumen }}
                                                    @if(!empty($d->ekstensi))
                                                        <span> • .{{ ltrim($d->ekstensi, '.') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="d-flex gap-2">
                                                <a class="btn btn-primary btn-sm" href="{{ route('admin_dokumen.download', $d->id) }}">
                                                    Unduh
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                @empty
                                    <div class="p-4 text-center text-muted">Dokumen belum tersedia.</div>
                                @endforelse
                            </div>

                            @if(($total_pages ?? 1) > 1)
                                <nav class="mt-3">
                                    <ul class="pagination justify-content-center">
                                        @php
                                            $params = $queryParams ?? [];
                                            $params['page'] = $current_page - 1;
                                            $prevUrl = url('/dokumen').'?'.http_build_query($params);
                                            $params['page'] = $current_page + 1;
                                            $nextUrl = url('/dokumen').'?'.http_build_query($params);
                                        @endphp

                                        <li class="page-item {{ $current_page <= 1 ? 'disabled' : '' }}">
                                            <a class="page-link" href="{{ $current_page <= 1 ? '#' : $prevUrl }}">Previous</a>
                                        </li>

                                        @for($p = 1; $p <= $total_pages; $p++)
                                            <li class="page-item {{ $p == $current_page ? 'active' : '' }}">
                                                <a class="page-link" href="{{ url('/dokumen').'?' . http_build_query(array_merge($queryParams ?? [], ['page' => $p])) }}">{{ $p }}</a>
                                            </li>
                                        @endfor

                                        <li class="page-item {{ $current_page >= $total_pages ? 'disabled' : '' }}">
                                            <a class="page-link" href="{{ $current_page >= $total_pages ? '#' : $nextUrl }}">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            @endif

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main>
@stop

