<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubscriptionAddonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_addons', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('charge_type',['recurring','one time payment']);

            $table->string('name',255);

            $table->string('period')->nullable();
            $table->string('period_unit')->nullable();

            $table->integer('created_by')->unsigned();
            $table->foreign(['created_by'])->references('id')->on('users')
                ->onDelete('cascade');

            $table->string('total_price')->nullable();
            $table->string('invoice_name','500');
            $table->string('invoice_notes','2000')->nullable();
            $table->string('comments','2000')->nullable();
            $table->string('description','2000')->nullable();
            $table->integer('price_model_id')->unsigned();
            $table->foreign(['price_model_id'])->references('id')->on('subscription_pricing_models')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscription_addons');
    }
}
