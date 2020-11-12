<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        
        Schema::create('categories', function (Blueprint $table) {
            $table->id('cat_id');
            $table->string('cat_name');
            $table->string('cat_desc');
            $table->string('cat_image');
            $table->timestamps();
        });

        Schema::create('sellers', function (Blueprint $table) {
            $table->id('seller_id');
            $table->string('seller_name');
            $table->string('seller_desc');
            $table->string('seller_image');
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id('prd_id');
            $table->string('prd_name');
            $table->string('prd_price');
            $table->string('prd_image');
            $table->string('prd_desc');
            $table->unsignedBigInteger('product_cat_id');
            $table->foreign('product_cat_id')->references('cat_id')->on('categories');
            $table->unsignedBigInteger('product_seller_id');
            $table->foreign('product_seller_id')->references('seller_id')->on('sellers');
            $table->boolean('prd_status')->default('1');
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
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('sellers');
    }
}
