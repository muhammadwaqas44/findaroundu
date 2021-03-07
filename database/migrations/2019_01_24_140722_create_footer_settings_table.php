<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFooterSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address','2000')->nullable();
            $table->string('phone','2000');
            $table->boolean('is_active')->default(false);
            $table->string('copy_right','2000');
            $table->string('follow_with_us','2000');
            $table->string('left_paragraph','2000');
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
        Schema::dropIfExists('footer_settings');
    }
}
