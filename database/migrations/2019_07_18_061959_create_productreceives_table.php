<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductreceivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productreceives', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('receivequantity')->default(0);
            $table->unsignedInteger('soldquantity')->default(0);
            
            $table->unsignedInteger('remainingquantity')->virtualAs('receivequantity-soldquantity')->nullable();
             $table->integer('admin_id')->unsigned();
            $table->timestamps();

         $table->foreign('product_id')
          ->references('id')->on('products')
           ->onDelete('cascade')
          ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productreceives');
    }
}
