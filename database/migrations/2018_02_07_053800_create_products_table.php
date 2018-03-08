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
            $table->integer('product_serial_num')->unique();
            $table->integer('style_id')->unsigned();
            $table->float('product_price');
            $table->string('product_desc');
            $table->float('product_price_sale');
           
            $table->integer('mater_id')->unsigned();
            $table->integer('comp_id')->unsigned();
            $table->foreign('style_id')->references('id')->on('styles')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('mater_id')->references('id')->on('materials')
            ->onDelete('cascade')
            ->onUpdate('cascade');
<<<<<<< HEAD
           
=======
            // $table->foreign('comp_id')->references('id')->on('sellers')
            // ->onDelete('cascade')
            // ->onUpdate('cascade');
>>>>>>> af756aadcad135af9a5829ba4c6aa7757f8258e3
          
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
