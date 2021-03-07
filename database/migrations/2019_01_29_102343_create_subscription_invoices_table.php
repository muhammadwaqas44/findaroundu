<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_invoices', function (Blueprint $table) {
            $table->increments('id');

            $table->string('invoice_name')->nullable();
            $table->string('plan_price')->nullable();
            $table->string('setup_price')->nullable();
            $table->string('total_amount')->nullable();

            $table->integer('subscription_id')->unsigned()->nullable();
            $table->foreign(['subscription_id'])->references('id')->on('subscriptions')->onDelete('cascade');

            $table->integer('created_by')->unsigned()->nullable();
            $table->foreign(['created_by'])->references('id')->on('users')->onDelete('cascade');



            $table->string('description')->nullable();
            $table->enum('is_paid', ['due', 'paid']);
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
        Schema::dropIfExists('subscription_invoices');
    }
}
