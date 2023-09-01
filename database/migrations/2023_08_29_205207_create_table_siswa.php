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
            $table->text('alamat_rumah');
            $table->string('telepon');
            $table->string('asal_sekolah');
            $table->text('alamat_sekolah');
            $table->string('telepon_sekolah');
            $table->string('nama_orangtua');
            $table->string('telepon_orangtua');
            $table->string('berkas_kk');
            $table->string('rapot');
            $table->unsignedBigInteger('totalbiaya_id');
            $table->timestamps();

            $table->foreign('totalbiaya_id')->references('id')->on('total_biaya');
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
