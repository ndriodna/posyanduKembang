<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ResidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 20);
            $table->string('nama', 50);
            $table->text('tempat_tgl_lahir');
            $table->enum('jenis_kelamin',['laki-laki','perempuan']);
            $table->text('alamat');
            $table->string('rt_rw', 20)->nullable();
            $table->string('kel_desa', 50)->nullable();
            $table->string('kecamatan', 50)->nullable();
            $table->string('agama', 20)->nullable();
            $table->string('status_perkawinan', 20)->nullable();
            $table->string('pekerjaan', 50)->nullable();
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
