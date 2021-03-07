<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddonIdInPlanPivotPricingModel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subscription_plan_pivot_pricing_models', function (Blueprint $table) {


            $table->foreign(['addon_id'])->references('id')->on('subscription_addons')
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
        Schema::table('subscription_plan_pivot_pricing_models', function (Blueprint $table) {
            $table->dropForeign('subscription_plan_pivot_pricing_models_addon_id_foreign');
            $table->dropColumn('addon_id');
        });
    }
}
