<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign(['user_id'])->references('id')->on('users')
                ->onDelete('cascade');

            $table->integer('service_id')->unsigned()->nullable();
            $table->foreign(['service_id'])->references('id')->on('services')
                ->onDelete('cascade');

            $table->integer('business_id')->unsigned()->nullable();
            $table->foreign(['business_id'])->references('id')->on('businesses')
                ->onDelete('cascade');

            $table->integer('add_id')->unsigned()->nullable();
            $table->foreign(['add_id'])->references('id')->on('adds')
                ->onDelete('cascade');



            $table->string('name','200');
            $table->string('email','100');
            $table->string('phone','100');
            $table->integer('rating');
            $table->string('review','5000');
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
        Schema::dropIfExists('reviews');
    }
}
