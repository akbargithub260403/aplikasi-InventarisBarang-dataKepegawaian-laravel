<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLastdataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lastdata', function (Blueprint $table) {
            $table->id();
            $table->string('nama_prodi',255)->nullable();
            $table->bigInteger('kode_barang');
            $table->string('nama_barang');
            $table->string('jenis_barang');
            $table->string('lokasi');
            $table->bigInteger('jumlah_barang');
            $table->string('sumber_dana');
            $table->bigInteger('harga_barang');
            $table->string('kondisi');
            $table->string('thn_peroleh');
            $table->string('gambar',255);
            $table->text('keterangan');
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
        Schema::dropIfExists('lastdata');
    }
}
