<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->string('image');
            $table->string('banner');
            $table->string('summary');
            $table->string('latitude');
            $table->string('longitude');
            $table->dateTime('date_hour');
            $table->string('address');            
            $table->timestamps();
            
            $table->foreign('category_id')->references('id')->on('categories');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events');
    }
}
