<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title','1000');
            $table->string('founded_in')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('video_url','1000')->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('gmail_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('description');
            $table->string('website_url')->nullable();
            $table->string('location',1000);

            $table->boolean('is_active')->default(true);
            $table->enum('is_approve',['Approve','Not Approve','Rejected'])->default('Not Approve');

            $table->integer('created_by')->unsigned();
            $table->foreign(['created_by'])->references('id')->on('users')
                ->onDelete('cascade');

            $table->string('profile_image','500');
            $table->integer('agent_admin_id')->nullable()->unsigned();
            $table->foreign(['agent_admin_id'])->references('id')->on('users')
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
        Schema::dropIfExists('businesses');
    }
}
