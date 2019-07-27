<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingcostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippingcosts', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('district_id')->unsigned();
              $table->integer('amount');
            $table->timestamps();
             $table->foreign('district_id')
      ->references('id')->on('districts')
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
        Schema::dropIfExists('shippingcosts');
    }
}
