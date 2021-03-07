<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryCitiesPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pivot_country_city', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id')->unsigned();
            $table->foreign(['country_id'])->references('id')->on('main_countries')->onDelete('cascade');
            $table->integer('city_id')->unsigned();
            $table->foreign(['city_id'])->references('id')->on('main_cities')->onDelete('cascade');
            $table->integer('order_no')->default(0);
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
        Schema::dropIfExists('pivot_country_city');
    }
}
