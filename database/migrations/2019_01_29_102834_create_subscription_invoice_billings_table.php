<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionInvoiceBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_invoice_billings', function (Blueprint $table) {
            $table->increments('id');

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('company_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('address');
            $table->string('city')->nullable();
            $table->string('zip')->nullable();


            $table->integer('country_id')->unsigned();
            $table->foreign(['country_id'])->references('id')->on('main_countries')
                ->onDelete('cascade');
            $table->string('state')->nullable();

            $table->integer('subscription_invoice_id')->unsigned()->nullable();
            $table->foreign(['subscription_invoice_id'])->references('id')->on('subscription_invoices')->onDelete('cascade');

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
        Schema::dropIfExists('subscription_invoice_billings');
    }
}
