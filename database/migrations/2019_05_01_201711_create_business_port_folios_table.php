<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessPortFoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_port_folios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('website_url')->nullable();
            $table->string('profile_image');

            $table->unsignedInteger('business_id');
            $table->foreign(['business_id'])->references('id')->on('businesses')
                ->onDelete('cascade');

            $table->text('description');
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
        Schema::dropIfExists('business_port_folios');
    }
}
