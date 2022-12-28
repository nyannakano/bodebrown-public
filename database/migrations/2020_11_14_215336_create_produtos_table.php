<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pro_name');
            $table->string('pro_description');
            $table->double('pro_price');
            $table->integer('pro_order');
            $table->string('pro_image')
                ->nullable();
            $table->smallInteger('pro_del')
                ->default(0);
            $table->integer('cat_id')->unsigned();
            $table->timestamps();
            $table->foreign('cat_id')
                ->references('id')
                ->on('categorias');
        });

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
