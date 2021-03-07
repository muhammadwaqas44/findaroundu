<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubscriptionPivotAddonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_pivot_addons', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('active')->default(true);

            $table->integer('subscription_id')->unsigned();
            $table->foreign(['subscription_id'])->references('id')->on('subscriptions')->onDelete('cascade');

            $table->integer('subscription_addon_id')->unsigned();
            $table->foreign(['subscription_addon_id'])->references('id')->on('subscription_addons')->onDelete('cascade');

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
        Schema::dropIfExists('subscription_pivot_addons');
    }
}
