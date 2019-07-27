<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands_product', function (Blueprint $table) {
            $table->integer('product_id')->unsigned()->index();
            $table->integer('brand_id')->unsigned()->index();
            $table->foreign('product_id')->references('id')->on('products') ->onDelete('cascade')
          ->onUpdate('cascade');
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
        Schema::dropIfExists('brands_product');
    }
}
