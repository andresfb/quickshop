<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->string('item_code', 20);
            $table->string('title');
            $table->text('description')->nullable();
            $table->mediumInteger('stock')->unsigned()->default(0);
            $table->double('price')->default(0.00);
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->foreign('category_id')
                ->references('id')->on('product_categories')
                ->onDelete('cascade');
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
