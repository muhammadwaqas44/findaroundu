<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('invoice_name','2000')->nullable();
            $table->string('description','2000')->nullable();
            $table->string('comment','2000')->nullable();
            $table->integer('setup_cost')->nullable();
            $table->string('bill_every_count');
            $table->string('bill_cycle')->nullable();
            $table->boolean('active')->default(true);
            $table->enum('bill_period_unit',['Year','Month','Day','Week']);
            $table->string('trial_limit_count')->nullable();
            $table->enum('trial_period_unit',['Month','Day'])->nullable();
            $table->string('redirect_url')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign(['user_id'])->references('id')->on('users')
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
        Schema::dropIfExists('subscription_plans');
    }
}
