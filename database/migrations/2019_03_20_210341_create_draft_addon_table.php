<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDraftAddonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('draft_addon', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedInteger('subscription_addon_id')->nullable();
            $table->foreign(['subscription_addon_id'])->references('id')->on('subscription_addons')
                ->onDelete('cascade');


            $table->text('json_array');
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
        Schema::dropIfExists('draft_addon');
    }
}
