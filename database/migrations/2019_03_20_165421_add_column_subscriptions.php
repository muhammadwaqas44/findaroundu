<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnSubscriptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subscriptions', function (Blueprint $table) {

            $table->unsignedInteger('subscriptions_addon_id')->after('shipping_to_bill_address')->nullable();
            $table->foreign(['subscriptions_addon_id'])->references('id')->on('subscription_addons')
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
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropForeign('subscription_subscriptions_addon_id_foreign');
        });

    }
}
