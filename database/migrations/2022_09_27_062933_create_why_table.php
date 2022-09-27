<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('why', function (Blueprint $table) {
            $table->id();
            $table->string('why_icon1');
            $table->string('why_value1');
            $table->string('why_sub1');
            $table->text('why_desc1');
            $table->string('why_icon2');
            $table->string('why_value2');
            $table->string('why_sub2');
            $table->text('why_desc2');
            $table->string('why_icon3');
            $table->string('why_value3');
            $table->string('why_sub3');
            $table->text('why_desc3');
            $table->string('why_icon4');
            $table->string('why_value4');
            $table->string('why_sub4');
            $table->text('why_desc4');
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
        Schema::dropIfExists('why');
    }
}
