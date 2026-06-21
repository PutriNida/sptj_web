@extends('admin_pages/templates/layout')
@section('content')
<div class="container-fluid py-4">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong>Sukses!</strong> {{session('success')}}</span>
            <a href="{{ Session::forget('success'); }}" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </a>
        </div>
    @elseif(session('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong>Kesalahan!</strong> {{session('error')}}</span>
            <a href="{{ Session::forget('error'); }}" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </a>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Upload Struktur Organisasi</h6>
                    <a href="{{ route('admin_struktur_anggota.index') }}" class="btn btn-secondary btn-sm ms-auto">Kembali</a>
                </div>

                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admin_struktur_anggota.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group row mb-3">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="no_karyawan_search">Cari Anggota:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="no_karyawan_search" placeholder="Ketik nama / no karyawan..." autocomplete="off">

                                <div class="mt-2" id="anggota_list_wrap" style="display:none;">
                                    <ul class="list-group" id="anggota_list" style="max-height:220px; overflow:auto;"></ul>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-3" style="display:none;" >
                            <label class="control-label col-sm-3 align-self-center mb-0" for="no_karyawan">No Karyawan Terpilih:</label>
                            <div class="col-sm-9">
                                <select class="form-control d-none" id="no_karyawan" name="no_karyawan" required>
                                    <option value="">-- Pilih Anggota --</option>
                                    @forelse ($anggota as $a)
                                        <option value="{{ $a->no_karyawan }}" data-nama="{{ $a->nama_lengkap }}">{{ $a->nama_lengkap }} ({{ $a->no_karyawan }})</option>
                                    @empty
                                        <option value="">Anggota tidak ditemukan</option>
                                    @endforelse
                                </select>

                                <input type="text" class="form-control" id="no_karyawan_selected" value="" placeholder="Belum ada anggota dipilih" readonly>

                                @error('no_karyawan')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-3">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="gambar">Gambar Anggota:</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="gambar" name="gambar[]" multiple required>
                                <small class="form-text text-muted">Pilih satu atau lebih gambar untuk diupload.</small>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="keterangan">Keterangan:</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Masukkan keterangan untuk gambar struktur"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="control-label col-sm-3 align-self-center mb-0">Opsi Simpan:</label>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="save" id="publish" value="publish" checked>
                                    <label class="form-check-label" for="publish">Publikasikan</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="save" id="draft" value="draft">
                                    <label class="form-check-label" for="draft">Simpan sebagai Draft</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="btn btn-primary">Upload</button>
                                <a href="{{ route('admin_struktur_anggota.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    (function () {
        const searchEl = document.getElementById('no_karyawan_search');
        const selectEl = document.getElementById('no_karyawan');
        const wrapEl = document.getElementById('anggota_list_wrap');
        const listEl = document.getElementById('anggota_list');
        if (!searchEl || !selectEl || !wrapEl || !listEl) return;

        const options = Array.from(selectEl.options);

        // tampilkan field read-only saat anggota dipilih
        // tidak menampilkan input selected; cukup set value select saat item diklik
        function syncSelectedValue() {
            const opt = selectEl.selectedOptions && selectEl.selectedOptions[0];
            // noop: value select sudah diset saat klik
            return !!opt;
        }

        syncSelectedValue();

        selectEl.addEventListener('change', syncSelectedValue);


        function norm(v) { return (v || '').toString().toLowerCase().trim(); }

        function render(q) {
            const query = norm(q);
            listEl.innerHTML = '';

            if (!query) {
                wrapEl.style.display = 'none';
                return;
            }

            const matches = options
                .map(function (opt, idx) {
                    if (idx === 0) return null; // placeholder
                    const nama = norm(opt.dataset.nama);
                    const text = norm(opt.textContent);
                    return (nama.includes(query) || text.includes(query)) ? opt : null;
                })
                .filter(Boolean)
                .slice(0, 20);

            if (matches.length === 0) {
                wrapEl.style.display = 'block';
                listEl.innerHTML = '<li class="list-group-item">Anggota tidak ditemukan</li>';
                return;
            }

            wrapEl.style.display = 'block';
            matches.forEach(function (opt) {
                const li = document.createElement('li');
                li.className = 'list-group-item list-group-item-action';
                li.textContent = opt.textContent;
                li.addEventListener('click', function () {
                    selectEl.value = opt.value;
                    searchEl.value = opt.textContent;
                    wrapEl.style.display = 'none';
                });
                listEl.appendChild(li);
            });
        }

        searchEl.addEventListener('input', function () {
            render(searchEl.value);
        });

        searchEl.addEventListener('blur', function () {
            setTimeout(function () { wrapEl.style.display = 'none'; }, 150);
        });

        searchEl.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                wrapEl.style.display = 'none';
            }
        });
    })();
</script>

@stop

