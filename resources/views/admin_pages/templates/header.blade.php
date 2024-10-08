<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="{{ URL::asset('sptj_img/logo.png'); }}" rel="icon">
    <title>Serikat Pekerja Transportasi Jakarta</title>

    <!-- Custom fonts for this template-->
    <link href="{{ URL::asset('vendor/fontawesome-free/css/all.min.css'); }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('css/sb-admin-2.min.css'); }}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{ URL::asset('vendor/datatables/dataTables.bootstrap4.min.css'); }}" rel="stylesheet">
    <link href="{{ URL::asset('css/richtext.min.css'); }}" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/home') }}">
                <div class="sidebar-brand-icon">
                    <img src="{{ URL::asset('sptj_img/logo.png'); }}" width="40" height="50"/>
                </div>
                <!-- <div class="sidebar-brand-text mx-1">SPTJ</div> -->
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ str_contains(url()->current(), 'home') ? 'active' : ''}}">
                <a class="nav-link" href="{{ url('/home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Karyawan
            </div>

            <li class="nav-item {{ str_contains(url()->current(), '/anggota') ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('member.index') }}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Data Karyawan</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Website
            </div>

            <li class="nav-item {{ str_contains(url()->current(), '/admin_berita') ? 'active' : ''}}">
                <a class="nav-link" href="{{ url('/admin_berita') }}">
                    <i class="fas fa-fw fa-list-alt"></i>
                    <span>Berita</span>
                </a>
            </li>

            <li class="nav-item {{ str_contains(url()->current(), '/admin_informasi') ? 'active' : ''}}">
                <a class="nav-link" href="{{ url('/admin_informasi') }}">
                    <i class="fas fa-fw fa-list-alt"></i>
                    <span>Informasi</span>
                </a>
            </li>

            <li class="nav-item {{ str_contains(url()->current(), '/admin_galeri') ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('admin_galeri.index') }}">
                    <i class="fas fa-fw fa-image"></i>
                    <span>Galeri</span>
                </a>
            </li>

            @if(session('level') == 1)

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master Data
            </div>

            <li class="nav-item             
                {{ str_contains(url()->current(), 'master_jenis_kelamin') ? 'active' : ''}}
                {{ str_contains(url()->current(), 'master_agama')?'active':'' }}
                {{ str_contains(url()->current(), 'master_golongan_darah')? 'active':'' }}
                {{ str_contains(url()->current(), 'master_status_perkawinan')? 'active':'' }}
                {{ str_contains(url()->current(), 'master_hub_keluarga')? 'active':'' }}
                {{ str_contains(url()->current(), 'master_pendidikan')? 'active':'' }}
                {{ str_contains(url()->current(), 'master_tipe_kontak')? 'active':'' }}
                {{ str_contains(url()->current(), 'master_kartu_identitas')? 'active':''}}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePersonal"
                    aria-expanded="true" aria-controls="collapsePersonal">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Master Data Personal</span>
                </a>
                <div id="collapsePersonal" class="collapse             
                {{ str_contains(url()->current(), 'master_jenis_kelamin') ? 'show' : '' }}
                {{ str_contains(url()->current(), 'master_agama')?'show':'' }}
                {{ str_contains(url()->current(), 'master_golongan_darah')? 'show':'' }}
                {{ str_contains(url()->current(), 'master_status_perkawinan')? 'show':'' }}
                {{ str_contains(url()->current(), 'master_hub_keluarga')? 'show':'' }}
                {{ str_contains(url()->current(), 'master_pendidikan')? 'show':'' }}
                {{ str_contains(url()->current(), 'master_tipe_kontak')? 'show':'' }}
                {{ str_contains(url()->current(), 'master_kartu_identitas')? 'show':''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                      <a class="collapse-item {{ str_contains(url()->current(), 'master_jenis_kelamin') ? 'active' : ''}}"  href="{{ url('/master_jenis_kelamin') }}">
                        Jenis Kelamin
                      </a>
                      <a class="collapse-item {{ str_contains(url()->current(), 'master_agama') ? 'active' : ''}}"  href="{{ url('/master_agama') }}">
                        Agama
                      </a>
                      <a class="collapse-item {{ str_contains(url()->current(), 'master_golongan_darah') ? 'active' : ''}}"  href="{{ url('/master_golongan_darah') }}">
                        Golongan Darah
                      </a>
                      <a class="collapse-item {{ str_contains(url()->current(), 'master_status_perkawinan') ? 'active' : ''}}"  href="{{ url('master_status_perkawinan') }}">
                        Status Perkawinan
                      </a>
                      <a class="collapse-item {{ str_contains(url()->current(), 'master_hub_keluarga') ? 'active' : ''}}"  href="{{ url('/master_hub_keluarga') }}">
                        Hubungan Keluarga
                      </a>
                      <a class="collapse-item {{ str_contains(url()->current(), 'master_pendidikan') ? 'active' : ''}}"  href="{{ url('/master_pendidikan') }}">
                        Pendidikan
                      </a>
                      <a class="collapse-item {{ str_contains(url()->current(), 'master_tipe_kontak') ? 'active' : ''}}"  href="{{ url('/master_tipe_kontak') }}">
                        Tipe Kontak
                      </a>
                      <a class="collapse-item {{ str_contains(url()->current(), 'master_kartu_identitas') ? 'active' : ''}}"  href="{{ url('/master_kartu_identitas') }}">
                        Kartu Identitas
                      </a>
                    </div>
                </div>
            </li>
            <li class="nav-item            
                {{ str_contains(url()->current(), 'master_status_karyawan') ? 'active' : '' }}
                {{ str_contains(url()->current(), 'master_lokasi_kerja')?'active':'' }}
                {{ str_contains(url()->current(), 'master_direktorat')? 'active':'' }}
                {{ str_contains(url()->current(), 'master_divisi')? 'active':'' }}
                {{ str_contains(url()->current(), 'master_departemen')? 'active':'' }}
                {{ str_contains(url()->current(), 'master_jabatan')? 'active':'' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKarir"
                    aria-expanded="true" aria-controls="collapseKarir">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Master Data Karir</span>
                </a>
                <div id="collapseKarir" class="collapse            
                {{ str_contains(url()->current(), 'master_status_karyawan') ? 'show' : '' }}
                {{ str_contains(url()->current(), 'master_lokasi_kerja')?'show':'' }}
                {{ str_contains(url()->current(), 'master_direktorat')? 'show':'' }}
                {{ str_contains(url()->current(), 'master_divisi')? 'show':'' }}
                {{ str_contains(url()->current(), 'master_departemen')? 'show':'' }}
                {{ str_contains(url()->current(), 'master_jabatan')? 'show':'' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ str_contains(url()->current(), 'master_status_karyawan') ? 'active' : ''}}"  href="{{ url('/master_status_karyawan') }}">
                          Status Karyawan
                        </a>
                        <a class="collapse-item {{ str_contains(url()->current(), 'master_lokasi_kerja') ? 'active' : ''}}"  href="{{ url('/master_lokasi_kerja') }}">
                          Lokasi Kerja
                        </a>
                        <a class="collapse-item {{ str_contains(url()->current(), 'master_direktorat') ? 'active' : ''}}"  href="{{ url('/master_direktorat') }}">
                          Direktorat
                        </a>
                        <a class="collapse-item {{ str_contains(url()->current(), 'master_divisi') ? 'active' : ''}}"  href="{{ url('/master_divisi') }}">
                          Divisi
                        </a>
                        <a class="collapse-item {{ str_contains(url()->current(), 'master_departemen') ? 'active' : ''}}"  href="{{ url('/master_departemen') }}">
                          Departemen
                        </a>
                        <a class="collapse-item {{ str_contains(url()->current(), 'master_jabatan') ? 'active' : ''}}"  href="{{ url('/master_jabatan') }}">
                          Jabatan
                        </a>
                    </div>
                </div>
            </li>
            <li class="nav-item             
                {{ str_contains(url()->current(), 'master_kategori_berita') ? 'active' : '' }}
                {{ str_contains(url()->current(), 'master_kategori_informasi')?'active':'' }}
                {{ str_contains(url()->current(), 'master_kategori_galeri')? 'active':'' }}
                {{ str_contains(url()->current(), 'master_media_sosial')? 'active':'' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMasterLainnya"
                    aria-expanded="true" aria-controls="collapseMasterLainnya">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Master Data Lainnya</span>
                </a>
                <div id="collapseMasterLainnya" class="collapse             
                {{ str_contains(url()->current(), 'master_kategori_berita') ? 'show' : '' }}
                {{ str_contains(url()->current(), 'master_kategori_informasi')?'show':'' }}
                {{ str_contains(url()->current(), 'master_kategori_galeri')? 'show':'' }}
                {{ str_contains(url()->current(), 'master_media_sosial')? 'show':'' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ str_contains(url()->current(), 'master_kategori_berita') ? 'active' : ''}}"  href="{{ url('/master_kategori_berita') }}">
                          Kategori Berita
                        </a>
                        <a class="collapse-item {{ str_contains(url()->current(), 'master_kategori_informasi') ? 'active' : ''}}"  href="{{ url('/master_kategori_informasi') }}">
                          Kategori Informasi
                        </a>
                        <a class="collapse-item {{ str_contains(url()->current(), 'master_kategori_galeri') ? 'active' : ''}}"  href="{{ url('/master_kategori_galeri') }}">
                          Kategori Galeri
                        </a>
                        <a class="collapse-item {{ str_contains(url()->current(), 'master_media_sosial') ? 'active' : ''}}"  href="{{ url('/master_media_sosial') }}">
                          Media Sosial
                        </a>                        
                    </div>
                </div>
            </li>

            <li class="nav-item {{ str_contains(url()->current(), '/admin_tentang_kami') ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('admin_tentang_kami.index') }}">
                    <i class="fas fa-fw fa-list-alt"></i>
                    <span>Tentang Kami</span>
                </a>
            </li>

            <li class="nav-item {{ str_contains(url()->current(), '/admin_media_sosial') ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('admin_media_sosial.index') }}">
                    <i class="fas fa-fw fa-list-alt"></i>
                    <span>Media Sosial</span>
                </a>
            </li>

            <li class="nav-item {{ str_contains(url()->current(), '/admin_hubungi_kami') ? 'active' : ''}}">
                <a class="nav-link" href="{{ route('admin_hubungi_kami.index') }}">
                    <i class="fas fa-fw fa-list-alt"></i>
                    <span>Hubungi Kami</span>
                </a>
            </li>

            @endif

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow border-bottom-primary">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <h4 class="m-0 font-weight-bold text-primary">
                        Serikat Pekerja Transportasi Jakarta
                    </h4>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ session('nama_lengkap'); }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ URL::asset('img/undraw_profile.svg'); }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</button>
                                </form>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->