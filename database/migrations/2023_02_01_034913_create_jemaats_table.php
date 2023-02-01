<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jemaats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kk_id');
            $table->string('nik');
            $table->string('nama');
            $table->string('tempatLahir');
            $table->string('tglLahir');
            $table->string('jenisKelamin');
            $table->string('golDarah');
            $table->string('pekerjaan');
            $table->text('statusKeluarga');
            $table->text('nomorHp');
            $table->text('foto')->nullable();
            $table->text('sidi');
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
        Schema::dropIfExists('jemaats');
    }
};
