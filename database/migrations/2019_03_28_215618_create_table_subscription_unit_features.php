<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSubscriptionUnitFeatures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_addon_unit_features', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedInteger('plan_feature_id');
            $table->foreign(['plan_feature_id'])->references('id')->on('subscription_plan_features')
                ->onDelete('cascade');

            $table->integer('price');

            $table->unsignedInteger('subscription_addon_id');
            $table->foreign(['subscription_addon_id'])->references('id')->on('subscription_addons')
                ->onDelete('cascade');

            $table->integer('quantity');

            $table->unsignedInteger('pricing_unit_id');
            $table->foreign(['pricing_unit_id'])->references('id')->on('pricing_units')
                ->onDelete('cascade');


            $table->unsignedInteger('site_id');
            $table->foreign(['site_id'])->references('id')->on('sites')
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
        Schema::dropIfExists('subscription_addon_unit_features');
    }
}
