<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcriptionPlanPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_plan_packages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('module_id')->unsigned();
            $table->foreign(['module_id'])->references('id')->on('main_modules')->onDelete('cascade');
            $table->integer('plan_id')->unsigned();
            $table->foreign(['plan_id'])->references('id')->on('subscription_plans')->onDelete('cascade');
            $table->string('stripe_plan_id');
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
        Schema::dropIfExists('subcription_plan_packages');
    }
}
