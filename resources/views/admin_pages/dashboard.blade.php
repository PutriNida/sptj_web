@include('admin_pages/templates/header') 
<div class="container-fluid py-4">
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
              <div class="progress-bar" role="progressbar" style="width: {{ ($jk->total * 100) / $allmember }}%" aria-valuenow="$member->total" aria-valuemin="0" aria-valuemax="{{ $allmember }}"></div>
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
              <div class="progress-bar bg-success" role="progressbar" style="width: {{ ($member->total * 100) / $allmember }}%" aria-valuenow="$member->total" aria-valuemin="0" aria-valuemax="{{ $allmember }}"></div>
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
              <div class="progress-bar bg-info" role="progressbar" style="width: {{ ($lokasi->total * 100) / $allmember }}%" aria-valuenow="$member->total" aria-valuemin="0" aria-valuemax="{{ $allmember }}"></div>
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
              <div class="progress-bar bg-danger" role="progressbar" style="width: {{ ($dir->total * 100) / $allmember }}%" aria-valuenow="$member->total" aria-valuemin="0" aria-valuemax="{{ $allmember }}"></div>
            </div>
          @empty
          @endforelse
        </div>
      </div>
    </div>
  </div>
@include('admin_pages/templates/footer')