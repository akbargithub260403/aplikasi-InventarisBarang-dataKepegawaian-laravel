<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nama',255);
            $table->string('nip',100);
            $table->string('gol_pangkat',255);
            $table->string('tmt_pangkat',255);
            $table->string('nama_jabatan',255);
            $table->string('tmt_jabatan',255);
            $table->string('th_mk',255);
            $table->string('bi_mk',255);
            $table->string('nama_latihan_jabatan',255);
            $table->string('bl_latihan_jabatan',255);
            $table->string('jml_latihan_jabatan',255);
            $table->string('nama_pendidikan',255);
            $table->string('lulus_pendidikan',255);
            $table->string('ijazah_pendidikan',255);
            $table->string('tanggal_lahir',255);
            $table->string('ct_mutasi_kepeg',255);
            $table->string('ct_keterangan',255);
            $table->string('gambar',255);
            
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
        Schema::dropIfExists('data_pegawai');
    }
}
