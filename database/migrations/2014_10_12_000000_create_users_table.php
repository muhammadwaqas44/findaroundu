<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->unsigned();
            $table->integer('country_id')->unsigned()->nullable();

            $table->integer('customers_billing_info_id')->nullable();
            $table->string('stripe_customer_id')->nullable();
            $table->string('stripe_subscription_id')->nullable();


            $table->integer('created_by')->unsigned()->nullable();
            $table->foreign(['created_by'])->references('id')->on('users')->onDelete('cascade');

            $table->string('name');


            $table->string('zip')->nullable();


            $table->boolean('is_active')->default(true);
            $table->string('email',50)->nullable();
            $table->string('phone',50)->nullable();
            $table->unique(['phone', 'email']);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
