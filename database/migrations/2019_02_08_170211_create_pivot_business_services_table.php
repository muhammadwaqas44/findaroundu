<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotBusinessServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pivot_business_services', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('service_id')->unsigned();
            $table->foreign(['service_id'])->references('id')->on('services')->onDelete('cascade');

            $table->integer('business_id')->unsigned();
            $table->foreign(['business_id'])->references('id')->on('businesses')->onDelete('cascade');

            $table->unique(['business_id', 'service_id']);

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
        Schema::dropIfExists('pivot_business_services');
    }
}
