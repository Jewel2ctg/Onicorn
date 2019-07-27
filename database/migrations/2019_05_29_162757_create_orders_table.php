<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
             $table->increments('id');
      $table->unsignedInteger('user_id');
      $table->string('ip_address')->nullable();
      $table->string('name');
      $table->string('phone_no');
      $table->double('carttotalamount', 8, 2);
      $table->double('couponcodediscount', 8, 2);
      $table->double('shippingcost', 8, 2);
      $table->double('grand_total', 8, 2);
      $table->string('payment_mode');
      $table->string('order_status')->nullable();;
      $table->string('order_id');
      $table->string('currency');
      

      $table->string('shippingname');
      $table->string('shippingemail');
      $table->string('shippingphone');
      $table->text('shippingaddress');

       $table->integer('country_id')->unsigned();
       $table->integer('division_id')->unsigned();
       $table->integer('district_id')->unsigned();
       
      $table->string('email');
      $table->text('message')->nullable();
      $table->boolean('is_paid')->default(0);
      $table->boolean('is_completed')->default(0);
      $table->boolean('is_seen_by_admin')->default(0);
      $table->timestamps();

      $table->foreign('user_id')
      ->references('id')->on('users')
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
        Schema::dropIfExists('orders');
    }
}
