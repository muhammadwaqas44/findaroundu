<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('main_country_id')->unsigned()->nullable();
            $table->foreign(['main_country_id'])->references('id')->on('main_countries')
                ->onDelete('cascade');

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign(['user_id'])->references('id')->on('users')
                ->onDelete('cascade');

            $table->integer('main_state_id')->unsigned()->nullable();
            $table->foreign(['main_state_id'])->references('id')->on('main_states')
                ->onDelete('cascade');

            $table->integer('main_city_id')->unsigned()->nullable();
            $table->foreign(['main_city_id'])->references('id')->on('main_cities')
                ->onDelete('cascade');

            $table->string('address','5000')->nullable();

            $table->integer('service_id')->unsigned()->nullable();
            $table->foreign(['service_id'])->references('id')->on('services')
                ->onDelete('cascade');

            $table->integer('add_id')->unsigned()->nullable();
            $table->foreign(['add_id'])->references('id')->on('adds')
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
        Schema::dropIfExists('addresses');
    }
}
