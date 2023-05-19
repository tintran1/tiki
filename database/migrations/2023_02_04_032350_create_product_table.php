<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_child_id');
            $table->foreign('category_child_id')->references('id')->on('category_child');
            $table->unsignedBigInteger('shop_id');
            $table->foreign('shop_id')->references('id')->on('shop');
            $table->string('title');
            $table->string('img');
            $table->string('video');
            $table->string('sold');
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
        Schema::dropIfExists('product');
    }
};
