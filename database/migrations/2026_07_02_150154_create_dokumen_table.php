<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kd_jenis_dokumen')->constrained('master_jenis_dokumen')->cascadeOnDelete();
            $table->string('nama');
            $table->text('file_base64');
            $table->string('mime_type')->nullable();
            $table->unsignedBigInteger('ukuran')->nullable();
            $table->longText('keterangan')->nullable();
            $table->boolean('publish')->default(false);
            $table->dateTime('publish_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokumen');
    }
};
