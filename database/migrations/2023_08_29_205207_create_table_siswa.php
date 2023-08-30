<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin',['Laki-laki','Perempuan']);
            $table->boolean('kebutuhan_khusus')->default(false);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->unsignedBigInteger('detailsiswa_id')->nullable();
            $table->unsignedBigInteger('berkas_id')->nullable();
            $table->unsignedBigInteger('rapor_id')->nullable();
            $table->unsignedBigInteger('sistembayar_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_siswa');
    }
};
