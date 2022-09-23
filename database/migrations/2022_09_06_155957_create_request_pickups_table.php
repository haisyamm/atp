<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestPickupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_pickups', function (Blueprint $table) {
            $table->id();
            $table->string('no_resi');
            $table->text('alamat_pengirim');
            $table->integer('no_hp');
            $table->datetime('tgl_pickup');
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
        Schema::dropIfExists('request_pickups');
    }
}
