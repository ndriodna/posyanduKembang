<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelayananPencatatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelayanan_pencatatan', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('pelayanan_id');
            $table->unsignedBigInteger('pencatatan_id');
            $table->timestamps();

            $table->foreign('pelayanan_id')->references('id')->on('pelayanans')->onDelete('cascade');
            $table->foreign('pencatatan_id')->references('id')->on('pencatatans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelayanan_pencatatan');
    }
}
