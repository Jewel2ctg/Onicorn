<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('product_id');
          $table->unsignedInteger('user_id')->nullable();
          $table->text('review');
          $table->decimal('rating', 4, 2);
          $table->timestamps();


          $table->foreign('user_id')
          ->references('id')->on('users')
           ->onDelete('cascade')
          ->onUpdate('cascade');

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
        Schema::dropIfExists('ratings');
    }
}
