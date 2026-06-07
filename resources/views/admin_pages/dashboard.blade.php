@include('admin_pages/templates/header')
<div class="container-fluid py-4">

  <!-- Member Card (Login Anggota) -->
  <div class="row mb-4">
    <div class="col-xl-4 col-lg-5 mb-3 mb-xl-0">
      <div class="card shadow h-100 border-left-primary">
        <div class="card-body">
          <div class="d-flex align-items-start">
            <div class="mr-3">
              <div class="rounded-circle bg-primary" style="width:56px;height:56px;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;">
                {{ strtoupper(substr(session('nama_lengkap') ?? 'A', 0, 1)) }}
              </div>
            </div>
            <div>
              <h5 class="font-weight-bold text-gray-900 mb-1">{{ session('nama_lengkap') ?? '-' }}</h5>
              <div class="text-muted" style="font-size:14px;">No. Karyawan: <b>{{ session('no_karyawan') ?? '-' }}</b></div>
            </div>
          </div>

          <hr>

          <div class="row">
            <div class="col-12">
              <div class="d-flex align-items-center justify-content-between">
                <span class="text-muted">Divisi</span>
                <span class="font-weight-bold text-gray-900">{{ $memberdivisi ?? '-' }}</span>
              </div>
            </div>
            <div class="col-12 mt-2">
              <div class="d-flex align-items-center justify-content-between">
                <span class="text-muted">Lokasi Kerja</span>
                <span class="font-weight-bold text-gray-900">{{ $memberlokasikerja ?? '-' }}</span>
              </div>
            </div>
            <div class="col-12 mt-2">
              <div class="d-flex align-items-center justify-content-between">
                <span class="text-muted">Status</span>
                <span class="font-weight-bold text-gray-900">{{ $memberstatus ?? '-' }}</span>
              </div>
            </div>
          </div>

          <div class="mt-3">
            <div class="d-flex">
              <a href="{{ route('member.edit', session('no_karyawan')) }}" class="btn btn-primary btn-sm flex-fill mr-2">Lihat Profil</a>
              <button class="btn btn-outline-secondary btn-sm" onclick="window.print()" type="button">
                Cetak
              </button>
            </div>
          </div>

          <div class="mt-2 small text-muted">
            Gunakan tombol <b>Cetak</b> untuk dijadikan fisik (format tergantung browser print).
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-8 col-lg-7">
      <div class="card shadow h-100 border-left-info">
        <div class="card-body">
          <h5 class="font-weight-bold text-info mb-3">Ringkasan Aktivitas</h5>
          <div class="row">
            <div class="col-md-4 mb-3">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tampilan</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalviews ?? 0 }}</div>
            </div>
            <div class="col-md-4 mb-3">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Suka</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totallikes ?? 0 }}</div>
            </div>
            <div class="col-md-4 mb-3">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Tidak Suka</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totaldislikes ?? 0 }}</div>
            </div>
          </div>
          <div class="text-muted" style="font-size:14px;">Gunakan menu di kiri untuk mengelola data anggota & konten website.</div>
        </div>
      </div>
    </div>
  </div>
  <!-- Content Row -->
  <div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                Jumlah Anggota
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $allmember }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Jumlah Berita
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $allberita }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-list-alt fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                Jumlah Informasi
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $allinformasi }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-list-alt fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                Jumlah Foto
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $allgaleri }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-image fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                Jumlah Tampilan
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalviews }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-eye fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                Jumlah Suka
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totallikes }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-thumbs-up fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Jumlah Tidak Suka
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totaldislikes }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-thumbs-down fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                Jumlah Komentar
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalcomments }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
      

  <!-- Content Row -->
  <div class="row">
    <div class="col-lg-6 mb-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Anggota Berdasarkan Jenis Kelamin</h6>
        </div>
        <div class="card-body">
          @forelse ($memberbyjeniskelamin as $jk)
            <h4 class="small font-weight-bold">{{ $jk->jenis_kelamin}} <span class="float-right">{{ $jk->total }}</span></h4>
            <div class="progress mb-4">
              <div class="progress-bar" role="progressbar" style="width: {{ ($jk->total * 100) / $allmember }}%" aria-valuenow="{{ $jk->total }}" aria-valuemin="0" aria-valuemax="{{ $allmember }}"></div>
            </div>
          @empty
          @endforelse
        </div>
      </div>
    </div>

    <div class="col-lg-6 mb-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-success">Anggota Berdasarkan Status Pegawai</h6>
        </div>
        <div class="card-body">
          @forelse ($memberbystatuskaryawan as $member)
            <h4 class="small font-weight-bold">{{ $member->status_karyawan}} <span class="float-right">{{ $member->total }}</span></h4>
            <div class="progress mb-4">
              <div class="progress-bar bg-success" role="progressbar" style="width: {{ ($member->total * 100) / $allmember }}%" aria-valuenow="{{ $member->total }}" aria-valuemin="0" aria-valuemax="{{ $allmember }}"></div>
            </div>
          @empty
          @endforelse
        </div>
      </div>
    </div>
  </div>
    
  <div class="row">
    <div class="col-lg-6 mb-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-info">Anggota Berdasarkan Lokasi Kerja</h6>
        </div>
        <div class="card-body">
          @forelse ($memberbylokasikerja as $lokasi)
            <h4 class="small font-weight-bold">{{ $lokasi->lokasi_kerja}} <span class="float-right">{{ $lokasi->total }}</span></h4>
            <div class="progress mb-4">
              <div class="progress-bar bg-info" role="progressbar" style="width: {{ ($lokasi->total * 100) / $allmember }}%" aria-valuenow="{{ $lokasi->total }}" aria-valuemin="0" aria-valuemax="{{ $allmember }}"></div>
            </div>
          @empty
          @endforelse
        </div>
      </div>
    </div>
    <div class="col-lg-6 mb-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-danger">Anggota Berdasarkan Direktorat</h6>
        </div>
        <div class="card-body">
          @forelse ($memberbydirektorat as $dir)
            <h4 class="small font-weight-bold">{{ $dir->direktorat}} <span class="float-right">{{ $dir->total }}</span></h4>
            <div class="progress mb-4">
              <div class="progress-bar bg-danger" role="progressbar" style="width: {{ ($dir->total * 100) / $allmember }}%" aria-valuenow="{{ $dir->total }}" aria-valuemin="0" aria-valuemax="{{ $allmember }}"></div>
            </div>
          @empty
          @endforelse
        </div>
      </div>
    </div>
  </div>
@include('admin_pages/templates/footer')