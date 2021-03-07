<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            //
            $table->boolean('is_ad_condition_req')->after('parent_id')->nullable();
            $table->boolean('is_ad_type_or_make_req')->after('parent_id')->nullable();
            $table->boolean('is_ad_additional_fields_req')->after('parent_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            //
            $table->dropColumn('is_ad_condition_req');
            $table->dropColumn('is_ad_type_or_make_req');
            $table->dropColumn('is_ad_additional_fields_req');

        });
    }
}
