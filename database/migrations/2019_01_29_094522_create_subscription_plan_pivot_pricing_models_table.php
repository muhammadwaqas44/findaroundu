<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionPlanPivotPricingModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_plan_pivot_pricing_models', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('addon_id')->unsigned()->nullable();

            $table->string('price')->nullable();
            $table->string('setup_price')->nullable();

            $table->integer('pricing_model_id')->unsigned();
            $table->foreign(['pricing_model_id'])->references('id')->on('subscription_pricing_models')
                ->onDelete('cascade');

            $table->integer('plan_id')->unsigned()->nullable();
            $table->foreign(['plan_id'])->references('id')->on('subscription_plans')
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
        Schema::dropIfExists('subscription_plan_pivot_pricing_models');
    }
}
