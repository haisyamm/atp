<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterHargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_hargas', function (Blueprint $table) {
            $table->id();
            $table->integer('asal_id');
            $table->integer('tujuan_id');
            $table->string('asal_area');
            $table->string('tujuan_area');
            $table->string('alamat_asal');
            $table->string('alamat_tujuan');
            $table->text('harga');
            $table->text('estimasi');
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
        Schema::dropIfExists('master_hargas');
    }
}
