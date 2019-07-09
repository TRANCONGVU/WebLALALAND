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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('birth')->nullable();
            $table->string('avatar');
            $table->integer('gender');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('status')->default('0');
            $table->rememberToken();
            $table->timestamps();
        });

       /* Schema::create('role', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });*/

        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',191);
            $table->string('email',191)->unique();
            $table->string('password',191);
            $table->integer('status')->default('0');
            $table->timestamp('email_verified_at')->nullable();
            /*$table->bigInteger('level')->unsigned();
            $table
                ->foreign('level')
                ->references('id')
                ->on('role');
            $table->timestamps();*/
        });

         //slider
         Schema::create('sliders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image');
            $table->string('logo')->nullable();
            $table->timestamps();
        });

        //san pham
        Schema::create('cate_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('slug')->index();
            $table->tinyInteger('active')->index();
            $table->bigInteger('total_product')->default(0);
            $table->timestamps();
        });
        Schema::create('product_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug')->index();
            $table->tinyInteger('active')->default(1)->index();
            $table->bigInteger('cate_id')->unsigned();
            $table->foreign('cate_id')->references('id')->on('cate_products')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('image');
            $table->string('code');
            $table->tinyInteger('pay');
            $table->tinyInteger('sale');
            $table->tinyInteger('quantity');
            $table->bigInteger('price');
            $table->tinyInteger('active')->default(1);
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('producttype_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('cate_products')->onDelete('cascade');
            $table->foreign('producttype_id')->references('id')->on('product_type')->onDelete('cascade');
            $table->timestamps();
        });

        // bo suu tap

        Schema::create('collections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('image');
            $table->bigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->timestamps();
        });

        //gioi thieu
        Schema::create('introduce', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('content');
            $table->timestamps();
        });

        // lien he
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->text('email');
            $table->text('phone');
            $table->string('content');
            $table->integer('status')->default('0');
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
            $table->string('slug');
            $table->timestamps();
        });
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('slug');
            $table->text('summary');
            $table->text('content');
            $table->string('image');
            $table->bigInteger('cate_id')->unsigned();
            $table->foreign('cate_id')
                ->references('id')
                ->on('cate_news')
                ->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('tagnews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('news_id')->unsigned();
            $table->foreign('news_id')
                ->references('id')
                ->on('news')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('color',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('name');
            $table->char('image');
            $table->bigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->timestamps();
        });
        //
        Schema::create('size',function (Blueprint $table){
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
       //
    }
}
