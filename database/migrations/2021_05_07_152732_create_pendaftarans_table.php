<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('no_bpjs', 15);
            $table->string('nama', 50);
            $table->string('nama_bpk', 50)->nullable();
            $table->string('nama_ibu', 50)->nullable();
            $table->date('tgl_lahir');
            $table->enum('jenis_kelamin',['laki-laki','perempuan']);
            $table->text('alamat')->nullable();
            $table->string('rt_rw', 20)->nullable();
            $table->integer('berat_badan_lahir');
            $table->integer('panjang_badan_lahir');
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
        Schema::dropIfExists('pendaftarans');
    }
}
