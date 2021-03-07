<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSkillColummServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            //
            $table->unsignedInteger('skills_id')->after('project_price')->nullable();
            $table->foreign('skills_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('email')->after('long')->nullable();
            $table->string('phone')->after('email')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            //
            $table->dropForeign(['skills_id']);
            $table->dropColumn('skills_id');
            $table->dropColumn('email');
            $table->dropColumn('phone');
        });
    }
}
