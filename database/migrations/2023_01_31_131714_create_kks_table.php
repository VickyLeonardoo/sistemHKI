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
        Schema::create('kks', function (Blueprint $table) {
            $table->id();
            $table->string('nomorKk')->unique();
            $table->text('alamat');
            $table->text('kecamatan');
            $table->text('kelurahan');
            $table->foreignId('wijk_id')->references('id')->on('wijks');
            $table->string('statusRumah');
            $table->enum('is_deleted',['0','1'])->default('0')->comment('0 = False, 1 = True');
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
        Schema::dropIfExists('kks');
    }
};
