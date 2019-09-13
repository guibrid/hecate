<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type', 50);
            $table->integer('number');
            $table->integer('inner_packs')->nullable();
            $table->double('length', 10, 2)->nullable();
            $table->double('width', 10, 2)->nullable();
            $table->double('height', 10, 2)->nullable();
            $table->double('weight', 10, 2)->nullable();
            $table->double('volume', 10, 4)->nullable();
            $table->string('description', 240)->nullable();
            $table->bigInteger('order_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('packs', function($table) {
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packs');
    }
}
