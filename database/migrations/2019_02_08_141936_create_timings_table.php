<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('_to');
            $table->string('_from');

            $table->integer('business_id')->unsigned()->nullable();
            $table->foreign(['business_id'])->references('id')->on('businesses')->onDelete('cascade');

            $table->enum('day',['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'])->nullable();
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
        Schema::dropIfExists('timings');
    }
}
