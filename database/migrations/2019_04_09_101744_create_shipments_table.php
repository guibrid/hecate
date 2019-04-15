<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number', 50)->nullable();
            $table->string('title', 150)->nullable();
            $table->timestamp('document_reception')->nullable();
            $table->timestamp('custom_control')->nullable();
            $table->timestamp('cutoff')->nullable();
            $table->string('container_number', 50)->nullable();
            $table->string('comment', 240)->nullable();
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
        Schema::dropIfExists('shipments');
    }
}
