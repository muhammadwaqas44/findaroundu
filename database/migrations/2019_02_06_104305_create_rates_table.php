<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->increments('id');

            $table->enum('price_type',['Project Base','Hourly Base']);
            $table->string('rate');

            $table->integer('service_id')->unsigned()->nullable();
            $table->foreign(['service_id'])->references('id')->on('services')
                ->onDelete('cascade');

            $table->integer('business_id')->unsigned()->nullable();
            $table->foreign(['business_id'])->references('id')->on('businesses')
                ->onDelete('cascade');

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
        Schema::dropIfExists('rates');
    }
}
