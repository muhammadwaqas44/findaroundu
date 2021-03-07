<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('main_cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('state_id');
      //      $table->timestamp('created_at')->useCurrent();
      //      $table->timestamp('updated_at')->useCurrent();
        });

        Schema::create('main_countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phonecode');
            $table->string('country_code');
          //  $table->timestamps();
        });


        Schema::create('main_states', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id');
            $table->string('name');
        //    $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('main_countries');
        Schema::dropIfExists('main_states');
        Schema::dropIfExists('main_cities');
    }
}
