<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdInPlanFeatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subscription_plan_features', function (Blueprint $table) {

            $table->foreign(['subscription_addon_id'])->references('id')->on('subscription_addons')
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
        Schema::table('subscription_plan_features', function (Blueprint $table) {
            $table->dropForeign('subscription_plan_features_subscription_addon_id_foreign');
        });
    }
}
