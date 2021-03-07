<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name','500');

            $table->integer('add_id')->nullable()->unsigned();
            $table->foreign(['add_id'])->references('id')->on('adds')->onDelete('cascade');

            $table->integer('business_id')->nullable()->unsigned();
            $table->foreign(['business_id'])->references('id')->on('businesses')->onDelete('cascade');

            $table->integer('service_id')->nullable()->unsigned();
            $table->foreign(['service_id'])->references('id')->on('services')->onDelete('cascade');

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
        Schema::dropIfExists('galleries');
    }
}
