<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransshipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transshipments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type', 10);
            $table->timestamp('departure');
            $table->timestamp('arrival');
            $table->string('vessel', 50)->nullable();
            $table->string('comment', 240)->nullable();
            $table->unsignedBigInteger('loading_place');
            $table->unsignedBigInteger('unloading_place');
            $table->unsignedBigInteger('shipment_id');
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->timestamps();

            $table->foreign('loading_place')->references('id')->on('places');
            $table->foreign('unloading_place')->references('id')->on('places');
            $table->foreign('shipment_id')->references('id')->on('shipments');
            $table->foreign('agent_id')->references('id')->on('agents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transshipments');
    }
}
