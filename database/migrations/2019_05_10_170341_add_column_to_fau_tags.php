<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToFauTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fau_tags', function (Blueprint $table) {

            $table->string('title','1000');
            $table->integer('category_id')->nullable()->unsigned();
            $table->foreign(['category_id'])->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fau_tags', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('category_id');
        });
    }
}
