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
        $table->string('name');          // 商品名
        $table->integer('price');        // 料金
        $table->string('image');         // 画像
        $table->text('description');     // 説明
        $table->string('season')->nullable();
        $table->foreignId('season_id')->constrained()->cascadeOnDelete();
        // seasons.id と紐づけ
        // 季節削除時に商品も削除
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
