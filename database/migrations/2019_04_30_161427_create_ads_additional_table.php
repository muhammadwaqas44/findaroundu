<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsAdditionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads_additional_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key')->nullable();
            $table->string('value')->nullable();
            $table->unsignedInteger('ad_id')->nullable();
            $table->foreign(['ad_id'])->references('id')->on('adds')
                ->onDelete('cascade');
            $table->string('type');
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
        Schema::dropIfExists('ads_additional_fields');
    }
}
