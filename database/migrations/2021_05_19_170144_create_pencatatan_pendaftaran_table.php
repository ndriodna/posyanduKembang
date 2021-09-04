<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePencatatanPendaftaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pencatatan_pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pencatatan_id');
            $table->unsignedBigInteger('pendaftaran_id');
            $table->timestamps();

            $table->foreign('pencatatan_id')->references('id')->on('pencatatans')->onDelete('cascade');
            $table->foreign('pendaftaran_id')->references('id')->on('pendaftarans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pencatatan_pendaftaran');
    }
}
