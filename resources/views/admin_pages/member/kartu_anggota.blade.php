@extends('admin_pages.templates.layout')
@section('content')
<div class="container-fluid py-4">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 class="font-weight-bold text-primary">Kartu Anggota</h4>
        <div>
            {{-- Langsung buka stream PDF (langsung menuju kartu_anggota_print sebagai konten PDF) --}}
            <a class="btn btn-outline-secondary btn-sm no-print"
               href="{{ url('/kartu_anggota/print/' . ($no_karyawan ?? ($member->no_karyawan ?? ''))) }}"
               target="_blank"
               rel="noopener noreferrer">
                Cetak
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mb-3">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <div class="d-flex align-items-start justify-content-between">
                        <div>
                            <div style="font-size:12px; font-weight:700; letter-spacing:0.5px; color:#6c7a89;">SERIKAT PEKERJA TRANSPORTASI JAKARTA</div>
                            <div style="font-size:22px; font-weight:800; color:#1e3a5f;">KARTU ANGGOTA</div>
                            <div class="mt-1" style="font-size:14px; color:#6c7a89;">SPTJ</div>
                        </div>
                        <div class="text-right">
                            <div class="badge badge-primary" style="font-size:12px;">NO. KARYAWAN</div>
                            <div style="font-size:22px; font-weight:800; color:#111827;">{{ $no_karyawan ?? ($member->no_karyawan ?? '-') }}</div>

                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-7">
                            <div class="text-muted" style="font-size:12px;">NAMA ANGGOTA</div>
                            <div style="font-size:18px; font-weight:800; color:#111827;">{{ $nama_lengkap ?? '-' }}</div>

                            <div class="mt-3">
                                <div class="text-muted" style="font-size:12px;">DIVISI</div>
                                <div style="font-size:12px; font-weight:700;">{{ $memberdivisi ?? '-' }}</div>
                            </div>

                            <div class="mt-3">
                                <div class="text-muted" style="font-size:12px;">LOKASI KERJA</div>
                                <div style="font-size:12px; font-weight:700;">{{ $memberlokasikerja ?? '-' }}</div>
                            </div>

                            <div class="mt-3">
                                <div class="text-muted" style="font-size:12px;">STATUS</div>
                                <div style="font-size:12px; font-weight:700;">{{ $memberstatus ?? '-' }}</div>
                            </div>
                        </div>

                        <div class="col-md-5 text-center">
                            <div class="text-muted" style="font-size:12px;">BARCODE NO KARYAWAN</div>

                            {{-- wrapper khusus untuk ukuran barcode --}}
                            <div class="d-flex align-items-center justify-content-center member-barcode-wrapper" style="min-height:50px;">
                                {!! $barcode_html ?? '' !!}
                            </div>

                            <style>
                                .member-barcode-wrapper img {
                                    max-width: 1000px !important;
                                    max-height: 400px !important;
                                    width: auto !important;
                                    height: auto !important;
                                    display: block;
                                    margin: 0 auto;
                                }

                                .member-barcode-wrapper svg {
                                    max-width: 1000px !important;
                                    max-height: 400px !important;
                                    width: auto !important;
                                    height: auto !important;
                                    display: block;
                                    margin: 0 auto;
                                }

                                .member-barcode-wrapper {
                                    overflow: hidden;
                                }
                            </style>

                            <!-- <div class="text-center mt-2" style="font-size:12px; color:#6c7a89;">
                                (untuk cetak fisik)
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="font-weight-bold text-uppercase" style="letter-spacing:0.4px; color:#1e3a5f;">Petunjuk</h6>
                    <ul class="mt-2" style="padding-left:18px; color:#6c7a89;">
                        <li>Tekan tombol <b>Cetak</b> untuk membuat dokumen fisik.</li>
                        <li>Jika barcode tidak terbaca, atur skala print pada browser.</li>
                        <li>Pastikan koneksi & browser mengizinkan fitur print.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
