<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFauRequestQuote extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fau_request_quotes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('quantity')->nullable();
            $table->string('description')->nullable();

            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('cascade');

            $table->unsignedInteger('sub_category_id')->nullable();
            $table->foreign('sub_category_id')->references('id')->on('categories')
                ->onDelete('cascade');


            $table->unsignedInteger('currency_id')->nullable();
            $table->foreign('currency_id')->references('id')->on('main_currencies')
                ->onDelete('cascade');

            $table->unsignedInteger('inventory_packing_unit_id');
            $table->foreign('inventory_packing_unit_id')->references('id')->on('inventory_packing_units')
                ->onDelete('cascade');


            $table->integer('created_by')->nullable();
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
        Schema::dropIfExists('fau_request_quotes');
    }
}
