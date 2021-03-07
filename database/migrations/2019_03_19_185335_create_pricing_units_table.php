<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricingUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricing_units', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qty')->unsigned()->nullable();
            $table->string('price')->nullable();
            $table->integer('subscription_plan_feature_id')->unsigned()->nullable();

            $table->foreign(['subscription_plan_feature_id'])->references('id')->on('subscription_plan_features')
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
        Schema::dropIfExists('pricing_units');
    }
}
