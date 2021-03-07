<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->integer('subscription_plan_id')->unsigned();

            $table->string('subscription_status')->nullable();

            $table->integer('created_by')->unsigned();
            $table->foreign(['created_by'])->references('id')->on('users')
                ->onDelete('cascade');


            $table->integer('user_id')->unsigned();
            $table->foreign(['user_id'])->references('id')->on('users')
                ->onDelete('cascade');

            $table->integer('subscription_plan_package_id')->unsigned();

            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();


            $table->string('stripe_subscription_id')->nullable();

            $table->string('total_price')->nullable();

            $table->dateTime('cancelled_at')->nullable();
            $table->enum('active',['active','cancel'])->default('active');
            $table->enum('invoice_now',['now','unbilled']);
            $table->string('billing_count_cycles');
            $table->boolean('shipping_to_bill_address')->default(false);
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
        Schema::dropIfExists('subscriptions');
    }
}
