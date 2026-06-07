<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftaran_anggota', function (Blueprint $table) {
            $table->id();

            // Identitas/inti yang diperlukan
            $table->string('no_karyawan')->unique();
            $table->string('nik')->nullable();
            $table->string('nik_sptj')->nullable();
            $table->string('nama_lengkap');

            $table->string('tempat_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();

            $table->string('kd_jenis_kelamin')->nullable();
            $table->string('kd_status_perkawinan')->nullable();
            $table->string('kd_agama')->nullable();

            // Data kerja (boleh kosong sesuai requirement)
            $table->string('kd_direktorat')->nullable();
            $table->string('kd_divisi')->nullable();
            $table->string('kd_departemen')->nullable();
            $table->string('kd_jabatan')->nullable();
            $table->string('kd_lokasi_kerja')->nullable();
            $table->string('kd_status_karyawan')->nullable();

            // Foto anggota (base64 data URI)
            $table->longText('foto_diri')->nullable();

            // Workflow approval
            $table->string('status')->default('pending'); // pending|approved|rejected
            $table->string('approved_by')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->string('rejected_by')->nullable();
            $table->timestamp('rejected_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_anggota');
    }
};
