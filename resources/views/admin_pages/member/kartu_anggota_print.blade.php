<style>
  @page { size: 85.6mm 54mm; margin: 0; }

  html, body { margin: 0; padding: 0; font-family: DejaVu Sans, Arial, sans-serif; }

  .page {
    width: 85.6mm;
    height: 54mm;
    overflow: hidden;
    page-break-inside: avoid;
    page-break-after: avoid;
    break-inside: avoid;
    break-after: avoid;
  }

  .card {
    position: relative;
    width: 85.6mm;
    height: 54mm;
    overflow: hidden;
    border: 1px solid #e5e7eb;
    border-radius: 6px;
  }

  /* Typography (semua absolute agar DOMPDF tidak flow) */
  .t-small { position:absolute; left:6mm; top:2.8mm; font-size:8.5px; font-weight:700; letter-spacing:.10px; color:#6c7a89; line-height:1; }
  .t-big   { position:absolute; left:6mm; top:10.3mm; font-size:15px; font-weight:800; color:#1e3a5f; line-height:1; }
  .t-sub   { position:absolute; left:6mm; top:18.1mm; font-size:9px; font-weight:700; color:#6c7a89; line-height:1; }

  .lbl-kr  { position:absolute; right:6mm; top:2.8mm; font-size:8.5px; font-weight:700; color:#6c7a89; line-height:1; text-align:center; width:25mm; }
  .val-kr  { position:absolute; right:6mm; top:7.8mm; font-size:15px; font-weight:800; color:#111827; line-height:1; text-align:center; width:25mm; white-space:nowrap; }

  .hr      { position:absolute; left:6mm; right:6mm; top:20.0mm; height:1px; background:#e5e7eb; }

  .lbl-nm  { position:absolute; left:6mm; top:21.5mm; font-size:8.5px; font-weight:700; color:#6c7a89; line-height:1; }
  .val-nm  { position:absolute; left:6mm; top:25.0mm; right:35mm; font-size:12px; font-weight:800; color:#111827; line-height:1; white-space:nowrap; overflow:hidden; }

  .lbl-div { position:absolute; left:6mm; top:29.5mm; font-size:8.5px; font-weight:700; color:#6c7a89; line-height:1; }
  .val-div { position:absolute; left:6mm; top:33.0mm; right:35mm; font-size:11px; font-weight:800; color:#111827; line-height:1; white-space:nowrap; overflow:hidden; }

  .lbl-lok { position:absolute; left:6mm; top:37.0mm; font-size:8.5px; font-weight:700; color:#6c7a89; line-height:1; }
  .val-lok { position:absolute; left:6mm; top:40.2mm; right:35mm; font-size:10.8px; font-weight:800; color:#111827; line-height:1; white-space:nowrap; overflow:hidden; }

  .lbl-st  { position:absolute; left:6mm; top:43.8mm; font-size:8.5px; font-weight:700; color:#6c7a89; line-height:1; }
  .val-st  { position:absolute; left:6mm; top:47.0mm; right:35mm; font-size:10.8px; font-weight:800; color:#111827; line-height:1; white-space:nowrap; overflow:hidden; }

  .lbl-bc  { position:absolute; right:6mm; top:21.5mm; font-size:8.5px; font-weight:700; color:#6c7a89; line-height:1; text-align:center; width:25mm; }

  .bc-wrap {
    position:absolute;
    right:6mm;
    top:26.0mm;
    width:25mm;
    height:23mm;
    overflow:hidden;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:0;
    line-height:0;
  }
  .bc-wrap * { margin:0 !important; padding:0 !important; }
  .bc-wrap img { max-width:200px; max-height:23mm; width:auto; height:auto; display:block; }
  .bc-wrap svg { max-width:200px; max-height:23mm; width:auto; height:auto; display:block; overflow:hidden; }
</style>

<div class="page" style="height:54mm; min-height:54mm; overflow:hidden; page-break-after:avoid;">
  <div class="card" style="height:54mm; overflow:hidden; page-break-inside:avoid; page-break-after:avoid;">
    <div class="t-small">SERIKAT PEKERJA TRANSPORTASI JAKARTA</div>
    <div class="t-big">KARTU ANGGOTA</div>
    <div class="t-sub">SPTJ</div>
  
    <div class="lbl-kr">NO. KARYAWAN</div>
    <div class="val-kr">{{ $no_karyawan ?? ($member->no_karyawan ?? '-') }}</div>

    <div class="hr"></div>

    <div class="lbl-nm">NAMA ANGGOTA</div>
    <div class="val-nm">{{ $nama_lengkap ?? '-' }}</div>

    <div class="lbl-div">DIVISI</div>
    <div class="val-div">{{ $memberdivisi ?? '-' }}</div>

    <div class="lbl-lok">LOKASI KERJA</div>
    <div class="val-lok">{{ $memberlokasikerja ?? '-' }}</div>

    <div class="lbl-st">STATUS</div>
    <div class="val-st">{{ $memberstatus ?? '-' }}</div>

    <div class="lbl-bc">BARCODE NO KARYAWAN</div>
    <div class="bc-wrap">
      {!! $barcode_html ?? '' !!}
    </div>
  </div>
</div>
