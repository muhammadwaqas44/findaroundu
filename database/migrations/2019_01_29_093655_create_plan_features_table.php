<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_plan_features', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('site_id')->unsigned();
            $table->integer('subscription_plan_id')->unsigned()->nullable();
            $table->foreign(['subscription_plan_id'])->references('id')->on('subscription_plans')->onDelete('cascade');
            $table->integer('quantity')->nullable();
            $table->integer('subscription_addon_id')->unsigned()->nullable();
            $table->string('price')->nullable();
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
        Schema::dropIfExists('subscription_plan_features');
    }
}
