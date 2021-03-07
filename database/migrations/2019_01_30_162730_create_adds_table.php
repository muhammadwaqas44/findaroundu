<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('profile_image','1055');
            $table->enum('condition',['Used','New']);
            $table->string('description','5000');

            $table->string('lat','100')->nullable();
            $table->string('long','100')->nullable();

            $table->string('price');
            $table->string('title','1000');
            $table->boolean('is_active')->default(true);

            $table->enum('is_approve',['Approve','Not Approve','Rejected'])->default('Not Approve');


            $table->string('video_url','1000')->nullable();
            $table->string('facebook_url','1000')->nullable();
            $table->string('gmail_url','1000')->nullable();
            $table->string('twitter_url','1000')->nullable();

            $table->integer('created_by')->unsigned();
            $table->foreign(['created_by'])->references('id')->on('users')
                ->onDelete('cascade');

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
        Schema::dropIfExists('adds');
    }
}
