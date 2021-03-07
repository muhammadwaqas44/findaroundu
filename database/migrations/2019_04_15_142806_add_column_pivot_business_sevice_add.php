<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnPivotBusinessSeviceAdd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pivot_categories_adds_business_services', function (Blueprint $table) {
            //
            $table->unsignedInteger('job_id')->after('service_id')->nullable();

            $table->foreign(['job_id'])->references('id')->on('fau_jobs')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pivot_categories_adds_business_services', function (Blueprint $table) {
            //
            $table->dropForeign('pivot_categories_adds_business_services_job_id_foreign');
        });
    }
}
