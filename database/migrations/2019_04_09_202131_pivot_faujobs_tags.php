<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PivotFaujobsTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pivot_faujobs_business_service_add_tags', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('fau_job_id')->nullable();
            $table->foreign(['fau_job_id'])->references('id')->on('fau_jobs')
                ->onDelete('cascade');

            $table->unsignedInteger('fau_tag_id')->nullable();
            $table->foreign(['fau_tag_id'])->references('id')->on('fau_tags')
                ->onDelete('cascade');

            $table->unsignedInteger('business_id')->nullable();
            $table->foreign(['business_id'])->references('id')->on('businesses')
                ->onDelete('cascade');

            $table->unsignedInteger('service_id')->nullable();
            $table->foreign(['service_id'])->references('id')->on('services')
                ->onDelete('cascade');

            $table->unsignedInteger('add_id')->nullable();
            $table->foreign(['add_id'])->references('id')->on('adds')
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
        Schema::dropIfExists('pivot_faujobs_business_service_add_tags');
    }
}
