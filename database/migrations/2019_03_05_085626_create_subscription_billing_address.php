<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionBillingAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_billing_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('company_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('address','2000')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->integer('subscription_id')->unsigned()->nullable();
            $table->foreign(['subscription_id'])->references('id')->on('subscriptions')->onDelete('cascade');
            $table->integer('country_id')->unsigned()->nullable();
            $table->foreign(['country_id'])->references('id')->on('main_countries')
                ->onDelete('cascade')->nullable();
            $table->string('state')->nullable();
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
        Schema::dropIfExists('subscription_billing_addresses');
    }
}
