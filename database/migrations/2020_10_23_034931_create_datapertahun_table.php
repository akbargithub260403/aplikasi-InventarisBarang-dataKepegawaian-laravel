<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatapertahunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datapertahun', function (Blueprint $table) {
            $table->id();
            $table->string('tahun');
            $table->bigInteger('NON_BNSP');
            $table->bigInteger('BPPTnbh');
            $table->bigInteger('KERJASAMA');
            $table->bigInteger('IGU');
            $table->bigInteger('INTEGRASI');
            $table->bigInteger('jumlah_total');
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
        Schema::dropIfExists('datapertahun');
    }
}
