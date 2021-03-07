<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsInPlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subscription_plans', function (Blueprint $table) {
            $table->integer('plan_type_id')->unsigned()->after('id');
            $table->foreign(['plan_type_id'])->references('id')->on('subscription_plan_types')->onDelete('cascade');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscription_plans', function (Blueprint $table) {
            $table->dropForeign('subscription_plans_plan_type_id_foreign');
            $table->dropColumn('plan_type_id');
        });
    }
}
