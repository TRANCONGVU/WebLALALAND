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
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //slider
        Schema::create('slider', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image');
            $table->timestamps();
        });

        //san pham
        Schema::create('cate_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('subcate_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('cate_id');
            $table->foreign('cate_id')->references('id')->on('cate_product')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('product', function (Blueprint $table) {
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

    }
}
