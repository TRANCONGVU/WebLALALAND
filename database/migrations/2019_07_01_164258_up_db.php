<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpDb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //slider
        Schema::create('sliders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image');
            $table->timestamps();
        });

        //san pham
        Schema::create('cate_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('subcate_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('cate_id');
            $table->foreign('cate_id')->references('id')->on('cate_product')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('image');
            $table->text('code');
            $table->integer('sale');
            $table->text('color');
            $table->text('size');
            $table->integer('quantity');
            $table->integer('subcate_id');
            $table->foreign('subcate_id')->references('id')->on('subcate_product')->onDelete('cascade');
            $table->timestamps();
        });

        // bo suu tap

        Schema::create('collections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('image');
            $table->integer('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->timestamps();
        });

        //gioi thieu
        Schema::create('introduce', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('content');
            $table->timestamps();
        });

        // lien he
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->text('email');
            $table->text('phone');
            $table->string('content');
            $table->timestamps();
        });
        //cau hoi thuong gap
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('content');
            $table->timestamps();
        });

        //tin tuc
        Schema::create('cate_news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('content');
            $table->text('image');
            $table->integer('cate_id');
            $table->foreign('cate_id')->references('id')->on('cate_news')->onDelete('cascade');
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


    }
}
