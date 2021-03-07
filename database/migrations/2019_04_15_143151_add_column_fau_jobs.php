<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnFauJobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fau_jobs', function (Blueprint $table) {
            //
            $table->integer('created_by')->after('budget')->nullable();
            $table->unsignedInteger('city_id')->after('type')->nullable();
            $table->foreign('city_id')->references('id')->on('main_cities')->onDelete('cascade');
            $table->string('status')->default('Pending')->after('budget')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fau_jobs', function (Blueprint $table) {
            $table->dropColumn('created_by');
            $table->dropForeign('fau_jobs_city_id_foreign');
            $table->dropColumn('city_id');
            $table->dropColumn('status');
        });
    }
}
