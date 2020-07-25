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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_type_id');
            $table->unsignedBigInteger('product_subType_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_type_id')->references('id')->on('all_product_type')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_subType_id')->references('id')->on('all_product_sub_type')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->string('description');
            $table->string('price');
            $table->string('discount_price');
            $table->integer('product_quantity');
            $table->string('product_front_img')->nullable();
            $table->string('product_back_img')->nullable();
            $table->string('product_left_img')->nullable();
            $table->string('product_right_img')->nullable();
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
    }
}
