<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('dokumen', function (Blueprint $table) {
            $table->string('ekstensi', 50)->nullable()->after('mime_type');
            $table->string('original_filename', 255)->nullable()->after('ekstensi');
        });
    }

    public function down()
    {
        Schema::table('dokumen', function (Blueprint $table) {
            $table->dropColumn(['ekstensi', 'original_filename']);
        });
    }
};

