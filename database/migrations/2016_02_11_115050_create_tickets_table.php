<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id')->unsigned();            
            $table->integer('order_id')->unsigned();
            $table->integer('price_id')->unsigned();
            $table->string('description');
            $table->decimal('price', 10, 2);            
            $table->integer('quantity');
            $table->string('unique')->unique();            
            $table->timestamps();
            
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('price_id')->references('id')->on('prices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tickets');
    }
}
