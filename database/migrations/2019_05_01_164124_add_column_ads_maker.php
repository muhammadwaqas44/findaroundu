<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnAdsMaker extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('adds', function (Blueprint $table) {
            //
            $table->unsignedInteger('category_maker_id')->nullable();
            $table->foreign(['category_maker_id'])->references('id')->on('category_makers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('adds', function (Blueprint $table) {
            //
            $table->dropForeign(['category_maker_id']);
            $table->dropColumn('category_maker_id');
        });
    }
}
