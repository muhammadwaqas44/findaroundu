<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddonTypeIdInAddonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subscription_addons', function (Blueprint $table) {
            $table->integer('addon_type_id')->unsigned()->nullable();
            $table->foreign(['addon_type_id'])->references('id')->on('subscription_addons_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subscription_addons', function (Blueprint $table) {
            $table->dropForeign('subscription_addons_addon_type_id_foreign');
            $table->dropColumn('addon_type_id');
        });
    }
}
