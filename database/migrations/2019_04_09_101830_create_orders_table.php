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
            $table->bigIncrements('id');
            $table->string('number', 50)->nullable();
            $table->string('title', 150)->nullable();
            $table->string('batch', 50)->nullable();
            $table->string('load', 50)->nullable();
            $table->integer('package_number')->nullable();
            $table->double('weight', 8, 2)->nullable();
            $table->double('volume', 7, 4)->nullable();
            $table->string('recipient', 150)->nullable();
            $table->string('supplier', 150)->nullable();
            $table->string('comment', 240)->nullable();
            $table->unsignedBigInteger('shipment_id')->nullable();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->unsignedBigInteger('customer_id');
            $table->timestamps();

            $table->foreign('shipment_id')->references('id')->on('shipments');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('status_id')->references('id')->on('statuses');
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
