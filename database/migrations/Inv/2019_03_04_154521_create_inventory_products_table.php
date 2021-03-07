<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_products', function (Blueprint $table) {
            $table->increments('id');

            $table->string('product_name');
            $table->decimal('price',11,2);
            $table->integer('currency_id');
            $table->integer('quantity');
            $table->string('type');
            $table->string('description');
            $table->string('profile_image');

            $table->integer('business_id')->nullable();

            $table->boolean('sale')->default(0);
            $table->decimal('sale_percentage',11,2)->nullable();
            $table->date('sale_from')->nullable();
            $table->date('sale_to')->nullable();
            $table->string('sku')->nullable();

            $table->boolean('return')->default(0);
            $table->integer('return_date')->nullable();
            $table->integer('return_interval')->nullable();


            $table->boolean('warranty')->default(0);
            $table->integer('warranty_claim_date')->nullable();
            $table->integer('warranty_claim_interval')->nullable();

            $table->boolean('cash_on_delivery')->default(0);

            $table->boolean('home_delivery')->default(0);
            $table->integer('home_delivery_to')->nullable();
            $table->integer('home_delivery_from')->nullable();
            $table->string('home_delivery_interval')->nullable();

            $table->string('delivery_charges')->nullable();

            $table->string('status')->nullable();
            $table->integer('created_by');

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
        Schema::dropIfExists('inventory_products');
    }
}
