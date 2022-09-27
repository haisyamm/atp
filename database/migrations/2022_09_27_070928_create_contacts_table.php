<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->text('address');
            $table->text('maps_link');
            $table->string('ho_telp');
            $table->string('ho_email');
            $table->string('oo_telp');
            $table->string('oo_email');
            $table->string('mo_telp');
            $table->string('mo_email');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('whatsapp');
            $table->string('youtube');
            $table->string('linkedin');
            $table->string('telegram');
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
        Schema::dropIfExists('contacts');
    }
}
