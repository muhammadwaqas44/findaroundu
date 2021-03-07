<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFauJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fau_jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('task');

            $table->unsignedInteger('business_id')->nullable();
            $table->foreign(['business_id'])->references('id')->on('businesses')->onDelete('cascade');

            $table->text('description')->nullable();
            $table->string('video')->nullable();
            $table->string('audio')->nullable();

            $table->string('type');
            $table->string('location')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->date('date')->nullable();
            $table->integer('number_of_people')->nullable();
            $table->integer('budget')->nullable();

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
        Schema::dropIfExists('fau_jobs');
    }
}
