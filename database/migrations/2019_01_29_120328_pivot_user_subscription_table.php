<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PivotUserSubscriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_pivot_user_subscriptions', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign(['user_id'])->references('id')->on('users')
                ->onDelete('cascade');

            $table->integer('subscription_id')->unsigned()->nullable();
            $table->foreign(['subscription_id'])->references('id')->on('subscriptions')
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
        Schema::dropIfExists('subscription_pivot_user_subscriptions');
    }
}
