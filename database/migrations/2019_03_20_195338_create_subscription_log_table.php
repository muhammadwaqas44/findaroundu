<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_logs', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('user_id')->nullable();
            $table->foreign(['user_id'])->references('id')->on('users')
                ->onDelete('cascade');

            $table->unsignedInteger('subscription_addon_id')->nullable();
            $table->foreign(['subscription_addon_id'])->references('id')->on('subscription_addons')
                ->onDelete('cascade');

            $table->text('json_array')->nullable();

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
        Schema::dropIfExists('subscription_logs');
    }
}
