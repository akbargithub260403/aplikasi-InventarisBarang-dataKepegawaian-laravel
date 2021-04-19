<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersadminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usersadmin', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('email')->unique();
            $table->string('ttl',255);
            $table->string('nip',100);
            $table->string('unit_kerja',100);
            $table->string('password',100);
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
        Schema::dropIfExists('usersadmin');
    }
}
