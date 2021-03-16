<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->string('no_kk', 20);
            $table->foreignId('kepala_keluarga')->nullable()->constrained('residents');
            $table->text('alamat');
            $table->string('rt_rw');
            $table->string('kode_pos', 10);
            $table->string('kel_desa', 50);
            $table->string('kecamatan', 50);
            $table->string('kab_kota', 50);
            $table->string('provinsi', 50);
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
        Schema::dropIfExists('families');
    }
}
