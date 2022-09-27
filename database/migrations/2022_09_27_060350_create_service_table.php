<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service', function (Blueprint $table) {
            $table->id();
            $table->string('service_icon1');
            $table->string('service_value1');
            $table->text('service_desc1');
            $table->string('service_icon2');
            $table->string('service_value2');
            $table->text('service_desc2');
            $table->string('service_icon3');
            $table->string('service_value3');
            $table->text('service_desc3');
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
        Schema::dropIfExists('service');
    }
}
