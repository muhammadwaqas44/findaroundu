<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddOnsPlansPivot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_pivot_addon_plans', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('subscription_addon_id');
            $table->foreign(['subscription_addon_id'])->references('id')->on('subscription_addons')
                ->onDelete('cascade');

            $table->unsignedInteger('subscription_plan_id');
            $table->foreign(['subscription_plan_id'])->references('id')->on('subscription_plans')
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
        Schema::dropIfExists('subscription_pivot_addon_plans');
    }
}
