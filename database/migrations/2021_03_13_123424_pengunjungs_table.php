<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PengunjungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengunjungs', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 20);
            $table->string('nama', 50);
            $table->date('tgl_lahir');
            $table->enum('jenis_kelamin',['laki-laki','perempuan']);
            $table->enum('kategori',['ibu hamil','anak-anak','balita']);
            $table->text('alamat')->nullable();
            $table->string('rt_rw', 20)->nullable();
            $table->string('kel_desa', 50)->nullable();
            $table->string('kecamatan', 50)->nullable();
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
        Schema::dropIfExists('residents');
    }
}
