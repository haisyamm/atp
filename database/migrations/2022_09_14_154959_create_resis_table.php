<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resis', function (Blueprint $table) {
            $table->id();
            $table->string('no_resi');
            $table->date('tgl_resi');
            $table->string('servis');
            $table->string('no_reff')->nullable();;
            $table->string('no_pickup')->nullable();
            $table->datetime('tgl_pickup')->nullable();
            $table->string('pengirim');
            $table->text('alamat_pengirim');
            $table->string('tlp_pengirim');
            $table->string('penerima');
            $table->text('alamat_penerima');
            $table->string('tlp_penerima');
            $table->string('payment');
            $table->integer('ppn')->nullable();
            $table->integer('asuransi')->nullable();
            $table->integer('packing')->nullable();
            $table->integer('others')->nullable();
            $table->integer('total_berat');
            $table->integer('total_biaya');
            $table->boolean('is_do')->nullable();
            $table->boolean('is_print')->nullable();
            $table->text('cancel')->nullable();
            $table->text('detail_barang');
            $table->text('tracking')->nullable();
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
        Schema::dropIfExists('resis');
    }
}
